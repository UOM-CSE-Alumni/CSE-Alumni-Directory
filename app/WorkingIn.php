<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingIn extends Model
{
    //

    public function students(){
        return $this->belongsToMany(Student::class);
    }

    public function companies(){
        return $this->belongsToMany(Company::class);
    }
}
