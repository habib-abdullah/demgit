<?php

namespace App\Http\Controllers\EmployeeMaster\Designation;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Response;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Redirect;
use Session;

class DesignationController extends Controller
{
    public function Designation()
    {
        return view('EmployeeMaster.Designation');
    }

    public function DesignationStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'designation' => 'bail|required|max:255',
            'workshop_emp' => 'required|string|max:255',
            'working_site' => 'required|string'
        ]);
        if (!$validator->passes())
        {
            return response()->json(['success' => false,"validation" => false, 'message' => $validator->errors()->all()]);
        }

        $created = DB::table("employee__designation")->insert([
            'designation_name' => $request->input("designation"),
            'workshop_emp' => $request->input("workshop_emp"),
            'working_site' =>$request->input("working_site"),
        ]);
        if ($created == 1) {
            return response()->json(['success' => true, 'message' => 'Designation created successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Designation not created']);
        }
    }

    public function DesignationReport()
    {
        $data = DB::table('employee__designation')->get();
        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return
                '<button onclick="DesignationEdit(' . $data->designation_id . ')" class="btn btn-warning btn-circle" data-toggle="modal" data-target="#designationEditModal"><i class="fa fa-edit"></i></button>
            <button type="button" value="" class="btn btn-danger btn-circle" id="DesignationRemove"
            onclick="DesignationRemove(' . $data->designation_id . ')"><i class="fas fa-trash"></i>
            </button>';
            })
            ->make(true);
    }

    public function DesignationEdit(Request $request)
    {
        $data = DB::table('employee__designation')
        ->where('designation_id', $request->input('designation_id'))
        ->get();
        // return $data;
        return view('EmployeeMaster.DesignationEdit', ["row" => $data[0]]);
    }

    public function DesignationUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'designation_name' => 'bail|required|max:255',
            'workshop_emp' => 'required|string|max:255',
            'working_site' => 'required|string'
        ]);
        if (!$validator->passes())
        {
            return response()->json(['success' => false, "validation" => false, 'message' => $validator->errors()->all()]);
        }
        
        $updated = DB::table('employee__designation')
            ->where('designation_id', $request->input('designation_id'))
            ->update([
                'designation_name' => $request->input("designation_name"),
                'workshop_emp' => $request->input("workshop_emp"),
                'working_site' =>$request->input("working_site"),
            ]);
        if ($updated == 1) {
            return response()->json(['success' => true, 'message' => 'Designation updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Designation update failed']);
        }
    }

    public function DesignationRemove(Request $request)
    {
        $removed = DB::table('employee__designation')
            ->where('designation_id', $request->input('designation_id'))
            ->delete();
        if ($removed == 1) {
            return response()->json(['success' => true, 'message' => 'Designation removed successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Designation remove failed']);
        }
    }
}
