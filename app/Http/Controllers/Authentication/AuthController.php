<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB,Session,Response,Redirect;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;

class AuthController extends Controller
{
	// public function __construct()
  // {
  //   $this->middleware('AuthUser');
	// }
	public function RegisterPost(Request $request){

		date_default_timezone_set('Asia/Kolkata');
		$current_date = date("Y-m-d");
		$current_time = date("H:i:s");
		$dateTime = $current_date."".$current_time; 

		$name = $request->input("user_name");
		$email = $request->input("user_email");
		$type = $request->input("user_type");
		$password = $request->input("user_password"); 

		$data = array(
			"user_name" => $name,
			"user_email" => $email,
			"user_type" => $type,
			"user_password" => $password,
			"type_id" => 1,
			"created_at" => $dateTime
		);
		DB::table("users")
		->insert($data);
		die("success");
	}

	public function LoginPost(Request $request){
		$email = $request->input("user_email");
		$password = $request->input("user_password");

		$data = DB::table("users")
		->where("user_email",$email)
		->where("user_password",$password)
		->get();

		if(count($data) == 0){
			die("<div class='alert alert-danger text-center' role='alert'>Invalid Login credentials</div>");
			//return false;
		}else{
			
			$row = $data[0];
			session::put('user_id', $row->user_id);
			session::put('user_type', $row->user_type);
			session::put('user_name', $row->user_name);
			session::put('user_email', $row->user_email);
			session::put('type_id', $row->type_id);
			Session::save();
			
			if(Session::get('type_id') == 1){

        die('<script>window.location.href = "{{route("Admin.Dashboard")}}"</script>');

			}else if(Session::get('type_id') == 2){

        die('<script>window.location.href = "{{route("Master.Dashboard")}}"</script>');
				
			}else if(Session::get('type_id') == 3){

        die('<script>window.location.href = "{{route("Distributor.Dashboard")}}"</script>');
				
			}else if(Session::get('type_id') == 4){

				die('<script>window.location.href = "{{route("Retailer.Dashboard")}}"</script>');
			}else{
				return redirect()->route('Login');
			}
		}
	}
	public function Logout(){
		session()->flush();
		session()->regenerate();
		return redirect()->route('Login');
	}
	
}