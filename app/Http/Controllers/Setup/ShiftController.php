<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Datatables;
use DateTime;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShiftController extends Controller
{
    public function Shift(Request $request)
    {
        return view('Setup.Shift');
    }
    public function ShiftShow(Request $request)
    {
        $data = DB::table('setup__shift')
            ->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return
                '<button type="button" onclick="ShiftEdit(' . $data->shift_id . ')" class="btn btn-warning btn-circle"><i class="fa fa-pen"></i></button>
                <button type="button" onclick="ShiftRemove(' . $data->shift_id . ')" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></button>
                <button type="button" onclick="ShiftView(' . $data->shift_id . ')" class="btn btn-info btn-circle"  ><i class="fa fa-eye"></i></button>';
            })
            ->rawColumns(['action'])
            ->make(true);

        // <a href="Client-'.$data->client_id.'-Profile" class="btn btn-info btn-circle"><i class="fa fa-eye"></i></a>
    }
    public function ShiftStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'shift_start' => 'bail|required',
            'shift_end' => 'required',
            'StatusSelector' => 'required',
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
        $created = DB::table("setup__shift")
            ->insert([
                'shift_start' => $request->input('shift_start'),
                'shift_end' => $request->input('shift_end'),
                'status' => $request->input('StatusSelector'),
                'company_site' => $request->input('SiteSelector'),
                'created_at' => $date_time,
            ]);

        if ($created == 1) {
            return response()->json(['success' => true, 'message' => 'Shift has been added successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function ShiftEdit(Request $request, $shift_id)
    {
        $setup__shift = DB::table('setup__shift')
            ->where('shift_id', $shift_id)
            ->get();

        $data = json_decode($setup__shift);
        return $data;
    }
    public function ShiftView(Request $request, $shift_id)
    {
        $setup__shift = DB::table('setup__shift')
            ->where('shift_id', $shift_id)
            ->get();

        $data = json_decode($setup__shift);
        return $data;
    }

    public function ShiftUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'shift_start' => 'bail|required',
            'shift_end' => 'required',
            'StatusSelector' => 'required',
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
        $updated = DB::table("setup__shift")
            ->where('shift_id', $request->input('shift_id'))
            ->update([
                'shift_start' => $request->input('shift_start'),
                'shift_end' => $request->input('shift_end'),
                'status' => $request->input('StatusSelector'),
                'company_site' => $request->input('SiteSelector'),
                'updated_at' => $date_time,
            ]);

        if ($updated == 1) {
            return response()->json(['success' => true, 'message' => 'Shift has been updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function ShiftRemove(Request $request)
    {
        $removed = DB::table('setup__shift')
            ->where('shift_id', $request->input('shift_id'))
            ->delete();

        if ($removed == 1) {
            return response()->json(['success' => true, 'message' => 'Shift has been removed successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

}