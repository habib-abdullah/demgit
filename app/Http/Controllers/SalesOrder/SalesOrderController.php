<?php

namespace App\Http\Controllers\SalesOrder;

use App\Http\Controllers\Controller;
use Datatables;
use DateTime;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SalesOrderController extends Controller
{
    // --Purchase-- \\
    public function SalesOrder()
    {
        $order = DB::table('client')->get();
        return view('SalesOrder.SalesOrder', ['orders' => $order]);
    }

    public function SaleOrder()
    {
        $order = DB::table('client')->get();
        return view('SalesOrder.SaleOrderCreate', ['orders' => $order]);
    }

    // --SalesOrderShow-- \\
    public function SalesOrderShow(Request $request)
    {

        $data = DB::table('sale__order')
            ->select(
                'receiver.client_name',
                'customer.company_name',
                'sale__order.*',
            )
            ->leftjoin('client as customer', 'customer.client_id', '=', 'sale__order.customer_id')
            ->leftjoin('client as receiver', 'receiver.client_id', '=', 'sale__order.booked_by_id')
            ->get();
        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return
                '<a  href="SalesOrder-' . $data->sales_order_id . '-Edit" class="btn btn-warning btn-circle"><i class="fa fa-pen"></i></a>

            <button type="button" onclick="SalesOrderView(' . $data->sales_order_id . ')" class="btn btn-info btn-circle"  ><i class="fa fa-eye"></i></button>';
            })
            ->make(true);

    }
    // ---SalesOrderStore--- \\
    public function SalesOrderStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sales_order_date' => 'bail|required|string',
            'sales_mode' => 'required|string',
            'sales_person_name' => 'required|string',
            'sales_person_number' => 'required|string',
            'sales_receiving_date' => 'required',
            'sales_delivery_date' => 'required',
            'sales_lpo' => 'required',
            'sales_focus_so' => 'required',
            'sales_order_subject' => 'required',

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
        $created = DB::table("sale__order")
            ->insert([
                'sales_order_date' => $request->input('sales_order_date'),
                'sales_mode' => $request->input('sales_mode'),
                'sales_person_name' => $request->input('sales_person_name'),
                'sales_person_number' => $request->input('sales_person_number'),
                'sales_receiving_date' => $request->input('sales_receiving_date'),
                'sales_delivery_date' => $request->input('sales_delivery_date'),
                'sales_lpo' => $request->input('sales_lpo'),
                'sales_focus_so' => $request->input('sales_focus_so'),
                'sales_order_subject' => $request->input('sales_order_subject'),
                'customer_id' => $request->input('sales_customer_by'),
                'booked_by_id' => $request->input('sales_booked_by'),
                'created_at' => $date_time,
            ]);

        if ($created == 1) {
            return response()->json(['success' => true, 'message' => 'Order addedd successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

    // ---SalesOrderEdit--- \\
    public function SalesOrderEdit(Request $request, $sales_order_id)
    {
        $sales = DB::table('sale__order')
            ->where('sales_order_id', $sales_order_id)
            ->select(
                'customer.company_name', 'customer.client_id as  cust_id',
                'receiver.client_name', 'receiver.client_id as receiver_id',
                'sale__order.*',
            )
            ->leftjoin('client as customer', 'customer.client_id', '=', 'sale__order.customer_id')
            ->leftjoin('client as receiver', 'receiver.client_id', '=', 'sale__order.booked_by_id')
            ->get();
        // return $sales;

        $clients = DB::table('client')->get();
        $uom = DB::table('setup__uom')->get();

        return view('SalesOrder.SalesOrderEdit', ['sales' => $sales, 'clients' => $clients, 'uom' => $uom]);
    }

    // ---SalesOrderEdit--- \\
    public function SalesOrderView(Request $request, $sales_order_id)
    {
        $sales = DB::table('sales_order')
            ->select(
                'receiver.client_name',
                'customer.company_name',
                'sales_order.*',
            )
            ->leftjoin('client as customer', 'customer.client_id', '=', 'sales_order.customer_id')
            ->leftjoin('client as receiver', 'receiver.client_id', '=', 'sales_order.booked_by_id')
            ->where('sales_order_id', $sales_order_id)
            ->get();

        $data = json_decode($sales);

        return $data;
    }

    // ---SalesOrderUpdate--- \\
    public function SalesOrderUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_order_date' => 'bail|required|string',
            'edit_mode' => 'required|string',
            'edit_person_name' => 'required|string',
            'edit_person_number' => 'required|string',
            'edit_receiving_date' => 'required',
            'edit_delivery_date' => 'required',
            'edit_lpo' => 'required',
            'edit_focus_so' => 'required',
            'edit_order_subject' => 'required',

        ]);
        if (!$validator->passes()) {
            return response()->json(['success' => false, "validation" => false, 'message' => $validator->errors()->all()]);
        }

        date_default_timezone_set('Asia/Calcutta');
        $datetime = new DateTime();
        $date_now = $datetime->format('Y-m-d');
        $time_now = $datetime->format('H:i:s');
        $date_time = $datetime->format('Y-m-d') . ' ' . $datetime->format('H:i:s');
        $updated = DB::table("sale__order")
            ->where('sales_order_id', $request->input('sales_order_id'))
            ->update([
                'sales_order_date' => $request->input('edit_order_date'),
                'sales_mode' => $request->input('edit_mode'),
                'sales_person_name' => $request->input('edit_person_name'),
                'sales_person_number' => $request->input('edit_person_number'),
                'sales_receiving_date' => $request->input('edit_receiving_date'),
                'sales_delivery_date' => $request->input('edit_delivery_date'),
                'sales_lpo' => $request->input('edit_lpo'),
                'sales_focus_so' => $request->input('edit_focus_so'),
                'sales_order_subject' => $request->input('edit_order_subject'),
                'customer_id' => $request->input('edit_customer_by'),
                'booked_by_id' => $request->input('edit_booked_by'),
                'updated_at' => $date_time,
            ]);

        if ($updated == 1) {
            return response()->json(['success' => true, 'message' => 'Order has been updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

    // Sales Order Item  Show
    public function SalesOrderItemShow(Request $request)
    {
        $data = DB::table('sale__item')
            ->select(
                'setup__uom.uom_name',
                'sale__item.*',
            )
            ->leftjoin('setup__uom', 'setup__uom.uom_id', '=', 'sale__item.uom_id')
            ->get();
        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return

                '<button type="button" onclick="SalesOrderItemEdit(' . $data->item_id . ')" class="btn btn-warning btn-circle"  ><i class="fa fa-pen"></i></button>

            <button type="button" onclick="SalesOrderItemFile(' . $data->item_id . ')" class="btn btn-primary btn-circle"  ><i class="fa fa-file"></i></button>

            <button type="button" onclick="SalesOrderItemRemove(' . $data->item_id . ')" class="btn btn-danger btn-circle"  ><i class="fas fa-trash"></i></button>';
            })
            ->make(true);
    }

    // Sales Order Item Store
    public function SalesOrderItemStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_description' => 'bail|required|string',
            'receive_date' => 'required',
            'delivery_date' => 'required',
            'uom_id' => 'required',
            'item_quantity' => 'required',
            'item_rate' => 'required',
            'gross_total' => 'required',
            'vat_total' => 'required',
            'net_total' => 'required',
            'time_interval' => 'required',
            'time_unit' => 'required',
            'cost_unit' => 'required',
            'total_time' => 'required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['success' => false, "validation" => false, 'message' => $validator->errors()->all()]);
        }

        date_default_timezone_set('Asia/Calcutta');
        $datetime = new DateTime();
        $date_now = $datetime->format('Y-m-d');
        $time_now = $datetime->format('H:i:s');
        $date_time = $datetime->format('Y-m-d') . ' ' . $datetime->format('H:i:s');

        $item_id = DB::table("sale__item")->insertGetId([
            'item_description' => $request->input('item_description'),
            'receive_date' => $request->input('receive_date'),
            'delivery_date' => $request->input('delivery_date'),
            'uom_id' => $request->input('uom_id'),
            'item_quantity' => $request->input('item_quantity'),
            'item_rate' => $request->input('item_rate'),
            'gross_total' => $request->input('gross_total'),
            'vat_total' => $request->input('vat_total'),
            'net_total' => $request->input('net_total'),
            'time_interval' => $request->input('time_interval'),
            'time_unit' => $request->input('time_unit'),
            'cost_unit' => $request->input('cost_unit'),
            'total_time' => $request->input('total_time'),
            'sale_order_id' => $request->input('sales_order_id'),
            'created_at' => $date_time,
        ]);
        // return $item_id;

        $FileNameWithExt = "";
        $FileName = "";
        $extension = "";
        $FileNameToStore = "";
        $File = "";

        if ($request->hasfile('attachment')) {
            $data = [];
            foreach ($request->file('attachment') as $file) {
                $ImageNameWithExt = $file->getClientOriginalName();
                $ImageName = pathinfo($ImageNameWithExt, PATHINFO_FILENAME);
                $name = $ImageName . '_' . mt_rand(100, 99999) . '.' . $file->extension();
                $file->move('public/SalesOrder/Detail/', $name);
                $data[] = [
                    'attachment_file' => $name,
                    'item_id' => $item_id,
                ];
            }
            DB::table("sale__item_attachment")->insert($data);
        }

        if ($item_id != "") {
            return response()->json(['success' => true, 'message' => 'Sales Order Details
            addedd successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

    public function SalesOrderItemEdit(Request $request)
    {
        $data = DB::table('sale__item')
            ->where('item_id', $request->input('item_id'))
            ->get();

        $uom = DB::table('setup__uom')->get();
        // return $uom;
        $sales = DB::table('sale__order')->get();
        return view('SalesOrder.SalesOrderItemEdit', ['items' => $data, 'unit' => $uom, 'sales' => $sales]);
    }

    public function SalesOrderItemUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_description' => 'bail|required|string',
            'receive_date' => 'required',
            'delivery_date' => 'required',
            'uom_id' => 'required',
            'item_quantity' => 'required',
            'item_rate' => 'required',
            'gross_total' => 'required',
            'vat_total' => 'required',
            'net_total' => 'required',
            'time_interval' => 'required',
            'time_unit' => 'required',
            'cost_unit' => 'required',
            'total_time' => 'required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['success' => false, "validation" => false, 'message' => $validator->errors()->all()]);
        }

        date_default_timezone_set('Asia/Calcutta');
        $datetime = new DateTime();
        $date_now = $datetime->format('Y-m-d');
        $time_now = $datetime->format('H:i:s');
        $date_time = $datetime->format('Y-m-d') . ' ' . $datetime->format('H:i:s');
        $updated = DB::table('sale__item')
            ->where('item_id', $request->input('item_id'))
            ->update([
                'item_description' => $request->input('item_description'),
                'receive_date' => $request->input('receive_date'),
                'delivery_date' => $request->input('delivery_date'),
                'uom_id' => $request->input('uom_id'),
                'item_quantity' => $request->input('item_quantity'),
                'item_rate' => $request->input('item_rate'),
                'gross_total' => $request->input('gross_total'),
                'vat_total' => $request->input('vat_total'),
                'net_total' => $request->input('net_total'),
                'time_interval' => $request->input('time_interval'),
                'time_unit' => $request->input('time_unit'),
                'cost_unit' => $request->input('cost_unit'),
                'total_time' => $request->input('total_time'),
                'item_note' => $request->input('item_note'),
                'sale_order_id' => $request->input('sales_order_id'),
                'created_at' => $date_time,
            ]);

        if ($updated == 1) {
            return response()->json(['success' => true, 'message' => 'Sales Order Details
            has been updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

    // SalesOrderItemRemove
    public function SalesOrderItemRemove(Request $request)
    {
        $removed = DB::table('sale__item')
            ->where('item_id', $request->input('item_id'))
            ->delete();

        if ($removed == 1) {
            return response()->json(['success' => true, 'message' => 'Sales Order Details
            has been removed successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function SalesInquiryEdit(Request $request, $inquiry_id)
    {
        $data = DB::table('sales__inquiry')
            ->where('inquiry_id', $inquiry_id)
            ->get();

        $clients = DB::table('client')->get();

        $Employees = DB::table('employee__personal_detail')->get();

        $uom = DB::table('setup__uom')->get();
        return view('SalesInquiry.SalesInquiryEdit', ['sales' => $data, 'uom' => $uom, 'clients' => $clients, 'Employees' => $Employees, 'inquiry_id' => $inquiry_id]);
    }

    // Document add or Delete

    public function SalesOrderItemFileShow(Request $request)
    {
        // die("# ".$request->input('inquiry_id'));
        $files = DB::table("sale__item_attachment")
            ->where('item_id', $request->input('item_id'))
            ->get();
        $files = json_decode($files);
        return $files;
    }
    public function SalesOrderItemFileStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_id' => 'bail|required',
            'attachment' => 'required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['success' => false, "validation" => false, 'message' => $validator->errors()->all()]);
        }
        // die("# ".$request->input('inquiry_id'));
        $FileNameWithExt = $FileName = $FileNameToStore = $File = "";
        if ($request->hasfile('attachment')) {
            $data = [];
            foreach ($request->file('attachment') as $File) {
                $FileNameWithExt = $File->getClientOriginalName();
                $FileName = pathinfo($FileNameWithExt, PATHINFO_FILENAME);
                $FileNameToStore = $FileName . '_' . mt_rand(100, 99999) . uniqid() . '.' . $File->extension();
                $File->move('public/SalesOrder/Detail/', $FileNameToStore);
                $data[] = [
                    'attachment_file' => $FileNameToStore,
                    'item_id' => $request->input('item_id'),
                ];
            }
            $attachment_added = DB::table("sale__item_attachment")->insert($data);
        }

        if ($attachment_added == 1) {
            return response()->json(['success' => true, 'message' => 'Inquiry document has been uploaded successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Ooops Somthing went Wrong! please check']);
        }
    }
    public function SalesOrderItemFileRemove(Request $request)
    {
        // sales inquiry item remove with attachments
        $attachments = DB::table('sale__item_attachment')
            ->where('attachment_id', $request->input('attachment_id'))
            ->get();
        if (count($attachments) > 0) {
            foreach ($attachments as $attachment) {
                if (file_exists('public/SalesOrder/Detail/' . $attachment->attachment_file) and !empty($attachment->attachment_file)) {
                    unlink('public/SalesOrder/Detail/' . $attachment->attachment_file);
                }
            }
        }
        $removed = DB::table('sale__item_attachment')
            ->where('attachment_id', $request->input('attachment_id'))
            ->delete();
        if ($removed == 1) {
            return response()->json(['success' => true, 'message' => 'Inquiry document has been removed successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
}
