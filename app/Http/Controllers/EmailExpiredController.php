<?php

namespace App\Http\Controllers;

use App\Mail\ExpiredNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailExpiredController
{
    public function __invoke(Request $request)
    {
        Mail::to('m.dzakiyyudin@gmail.com')->send(new ExpiredNotification());

        return 'succsess';
    }

    public function sendEmail(Request $request)
    {
        $userEmail = auth()->user()->email; 

        $subject = $request->input('subject-message');
        $message = $request->input('message');

        Mail::raw($message, function ($mail) use ($userEmail, $subject) {
            $mail->to($userEmail)->subject($subject);
        });

        session()->flash('email_sent', true);
        session()->flash('success', 'Email berhasil terkirim ke ' . $userEmail . '!');
        return redirect()->back();
    }
}
