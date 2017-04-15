<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    public function hasDegrees(){
        return $this->belongsToMany(HasDegree::class);
    }

    public function workingIn(){
        return $this->belongsToMany(WorkingIn::class);
    }
}
