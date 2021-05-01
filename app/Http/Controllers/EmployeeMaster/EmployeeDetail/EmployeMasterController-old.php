<?php

namespace App\Http\Controllers\EmployeeMaster\EmployeeDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB,Session,Response;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Validator;
use App\Model\Bank\employee__bank;
use App\Model\Employee\employee__personal_detail;
use DateTime;

class EmployeMasterController extends Controller
{
    public function upload(Request $request)
    {
       
    
     }
    public function hello()
    {

        $employee__personal_detail = employee__personal_detail::first();
        die( $employee__personal_detail);
    }
    public function Employee()
    {
        return view('EmployeeMaster.Employee');
    }

    public function EmployeeCreate(Request $request)
    {   
        $data = DB::table("employee__designation")
        ->get();        
        
        return view("EmployeeMaster.EmployeeCreate",["rows"=>$data]);
        
    }
    public function EmployeeShow()
    {
        return view('EmployeeMaster.EmployeeShow');
    }

    public function EmployeeStore(Request $request)
    {

        $folderPath = 'public/crop_image/';
 
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        // return $image_type_aux;
        // die(' Failed');
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
 
        $imageName = uniqid() . '.png';
        $imageFullPath = $folderPath.$imageName;
        file_put_contents($imageFullPath, $image_base64);

        die('End');


        date_default_timezone_set('Asia/Kolkata');
        $current_date = date("Y-m-d");
        $current_time = date("H:i:s");

        $designation_data = explode(':',$request->input('employee_designation'));
        // return $designation_name.$designation_id;

        $data = array(
            'employee_type' => $request->input('employee_type'),
            'designation_id' => $designation_data[1], // id of designation
            'designation' => $designation_data[0], //name of designation
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_namae'),
            'last_name' => $request->input('last_name'),
            'gender' => $request->input('gender'),
            'nationality' => $request->input('employee_nationality'),
            'birth_date' => $request->input('employee_dob'),
            'marital_status' => $request->input('marital_status'),
            'visa_Issued_from' => $request->input('employee_visa'),
            'emp_profile_img' => $imageName,
            // 'emp_profile_img' => '',
            'created_at' => $current_date.$current_time,
            'passport_no' => $request->input('passport_no'),
            'passport_issue_place' => $request->input('passport_issude_place'),
            'passport_issue_date' => $request->input('passport_issue_date'),
            'passport_expiry_date' => $request->input('passport_expiry_date'),
            'permanent_add_in_passport' => $request->input('permanent_address_in_passport'),
            'father_name' => $request->input('father_name'),
            'mother_name' => $request->input('mother_name'),
            'pp_personal_no' => $request->input('pp_personal_no'),
            'nic_card_no' => $request->input('nic_card_no'),
            'nic_expiry' => $request->input('nic_expiry'),
            'entry_permit_no' => $request->input('entry_permit_no'),
            'entry_permit_date' => $request->input('entry_permit_date'),
            'uid_no' => $request->input('uid_no'),
            'file_no' => $request->input('file_no'),
            'profession_in_residence' => $request->input('profession_in_residence'),
            'residence_issude_date' => $request->input('residence_issue_date'),
            'residence_expiry_date' => $request->input('residence_expiry_date'),
            'emirate_id_no' => $request->input('emirate_id_no'),
            'emirate_id_expiry' => $request->input('emirate_id_expiry'),
            'e_id_card_no' => $request->input('e_id_card_no'),
            'work_permit_no' => $request->input('work_permit_no'),
            'personal_no' => $request->input('personal_no'),
            'work_permit_expiry' => $request->input('work_permit_expiry'),
            'blood_group' => $request->input('blood_group'),
            'height' => $request->input('employee_height'),
            'medical_issues' => $request->input('medical_issues'),
            'contact' => $request->input('employee_contact'),
            'whatsapp_no' => $request->input('employee_whatsapp_no'),
            'imo_no' => $request->input('employee_imo_no'),
            'facebook' => $request->input('employee_facebook'),
            'permanent_contact_name' => $request->input('permanent_contact_name'),
            'permanent_contact_no' => $request->input('permanent_contact_number'),
            'permanent_contact_relation' => $request->input('permanent_contact_relation'),
            'uae_emergency_contact_name' => $request->input('uae_emergency_contact_name'),
            'uae_emergency_contact_no' => $request->input('uae_emergency_contact_no'),
            'uae_emergency_contact_address' => $request->input('emergency_contact_per_address'),
            'company_site' => $request->input('company_site'),
            'email' => $request->input('employee_email'),
            'password' => $request->input('employee_password'),
        );

        $created = DB::table("employee__personal_detail")->insertGetId($data);
        if($created == '' && $created == false)
        {
            //return response()->json(['success' => true, 'message' => 'Employee Detail successfully Added']);
            die($created.' Failed');
        }
        else
        {
            // return response()->json(['success' => false, 'message' => 'Failed']);
            $check = $this->BankStore($request,$created);
            die($created.' successfully '.$check);
        }

        // $this->EmployeeValidate($request,$imageName);
    }
    public function BankStore($request, $created)
    {
        $employee_bank = new employee__bank();
        
        // $imageNameWithExt ='';
        // $imageName='';
        // $extension='';
        // $imageNameToStore='';
        // $Image='';
        // $fileNameWithExt = $filesName = $extension = $fileNameToStore = $file = '';
        // if ($request->hasFile('bank_passbook_img')) 
        // {
        //   $this->validate($request, [
        //     'bank_passbook_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1999',
        //   ]);
        //   $imageNameWithExt = $request->file('bank_passbook_img')->getClientOriginalName();
        //   $imageName = pathinfo($imageNameWithExt, PATHINFO_FILENAME);
        //   $extension = $request->file('bank_passbook_img')->extension();
        //   $imageNameToStore = $imageName.'_'.time().'.'.$extension;
        //   $Image = $request->file('bank_passbook_img')->move('public/Employee/Bank_Pasbook_Images/', $imageNameToStore);
        // }

        $employee_bank->employee_id = $created;
        $employee_bank->bank_name = $request->input("bank_name");
        $employee_bank->branch_name = $request->input("branch_name");
        $employee_bank->account_name = $request->input("account_name");
        $employee_bank->account_number = $request->input("account_no");
        $employee_bank->account_type = $request->input("account_type");
        $employee_bank->iban = $request->input("iban");
        $employee_bank->swift = $request->input("swift");
        $employee_bank->card_no = $request->input("card_no");
        $employee_bank->ifsc_code = '';
        $employee_bank->bank_passbook_image = '';

        if($employee_bank->save())
        {
            return response()->json(['success' => true]);
        }
        else
        {
            return response()->json(['success' => false]);  
        }

    }
    public function EmployeeValidate($request,$imageName)
    {
        $this->CheckEmpty($request->input("emp_type"),"Employee Type");
        $this->CheckEmpty($request->input("emp_designation"),"Employee Designation");
        $this->CheckEmpty($request->input("emp_fname"),"First Name");
        $this->CheckEmpty($request->input("emp_lname"),"Last Name");
        $this->CheckEmpty($request->input("emp_dob"),"Date of Birth");
        $this->CheckEmpty($request->input("emp_nationality"),"Nationality");
        $this->CheckEmpty($request->input("emp_marital_status"),"Marital Status");
        $this->CheckEmpty($request->input("emp_visa"),"Employee Visa");

        date_default_timezone_set('Asia/Kolkata');
        $current_date = date("Y-m-d");
        $current_time = date("H:i:s");

        $dateTime = $current_date."".$current_time;
        $emp_type = $request->input("emp_type");
        $emp_designation = $request->input("emp_designation");
        $emp_fname = $request->input("emp_fname");
        $emp_mname = $request->input("emp_mname");
        $emp_lname = $request->input("emp_lname");
        $emp_dob = $request->input("emp_dob");
        $emp_nationality = $request->input("emp_nationality");
        $emp_marital_status = $request->input("emp_marital_status");
        $emp_visa_issued = $request->input("emp_visa");
        $saveFile = $imageName;

        $data = array(
            'employee_type' => $emp_type,

            'designation' => $emp_designation,

            'first_name' => $emp_fname,

            'middle_name' => $emp_mname,

            'last_name' => $emp_lname,

            'nationality' => $emp_nationality,

            'birth_date' => $emp_dob,

            'marital_status' => $emp_marital_status,

            'visa_Issued_from' => $emp_visa_issued,

            'created_at' => $dateTime,

            'emp_profile_img' => $saveFile
        );

        $user_form = DB::table("employee__personal_detail")->insert($data);
        if($user_form == 1)
        {
            //return response()->json(['success' => true, 'message' => 'Employee Detail successfully Added']);
            die('successfully');
        }
        else
        {
            // return response()->json(['success' => false, 'message' => 'Failed']);
            die('Failed');
        }
    }
    public function CheckEmpty($val,$field){
        if(empty($val)){
            die("<div class='alert alert-danger'>Required ".$field." field</div>");
        }
    }

    public function EmployeeReport()
    {
        $data = DB::table('employee__personal_detail')->get();
        return Datatables::of($data)
        ->addColumn('action',function($data)
        {
           return 
            '<a href="Employee-'.$data->employee_id.'-Details" class="btn btn-info btn-circle"><i class="fa fa-eye"></i></a>
            <a href="Employee/'.$data->employee_id.'/Document-Create" class="btn btn-primary btn-circle"><i class="fa fa-file"></i></a>
            <a href="Employee/'.$data->employee_id.'/Documents" class="btn btn-info btn-circle"><i class="fa fa-list"></i></a>
            <a href="Employee-'.$data->employee_id.'-Edit" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></a>
            <button type="button" value="" class="btn btn-danger" id="EmployeeRemove" 
            onclick="EmployeeRemove('.$data->employee_id.')"><i class="fas fa-trash"></i>
            </button>';
        })
        ->addColumn('Name',function($data)
        {
            return $data->first_name.' '.$data->middle_name.' '.$data->last_name;
        })
        ->rawColumns(['Name','action'])
        ->make(true);
    }

    public function EmployeeEdit($id)
    {
        $employee = DB::table('employee__personal_detail')->where('employee_id',$id)->get();
        $employee__bank = DB::table('employee__bank')->where('employee_id',$id)->get();
        $designation = DB::table("employee__designation")->get();    
        return view('EmployeeMaster.EmployeeEdit',["rows"=>$employee[0],"designation"=>$designation,'bank'=>$employee__bank]);
    }
    
    public function EmployeeDetails($id)
    {
        $employee = DB::table('employee__personal_detail')->where('employee_id',$id)->get();
        $employee__bank = DB::table('employee__bank')->where('employee_id',$id)->get();
        $designation = DB::table("employee__designation")->get();
        // return $employee;
        // return $employee__bank;
        // return $designation;

        return view('EmployeeMaster.EmployeeDetails',
        [
            "employees"=>$employee[0],
            'banks'=>$employee__bank[0]
        ]);
    }
    
    public function EmployeeUpdate(Request $request)
    {   

        date_default_timezone_set('Asia/Calcutta');
        $datetime = new DateTime();
        $date_now = $datetime->format('Y-m-d');
        $time_now = $datetime->format('H:i:s');
        $current_date_time = $datetime->format('H:i:s') . $datetime->format('Y-m-d');

        $designation_data = explode(':',$request->input('employee_designation'));
        // return $designation_name.$designation_id;

        $data = array(
            'employee_type' => $request->input('employee_type'),
            'designation_id' => $designation_data[1], // id of designation
            'designation' => $designation_data[0], //name of designation
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_namae'),
            'last_name' => $request->input('last_name'),
            'gender' => $request->input('gender'),
            'nationality' => $request->input('employee_nationality'),
            'birth_date' => $request->input('employee_dob'),
            'marital_status' => $request->input('marital_status'),
            'visa_Issued_from' => $request->input('employee_visa'),
            'emp_profile_img' => '',
            'passport_no' => $request->input('passport_no'),
            'passport_issue_place' => $request->input('passport_issude_place'),
            'passport_issue_date' => $request->input('passport_issue_date'),
            'passport_expiry_date' => $request->input('passport_expiry_date'),
            'permanent_add_in_passport' => $request->input('permanent_address_in_passport'),
            'father_name' => $request->input('father_name'),
            'mother_name' => $request->input('mother_name'),
            'pp_personal_no' => $request->input('pp_personal_no'),
            'nic_card_no' => $request->input('nic_card_no'),
            'nic_expiry' => $request->input('nic_expiry'),
            'entry_permit_no' => $request->input('entry_permit_no'),
            'entry_permit_date' => $request->input('entry_permit_date'),
            'uid_no' => $request->input('uid_no'),
            'file_no' => $request->input('file_no'),
            'profession_in_residence' => $request->input('profession_in_residence'),
            'residence_issude_date' => $request->input('residence_issue_date'),
            'residence_expiry_date' => $request->input('residence_expiry_date'),
            'emirate_id_no' => $request->input('emirate_id_no'),
            'emirate_id_expiry' => $request->input('emirate_id_expiry'),
            'e_id_card_no' => $request->input('e_id_card_no'),
            'work_permit_no' => $request->input('work_permit_no'),
            'personal_no' => $request->input('personal_no'),
            'work_permit_expiry' => $request->input('work_permit_expiry'),
            'blood_group' => $request->input('blood_group'),
            'height' => $request->input('employee_height'),
            'medical_issues' => $request->input('medical_issues'),
            'contact' => $request->input('employee_contact'),
            'whatsapp_no' => $request->input('employee_whatsapp_no'),
            'imo_no' => $request->input('employee_imo_no'),
            'facebook' => $request->input('employee_facebook'),
            'permanent_contact_name' => $request->input('permanent_contact_name'),
            'permanent_contact_no' => $request->input('permanent_contact_number'),
            'permanent_contact_relation' => $request->input('permanent_contact_relation'),
            'uae_emergency_contact_name' => $request->input('uae_emergency_contact_name'),
            'uae_emergency_contact_no' => $request->input('uae_emergency_contact_no'),
            'uae_emergency_contact_address' => $request->input('emergency_contact_per_address'),
            'company_site' => $request->input('company_site'),
            'email' => $request->input('employee_email'),
            'password' => $request->input('employee_password'),
            'updated_at' => $current_date_time,
        );

        // return $data;

        $updated = DB::table("employee__personal_detail")
        ->where('employee_id',$request->input('employee_id'))
        ->update($data);

        $bank_data = array(
            'employee_id' => $request->input('employee_id'),
            'bank_name' => $request->input("bank_name"),
            'branch_name' => $request->input("branch_name"),
            'account_name' => $request->input("account_name"),
            'account_number' => $request->input("account_no"),
            'account_type' => $request->input("account_type"),
            'iban' => $request->input("iban"),
            'swift' => $request->input("swift"),
            'card_no' => $request->input("card_no"),
            'ifsc_code' => '',
            'bank_passbook_image' => '',
            'updated_at' => $current_date_time,
        );

        $bank_update = DB::table("employee__bank")
        ->where('employee_id',$request->input('employee_id'))
        ->update($bank_data);

        if($updated == 1)
        {
            return response()->json(['success' => true, 'message' => 'Employee Detail successfully Updated']);
        }
        else
        {
            return response()->json(['success' => false, 'message' => 'You Made 0 Changes..']);
        }
    }

    public function EmployeeRemove(Request $request)
    {   
        // $data = employee__bank::where('emp_bank_id',$request->input('id'))->first();
        $employee__personal_detail = employee__personal_detail::where('employee_id',$request->input('id'))
        ->first();

        if(file_exists('public/crop_image/'.$employee__personal_detail->emp_profile_img) AND !empty($employee__personal_detail->emp_profile_img))
        { 
            unlink('public/crop_image/'.$employee__personal_detail->emp_profile_img);
        } 

        $data = DB::table('employee__personal_detail')
        ->where('employee_id',$request->input('id'))
        ->delete();
        $bank_data = DB::table('employee__bank')
        ->where('employee_id',$request->input('id'))
        ->delete();
        if($data == 1)
        {
            die("User Remove successfully ".$bank_data.$data);
        }
        else
        {
            die("User not remove ".$bank_data.$data);
        }
    }

}
