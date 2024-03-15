<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailgunTest;

class MailController extends Controller
{
    public function sendMail()
    {
        $name = 'John Doe'; // ビューに渡す変数

        Mail::to('losegroove31@gmail.com')->send(new MailgunTest($name));
       
        return 'メールを送信しました。';
    }
    public function mail()
    {   


        $name = 'John Doe'; // ビューに渡す変数

        // 第二引数に変数を渡してビューを返す
        return view('emails.mailgun_test', compact('name'));
    }
}