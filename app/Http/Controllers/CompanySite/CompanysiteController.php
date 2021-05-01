<?php

namespace App\Http\Controllers\CompanySite;

use App\Http\Controllers\Controller;
use Datatables;
use DateTime;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanysiteController extends Controller
{
    public function CompanySite(Request $request)
    {
        $employees = DB::table('company_sites')
            ->get();
        return view('CompanySite.Comapnysite', ['employees' => $employees]);
        // return view('CompanySite.Comapnysite');
    }
    public function CompanySiteShow(Request $request)
    {
        $data = DB::table('company_sites')->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return
                '<button type="button" onclick="CompanyEdit(' .$data->site_id. ')" class="btn btn-warning btn-circle"><i class="fa fa-pen"></i></button>
                <button type="button" onclick="CompanyRemove(' .$data->site_id. ')" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></button>
                <button type="button" onclick="CompanyView(' .$data->site_id. ')" class="btn btn-info btn-circle"  ><i class="fa fa-eye"></i></button>';
            })
            ->make(true);
    }
    public function CompanyStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'site_name' => 'bail|required|string',
            'site_mobile' => 'required|numeric',
            'site_address' => 'required|string',

        ]);
        if (!$validator->passes()) {
            return response()->json(['success' => false, "validation" => false, 'message' => $validator->errors()->all()]);
        }

        date_default_timezone_set('Asia/Calcutta');
        $datetime = new DateTime();
        $date_now = $datetime->format('Y-m-d');
        $time_now = $datetime->format('H:i:s');
        $date_time = $datetime->format('Y-m-d') . ' ' . $datetime->format('H:i:s');

        // return response()->json(['success' => true]);
        $created = DB::table("company_sites")
            ->insert([
                'site_name' => $request->input('site_name'),
                'site_mobile' => $request->input('site_mobile'),
                'site_address' => $request->input('site_address'),
                'longitude' => $request->input('site_longitude'),
                'latitude' => $request->input('site_latitude'),
                'created_at' => $datetime
            ]);

        if ($created == 1) {
            return response()->json(['success' => true, 'message' => 'Company addedd successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function ComapnyEdit(Request $request, $site_id)
    {
        $setup__department = DB::table('company_sites')
            ->where('site_id', $site_id)
            ->get();

        $data = json_decode($setup__department);
        return $data;
    }
    public function ComapnyView(Request $request, $site_id)
    {
        $setup__department = DB::table('company_sites')
        ->where('site_id', $site_id)
            ->get();

        $data = json_decode($setup__department);
        return $data;
    }

    public function CompanyUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_name' => 'bail|required|string',
            'edit_mobile' => 'required|numeric',
            'edit_address' => 'required|string',

        ]);
        if (!$validator->passes()) {
            return response()->json(['success' => false, "validation" => false, 'message' => $validator->errors()->all()]);
        }

        date_default_timezone_set('Asia/Calcutta');
        $datetime = new DateTime();
        $date_now = $datetime->format('Y-m-d');
        $time_now = $datetime->format('H:i:s');
        $date_time = $datetime->format('Y-m-d') . ' ' . $datetime->format('H:i:s');
        $updated = DB::table("company_sites")
            ->where('site_id', $request->input('site_id'))
            ->update([
                'site_name' => $request->input('edit_name'),
                'site_mobile' => $request->input('edit_mobile'),
                'site_address' => $request->input('edit_address'),
                'longitude' => $request->input('edit_longitude'),
                'latitude' => $request->input('edit_latitude'),
                'status' => $request->input('StatusSelector'),
                'updated_at' => $date_time,
            ]);
            // return $updated;

        if ($updated == 1) {
            return response()->json(['success' => true, 'message' => 'Company has been updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function CompanyRemove(Request $request)
    {
        $removed = DB::table('company_sites')
            ->where('site_id', $request->input('site_id'))
            ->delete();

        if ($removed == 1) {
            return response()->json(['success' => true, 'message' => 'Company has been removed successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

}