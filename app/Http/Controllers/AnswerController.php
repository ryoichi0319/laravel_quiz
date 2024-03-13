<?php

namespace App\Http\Controllers;
use App\Models\Answer;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function index()
    {
        //
        // $posts=Post::all();
        $answers = Answer::all();
        return view('answer.index',compact('answers'));
    }
    // public function store(Request $request)
    // {
    //     //
    //     $validated = $request->validate([
    //         'user_choice' => 'required',
    //         'quiz_id'     => 'required|exists:quizzes,id'
    //     ]);
    //     $answer = new Answer();
    //     $userId = auth()->id();
    //      // クイズを作成
    //     // クイズのidを取得
    //     $answer->user_choice = $validated['user_choice'];

    //     $answer->user_id = $userId;
    //     $answer->quiz_id = $validated['quiz_id']; // クイズのIDを設定
    //     $answer->save();
    //     return redirect()->route('quiz.index')->with('message','保存しました。');
    // }
public function store(Request $request)
{
    $validated = $request->validate([
        'user_choice' => 'required',
        'quiz_id'     => 'required|exists:quizzes,id',
    ]);
    $userId = auth()->id(); // ユーザーIDを取得
    
    $quiz = Quiz::findOrFail($validated['quiz_id']);
    
    $correct_user_choice = $validated['user_choice'] == $quiz->answer_number ? 1 : 0;

    $answer = Answer::create([
        'user_choice' => $validated['user_choice'],
        'quiz_id'     => $validated['quiz_id'],
        'user_id'     => $userId,
        'correct_user_choice' => $correct_user_choice
    ]);
    
    session(['quiz_id' => $validated['quiz_id']]);

    session(['user_choice' => $validated['user_choice']]) ;


    return redirect()->route('quiz.show',['quiz' => $validated['quiz_id']])
    ->with('message', ['type_correct' => '正解です','type_incorrect'=>'不正解です', 'content' => '保存しました。']);

}
// public function destroy(Request $request, Answer $answer)
//     {
//         $answer->delete();
//         $request->session();
//         return redirect()->route('quiz.show')->with('message','削除しました');

//         //
//     }
public function show($id)
{     $answer = Quiz::find($id);

    // ロジックを実装する
}
public function destroy(Quiz $quiz)
{
    // 指定されたクイズに関連する全ての回答を取得する
    $answers = $quiz->answers;

    // 全ての回答を削除する
    foreach ($answers as $answer) {
        $answer->delete();
        
    }
    request()->session()->forget('quiz_id');


    // メッセージをリダイレクトで返す
    return redirect()->back();
}
public function destroyAll()
{
    // 全ての回答を取得する
    $answers = Answer::all();

    // 全ての回答を削除する
    $answers->each(function ($answer) {
        $answer->delete();
    });

    // メッセージをリダイレクトで返す
    return redirect()->back()->with('message','削除しました。');
}

    //
}
