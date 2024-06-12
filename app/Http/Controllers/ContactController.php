<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        $data = $request->only('name', 'phone', 'email', 'message');

        Mail::send('emails.contact', ['data' => $data], function ($message) use ($data) {
            $message->to('chris@coffslawnsandpropertymaintenance.net')
                    ->subject('Contact Form Submission');
        });

        return back()->with('success', 'Thank you for your message. We will get back to you soon.');
    }
}
