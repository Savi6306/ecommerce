<?php
namespace App\Http\Controllers\Seller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Otp;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class OtpController extends Controller
{
    /**
     * Convert database time (UTC) to application time (IST)
     */
    private function convertToAppTime($databaseTime)
    {
        if (!$databaseTime) return null;
        return Carbon::parse($databaseTime)->setTimezone('Asia/Kolkata');
    }
    
    /**
     * Convert application time (IST) to database time (UTC)
     */
    private function convertToDbTime($appTime)
    {
        if (!$appTime) return null;
        return Carbon::parse($appTime)->setTimezone('Asia/Kolkata');
    }

    /**
     * Send OTP to email
     */
    public function sendEmailOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        try {
            Log::info("Sending OTP - Time Check", [
                'app_time' => Carbon::now()->format('Y-m-d H:i:s'),
                'db_time' => DB::select('SELECT NOW() as time')[0]->time,
                'email' => $request->email
            ]);

            // ✅ Prevent more than 1 OTP per minute
            $recentOtp = Otp::where('email', $request->email)
                ->where('created_at', '>=', Carbon::now()->subMinute())
                ->first();

            if ($recentOtp) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please wait at least 1 minute before requesting another OTP.'
                ], 429);
            }

            $otpCode = rand(100000, 999999); // 6-digit OTP

            // Remove expired OTPs (convert expiration check for database time)
            $expiredTime = $this->convertToDbTime(Carbon::now());
            Otp::where('email', $request->email)
                ->where('expires_at', '<', $expiredTime)
                ->delete();

            // Save new OTP (convert expiration time to database timezone)
            $expiresAtApp = Carbon::now()->addMinutes(10);
            $expiresAtDb = $this->convertToDbTime($expiresAtApp);
            
           $otp = Otp::create([
                'email'      => strtolower($request->email),
                'otp'        => $otpCode,  
                'expires_at' => $expiresAtDb,
                'is_used'    => false,
                'attempts'   => 0,
            ]);

            Log::info("OTP Created Successfully", [
                'email' => $request->email,
                'otp'        => $otpCode,  
                'expires_at_db' => $otp->expires_at->format('Y-m-d H:i:s'),
                'expires_at_app' => $this->convertToAppTime($otp->expires_at)->format('Y-m-d H:i:s'),
                'current_time_app' => Carbon::now()->format('Y-m-d H:i:s'),
                'current_time_db' => DB::select('SELECT NOW() as time')[0]->time
            ]);

            // Send OTP via email
            Mail::raw("Your OTP is: $otpCode", function ($message) use ($request) {
                $message->to($request->email)
                        ->subject('Your OTP for PGMS');
            });

            return response()->json([
                'success' => true,
                'message' => 'OTP sent successfully!'
            ]);

        } catch (\Exception $e) {
            Log::error("OTP Send Error: " . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to send OTP: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Verify OTP
     */
    public function verifyEmailOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp'   => 'required|digits:6',
        ]);

        try {
            // Convert email to lowercase for consistent comparison
            $email = strtolower($request->email);
            $otpCode = $request->otp;
            
            Log::info("Verifying OTP - Time Check", [
                'app_time' => Carbon::now()->format('Y-m-d H:i:s'),
                'db_time' => DB::select('SELECT NOW() as time')[0]->time,
                'email' => $email
            ]);

            // Find the most recent valid OTP for this email
            $otp = Otp::where('email', $email)
                      ->where('is_used', false)
                      ->orderBy('created_at', 'desc')
                      ->first();

            if (!$otp) {
                Log::warning("No active OTP found", ['email' => $email]);
                return response()->json([
                    'success' => false, 
                    'message' => 'No active OTP found. Please request a new one.'
                ], 400);
            }

            // Convert database time (UTC) to application time (IST) for expiration check
            $expiresAtApp = $this->convertToAppTime($otp->expires_at);
            
            Log::info("OTP Record Found", [
                'id' => $otp->id,
                'stored_code' => $otp->otp,
                'input_code' => $otpCode,
                'expires_at_db' => $otp->expires_at->format('Y-m-d H:i:s'),
                'expires_at_app' => $expiresAtApp->format('Y-m-d H:i:s'),
                'current_time_app' => Carbon::now()->format('Y-m-d H:i:s'),
                'is_expired' => Carbon::now()->gt($expiresAtApp) ? 'YES' : 'NO',
                'attempts' => $otp->attempts
            ]);

            // Check if OTP has expired (using application time)
            if (Carbon::now()->gt($expiresAtApp)) {
                Log::warning("OTP Expired", [
                    'email' => $email, 
                    'expires_at_app' => $expiresAtApp->format('Y-m-d H:i:s'),
                    'current_time_app' => Carbon::now()->format('Y-m-d H:i:s'),
                    'time_difference' => Carbon::now()->diffInSeconds($expiresAtApp) . ' seconds expired'
                ]);
                return response()->json([
                    'success' => false, 
                    'message' => 'Expired OTP. Please request a new one.'
                ], 400);
            }

            // Check if OTP has been attempted too many times
            if ($otp->attempts >= 3) {
                Log::warning("Too many OTP attempts", ['email' => $email, 'attempts' => $otp->attempts]);
                return response()->json([
                    'success' => false, 
                    'message' => 'Too many attempts. Please request a new OTP.'
                ], 400);
            }

            // Check if OTP matches
            if ($otp->otp != $otpCode) {
                // Increment attempt counter
                $otp->increment('attempts');
                //Log::warning("OTP mismatch", [
                    //'email' => $email, 
                    //'stored' => $otp->code, 
                    //'provided' => $otpCode,
                    //'attempts' => $otp->attempts
                //]);
                
                return response()->json([
                    'success' => false, 
                    'message' => 'Invalid OTP. Attempts remaining: ' . (3 - $otp->attempts)
                ], 400);
            }

            // Mark OTP as used
            $otp->is_used = true;
            $otp->save();
            
            Log::info("OTP Verified Successfully", ['email' => $email]);

            return response()->json([
                'success' => true, 
                'message' => 'OTP verified successfully!'
            ]);
            
        // Login seller
        $seller = Seller::where('email', $email)->first();
        Auth::guard('seller')->login($seller);

        // Clear OTP session
        session()->forget('otp_sent');

        // Redirect to dashboard
        return redirect()->route('seller.dashboard')->with('success', 'Logged in successfully!');
    


        } catch (\Exception $e) {
            Log::error("OTP Verification Error: " . $e->getMessage());
            return response()->json([
                'success' => false, 
                'message' => 'Error verifying OTP: ' . $e->getMessage()
            ], 500);
        }
    

    }
        

    /**
     * Test OTP functionality
     */
    public function testOtp()
    {
        try {
            $email = 'test@example.com';
            
            // Clear previous OTPs
            Otp::where('email', $email)->delete();
            
            // Create test OTP with proper time conversion
            $expiresAtApp = Carbon::now()->addMinutes(10);
            $expiresAtDb = $this->convertToDbTime($expiresAtApp);
            
            $otp = Otp::create([
                'email' => $email,
                'otp' => '123456',
                'expires_at' => $expiresAtDb,
                'is_used' => false,
                'attempts' => 0
            ]);
            
            Log::info("Test OTP Created", [
                'email' => $email,
                'otp' => '123456',
                'expires_at_db' => $otp->expires_at->format('Y-m-d H:i:s'),
                'expires_at_app' => $this->convertToAppTime($otp->expires_at)->format('Y-m-d H:i:s'),
                'current_time_app' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
            
            // Try to verify
            $verificationRequest = new Request([
                'email' => $email,
                'otp' => '123456'
            ]);
            
            return $this->verifyEmailOtp($verificationRequest);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Test failed: ' . $e->getMessage()
            ], 500);
        }
    }
}