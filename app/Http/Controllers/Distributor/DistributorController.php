<?php

namespace App\Http\Controllers\Distributor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function Dashboard(Request $request){
    	
		return view('Distributor.Dashboard');
	}
}
