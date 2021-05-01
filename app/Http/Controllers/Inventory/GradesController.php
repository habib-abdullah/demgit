<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Datatables;
use DateTime;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GradesController extends Controller
{
    public function Grades(Request $request)
    {
        return view('Inventory.Grades');
    }
    public function GradesShow(Request $request)
    {
        $data = DB::table('inventory__grade')
            ->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return
                '<button type="button" onclick="GradeEdit(' . $data->grade_id . ')" class="btn btn-warning btn-circle"><i class="fa fa-pen"></i></button>
                <button type="button" onclick="GradeRemove(' . $data->grade_id . ')" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></button>
                <button type="button" onclick="GradeView(' . $data->grade_id . ')" class="btn btn-info btn-circle"  ><i class="fa fa-eye"></i></button>';
            })
            ->rawColumns(['action'])
            ->make(true);

        // <a href="Client-'.$data->client_id.'-Profile" class="btn btn-info btn-circle"><i class="fa fa-eye"></i></a>
    }
    public function GradesStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'grade_title' => 'bail|required',
            'grade_description' => 'required',

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
        $created = DB::table("inventory__grade")
            ->insert([
                'grade_title' => $request->input('grade_title'),
                'grade_description' => $request->input('grade_description'),
                'created_at' => $date_time,
            ]);

        if ($created == 1) {
            return response()->json(['success' => true, 'message' => 'Grade for items has been added successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function GradesEdit(Request $request, $grade_id)
    {
        $inventory__grade = DB::table('inventory__grade')
            ->where('grade_id', $grade_id)
            ->get();

        $data = json_decode($inventory__grade);
        return $data;
    }
    public function GradesView(Request $request, $grade_id)
    {
        $inventory__grade = DB::table('inventory__grade')
            ->where('grade_id', $grade_id)
            ->get();

        $data = json_decode($inventory__grade);
        return $data;
    }

    public function GradesUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'grade_title' => 'bail|required',
            'grade_description' => 'required',
            'StatusSelector' => 'required',

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
        $updated = DB::table("inventory__grade")
            ->where('grade_id', $request->input('grade_id'))
            ->update([
                'grade_title' => $request->input('grade_title'),
                'grade_description' => $request->input('grade_description'),
                'status' => $request->input('StatusSelector'),
                'updated_at' => $date_time,
            ]);

        if ($updated == 1) {
            return response()->json(['success' => true, 'message' => 'Grade for items has been updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function GradesRemove(Request $request)
    {
        $removed = DB::table('inventory__grade')
            ->where('grade_id', $request->input('grade_id'))
            ->delete();

        if ($removed == 1) {
            return response()->json(['success' => true, 'message' => 'Grade for items has been removed successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

}