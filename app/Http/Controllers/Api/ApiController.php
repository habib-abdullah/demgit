<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\users;
use App\User;

class ApiController extends Controller
{
    public function users()
    {
        $data = User::all();
        return $data;
    }
}
