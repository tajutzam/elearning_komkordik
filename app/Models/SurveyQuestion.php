<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyQuestion extends Model
{
    //


    protected $guarded = ['id'];


    public function survey()
    {
        return $this->belongsTo(Survey::class, "survey_id", 'id');
    }

    public function answers()
    {
        return $this->hasMany(SurveyAnswer::class, "question_id", "id");
    }


    public function responses()
    {
        return $this->hasMany(SurveyResponse::class, "survey_question_id", "id");
    }
}
