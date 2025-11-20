<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // Show Contact Page
    public function index()
    {
        return view('user.contact'); // contact.blade.php path
    }

    // Handle form submission
    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Send Admin Mail
        Mail::send([], [], function ($message) use ($data) {
            $message->to('sandhya@pushpendratechnology.com')
                ->subject($data['subject'])
                ->from($data['email'], $data['name'])
                ->html("
                    <h3>New Contact Message</h3>
                    <p><strong>Name:</strong> {$data['name']}</p>
                    <p><strong>Email:</strong> {$data['email']}</p>
                    <p><strong>Message:</strong><br>{$data['message']}</p>
                ");
        });

        // Send Welcome Mail to User (optional)
        // Mail::to($data['email'])->send(new WelcomeEmail($data));

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
