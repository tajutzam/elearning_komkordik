<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    //

    protected $guarded = ['id'];

    protected $table = 'survey_response';

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
