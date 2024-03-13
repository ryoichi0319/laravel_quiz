<?php

namespace App\Http\Controllers;
use App\Models\Quiz;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Authを追加

class QuizController extends Controller
{
    public function create(){
        $user = Auth::user();
        // ユーザーごとの正解数を取得する
        $user_correct_choices = Answer::where('correct_user_choice', 1)
            ->where('user_id', $user->id)
            ->count();
        $total_quiz = Quiz::count();
        $quiz = Quiz::with('answers')->get();
        $quiz_answers = [];

        foreach ($quiz as $q) {
            $quiz_answers[$q->id] = $q->answers;
        }
        return view('quiz.create', compact('user_correct_choices','total_quiz','quiz_answers'));
    
    }
    
    public function index(){
        $quizzes = Quiz::all();
        return view('quiz.index', compact('quizzes'));
    }

    // public function store(Request $request){
    //     // バリデーションを実行
    //     $validated = $request->validate([
    //         'user_choice' => 'required',
    //     ]);
        
    //     // リクエストから選択された値を取得し、$validated['user_choice'] に代入する
    //     $user_choice = $request->input('user_choice');
        
      
    //     return redirect()->route('quiz.index')->with('success', 'クイズが保存されました。');
    // }
    public function show($id)
    {   $quiz = Quiz::find($id);
        // $currentIndex = Quiz::where('id', '<', $quiz->id)->max('id'); // 現在のクイズの直前のクイズのIDを取得
        $next_quiz = Quiz::where('id', '>', $quiz->id)->first();
        $answer_number = $quiz->answer_number;
        $user = Auth::user();

        $correct_user_choice = Answer::where('correct_user_choice', 1)
        ->where('user_id', $user->id)
        ->count();
       
       
$user = Auth::user();

        return view('quiz.show', compact('quiz', 'next_quiz','user','correct_user_choice'));
    }

    public function result(){
        $user = Auth::user();
        // ユーザーごとの正解数を取得する
        $user_correct_choices = Answer::where('correct_user_choice', 1)
            ->where('user_id', $user->id)
            ->count();
        $total_quiz = Quiz::count();
        $quiz = Quiz::with('answers')->get();
        $quiz_answers = [];

        foreach ($quiz as $q) {
            $quiz_answers[$q->id] = $q->answers;
        }
        return view('result', compact('user_correct_choices','total_quiz','quiz_answers'));
    
    }
    public function start(){
        return view('start',);
    }



}
