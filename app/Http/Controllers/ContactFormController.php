<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:1|max:255',
            'email' => 'required|email',
            'message' => 'required|min:1',
        ]);

        Mail::to('nietolerancjalaktozyxd@gmail.com')->send(new ContactMail($validatedData)); //ustawić mail obecnie podany jest mój mail roboczy
        
        return back()->with('success', 'Thank you for your message!');
    }
}
