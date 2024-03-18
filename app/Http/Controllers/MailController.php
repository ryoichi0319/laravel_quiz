<?php
namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailgunTest;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth; // Authを追加

class MailController extends Controller
{
    public function send_mail()
    {   

        //ユーザー情報取得して正誤判定して正解数をカウント
        $user = Auth::user();
        $user_correct_choices = Answer::where('correct_user_choice', 1)
            ->where('user_id', $user->id)
            ->count();

        $name = $user->name;
      
        //非同期的にメール送信ジョブをキューに追加  
        SendMailJob::dispatch($name,$user_correct_choices);
       
        return back()->with('message','送信しました',);
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
