<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Datatables;
use DateTime;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MachineController extends Controller
{
    public function Machine(Request $request)
    {
        $departments = DB::table('setup__department')
            // ->leftjoin('setup__department', 'setup__department.employee_id', '=', 'setup__machine.department_supervised_by')
            ->get();
            // return $departments;
        return view('Setup.Machine',['departments'=>$departments]);
    }
    public function MachineShow(Request $request)
    {
        $data = DB::table('setup__machine')
            ->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return
                '<button type="button" onclick="MachineEdit(' . $data->machine_id . ')" class="btn btn-warning btn-circle"><i class="fa fa-pen"></i></button>
                <button type="button" onclick="MachineRemove(' . $data->machine_id . ')" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></button>
                <button type="button" onclick="MachineView(' . $data->machine_id . ')" class="btn btn-info btn-circle"  ><i class="fa fa-eye"></i></button>';
            })
            ->rawColumns(['action'])
            ->make(true);

        // <a href="Client-'.$data->client_id.'-Profile" class="btn btn-info btn-circle"><i class="fa fa-eye"></i></a>
    }
    public function MachineStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'machine_name' => 'bail|required',
            'machine_code' => 'required',
            'machine_title' => 'required',
            'machine_make' => 'required',
            'machine_model' => 'required',
            'machine_description' => 'required',
            'machine_hour_rate' => 'required',
            'DepartmentSelector' => 'required',
            'SiteSelector' => 'required',
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
        $created = DB::table("setup__machine")
            ->insert([
                'machine_name' => $request->input('machine_name'),
                'machine_code' => $request->input('machine_code'),
                'machine_title' => $request->input('machine_title'),
                'machine_make' => $request->input('machine_make'),
                'machine_model' => $request->input('machine_model'),
                'machine_description' => $request->input('machine_description'),
                'machine_hour_rate' => $request->input('machine_hour_rate'),
                'department_id' => $request->input('DepartmentSelector'),
                'company_site' => $request->input('SiteSelector'),
                'created_at' => $date_time,
            ]);

        if ($created == 1) {
            return response()->json(['success' => true, 'message' => 'Machine addedd successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function MachineEdit(Request $request, $machine_id)
    {
        $setup__machine = DB::table('setup__machine')
            ->where('machine_id', $machine_id)
            ->get();

        $data = json_decode($setup__machine);
        return $data;
    }
    public function MachineView(Request $request, $machine_id)
    {
        $setup__machine = DB::table('setup__machine')
            ->where('setup__machine.machine_id', $machine_id)
            ->leftjoin('setup__department','setup__department.department_id','=','setup__machine.department_id')
            ->select(
                'setup__machine.*',
                'setup__department.department_name'
            )
            ->get();

        $data = json_decode($setup__machine);
        return $data;
    }

    public function MachineUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'machine_name' => 'bail|required',
            'machine_code' => 'required',
            'machine_title' => 'required',
            'machine_make' => 'required',
            'machine_model' => 'required',
            'machine_description' => 'required',
            'machine_hour_rate' => 'required',
            'DepartmentSelectors' => 'required',
            'SiteSelector' => 'required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['success' => false,'validation' => false, 'message' => $validator->errors()->all()]);
        }

        date_default_timezone_set('Asia/Calcutta');
        $datetime = new DateTime();
        $date_now = $datetime->format('Y-m-d');
        $time_now = $datetime->format('H:i:s');
        $date_time = $datetime->format('Y-m-d') . ' ' . $datetime->format('H:i:s');

        // return response()->json(['success' => true]);
        $updated = DB::table("setup__machine")
            ->where('machine_id', $request->input('machine_id'))
            ->update([
                'machine_name' => $request->input('machine_name'),
                'machine_code' => $request->input('machine_code'),
                'machine_title' => $request->input('machine_title'),
                'machine_make' => $request->input('machine_make'),
                'machine_model' => $request->input('machine_model'),
                'machine_description' => $request->input('machine_description'),
                'machine_hour_rate' => $request->input('machine_hour_rate'),
                'department_id' => $request->input('DepartmentSelectors'),
                'company_site' => $request->input('SiteSelector'),
                'status' => $request->input('StatusSelectors'),
                'updated_at' => $date_time,
            ]);

        if ($updated == 1) {
            return response()->json(['success' => true, 'message' => 'Machine has been updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function MachineRemove(Request $request)
    {
        $removed = DB::table('setup__machine')
            ->where('machine_id', $request->input('machine_id'))
            ->delete();

        if ($removed == 1) {
            return response()->json(['success' => true, 'message' => 'Machine has been removed successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

}