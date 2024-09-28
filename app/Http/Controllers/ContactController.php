<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function contact(Request $request)
    {
        $values = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        //  Send mail to admin
        Mail::send('email.contact', array(
            'first_name' => $values['first_name'],
            'last_name' => $values['last_name'],
            'email' => $values['email'],
            'msg' => $values['message'],
        ), function ($sending) use ($request) {
            $sending->from('info@savillesdrycleaners.co.uk');
            $sending->to('order@savillesdrycleaners.co.uk', 'Savilles')->subject('Savilles | New Inquire From Website');
        });

        return redirect()->back()->with('success', 'Your inquiry has been received! Our team will get back to you shortly.');
    }
}
