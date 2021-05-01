<?php

namespace App\Http\Controllers\SalesInquiry;

use App\Http\Controllers\Controller;
use Datatables;
use DateTime;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EstimateHourController extends Controller
{
    // Estimation Wrok Hour Show
    public function EstimationHourShow(Request $request)
    {
        $hour = DB::table('sales__item_estimates')
            ->where('sales__item_estimates.item_id', $request->input('item_id'))
            ->where('sales__item_estimates.type', $request->input('type'))
            ->get();
        return Datatables::of($hour)
            ->addColumn('action', function ($hour) {
                return
                '<button type="button" onclick="EstimationHourEdit(' . $hour->estimate_id . ')" class="btn btn-warning btn-circle"><i class="fa fa-pen"></i></button>
                <button type="button" onclick="EstimationHourRemove(' . $hour->estimate_id . ')" class="btn btn-danger btn-circle"  ><i class="fas fa-trash"></i></button>';
            })
            ->make(true);
    }

    // Estimation Hour Store  \\

    public function EstimationHourStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hour_descriptions' => 'bail|required|string',
            'order_quantity' => 'required|numeric',
            'per_hour_cost' => 'required|string',
            'estimated_requir_work_hour' => 'required|string',
            'total_work_hour' => 'required',
            'total_hour_cost' => 'required',
            'gross_total' => 'required',
            'vat_total' => 'required',
            'net_total' => 'required',

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
        $created = DB::table("sales__item_estimates")
            ->insert([
                'type' => 'hour',
                'description' => $request->input('hour_descriptions'),
                'order_quantity' => $request->input('order_quantity'),
                'required_work_hour' => $request->input('estimated_requir_work_hour'),
                'per_hour_cost' => $request->input('per_hour_cost'),
                'total_work_hour' => $request->input('total_work_hour'),
                'total_hour_cost' => $request->input('total_hour_cost'),
                'gross_total' => $request->input('gross_total'),
                'vat_total' => $request->input('vat_total'),
                'net_total' => $request->input('net_total'),
                'item_id' => $request->input('item_id'),
                'created_at' => $date_time,
            ]);

        // update sales__inquiry_item with gross etc total amount
        // $gross_total_old = DB::table('sales__item_hour_estimation')
        //     ->select(
        //         DB::raw('SUM(sales__item_hour_estimation.gross_total) AS gross_total'),
        //         DB::raw('SUM(sales__item_hour_estimation.vat_total) AS vat_total'),
        //         DB::raw('SUM(sales__item_hour_estimation.net_total) AS net_total'),
        //     )
        //     ->where('item_id', $request->input('item_id'))
        //     ->get();

        // if (count($gross_total_old) > 0) {
        //     $item_created = DB::table("sales__inquiry_item")
        //         ->where('item_id', $request->input('item_id'))
        //         ->update([
        //             'gross_total' => $gross_total_old[0]->gross_total,
        //             'vat_total' => $gross_total_old[0]->vat_total,
        //             'net_total' => $gross_total_old[0]->net_total,
        //         ]);
        // }

        if ($created == 1) {
            return response()->json(['success' => true, 'message' => 'Estimation Hour addedd successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

    // Estimation Edit Modal  \\
    public function EstimationHourEdit(Request $request, $estimate_id)
    {
        $Hour = DB::table('sales__item_estimates')
            ->where('estimate_id', $estimate_id)
            ->get();

        $data = json_decode($Hour);
        return $data;
    }

    // Estimation Update Function

    public function EstimationHourUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hour_descriptions' => 'bail|required|string',
            'order_quantity' => 'required|numeric',
            'per_hour_cost' => 'required|string',
            'estimated_requir_work_hour' => 'required|string',
            'total_work_hour' => 'required',
            'total_hour_cost' => 'required',
            'gross_total' => 'required',
            'vat_total' => 'required',
            'net_total' => 'required',

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
        $created = DB::table("sales__item_estimates")
            ->where('estimate_id', $request->input('hour_id'))
            ->update([
                'description' => $request->input('hour_descriptions'),
                'order_quantity' => $request->input('order_quantity'),
                'per_hour_cost' => $request->input('per_hour_cost'),
                'required_work_hour' => $request->input('estimated_requir_work_hour'),
                'total_work_hour' => $request->input('total_work_hour'),
                'total_hour_cost' => $request->input('total_hour_cost'),
                'gross_total' => $request->input('gross_total'),
                'vat_total' => $request->input('vat_total'),
                'net_total' => $request->input('net_total'),
                'item_id' => $request->input('item_id'),
                'updated_at' => $date_time,
            ]);

        if ($created == 1) {
            return response()->json(['success' => true, 'message' => 'Estimation Hour updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

    // Estimation Hour  Remove

    public function EstimationHourRemove(Request $request)
    {
        $removed = DB::table("sales__item_estimates")
            ->where('estimate_id', $request->input('estimate_id'))
            ->delete();

        if ($removed == 1) {
            return response()->json(['success' => true, 'message' => 'Estimation Hour has been removed successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
}
