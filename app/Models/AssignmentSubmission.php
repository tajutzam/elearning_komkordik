<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignmentSubmission extends Model
{
    //

    protected $table = 'assignmnets_submissions';


    protected $guarded = [];

    public function assignment()
    {
        return $this->belongsTo(Assignment::class, 'assingment_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
