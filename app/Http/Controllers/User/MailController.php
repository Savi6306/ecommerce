<?php 

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    // Send Test Mail
    public function sendTestMail()
    {
        $details = [
            'title' => 'Welcome to PGMS Website',
            'body' => 'This is a test email sent from Laravel using Gmail SMTP.'
        ];

        // yaha ek simple mail send karenge
        Mail::send('emails.test', $details, function($message) {
            $message->to('sandhya@pushpendratechnology.com') 
                    ->subject('Test Mail from Laravel');
        });

        return "✅ Email Sent Successfully!";
    }
}
