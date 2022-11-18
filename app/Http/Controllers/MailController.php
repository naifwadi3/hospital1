<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

class MailController extends Controller
{
    public function index(Request $request)
    {

        $mail_date=[
        'recipient'=>'ghuu.fghuua@gmail.com',
        'fromEmail'=>$request->email,
        'formMasseg'=>$request->massege,

        ];
    //    Mail::send('pages\doctors\Appointment_reminder', $mail_date, function ($message) {
    //         $message->from('ghuu.fghuua@gmail.com', 'John Doe');
    //         $message->sender('ghuu.fghuua@gmail.com', 'John Doe');
    //         $message->to('ghuu.fghuua@gmail.com', 'John Doe');
    //         $message->cc('john@johndoe.com', 'John Doe');
    //         $message->bcc('john@johndoe.com', 'John Doe');
    //         $message->replyTo('john@johndoe.com', 'John Doe');
    //         $message->subject('Subject');
    //         $message->priority(3);
    //     });
        Mail::send('pages\doctors\Appointment_reminder', $mail_date, function ($message) {
            $message->mail_date->email;
            $message->mail_date->massege;;
        });
    }


}
