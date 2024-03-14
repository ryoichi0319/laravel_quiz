<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\DownloadController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('post', PostController::class);
Route::resource('answer',AnswerController::class);
Route::resource('quiz',QuizController::class);
Route::resource('image',ImageController::class);

Route::get('/download', [DownloadController::class, 'index']);

Route::get('/result', [QuizController::class, 'result'])->name('result');
Route::get('answers/{quiz}',[AnswerController::class,'show'])->name('answer.show');
Route::delete('answers/{quiz}', [AnswerController::class, 'destroy'])->name('answer.destroy');
Route::delete('answers', [AnswerController::class, 'destroyAll'])->name('all_answer.destroy');
Route::get('/start',[QuizController::class,'start'])->name('start');

// Route::get('/test',[TestController::class, 'test'])->name('test');

// Route::get('post/show/{post}',[PostController::class,'show'])->name('post.show');


// Route::get('post/{post}/edit',[PostController::class, 'edit'])->name('post.edit');

// Route::patch('post/{post}',[PostController::class,'update'])->name('post.update');
// // Route::get('post/create',[PostController::class,'create'])->middleware(['auth','admin']);

// Route::middleware(['auth','admin'])->group(function(){
//     Route::get('post',[PostController::class,'index'])->name('post.index');
//     Route::get('post/create',[PostController::class,'create']);
// });

// Route::post('post',[PostController::class,'store'])->name('post.store');

// Route::delete('post/{post}',[PostController::class,'destroy'])->name('post.destroy');

// Route::get('post',[PostController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
