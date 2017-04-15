<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    //
    public function hasDegrees(){
        return $this->belongsToMany(HasDegree::class);
    }
}
