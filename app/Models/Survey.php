<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    //

    protected $guarded = ['id'];


    public function questions()
    {
        return $this->hasMany(SurveyQuestion::class, "survey_id", 'id');
    }

    public function responses()
    {
        return $this->hasMany(SurveyResponse::class, "survey_id", 'id');
    }


    public function userNilaiSurveys()
    {
        return $this->hasMany(UserNilaiSurvey::class);
    }
}
