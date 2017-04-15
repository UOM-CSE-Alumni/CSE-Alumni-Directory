<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasDegree extends Model
{
    //
    public function students(){
        return $this->belongsToMany(Student::class);
    }
    
    public function degrees(){
        return $this->belongsToMany(Degree::class);
    }
}
