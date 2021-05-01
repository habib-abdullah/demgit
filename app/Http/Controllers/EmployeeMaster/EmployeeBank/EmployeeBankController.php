<?php

namespace App\Http\Controllers\EmployeeMaster\EmployeeBank;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB,Session,Response,Validator;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use App\Model\Bank;
use App\Model\Bank\employee__bank;
use App\Model\Employee\employee__personal_detail;
use File;

class EmployeeBankController extends Controller
{
    public function BankShow()
    {
        return view('EmployeeBank.Bank');
    }
    public function BankCreate(Request $request)
    { 
        $data = DB::table("employee__personal_detail")->get();
        return view('EmployeeBank.AddBankDetail',["row"=>$data]);
    }
    public function GetEmployeeProfilePicture($id)
    {
        // echo json_encode(DB::table('sub_categories')->where('category_id', $id)->get());
          echo json_encode(DB::table('employee__personal_detail')->where('employee_id', $id)->get());
        //$employee__bank = employee__bank::where('employee_id', $id)->get();
    }
    public function BankStore(Request $request)
    {
        $employee_bank = new employee__bank();
        
        $imageNameWithExt ='';
        $imageName='';
        $extension='';
        $imageNameToStore='';
        $Image='';
        $fileNameWithExt = $filesName = $extension = $fileNameToStore = $file = '';
        if ($request->hasFile('bank_passbook_img')) 
        {
          $this->validate($request, [
            'bank_passbook_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1999',
          ]);
          $imageNameWithExt = $request->file('bank_passbook_img')->getClientOriginalName();
          $imageName = pathinfo($imageNameWithExt, PATHINFO_FILENAME);
          $extension = $request->file('bank_passbook_img')->extension();
          $imageNameToStore = $imageName.'_'.time().'.'.$extension;
          $Image = $request->file('bank_passbook_img')->move('public/Employee/Bank_Pasbook_Images/', $imageNameToStore);
        }

        $employee_bank->employee_id = $request->input("emp_name");
        $employee_bank->bank_name = $request->input("emp_bank_name");
        $employee_bank->branch_name = $request->input("emp_branch_name");
        $employee_bank->account_number = $request->input("emp_ac_no");
        $employee_bank->account_type = $request->input("emp_ac_type");
        $employee_bank->iban = $request->input("emp_iban_no");
        $employee_bank->ifsc_code = $request->input("emp_ifsc_code");
        $employee_bank->bank_passbook_image = $imageNameToStore;

        if($employee_bank->save())
        {
            return response()->json(['success' => true, 'message' => 'Employee Bank Deatil Created Successfully']);
        }
        else
        {
            return response()->json(['success' => false, 'message' => 'Something Wrong']);  
        }

    }

    public function BankReport(Request $request)
    {
        // $employee__bank = employee__bank::where('employee_id','employee_id')->get();
        // dd( $employee__bank->employee__personal_detail );
        $employee__bank = DB::table("employee__bank")
        ->join('employee__personal_detail','employee__bank.employee_id','=','employee__personal_detail.employee_id')
        ->select('employee__bank.*','employee__personal_detail.*')
         ->get();

        return Datatables::of($employee__bank)
        ->addColumn('Name', function ($employee__bank) {
               return $employee__bank->first_name . ' ' . $employee__bank->last_name;
           })
            ->addColumn('action', function($employee_bank)
            {

                return '<button type="button" value="" class="btn btn-danger" id="EmployeeBankRemove" onclick="EmployeeBankRemove('.$employee_bank->emp_bank_id.')"><i class="fas fa-trash"></i></button>

                <a href="EmployeeBank/'.$employee_bank->emp_bank_id.'/Edit" class="btn btn-warning">
                <i class="fa fa-edit"></i></a>';

                })
            ->rawColumns(['action'])
            ->make(true);

        
    }
    public function BankAccontDetail(Request $request){
        $employee__bank = DB::table("employee__bank")
        ->where('employee_id','=',$request->input('employee_id'))
        ->get();
        return Datatables::of($employee__bank)
            ->addColumn('action', function($employee_bank){
                return '<button type="button" onclick="EmployeeBankEdit('.$employee_bank->emp_bank_id.')" class="btn btn-warning"><i class="fa fa-edit"></i></button><button type="button" value="" class="btn btn-danger" id="EmployeeBankRemove" onclick="EmployeeBankRemove('.$employee_bank->emp_bank_id.')"><i class="fas fa-trash"></i></button>';
            })
            ->rawColumns(['action'])
            ->make(true);

            // <a href="EmployeeBank/'.$employee_bank->emp_bank_id.'/Edit" class="btn btn-warning">
            // <i class="fa fa-edit"></i></a>
    }
    public function EmployeeBankEdit($id)
    {
        $data = DB::table("employee__personal_detail")->get();

        $employee__bank = DB::table('employee__bank')->where('emp_bank_id',$id)->get();
        $data = json_decode($employee__bank);
        return $data;
        // print_r($employee__bank);
        // die('asd'.$employee__bank);

        // return view('EmployeeBank.BankEdit',["row"=>$data, "detail"=>$employee__bank[0]]);
    }
    
    public function EmployeeBankDetailUpdate(Request $request)
    {
        $emp_bank_id = $request->input('emp_bank_id');
        // die("# ".$emp_bank_id); 
   
        $imageNameWithExt ='';
        $imageName='';
        $extension='';
        $imageNameToStore='';
        $Image='';
        $fileNameWithExt = $filesName = $extension = $fileNameToStore = $file = '';
        if ($request->hasFile('bank_passbook_img')) 
        {
          $this->validate($request, [
            'bank_passbook_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1999',
          ]);
          $imageNameWithExt = $request->file('bank_passbook_img')->getClientOriginalName();
          $imageName = pathinfo($imageNameWithExt, PATHINFO_FILENAME);
          $extension = $request->file('bank_passbook_img')->extension();
          $imageNameToStore = $imageName.'_'.time().'.'.$extension;
          $Image = $request->file('bank_passbook_img')->move(public_path('Employee/Bank_Pasbook_Images/'), $imageNameToStore);

          $findImage = DB::table("employee__bank")
        ->where('emp_bank_id',$request->input('emp_bank_id'))->first();

         if(file_exists('public/Employee/Bank_Pasbook_Images/'.$findImage->bank_passbook_image) AND !empty($findImage->bank_passbook_image)){ 
            unlink('public/Employee/Bank_Pasbook_Images/'.$findImage->bank_passbook_image);
         } 
        }
        else
        {
            $data = DB::table('employee__bank')
            ->where('emp_bank_id',$emp_bank_id)
            ->get();
            $imageNameToStore = $data[0];
            $imageNameToStore = $imageNameToStore->bank_passbook_image;
        }
        
        //$emp_name = $request->input("emp_name");
        $emp_bank_name = $request->input("emp_bank_name");
        $emp_branch_name = $request->input("emp_branch_name");
        $emp_ac_no = $request->input("emp_ac_no");
        $emp_ac_type = $request->input("emp_ac_type");
        $emp_iban_no = $request->input("emp_iban_no");
        $emp_ifsc_code = $request->input("emp_ifsc_code");
        $emp_bank_passbook_image = $imageNameToStore;
        
        $data = array(
            //'first_name' => $emp_name,
            'bank_name' => $emp_bank_name,
            'branch_name' => $emp_branch_name,
            'account_number' => $emp_ac_no,
            'account_type' => $emp_ac_type,
            'iban' => $emp_iban_no,
            'ifsc_code' => $emp_ifsc_code,
            'bank_passbook_image' => $emp_bank_passbook_image
        );

        $user_form = DB::table("employee__bank")
        ->where('emp_bank_id',$request->input('emp_bank_id'))
        ->update($data);
        
        if($user_form == 1)
        {
            return response()->json(['success' => true, 'message' => 'Employee Bank Deatil Created Successfully']);
        }
        else
        {
            return response()->json(['success' => false, 'message' => 'You Made 0 Changes..']);  
        }
    }
    public function EmployeeBankRemove(Request $request)
    {
      $removed = DB::table('employee__bank')
        ->where('emp_bank_id', $request->input('emp_bank_id'))
        ->delete();

        if ($removed == 1) {
            return response()->json(['success' => true, 'message' => 'Bank has been removed successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
}