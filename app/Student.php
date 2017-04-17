<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //for the use of bulk creation
	public $fillable = ['name','email','contact_no','contact_no_visibility',
						'address','address_visibility','country','city'];

    public function hasDegrees(){
        return $this->belongsToMany(HasDegree::class);
    }

    public function workingIn(){
        return $this->belongsToMany(WorkingIn::class);
    }
}
