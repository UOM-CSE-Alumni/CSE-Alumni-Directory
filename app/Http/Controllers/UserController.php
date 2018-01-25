<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();  
        $user_mail = $user['email'];
        $data = Student::where('email', $user_mail)->first();
        unset($data['contact_no']);
        return view('user/profile')->with('data', $data);
    }

    public function updateUserProfileView(Request $request)
    {   
        //getting authenticated user
        $user = Auth::user();  
        $user_mail = $user['email'];

        //getting request data
        $req_data = $request->all();

        //getting profile data
        $profile_data = Student::where('email', $user_mail)->first();

        //updating profile data
        $profile_data->name = $req_data['first_name'];
        $profile_data->email = $req_data['email'];
        $profile_data->contact_no = $req_data['contact_no'];
        $profile_data->contact_no_visibility = $req_data['contact_no_visibility'];
        $profile_data->address = $req_data['address'];
        $profile_data->address_visibility = $req_data['address_visibility'];
        $profile_data->country = $req_data['country'];
        $profile_data->city = $req_data['city'];
        $profile_data->save();

        return redirect('/user/profile/view')->with('status', "Profile updated!");
        // return view('user/profile')->with('data', $data);
    }

    public function viewProfile(Request $request, $id)
    {
        $profile_data = Student::where('id', $id)->first();
        if (Auth::check()) {
            $user = Auth::user(); 
            if($user['id']==$id){
                return view('user/profile')->with('data', $profile_data);
            }else{
                $res_data = $this->removeHiddenData($profile_data,"member");
                return view('user/profile')->with('data', $res_data);
            }
        }else{
            $res_data = $this->removeHiddenData($profile_data,"public");
            return view('user/profile')->with('data', $res_data);
        }
    }

    private function removeHiddenData($profile_data,$user_type)
    {
        if($profile_data['contact_no_visibility']!==$user_type 
            and $profile_data['contact_no_visibility']!=="public")
        {
            unset($profile_data['contact_no']);
        }
        if($profile_data['address_visibility']!==$user_type
            and $profile_data['address_visibility']!=="public")
        {
            unset($profile_data['address']);
        } 
        return $profile_data;
    }

   
}
