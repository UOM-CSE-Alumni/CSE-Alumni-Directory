<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class UserController extends Controller
{
    /**
     * Show user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserProfileView()
    {
        $data = Student::where('id', 1)->first();
        return view('user/profile')->with('data', $data);
    }
}
