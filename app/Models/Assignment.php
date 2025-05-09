<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    //
    protected $guarded = ['id'];

    public function submissions()
    {
        return $this->hasMany(AssignmentSubmission::class, "assignment_id", "id");
    }
}
