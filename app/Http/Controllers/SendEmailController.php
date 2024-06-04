<?php

namespace App\Http\Controllers;

use App\Mail\ExpiredNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class SendEmailController
{
    public function __invoke(Request $request)
    {
        Mail::to('m.dzakiyyudin@gmail.com')->send(new ExpiredNotification());

        return 'succsess';
    }

    public function sendEmail(Request $request)
    {
        $userEmail = $request->input('email');

        $subject = $request->input('subject-message');
        $message = $request->input('message');

        Mail::raw($message, function ($mail) use ($userEmail, $subject) {
            $mail->to($userEmail)->subject("[MESSAGE] " . $subject);
        });

        session()->flash('email_sent', true);
        session()->flash('success', 'Email berhasil terkirim ke ' . $userEmail . '!');
        return redirect()->back();
    }

    // public function sendBroadcast(Request $request)
    // {
    //     $emails = User::pluck('email')->toArray();

    //     $subject = $request->input('subject-message');
    //     $image = $request->input('image');
    //     $message = $request->input('message');

    //     Mail::raw($message, function ($mail) use ($emails, $subject) {
    //         $mail->to($emails)->subject("[BROADCAST] " . $subject);
    //     });

    //     session()->flash('email_sent', true);
    //     session()->flash('success', 'Broadcast berhasil terkirim!');
    //     return redirect()->back();
    // }


    public function sendBroadcast(Request $request)
    {
        $emails = User::pluck('email')->toArray();

        $subject = $request->input('subject-message');
        $message = $request->input('message');

        // Menyimpan file yang diunggah ke server
        $imagePath = $request->file('image')->store('','public');

        // Mengirim email dengan lampiran jika ada
        Mail::raw($message, function ($mail) use ($emails, $subject, $imagePath) {
            $mail->to($emails)->subject("[BROADCAST] " . $subject);
            if ($imagePath !== null) {
                $attachmentPath = storage_path('app/public/' . $imagePath);
                $mail->attach($attachmentPath);
            } else {
                $imagePath = null;
            }
        });

        session()->flash('email_sent', true);
        session()->flash('success', 'Broadcast berhasil terkirim!');
        return redirect()->back();
    }
}
