<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB,Session,Response,Redirect;

class MasterController extends Controller
{
    public function Dashboard(Request $request){

		return view('Master.Dashboard');
		
	}
}
