<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Datatables;
use DateTime;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    public function Department(Request $request)
    {
        $employees = DB::table('employee__personal_detail')
            ->get();
        return view('Setup.Department', ['employees' => $employees]);
    }
    public function DepartmentShow(Request $request)
    {
        $data = DB::table('setup__department')
            ->leftjoin('employee__personal_detail', 'employee__personal_detail.employee_id', '=', 'setup__department.department_supervised_by')
            ->get();

        return Datatables::of($data)
            ->addColumn('employee_name', function ($data) {
                if (!empty($data->employee_id)) {
                    return $data->first_name . ' ' . $data->middle_name . ' ' . $data->last_name;
                } else {
                    return $data->department_supervised_by;
                }
            })
            ->addColumn('action', function ($data) {
                return
                '<button type="button" onclick="DepartmentEdit(' . $data->department_id . ')" class="btn btn-warning btn-circle"><i class="fa fa-pen"></i></button>
                <button type="button" onclick="DepartmentRemove(' . $data->department_id . ')" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></button>
                <button type="button" onclick="DepartmentView(' . $data->department_id . ')" class="btn btn-info btn-circle"  ><i class="fa fa-eye"></i></button>';
            })
            ->rawColumns(['action'])
            ->make(true);

        // <a href="Client-'.$data->client_id.'-Profile" class="btn btn-info btn-circle"><i class="fa fa-eye"></i></a>
    }
    public function DepartmentStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'department_name' => 'bail|required|string',
            'department_code' => 'required|string',
            'department_location' => 'required|string',
            'department_decription' => 'required|string',
            'department_supervised_by' => 'required',
            'exclude_from_floor_load' => 'required',
            'SiteSelector' => 'required',

        ]);
        if (!$validator->passes()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->all()]);
        }

        date_default_timezone_set('Asia/Calcutta');
        $datetime = new DateTime();
        $date_now = $datetime->format('Y-m-d');
        $time_now = $datetime->format('H:i:s');
        $date_time = $datetime->format('Y-m-d') . ' ' . $datetime->format('H:i:s');

        // return response()->json(['success' => true]);
        $created = DB::table("setup__department")
            ->insert([
                'department_name' => $request->input('department_name'),
                'department_code' => $request->input('department_code'),
                'department_location' => $request->input('department_location'),
                'department_decription' => $request->input('department_decription'),
                'department_supervised_by' => $request->input('department_supervised_by'),
                'exclude_from_floor_load' => $request->input('exclude_from_floor_load'),
                'company_site' => $request->input('SiteSelector'),
                'created_at' => $date_time,
                'status' => $date_time,
            ]);

        if ($created == 1) {
            return response()->json(['success' => true, 'message' => 'Department addedd successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function DepartmentEdit(Request $request, $department_id)
    {
        $setup__department = DB::table('setup__department')
            ->where('department_id', $department_id)
            ->get();

        $data = json_decode($setup__department);
        return $data;
    }
    public function DepartmentView(Request $request, $department_id)
    {
        $setup__department = DB::table('setup__department')
            ->select(
                'setup__department.*',
                'employee__personal_detail.first_name',
                'employee__personal_detail.middle_name',
                'employee__personal_detail.last_name',
            )
            ->where('setup__department.department_id', $department_id)
            ->leftjoin('employee__personal_detail', 'employee__personal_detail.employee_id', '=', 'setup__department.department_supervised_by')
            ->get();

        $data = json_decode($setup__department);
        return $data;
    }

    public function DepartmentUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'department_name' => 'bail|required|string',
            'department_code' => 'required|string',
            'department_location' => 'required|string',
            'department_decription' => 'required|string',
            'department_supervised_by' => 'required',
            'exclude_from_floor_load' => 'required',
            'SiteSelector' => 'required',

        ]);
        if (!$validator->passes()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->all()]);
        }

        date_default_timezone_set('Asia/Calcutta');
        $datetime = new DateTime();
        $date_now = $datetime->format('Y-m-d');
        $time_now = $datetime->format('H:i:s');
        $date_time = $datetime->format('Y-m-d') . ' ' . $datetime->format('H:i:s');

        // return response()->json(['success' => true]);
        $updated = DB::table("setup__department")
            ->where('department_id', $request->input('department_id'))
            ->update([
                'department_name' => $request->input('department_name'),
                'department_code' => $request->input('department_code'),
                'department_location' => $request->input('department_location'),
                'department_decription' => $request->input('department_decription'),
                'department_supervised_by' => $request->input('department_supervised_by'),
                'exclude_from_floor_load' => $request->input('exclude_from_floor_load'),
                'company_site' => $request->input('SiteSelector'),
                'status' => $request->input('StatusSelector'),
                'updated_at' => $date_time,
            ]);

        if ($updated == 1) {
            return response()->json(['success' => true, 'message' => 'Department has been updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function DepartmentRemove(Request $request)
    {
        $removed = DB::table('setup__department')
            ->where('department_id', $request->input('department_id'))
            ->delete();

        if ($removed == 1) {
            return response()->json(['success' => true, 'message' => 'Department has been removed successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

}
