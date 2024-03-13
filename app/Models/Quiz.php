<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_choice'
    ];
    
    protected $casts = [
        'choices' => 'json',
        'user_choice' => 'json'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function answers(){
        return $this->hasMany(Answer::class);
    }
}
