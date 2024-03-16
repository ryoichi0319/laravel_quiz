<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailgunTest;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth; // Authを追加

class MailController extends Controller
{
    public function send_mail()
    {
        $user = Auth::user();
        $user_correct_choices = Answer::where('correct_user_choice', 1)
            ->where('user_id', $user->id)
            ->count();

        $name = $user->name;
        Mail::to('losegroove31@gmail.com')->send(new MailgunTest($name, $user_correct_choices));
       
        return back()->with('message','送信しました');
    }

    public function mail()
    {  
        $user = Auth::user();
        $user_correct_choices = Answer::where('correct_user_choice', 1)
            ->where('user_id', $user->id)
            ->count();

        $name = $user->name;

        // 第二引数に変数を渡してビューを返す
        return view('emails.mailgun_test', compact('name', 'user_correct_choices'));
    }
}
