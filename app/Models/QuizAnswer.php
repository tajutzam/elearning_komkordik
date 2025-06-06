<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuizAnswer extends Model
{
    use SoftDeletes;

    //
    protected $table = 'quiz_answers';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
