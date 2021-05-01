<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Datatables;
use DateTime;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SizeController extends Controller
{
    public function Size(Request $request)
    {
        return view('Inventory.Size');
    }
    public function SizeShow(Request $request)
    {
        $data = DB::table('inventory__size')
            ->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return
                '<button type="button" onclick="SizeEdit(' . $data->size_id . ')" class="btn btn-warning btn-circle"><i class="fa fa-pen"></i></button>
                <button type="button" onclick="SizeRemove(' . $data->size_id . ')" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></button>
                <button type="button" onclick="SizeView(' . $data->size_id . ')" class="btn btn-info btn-circle"  ><i class="fa fa-eye"></i></button>';
            })
            ->rawColumns(['action'])
            ->make(true);

        // <a href="Client-'.$data->client_id.'-Profile" class="btn btn-info btn-circle"><i class="fa fa-eye"></i></a>
    }
    public function SizeStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'size_title' => 'bail|required',
            'size_description' => 'required',

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
        $created = DB::table("inventory__size")
            ->insert([
                'size_title' => $request->input('size_title'),
                'size_description' => $request->input('size_description'),
                'created_at' => $date_time,
            ]);

        if ($created == 1) {
            return response()->json(['success' => true, 'message' => 'Size for items has been added successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function SizeEdit(Request $request, $size_id)
    {
        $inventory__size = DB::table('inventory__size')
            ->where('size_id', $size_id)
            ->get();

        $data = json_decode($inventory__size);
        return $data;
    }
    public function SizeView(Request $request, $size_id)
    {
        $inventory__size = DB::table('inventory__size')
            ->where('size_id', $size_id)
            ->get();

        $data = json_decode($inventory__size);
        return $data;
    }

    public function SizeUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'size_title' => 'bail|required',
            'size_description' => 'required',
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
        $updated = DB::table("inventory__size")
            ->where('size_id', $request->input('size_id'))
            ->update([
                'size_title' => $request->input('size_title'),
                'size_description' => $request->input('size_description'),
                'status' => $request->input('StatusSelector'),
                'updated_at' => $date_time,
            ]);

        if ($updated == 1) {
            return response()->json(['success' => true, 'message' => 'Size for items has been updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function SizeRemove(Request $request)
    {
        $removed = DB::table('inventory__size')
            ->where('size_id', $request->input('size_id'))
            ->delete();

        if ($removed == 1) {
            return response()->json(['success' => true, 'message' => 'Size for items has been removed successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

}