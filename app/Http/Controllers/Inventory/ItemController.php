<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Datatables;
use DateTime;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    public function Item(Request $request)
    {
        $grades = DB::table('inventory__grade')
            ->get();
        $sizes = DB::table('inventory__size')
            ->get();
        return view('Inventory.Item', ['grades' => $grades, 'sizes' => $sizes]);
    }
    public function ItemShow(Request $request)
    {
        $data = DB::table('inventory__item')
            ->leftjoin('inventory__grade', 'inventory__grade.grade_id', '=', 'inventory__item.grade_id')
            ->leftjoin('inventory__size', 'inventory__size.size_id', '=', 'inventory__item.size_id')
            ->select(
                'inventory__grade.grade_title',
                'inventory__size.size_title',
                'inventory__item.*',
            )
            ->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return
                '<button type="button" onclick="ItemEdit(' . $data->item_id . ')" class="btn btn-warning btn-circle"><i class="fa fa-pen"></i></button>
                <button type="button" onclick="ItemRemove(' . $data->item_id . ')" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></button>
                <button type="button" onclick="ItemView(' . $data->item_id . ')" class="btn btn-info btn-circle"  ><i class="fa fa-eye"></i></button>';
            })
            ->rawColumns(['action'])
            ->make(true);

        // <a href="Client-'.$data->client_id.'-Profile" class="btn btn-info btn-circle"><i class="fa fa-eye"></i></a>
    }
    public function ItemStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_title' => 'bail|required',
            'item_description' => 'required',
            'size_id' => 'required',
            'grade_id' => 'required',
            'item_material_type' => 'required',
            'item_material_form' => 'required',
            'item_price' => 'required',

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
        $created = DB::table("inventory__item")
            ->insert([
                'item_title' => $request->input('item_title'),
                'item_description' => $request->input('item_description'),
                'size_id' => $request->input('size_id'),
                'grade_id' => $request->input('grade_id'),
                'item_material_type' => $request->input('item_material_type'),
                'item_material_form' => $request->input('item_material_form'),
                'item_price' => number_format((float) $request->input('item_price'), '2', '.', ''),
                'created_at' => $date_time,
            ]);

        if ($created == 1) {
            return response()->json(['success' => true, 'message' => 'Item has been added successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function ItemEdit(Request $request, $item_id)
    {
        $inventory__item = DB::table('inventory__item')
            ->where('item_id', $item_id)
            ->get();

        $grades = DB::table('inventory__grade')
            ->get();
        $sizes = DB::table('inventory__size')
            ->get();

        $data = json_decode($inventory__item);
        return $data;
    }
    public function ItemView(Request $request, $item_id)
    {
        $inventory__item = DB::table('inventory__item')
            ->leftjoin('inventory__grade', 'inventory__grade.grade_id', '=', 'inventory__item.grade_id')
            ->leftjoin('inventory__size', 'inventory__size.size_id', '=', 'inventory__item.size_id')
            ->select(
                'inventory__grade.grade_title',
                'inventory__size.size_title',
                'inventory__item.*',
            )
            ->where('item_id', $item_id)
            ->get();
        $grades = DB::table('inventory__grade')
            ->get();
        $sizes = DB::table('inventory__size')
            ->get();

        $data = json_decode($inventory__item);
        return $data;
    }

    public function ItemUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_title' => 'bail|required',
            'item_description' => 'required',
            'size_id' => 'required',
            'grade_id' => 'required',
            'item_material_type' => 'required',
            'item_material_form' => 'required',
            'item_price' => 'required',

        ]);
        if (!$validator->passes()) {
            return response()->json(['success' => false,"validation" => false, 'message' => $validator->errors()->all()]);
        }
        $d = array(
            'item_title' => $request->input('item_title'),
            'item_description' => $request->input('item_description'),
            'size_id' => $request->input('size_id'),
            'grade_id' => $request->input('grade_id'),
            'item_material_type' => $request->input('item_material_type'),
            'item_material_form' => $request->input('item_material_form'),
            'item_price' => $request->input('item_price'),
        );
        // print_r($d);
        // die('#diend');

        date_default_timezone_set('Asia/Calcutta');
        $datetime = new DateTime();
        $date_now = $datetime->format('Y-m-d');
        $time_now = $datetime->format('H:i:s');
        $date_time = $datetime->format('Y-m-d') . ' ' . $datetime->format('H:i:s');

        // return response()->json(['success' => true]);
        $updated = DB::table("inventory__item")
            ->where('item_id', $request->input('item_id'))
            ->update([
                'item_title' => $request->input('item_title'),
                'item_description' => $request->input('item_description'),
                'size_id' => $request->input('size_id'),
                'grade_id' => $request->input('grade_id'),
                'item_material_type' => $request->input('item_material_type'),
                'item_material_form' => $request->input('item_material_form'),
                'item_price' => number_format((float) $request->input('item_price'), '2', '.', ''),
                'updated_at' => $date_time,
            ]);

        if ($updated == 1) {
            return response()->json(['success' => true, 'message' => 'Item has been updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function ItemRemove(Request $request)
    {
        $removed = DB::table('inventory__item')
            ->where('item_id', $request->input('item_id'))
            ->delete();

        if ($removed == 1) {
            return response()->json(['success' => true, 'message' => 'Item has been removed successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

}
