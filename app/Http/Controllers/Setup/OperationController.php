<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Datatables;
use DateTime;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OperationController extends Controller
{
    public function Operation(Request $request)
    {
        return view('Setup.Operation');
    }
    public function OperationShow(Request $request)
    {
        $data = DB::table('setup__operation')
            ->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return
                '<button type="button" onclick="OperationEdit(' . $data->operation_id . ')" class="btn btn-warning btn-circle"><i class="fa fa-pen"></i></button>
                <button type="button" onclick="OperationRemove(' . $data->operation_id . ')" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></button>
                <button type="button" onclick="OperationView(' . $data->operation_id . ')" class="btn btn-info btn-circle"  ><i class="fa fa-eye"></i></button>';
            })
            ->rawColumns(['action'])
            ->make(true);

        // <a href="Client-'.$data->client_id.'-Profile" class="btn btn-info btn-circle"><i class="fa fa-eye"></i></a>
    }
    public function OperationStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'operation_name' => 'bail|required',
            'operation_code' => 'required|string',
            'operation_title' => 'required|string',
            'operation_description' => 'required|string',
            'operation_hour_rate' => 'required|string',
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
        $created = DB::table("setup__operation")
            ->insert([
                'operation_name' => $request->input('operation_name'),
                'operation_code' => $request->input('operation_code'),
                'operation_title' => $request->input('operation_title'),
                'operation_description' => $request->input('operation_description'),
                'operation_hour_rate' => $request->input('operation_hour_rate'),
                'company_site' => $request->input('SiteSelector'),
                'created_at' => $date_time,
            ]);

        if ($created == 1) {
            return response()->json(['success' => true, 'message' => 'Operation addedd successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function OperationEdit(Request $request, $operation_id)
    {
        $setup__operation = DB::table('setup__operation')
            ->where('operation_id', $operation_id)
            ->get();

        $data = json_decode($setup__operation);
        return $data;
    }
    public function OperationView(Request $request, $operation_id)
    {
        $setup__operation = DB::table('setup__operation')
            ->where('operation_id', $operation_id)
            ->get();

        $data = json_decode($setup__operation);
        return $data;
    }

    public function OperationUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'operation_name' => 'bail|required',
            'operation_code' => 'required|string',
            'operation_title' => 'required|string',
            'operation_description' => 'required|string',
            'operation_hour_rate' => 'required|string',
            'SiteSelector' => 'required',
            'StatusSelectors' => 'required',

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
        $updated = DB::table("setup__operation")
            ->where('operation_id', $request->input('operation_id'))
            ->update([
                'operation_name' => $request->input('operation_name'),
                'operation_code' => $request->input('operation_code'),
                'operation_title' => $request->input('operation_title'),
                'operation_description' => $request->input('operation_description'),
                'operation_hour_rate' => $request->input('operation_hour_rate'),
                'company_site' => $request->input('SiteSelector'),
                'status' => $request->input('StatusSelectors'),
                'updated_at' => $date_time,
            ]);

        if ($updated == 1) {
            return response()->json(['success' => true, 'message' => 'Operation has been updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function OperationRemove(Request $request)
    {
        $removed = DB::table('setup__operation')
            ->where('operation_id', $request->input('operation_id'))
            ->delete();

        if ($removed == 1) {
            return response()->json(['success' => true, 'message' => 'Operation has been removed successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

}
