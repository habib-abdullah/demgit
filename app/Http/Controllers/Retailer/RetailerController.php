<?php

namespace App\Http\Controllers\Retailer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RetailerController extends Controller
{
    public function Dashboard(Request $request){
		return view('Retailer.Dashboard');
	}
}
