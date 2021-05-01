<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Datatables;
use DateTime;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UOMController extends Controller
{
    public function UOM(Request $request)
    {
        return view('Setup.UOM');
    }
    public function UOMShow(Request $request)
    {
        $data = DB::table('setup__uom')
            ->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return
                '<button type="button" onclick="UOMEdit(' . $data->uom_id . ')" class="btn btn-warning btn-circle"><i class="fa fa-pen"></i></button>
                <button type="button" onclick="UOMRemove(' . $data->uom_id . ')" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></button>
                <button type="button" onclick="UOMView(' . $data->uom_id . ')" class="btn btn-info btn-circle"  ><i class="fa fa-eye"></i></button>';
            })
            ->rawColumns(['action'])
            ->make(true);

        // <a href="Client-'.$data->client_id.'-Profile" class="btn btn-info btn-circle"><i class="fa fa-eye"></i></a>
    }
    public function UOMStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'uom_name' => 'bail|required',
            'uom_code' => 'required|string',

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
        $created = DB::table("setup__uom")
            ->insert([
                'uom_name' => $request->input('uom_name'),
                'uom_code' => $request->input('uom_code'),
                'created_at' => $date_time,
            ]);

        if ($created == 1) {
            return response()->json(['success' => true, 'message' => 'UOM addedd successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function UOMEdit(Request $request, $uom_id)
    {
        $setup__uom = DB::table('setup__uom')
            ->where('uom_id', $uom_id)
            ->get();

        $data = json_decode($setup__uom);
        return $data;
    }
    public function UOMView(Request $request, $uom_id)
    {
        $setup__uom = DB::table('setup__uom')
            ->where('uom_id', $uom_id)
            ->get();

        $data = json_decode($setup__uom);
        return $data;
    }

    public function UOMUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'uom_name' => 'bail|required',
            'uom_code' => 'required',

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
        $updated = DB::table("setup__uom")
            ->where('uom_id', $request->input('uom_id'))
            ->update([
                'uom_name' => $request->input('uom_name'),
                'uom_code' => $request->input('uom_code'),
                'status' => $request->input('StatusSelector'),
                'updated_at' => $date_time,
            ]);

        if ($updated == 1) {
            return response()->json(['success' => true, 'message' => 'UOM has been updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function UOMRemove(Request $request)
    {
        $removed = DB::table('setup__uom')
            ->where('uom_id', $request->input('uom_id'))
            ->delete();

        if ($removed == 1) {
            return response()->json(['success' => true, 'message' => 'UOM has been removed successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

}
