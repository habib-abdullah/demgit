<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //ProfileView Function
    public function ProfileView($id){
        $showProfile = DB::table('users')
        ->where('user_id',$id)
        ->get();
        return view('userProfile',['users'=> $showProfile]);
    }
}
