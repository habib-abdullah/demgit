<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use Datatables;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DateTime;

class PurchaseController extends Controller
{
    //Purchse View
    public function purchase(){
        $data = DB::table('client')->get();
        return view('purchase.purchase',['clients' => $data]);
    }

    // ---Purchse Show--- \\
    public function PurchaseShow(){
        $purchase = DB::table('purchase')
        ->select('client.company_name','purchase.*')
        ->leftjoin('client','client.client_id', '=' , 'purchase.vendor_id')
        ->get();
        return Datatables::of($purchase)
        ->addColumn('action',function($purchase){
            return 
            '<button type="button" onclick="PurchaseEdit(' . $purchase->purchase_id . ')" class="btn btn-warning btn-circle"><i class="fa fa-pen"></i></button>
            <button type="button" onclick="PurchaseRemove(' . $purchase->purchase_id . ')" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></button>
            <button type="button" onclick="PurchaseView(' . $purchase->purchase_id . ')" class="btn btn-info btn-circle"><i class="fa fa-eye"></i></button>';
        })
        ->make(true);
    }

    // Purchse Insert
    public function PurchaseStore(Request $request){


        date_default_timezone_set('Asia/Calcutta');
        $datetime = new DateTime();
        $date_now = $datetime->format('Y-m-d');
        $time_now = $datetime->format('H:i:s');
        $date_time = $datetime->format('Y-m-d').' '.$datetime->format('H:i:s');
        
        // Validation for Insert
        $validator = Validator::make($request->all(), [
            'purchase_no' => 'bail|required',
            'purchase_discrep' => 'required|string|max:255',
            'purchase_quantity' => 'required|numeric',
            'purchase_rate' => 'required|numeric',
            'purchase_amount' => 'required|numeric',
            'order_id' => 'required',
            'order_item_id' => 'required',
            'vendor_id' => 'required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['success' => false,"validation" => false, 'message' => $validator->errors()->all()]);
        }
        // Insert Query
        $insert = DB::table('purchase')
        ->insert([
            'purchase_bill_no' => $request->input('purchase_no'),
            'purchase_description' => $request->input('purchase_discrep'),
            'purchase_quantity' => $request->input('purchase_quantity'),
            'purchase_rate' => $request->input('purchase_rate'),
            'purchase_total' => $request->input('purchase_amount'),
            'order_id' => $request->input('order_id'),
            'order_item_id' => $request->input('order_item_id'),
            'vendor_id' => $request->input('vendor_id'),
            'created_at'=> $date_time,

        ]);
        
        if($insert == 1){
            return response()->json(['success' => true, 'message' => 'Purchase Successfully Add']);
        }else{
            return response()->json(['success' => false, 'message' => 'Ooops Somthing went Wrong']);
        }
    }

    // Main PurchaseEdit
    public function PurchaseEdit(Request $request){
        $edit = DB::table('purchase')
        ->where('purchase_id',$request->input('purchase_id'))
        ->get();
        return response()->json(['success' => true, $edit[0]]);
    }

    // main PurchseVIew
    public function PurchaseView(Request $request){
        $view = DB::table('purchase')
        ->where('purchase_id',$request->input('purchase_id'))
        ->select('client.company_name','purchase.*')
        ->leftjoin('client','client.client_id', '=' , 'purchase.vendor_id')
        ->get();
        return response()->json(['success' => true, $view[0]]);
    }
    
    // Main PurchseUpdate
    public function PurchaseUpdate(Request $request){
        // Update Validation
        $validator = Validator::make($request->all(), [
            'edit_no' => 'bail|required',
            'edit_discrep' => 'required|string|max:255',
            'edit_quantity' => 'required|numeric',
            'edit_rate' => 'required|numeric',
            'edit_amount' => 'required|numeric',
            'edit_order_id' => 'required',
            'edit_order_item_id' => 'required',
            'edit_vendor_id' => 'required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['success' => false,"validation" => false, 'message' => $validator->errors()->all()]);
        }

        date_default_timezone_set('Asia/Calcutta');
        $datetime = new DateTime();
        $date_now = $datetime->format('Y-m-d');
        $time_now = $datetime->format('H:i:s');
        $date_time = $datetime->format('Y-m-d').' '.$datetime->format('H:i:s');

        // Update Query
        $update = DB::table('purchase')
        ->where('purchase_id',$request->input('purchase_id'))
        ->update([
            'purchase_bill_no' => $request->input('edit_no'),
            'purchase_description' => $request->input('edit_discrep'),
            'purchase_quantity' => $request->input('edit_quantity'),
            'purchase_rate' => $request->input('edit_rate'),
            'purchase_total' => $request->input('edit_amount'),
            'order_id' => $request->input('edit_order_id'),
            'order_item_id' => $request->input('edit_order_item_id'),
            'vendor_id' => $request->input('edit_vendor_id'),
            'updated_at'=> $date_time,
        ]);
        if($update == 1){
            return response()->json(['success' => true,'message' => 'Purchse Successfully Updated']);
        }else{
            return response()->json(['success' => false,'message' => 'Ooops Something Went Wronge']);
        }
    }


    // ---PurchaseRemove--- \\
    public function PurchaseRemove(Request $request){
        $view = DB::table('purchase')
        ->where('purchase_id',$request->input('purchase_id'))
        ->delete();
        return response()->json(['success' => true]);
    }
    

}