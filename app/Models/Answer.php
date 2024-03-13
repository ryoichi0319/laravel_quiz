<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'user_choice',
        'user_id',
        'quiz_id',
        'correct_user_choice'
    ];
   public function quizzes(){
    return $this->hasMany(Quiz::class);
   }
   public function user(){
    return $this->belongsTo(User::class);
   }
    use HasFactory;
}
