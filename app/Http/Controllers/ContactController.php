<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Mail::to('getafixx149@gmail.com')->send(new ContactFormMail($validated));

        return back()->with('success', 'Thank you for your message! We will get back to you shortly.');
    }
    // // ... inside your controller method
    // public function submit(Request $request)
    // {
    //     $data = $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'message' => 'required',
    //     ]);

    //     // This will now send via Resend API using the configuration above
    //     Mail::to('admin@easytigervodka.com.au')->send(new ContactFormMail($data));

    //     return back()->with('success', 'Message sent!');
    // }
}
