<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Mail\MessageFromWebsite;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function sendBooking(Request $request) {

        $message = new Message();
        $message->name = $request->name;
        $message->surname = $request->surname;
        $message->dive_level = $request->dive_level;
        $message->email = $request->email;
        $message->from_to = $request->from_to;
        $message->message = $request->message;
        $message->save();

        $mail_data = [
            'name' => $message->name,
            'surname' => $message->surname,
            'dive_level' => $message->dive_level,
            'email' => $message->email,
            'from_to' => $message->from_to,
            'message' => $message->message,
        ];

        $mail = Mail::to('info@simonepozzobon.com')->send(new MessageFromWebsite($mail_data));

        return $mail;
    }
}
