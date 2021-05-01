<?php

namespace App\Http\Controllers\SalesInquiry;

use App\Http\Controllers\Controller;
use Datatables;
use DateTime;
use DB;
use Illuminate\Http\Request;
use Validator;

class EstimateMaterialController extends Controller
{
    public function Estimation($inquiry_id)
    {
        $data = DB::table('sales__inquiry')
            ->select(
                'client.company_name',
                'employee__personal_detail.first_name',
                'employee__personal_detail.last_name',
                'sales__inquiry.*',
            )
            ->leftjoin('client', 'client.client_id', '=', 'sales__inquiry.client_id')
            ->leftjoin('employee__personal_detail', 'employee__personal_detail.employee_id', '=', 'sales__inquiry.employee_id')
            ->where('inquiry_id', $inquiry_id)
            ->get();
        return view('SalesInquiry.Estimation.Estimation', ['inquiry' => $data,'inquiry_id'=>$inquiry_id]);
    }
    public function EstimationItemShow(Request $request)
    {
        $data = DB::table('sales__inquiry_item')
        ->select(
            'setup__uom.uom_name',
            'sales__inquiry_item.*',
            // DB::raw('SUM(IFNULL(sales__item_estimates.gross_total, 0) ) as gross_total'),
            // DB::raw('SUM(IFNULL(sales__item_estimates.vat_total, 0) ) as vat_total'),
            // DB::raw('SUM(IFNULL(sales__item_estimates.net_total, 0) ) as net_total'),
            DB::raw('SUM(sales__item_estimates.gross_total) AS gross_total'),
            DB::raw('SUM(sales__item_estimates.vat_total) AS vat_total'),
            DB::raw('SUM(sales__item_estimates.net_total) AS net_total'),
        )
        ->leftjoin('sales__item_estimates', 'sales__item_estimates.item_id', '=', 'sales__inquiry_item.item_id')
        ->leftjoin('setup__uom', 'setup__uom.uom_id', '=', 'sales__inquiry_item.uom_id')
        ->where('sales__inquiry_item.inquiry_id', $request->input('inquiry_id'))
        ->groupBy(DB::raw('sales__inquiry_item.item_id'))
        ->orderBy('sales__item_estimates.estimate_id', 'asc')
        ->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return
                '<a href="Estimation-' . $data->item_id . '-Setup" class="btn btn-info btn-circle" >Estimation</a>';
            })
            ->make(true);
    }
    public function EstimationSetup($item_id)
    {
        $items = DB::table('sales__inquiry_item')
            ->select(
                'setup__uom.uom_name',
                'sales__inquiry_item.*',
            )
            ->leftjoin('setup__uom', 'setup__uom.uom_id', '=', 'sales__inquiry_item.uom_id')
            ->where('item_id', $item_id)
            ->get();

        $inquiry = DB::table('sales__inquiry')
            ->select(
                'client.company_name',
                'employee__personal_detail.first_name',
                'employee__personal_detail.last_name',
                'sales__inquiry.*',
            )
            ->leftjoin('client', 'client.client_id', '=', 'sales__inquiry.client_id')
            ->leftjoin('employee__personal_detail', 'employee__personal_detail.employee_id', 'sales__inquiry.employee_id')
            ->where('inquiry_id', $items[0]->inquiry_id)
            ->get();

        // return $items;
        return view('SalesInquiry.Estimation.EstimationSetup', ['items' => $items, 'item_id' => $item_id, 'inquiry' => $inquiry]);
    }

    public function EstimationMaterialShow(Request $request)
    {
        $material = DB::table('sales__item_estimates')
            ->where('sales__item_estimates.item_id', $request->input('item_id'))
            ->where('sales__item_estimates.type', $request->input('type'))
            ->get();
        return Datatables::of($material)
            ->addColumn('action', function ($material) {
                return
                '<button type="button" onclick="EstimationMaterialEdit(' . $material->estimate_id . ')" class="btn btn-warning btn-circle"><i class="fa fa-pen"></i></button>
                <button type="button" onclick="EstimationMaterialRemove(' . $material->estimate_id . ')" class="btn btn-danger btn-circle"  ><i class="fas fa-trash"></i></button>';
            })
            ->make(true);
    }

    // Estimation Material Store Function \\
    public function EstimationMaterialStore(Request $request)
    {
        // $gross_total_old = DB::table('sales__item_material_estimation')
        // ->select(
        //     DB::raw('SUM(sales__item_material_estimation.material_gross_total) AS gross_total'),
        //     DB::raw('SUM(sales__item_material_estimation.material_vat_total) AS vat_total'),
        //     DB::raw('SUM(sales__item_material_estimation.material_net_total) AS net_total'),
        // )
        // ->where('item_id',$request->input('item_id'))
        // ->get();
        // $gross = $gross_total_old[0]->gross_total + $request->input('gross_total');
        // return $gross_total_old;

        $validator = Validator::make($request->all(), [
            'required_material' => 'bail|required|string',
            'order_quantity' => 'required|numeric',
            'estimation_quantity_unit' => 'required|string',
            'unit' => 'required|string',
            'total_estimation_quantity' => 'required',
            'material_grade' => 'required',
            'estimation_cost_unit' => 'required',
            'total_material_cost' => 'required',
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
        
        // $created = DB::table("sales__item_material_estimation")
        $created = DB::table("sales__item_estimates")
            ->insert([
                'type' => 'material',
                'material_required' => $request->input('required_material'),
                'material_order_quantity' => $request->input('order_quantity'),
                'material_qty_unit' => $request->input('estimation_quantity_unit'),
                'material_unit' => $request->input('unit'),
                'material_total_est_qty' => $request->input('total_estimation_quantity'),
                'material_grade' => $request->input('material_grade'),
                'material_est_cost_unit' => $request->input('estimation_cost_unit'),
                'total_material_cost' => $request->input('total_material_cost'),
                'gross_total' => $request->input('gross_total'),
                'vat_total' => $request->input('vat_total'),
                'net_total' => $request->input('net_total'),
                'item_id' => $request->input('item_id'),
                'created_at' => $date_time,
            ]);

        // update sales__inquiry_item with gross etc total amount
        // $gross_total_old = DB::table('sales__item_material_estimation')
        // ->select(
        //     DB::raw('SUM(sales__item_material_estimation.material_gross_total) AS gross_total'),
        //     DB::raw('SUM(sales__item_material_estimation.material_vat_total) AS vat_total'),
        //     DB::raw('SUM(sales__item_material_estimation.material_net_total) AS net_total'),
        // )
        // ->where('item_id',$request->input('item_id'))
        // ->get();

        // if(count($gross_total_old) > 0){
        //     $item_created = DB::table("sales__inquiry_item")
        //     ->where('item_id', $request->input('item_id'))
        //     ->update([
        //         'gross_total' => $gross_total_old[0]->gross_total,
        //         'vat_total' => $gross_total_old[0]->vat_total,
        //         'net_total' => $gross_total_old[0]->net_total,
        //     ]);
        // }

        if ($created == 1) {
            return response()->json(['success' => true, 'message' => 'Estimation Material addedd successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

    // Estimation Material Edit Function \\
    public function EstimationMaterialEdit(Request $request, $estimate_id)
    {
        $material = DB::table('sales__item_estimates')
            ->where('estimate_id', $estimate_id)
            ->get();

        $data = json_decode($material);
        return $data;
    }

    // Estimation Material Update Function \\
    public function EstimationMaterialUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'required_material' => 'bail|required|string',
            'order_quantity' => 'required|numeric',
            'estimation_quantity_unit' => 'required|string',
            'unit' => 'required|string',
            'total_estimation_quantity' => 'required',
            'material_grade' => 'required',
            'estimation_cost_unit' => 'required',
            'total_material_cost' => 'required',
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

        $created = DB::table("sales__item_estimates")
            ->where('estimate_id', $request->input('material_id'))
            ->update([
                'material_required' => $request->input('required_material'),
                'material_order_quantity' => $request->input('order_quantity'),
                'material_qty_unit' => $request->input('estimation_quantity_unit'),
                'material_unit' => $request->input('unit'),
                'material_total_est_qty' => $request->input('total_estimation_quantity'),
                'material_grade' => $request->input('material_grade'),
                'material_est_cost_unit' => $request->input('estimation_cost_unit'),
                'total_material_cost' => $request->input('total_material_cost'),
                'gross_total' => $request->input('gross_total'),
                'vat_total' => $request->input('vat_total'),
                'net_total' => $request->input('net_total'),
                'item_id' => $request->input('item_id'),
                'updated_at' => $date_time,
            ]);

        if ($created == 1) {
            return response()->json(['success' => true, 'message' => 'Estimation Material updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    // EstimationMaterialRemove \\
    public function EstimationMaterialRemove(Request $request)
    {
        $removed = DB::table("sales__item_estimates")
            ->where('estimate_id', $request->input('estimate_id'))
            ->delete();

        if ($removed == 1) {
            return response()->json(['success' => true, 'message' => 'Estimation Material has been removed successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

}
