<?php

namespace App\Http\Controllers\EmployeeMaster\EmployeeDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB,Session,Response;
use Carbon\Carbon;
use Yajra\Datatables\Datatables,Validator;
use App\Model\Bank;
use DateTime;
use App\Model\Employee\employee__contact_detail;
use App\Model\Employee\employee__personal_detail;

class EmployeeContactDetail extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function EmployeeContactShow()
    {
        return view('EmployeeMaster.EmployeeContactShow');
    }
    public function EmployeeContactCreate(Request $request)
    {
        $data = DB::table("employee__personal_detail")->get();
        return view('EmployeeMaster.addEmployeeContactDetail',["row"=>$data]);
    }

    public function EmployeeContactStore(Request $request)
    {
        $employee_contact = new employee__contact_detail();

        $employee_contact->employee_id = $request->input('emp_name');
        $employee_contact->emp_email = $request->input('emp_email');
        $employee_contact->emp_contact_no = $request->input('emp_con_no');
        $employee_contact->emp_whatsapp_no = $request->input('emp_whatsapp_no');
        $employee_contact->emp_imo_no = $request->input('emp_imo_no');
        $employee_contact->emp_facebook_id = $request->input('emp_fb_id');
        $employee_contact->emp_permanent_contact_name = $request->input('emp_per_con_name');
        $employee_contact->emp_permanent_contact_no = $request->input('emp_per_con_no');
        $employee_contact->emp_permanent_contact_relation = $request->input('emp_per_con_rel');
        $employee_contact->emp_uae_emerge_contact_no = $request->input('emp_uae_con_no');
        $employee_contact->emp_uae_emerge_contact_name = $request->input('emp_uae_con_name');
        $employee_contact->emp_uae_contact_relation = $request->input('emp_uae_con_rel');
        $employee_contact->emp_uae_permanent_address = $request->input('emp_uae_per_add');

        //die("Data ". $employee_contact->emp_facebook_id);
        if($employee_contact->save())
        {
            return response()->json(['success' => true, 'message' => 'Employee Bank Deatil Created Successfully']);
        }
        else
        {
            return response()->json(['success' => false, 'message' => 'Something Wrong']);  
        }
    }
    public function ContactReport(Request $request)
    {
        // $employee__bank = employee__bank::where('employee_id','employee_id')->get();
        // dd( $employee__bank->employee__personal_detail );
        $data = DB::table("employee__contact_details")
        ->join('employee__personal_detail','employee__contact_details.employee_id','=','employee__personal_detail.employee_id')
        ->select('employee__contact_details.*','employee__personal_detail.*')
         ->get();

        return Datatables::of($data)
        ->addColumn('Name', function ($data) {
               return $data->first_name . ' ' . $data->last_name;
           })
            ->addColumn('action', function($data)
            {

                return '<button type="button" value="" class="btn btn-danger" id="EmployeeBankRemove" onclick="EmployeeContactRemove('.$data->emp_contact_detail_id.')"><i class="fas fa-trash"></i></button>

                <a href="EmployeeContact/'.$data->emp_contact_detail_id.'/Edit" class="btn btn-warning">
                <i class="fa fa-edit"></i></a>';
                })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function EmployeeContactEdit($id)
    {
        $data = DB::table("employee__personal_detail")->get();

        $employee_contact = DB::table('employee__contact_details')->where('emp_contact_detail_id',$id)
        ->get();

        return view('EmployeeMaster.EmployeeContactEdit',["row"=>$data, "detail"=>$employee_contact[0]]);
    }
    public function EmployeeContactUpdate(Request $request)
    {
        $employee_contact = new employee__contact_detail();

        $employee_contact = employee__contact_detail::where('emp_contact_detail_id', '=', $request->input('emp_contact_id'))->first();

        $employee_contact->employee_id = $request->input('emp_name');
        $employee_contact->emp_email = $request->input('emp_email');
        $employee_contact->emp_contact_no = $request->input('emp_con_no');
        $employee_contact->emp_whatsapp_no = $request->input('emp_whatsapp_no');
        $employee_contact->emp_imo_no = $request->input('emp_imo_no');
        $employee_contact->emp_facebook_id = $request->input('emp_fb_id');
        $employee_contact->emp_permanent_contact_name = $request->input('emp_per_con_name');
        $employee_contact->emp_permanent_contact_no = $request->input('emp_per_con_no');
        $employee_contact->emp_permanent_contact_relation = $request->input('emp_per_con_rel');
        $employee_contact->emp_uae_emerge_contact_no = $request->input('emp_uae_con_no');
        $employee_contact->emp_uae_emerge_contact_name = $request->input('emp_uae_con_name');
        $employee_contact->emp_uae_contact_relation = $request->input('emp_uae_con_rel');
        $employee_contact->emp_uae_permanent_address = $request->input('emp_uae_per_add');

        if($employee_contact->save())
        {
            return response()->json(['success' => true, 'message' => 'Employee Bank Deatil Updated Successfully']);
        }
        else
        {
            return response()->json(['success' => false, 'message' => 'Something Wrong']);  
        }
    }
    public function EmployeeContactRemove(Request $request)
    {
        $employee_contact = employee__contact_detail::where('emp_contact_detail_id',$request->input('id'))->delete();
        // $data = DB::table('employee__bank')->where('emp_bank_id',$request->input('id'))->delete();
        if($employee_contact)
        {
            die("User Remove successfully");
        }
        else
        {
            die("User not remove");
        }
    }


    
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


      // Additional Information Employee 

      public function AddtionalInfoShow(Request $request)
      {
          $data = DB::table('employee__contact')
          ->where('employee_id',$request->input('employee_id'))
          ->get();
  
          return Datatables::of($data)
              ->addColumn('action', function ($data) {
                  return
                  '<button type="button" onclick="AdditionalInfoEdit(' . $data->contact_id . ')" class="btn btn-warning btn-circle"><i class="fa fa-pen"></i></button>
                  <button type="button" onclick="AdditionalInfoRemove(' . $data->contact_id . ')" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></button>';
              })
              ->rawColumns(['action'])
              ->make(true);
      }


    //   Main Additional Information Insert
    public function AdditionalinfoStore(Request $request){
        $validator = Validator::make($request->all(), [
            'contact_name' => 'bail|required',
            'contact_relation' => 'required',
            'contact_number' => 'required|numeric',
            'contact_address' => 'required',

        ]);
        if (!$validator->passes()) {
            return response()->json(['success' => false,"validation" => false, 'message' => $validator->errors()->all()]);
        }

        date_default_timezone_set('Asia/Calcutta');
        $datetime = new DateTime();
        $date_now = $datetime->format('Y-m-d');
        $time_now = $datetime->format('H:i:s');
        $date_time = $datetime->format('Y-m-d') . ' ' . $datetime->format('H:i:s');

        // return response()->json(['success' => true]);
        $created = DB::table("employee__contact")
            ->insert([
                'contact_name' => $request->input('contact_name'),
                'contact_relation' => $request->input('contact_relation'),
                'contact_number' => $request->input('contact_number'),
                'contact_address' => $request->input('contact_address'),
                'employee_id' => $request->input('employee_id'),
                'created_at' => $date_time,
            ]);

        if ($created == 1) {
            return response()->json(['success' => true, 'message' => 'Contact Information addedd successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

    // Addtional Information Edit
    public function AddtionalInfoEdit(Request $request,$contact_id){
        $setup__department = DB::table('employee__contact')
        ->where('contact_id', $contact_id)
        ->get();
        $data = json_decode($setup__department);
        return $data;
    }

    // Main Update Additional Innformation
    public function AdditionalinfoUpdate(Request $request){
        $validator = Validator::make($request->all(), [
            'contact_name' => 'bail|required',
            'contact_relation' => 'required',
            'contact_number' => 'required|numeric',
            'contact_address' => 'required',

        ]);
        if (!$validator->passes()) {
            return response()->json(['success' => false,"validation" => false, 'message' => $validator->errors()->all()]);
        }

        date_default_timezone_set('Asia/Calcutta');
        $datetime = new DateTime();
        $date_now = $datetime->format('Y-m-d');
        $time_now = $datetime->format('H:i:s');
        $date_time = $datetime->format('Y-m-d') . ' ' . $datetime->format('H:i:s');

        // return response()->json(['success' => true]);
        $updated = DB::table("employee__contact")
            ->where('contact_id', $request->input('contact_id'))
            ->update([
                'contact_name' => $request->input('contact_name'),
                'contact_relation' => $request->input('contact_relation'),
                'contact_number' => $request->input('contact_number'),
                'contact_address' => $request->input('contact_address'),
                'updated_at' => $date_time,
            ]);

        if ($updated == 1) {
            return response()->json(['success' => true, 'message' => 'Contact Information has been updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

    public function AddtionalInfoRemove(Request $request){
        $removed = DB::table('employee__contact')
            ->where('contact_id', $request->input('contact_id'))
            ->delete();

        if ($removed == 1) {
            return response()->json(['success' => true, 'message' => 'Contact Information has been removed successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
}