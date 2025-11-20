<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory; // ✅ Add this line

    /**
     * OTP users ke liye password validation bypass
     */
    public function validateForPassportPasswordGrant($password)
    {
        // Agar OTP user hai to bypass karein
        if ($this->isOtpUser()) {
            return true;
        }
        
        // Normal password verification
        return Hash::check($password, $this->password);
    }

    /**
     * Check if user is OTP based
     */
    public function isOtpUser()
    {
        return strpos($this->password, 'otp_password_') !== false;
    }

    /**
     * Auto-generate password for OTP users
     */
    public function setPasswordAttribute($value)
    {
        if (empty($value)) {
            $this->attributes['password'] = Hash::make($this->generateOtpPassword());
        } else {
            $this->attributes['password'] = Hash::make($value);
        }
    }

    private function generateOtpPassword()
    {
        return 'otp_password_' . rand(100000, 999999) . '_' . time();
    }
}
