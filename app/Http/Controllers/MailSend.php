<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use \App\Mail\SendMail;
use App\Support;
class MailSend extends Controller
{
    public function mailsend()
    {
        $details = [
            'title' => 'แจ้งเตือนการซัพพอตลูกค้า /mailcontroller',
            'body' => 'ลิงค์',
            'support_number' => 'CS240220-0001',
            'company' => 'BMW',
            'responsible' => 'Vision',
            'email' =>'admin@gmail.com'
        ];

        \Mail::to('kareem15268@gmail.com')->send(new SendMail($details));
        return view('emails.thanks');
    }
}
