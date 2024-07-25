<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Log;


class ContactController extends Controller
{
    public function send(Request $request)
    {
        $contact = $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email',
            'subject'   => 'required|string|max:255',
            'message'   => 'required|string',
        ]);

        Contact::create($contact);
        try {
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($contact));
            return back()->with('success', 'Mail sent successfully');
        } catch (\Exception $e) {
            Log::error('Failed to send mail: ' . $e->getMessage(), ['contact' => $contact, 'trace' => $e->getTraceAsString()]);
            return back()->with('error', 'Failed to send mail. Please try again.');
        }
    }
}
