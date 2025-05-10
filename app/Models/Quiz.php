<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    //

    protected $guarded = [];


    public function questions()
    {
        return $this->hasMany(QuizQuestion::class, 'quiz_id');
    }

    public function answers()
    {
        return $this->hasMany(QuizAnswer::class, "quiz_id");
    }


    public function quizResults()
    {
        return $this->hasMany(QuizResult::class);
    }
}
