<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    public function workingIn(){
        return $this->belongsToMany(WorkingIn::class);
    }
}
