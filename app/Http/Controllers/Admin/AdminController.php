<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB,Session,Response,Redirect;

class AdminController extends Controller
{
	// public function __construct()
  // {
  //   $this->middleware('AuthUser');
	// }
  public function Dashboard(Request $request){
		$data = DB::table('employee__personal_detail')->get();
		$no_of_emp = count($data);
		
		$employee__documents = DB::table('employee__documents')->get();
		$values = [];
		if(count($employee__documents) > 0){
			foreach($employee__documents as $docuemnt){
				if(! in_array($docuemnt->employee_id, $values)){
						$values[] = $docuemnt->employee_id;
				}
			}
		}
		return view('Admin.Dashboard')
		->with('no_of_emp',$no_of_emp)
		->with('emp_with_docs',count($values));
	}
  public function Profile(Request $request){
		$users = DB::table('users')
		->where('user_id',Session::get('user_id'))
		->get();

		return view('Admin.userProfile')
		->with('users',$users);
	}

  public function Users(Request $request){
		return "Users";
	}
// main profile update function
public function ProfileUpdate(Request $request){
	
	$user_name = $request->input('user_name');
	$user_type = $request->input('user_type');
	$user_email = $request->input('user_email');
	$user_password = $request->input('user_password');
	
	// array
	$data = array(
		'user_name' => $user_name,
		// 'user_type' => $user_type,
		'user_email' => $user_email,
		'user_password' => $user_password
	);

	$update = DB::table('users')
	->where('user_id',$request->input('user_id'))
	->update($data);

	if($update == 1){
		return response()->json(['success' => true,'message'=> 'Admin Is Updated Successfully']);
	}else{
		return response()->json(['success' => false,'message'=> 'Oops something went wrong']);
	}

}

}