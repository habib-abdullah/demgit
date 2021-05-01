<?php

namespace App\Http\Controllers\SalesInquiry;

use App\Http\Controllers\Controller;
use Datatables;
use DateTime;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SalesInquiryController extends Controller
{
    //Purchse View
    public function SalesInquiry()
    {
        return view('SalesInquiry.SalesInquiry');
    }
    public function SalesInquiryCreate()
    {
        $client = DB::table('client')
            ->get();

        $Employee = DB::table('employee__personal_detail')
            ->get();
        return view('SalesInquiry.SalesInquiryCreate', ['client' => $client, 'Employee' => $Employee]);
    }

    // ---Purchse Show--- \\
    public function SalesInquiryShow()
    {
        $sales = DB::table('sales__inquiry')
            ->orderBy('sales__inquiry.inquiry_id','DESC')
            ->get();
        return Datatables::of($sales)
            ->addColumn('action', function ($sales) {
                return
                '<a href="Sales-Inquiry-' . $sales->inquiry_id . '-Estimation" class="btn btn-primary my-1 btn-circle">Est</a>
                <button type="button" onclick="SalesInquiryFileModal(' . $sales->inquiry_id . ')" class="btn btn-info btn-circle"><i class="fas fa-file"></i></button>
                <a href="SalesInquiry-' . $sales->inquiry_id . '-Edit" class="btn btn-warning btn-circle"><i class="fa fa-pen"></i></a>
                <button onclick="Remove(' . $sales->inquiry_id . ')" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></button>';
            })
            ->addColumn('inquiry_date', function ($sales) {
                return str_replace('T',' ',$sales->inquiry_date);
            })
            ->rawColumns(['action','inquiry_date'])
            ->make(true);
    }

    // Purchse Insert
    public function SalesInquiryStore(Request $request)
    {
        date_default_timezone_set('Asia/Calcutta');
        $datetime = new DateTime();
        $date_now = $datetime->format('Y-m-d');
        $time_now = $datetime->format('H:i:s');
        $date_time = $datetime->format('Y-m-d') . ' ' . $datetime->format('H:i:s');

        $validator = Validator::make($request->all(), [
            'inquiry_date' => 'required',
            'inquiry_response_date' => 'required',
            'client_id' => 'required',
            'employee_id' => 'required',
            'inquiry_person' => 'required',
            'inquiry_person_mobile' => 'required|numeric',
            'inquiry_person_email' => 'required',
            'inquiry_channel' => 'required',
            'inquiry_no' => 'required',
            'inquiry_subject' => 'required',
            'inquiry_note' => 'required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['success' => false, "validation" => false, 'message' => $validator->errors()->all()]);
        }
        // Insert Query
        $inquiry_id = DB::table('sales__inquiry')
            ->insertGetId([
                'inquiry_date' => $request->input('inquiry_date'),
                'inquiry_response_date' => $request->input('inquiry_response_date'),
                'inquiry_person' => $request->input('inquiry_person'),
                'inquiry_person_mobile' => $request->input('inquiry_person_mobile'),
                'inquiry_person_email' => $request->input('inquiry_person_email'),
                'inquiry_channel' => $request->input('inquiry_channel'),
                'inquiry_subject' => $request->input('inquiry_subject'),
                'inquiry_note' => $request->input('inquiry_note'),
                'inquiry_no' => $request->input('inquiry_no'),
                'client_id' => $request->input('client_id'),
                'employee_id' => $request->input('employee_id'),
                'created_at' => $date_time,
            ]);

        $FileNameWithExt = $FileName = $FileNameToStore = $File = "";
        if ($request->hasfile('inquiry_attachment')) {
            $data = [];
            foreach ($request->file('inquiry_attachment') as $File) {
                $FileNameWithExt = $File->getClientOriginalName();
                $FileName = pathinfo($FileNameWithExt, PATHINFO_FILENAME);
                $FileNameToStore = $FileName . '_' . mt_rand(100, 99999) . uniqid() . '.' . $File->extension();
                $File->move('public/Sales/', $FileNameToStore);
                $data[] = [
                    'attachment_file' => $FileNameToStore,
                    'inquiry_id' => $inquiry_id,
                ];
            }
            DB::table("sales__inquiry_attachments")->insert($data);
        }

        if ($inquiry_id != "") {
            return response()->json(['success' => true, 'message' => 'Sales inquiry has been added successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Ooops Somthing went Wrong']);
        }
    }

    public function SalesInquiryFileShow(Request $request)
    {
        // die("# ".$request->input('inquiry_id'));
        $files = DB::table("sales__inquiry_attachments")
        ->where('inquiry_id',$request->input('inquiry_id'))
        ->get();

        $files = json_decode($files);
        return $files;
    }
    public function SalesInquiryFileStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'inquiry_id' => 'bail|required',
            'inquiry_attachment' => 'required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['success' => false, "validation" => false, 'message' => $validator->errors()->all()]);
        }
        // die("# ".$request->input('inquiry_id'));
        $FileNameWithExt = $FileName = $FileNameToStore = $File = "";
        if ($request->hasfile('inquiry_attachment')) {
            $data = [];
            foreach ($request->file('inquiry_attachment') as $File) {
                $FileNameWithExt = $File->getClientOriginalName();
                $FileName = pathinfo($FileNameWithExt, PATHINFO_FILENAME);
                $FileNameToStore = $FileName . '_' . mt_rand(100, 99999) . uniqid() . '.' . $File->extension();
                $File->move('public/Sales/', $FileNameToStore);
                $data[] = [
                    'attachment_file' => $FileNameToStore,
                    'inquiry_id' => $request->input('inquiry_id'),
                ];
            }
            $attachment_added = DB::table("sales__inquiry_attachments")->insert($data);
        }

        if ($attachment_added == 1) {
            return response()->json(['success' => true, 'message' => 'Inquiry document has been uploaded successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Ooops Somthing went Wrong! please check']);
        }
    }
    public function SalesInquiryFileRemove(Request $request)
    {
        // sales inquiry item remove with attachments
        $attachments = DB::table('sales__inquiry_attachments')
            ->where('attachment_id', $request->input('attachment_id'))
            ->get();
        if(count($attachments) > 0){
            foreach($attachments as $attachment){
                if (file_exists('public/Sales/' . $attachment->attachment_file) and !empty($attachment->attachment_file)) {
                    unlink('public/Sales/' . $attachment->attachment_file);
                }
            }
        }
        $removed = DB::table('sales__inquiry_attachments')
            ->where('attachment_id', $request->input('attachment_id'))
            ->delete();
        if ($removed == 1) {
            return response()->json(['success' => true, 'message' => 'Inquiry document has been removed successfully']);
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

    public function SalesInquiryUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'inquiry_date' => 'required',
            'inquiry_response_date' => 'required',
            'client_id' => 'required',
            'employee_id' => 'required',
            'inquiry_person' => 'required',
            'inquiry_person_mobile' => 'required|numeric',
            'inquiry_person_email' => 'required',
            'inquiry_channel' => 'required',
            'inquiry_no' => 'required',
            'inquiry_subject' => 'required',
            'inquiry_note' => 'required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->all()]);
        }

        date_default_timezone_set('Asia/Calcutta');
        $datetime = new DateTime();
        $date_now = $datetime->format('Y-m-d');
        $time_now = $datetime->format('H:i:s');
        $date_time = $datetime->format('Y-m-d') . ' ' . $datetime->format('H:i:s');

        // return response()->json(['success' => true]);
        $updated = DB::table("sales__inquiry")
            ->where('inquiry_id', $request->input('inquiry_id'))
            ->update([
                'inquiry_date' => $request->input('inquiry_date'),
                'inquiry_response_date' => $request->input('inquiry_response_date'),
                'inquiry_person' => $request->input('inquiry_person'),
                'inquiry_person_mobile' => $request->input('inquiry_person_mobile'),
                'inquiry_person_email' => $request->input('inquiry_person_email'),
                'inquiry_channel' => $request->input('inquiry_channel'),
                'inquiry_subject' => $request->input('inquiry_subject'),
                'inquiry_note' => $request->input('inquiry_note'),
                'inquiry_no' => $request->input('inquiry_no'),
                'client_id' => $request->input('client_id'),
                'employee_id' => $request->input('employee_id'),
                'updated_at' => $date_time,
            ]);
        if ($updated == 1) {
            return response()->json(['success' => true, 'message' => 'Client has been updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

    public function SalesInquiryRemove(Request $request)
    {
        // die($request->input('inquiry_id'));
        $items = DB::table('sales__inquiry_item')
            ->where('inquiry_id', $request->input('inquiry_id'))
            ->get();
            
        // remove items estimations
        if(count($items) > 0){
            foreach($items as $item){
                DB::table('sales__item_estimates')
                    ->where('item_id', $item->item_id)
                    ->delete();
            }
        }
        
        // sales inquiry item remove with attachments
        $inquiry_item_attachments = DB::table('sales__inquiry_item_attachments')
            ->where('inquiry_id', $request->input('inquiry_id'))
            ->get();
        if(count($inquiry_item_attachments) > 0){
            foreach($inquiry_item_attachments as $attachment){
                if (file_exists('public/Sales/Item/' . $attachment->attachment_file) and !empty($attachment->attachment_file)) {
                    unlink('public/Sales/Item/' . $attachment->attachment_file);
                }
            }
        }
        DB::table('sales__inquiry_item')
            ->where('inquiry_id', $request->input('inquiry_id'))
            ->delete();
        DB::table('sales__inquiry_item_attachments')
            ->where('inquiry_id', $request->input('inquiry_id'))
            ->delete();
        
        // sales inquiry remove with attachments
        $inquiry_attachments = DB::table('sales__inquiry_attachments')
            ->where('inquiry_id', $request->input('inquiry_id'))
            ->get();
        if(count($inquiry_attachments) > 0){
            foreach($inquiry_attachments as $attachment){
                if (file_exists('public/Sales/Item/' . $attachment->attachment_file) and !empty($attachment->attachment_file)) {
                    unlink('public/Sales/Item/' . $attachment->attachment_file);
                }
            }
        }
        DB::table('sales__inquiry_attachments')
            ->where('inquiry_id', $request->input('inquiry_id'))
            ->delete();
        $removed = DB::table('sales__inquiry')
            ->where('inquiry_id', $request->input('inquiry_id'))
            ->delete();
            // die("removed");
       
        if ($removed == 1) {
            return response()->json(['success' => true, 'message' => 'Salse Inquiry has been removed successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

    // SalesInquiryItemShow
    public function SalesInquiryItemShow(Request $request)
    {
        $sales = DB::table('sales__inquiry_item')
            ->select(
                'setup__uom.uom_name',
                'sales__inquiry_item.*',
            )
            ->leftjoin('setup__uom', 'setup__uom.uom_id', '=', 'sales__inquiry_item.uom_id')
            ->where('sales__inquiry_item.inquiry_id', $request->input('inquiry_id'))
            ->get();
        return Datatables::of($sales)
            ->addColumn('action', function ($sales) {
                return
                '<button class="btn btn-info btn-circle" onclick="SalesInquiryItemView(' . $sales->item_id . ')"><i class="fa fa-file"></i></button>
                <button class="btn btn-warning btn-circle" onclick="SalesInquiryItemEdit(' . $sales->item_id . ')"><i class="fa fa-pen"></i></button>
                <button class="btn btn-danger btn-circle" onclick="SalesInquiryItemRemove(' . $sales->item_id . ')"><i class="far fa-trash-alt"></i></button>';
            })
            ->make(true);
    }

    // Main Sales Item Crud
    public function SalesInquiryItemStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_descriptions' => 'bail|required|string',
            'item_quantity' => 'required|string',
            'item_unit' => 'required|string',
            // 'item_note' => 'required|string',
        ]);
        if (!$validator->passes()) {
            return response()->json(['success' => false, "validation" => false, 'message' => $validator->errors()->all()]);
        }

        date_default_timezone_set('Asia/Calcutta');
        $datetime = new DateTime();
        $date_now = $datetime->format('Y-m-d');
        $time_now = $datetime->format('H:i:s');
        $date_time = $datetime->format('Y-m-d') . ' ' . $datetime->format('H:i:s');

        $item_id = DB::table("sales__inquiry_item")->insertGetId([
            'item_description' => $request->input('item_descriptions'),
            'item_quantity' => $request->input('item_quantity'),
            'uom_id' => $request->input('item_unit'),
            'item_note' => $request->input('item_note'),
            'inquiry_id' => $request->input('inquiry_id'),
            'created_at' => $date_time,
        ]);
        // return $item_id;

        $FileNameWithExt = "";
        $FileName = "";
        $extension = "";
        $FileNameToStore = "";
        $File = "";

        if ($request->hasfile('item_attachment')) {
            $data = [];
            foreach ($request->file('item_attachment') as $file) {
                $ImageNameWithExt = $file->getClientOriginalName();
                $ImageName = pathinfo($ImageNameWithExt, PATHINFO_FILENAME);
                $name = $ImageName . '_' . mt_rand(100, 99999) . '.' . $file->extension();
                $file->move('public/Sales/Item/', $name);
                $data[] = [
                    'attachment_file' => $name,
                    'item_id' => $item_id,
                    'inquiry_id' => $request->input('inquiry_id'),
                ];
            }
            DB::table("sales__inquiry_item_attachments")
                ->insert($data);
        }

        if ($item_id != "") {
            return response()->json(['success' => true, 'message' => 'SalesInquiry addedd successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

    // SalesInquiryItemEdit
    public function SalesInquiryItemEdit(Request $request)
    {
        $data = DB::table('sales__inquiry_item')
            ->select('setup__uom.uom_name', 'sales__inquiry_item.*', )
            ->leftjoin('setup__uom', 'setup__uom.uom_id', '=', 'sales__inquiry_item.uom_id')
            ->where('item_id', $request->input('item_id'))
            ->get();
            
            $uom = DB::table('setup__uom')->get();
            return view('SalesInquiry.SalesInquiryItemEdit', ['data' => $data, 'uom' => $uom]);
    }
    public function SalesInquiryItemView(Request $request)
    {
        $data = DB::table('sales__inquiry_item_attachments')
            ->where('item_id', $request->input('item_id'))
            ->get();
        return view('SalesInquiry.SalesInquiryItemView', ['attachments' => $data]);
    }

    public function SalesInquiryItemUpdate(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'edit_item_description' => 'bail|required|string',
        //     'edit_item_quantity' => 'required|string',
        //     'edit_item_unit' => 'required|string',
        //     'edit_item_note' => 'required|string',
        // ]);
        // if (!$validator->passes()) {
        //     return response()->json(['success' => false, "validation" => false, 'message' => $validator->errors()->all()]);
        // }

        date_default_timezone_set('Asia/Calcutta');
        $datetime = new DateTime();
        $date_now = $datetime->format('Y-m-d');
        $time_now = $datetime->format('H:i:s');
        $date_time = $datetime->format('Y-m-d') . ' ' . $datetime->format('H:i:s');

        $item_id = DB::table("sales__inquiry_item")
            ->where('item_id',$request->input('item_id'))
            // ->where('inquiry_id',$request->input('inquiry_id'))
            ->update([
                'item_description' => $request->input('edit_item_description'),
                'item_quantity' => $request->input('edit_item_quantity'),
                'uom_id' => $request->input('edit_item_unit'),
                'item_note' => $request->input('edit_item_note'),
                'inquiry_id' => $request->input('inquiry_id'),
                'updated_at' => $date_time,
            ]);

        // $FileNameWithExt = "";
        // $FileName = "";
        // $extension = "";
        // $FileNameToStore = "";
        // $File = "";

        // if ($request->hasfile('edit_item_attachment')) {
        //     $data = [];
        //     foreach ($request->file('edit_item_attachment') as $file) {
        //         $ImageNameWithExt = $file->getClientOriginalName();
        //         $ImageName = pathinfo($ImageNameWithExt, PATHINFO_FILENAME);
        //         $name = $ImageName . '_' . mt_rand(100, 99999) . '.' . $file->extension();
        //         $file->move('public/Sales/Item/', $name);
        //         $data[] = [
        //             'attachment_file' => $name,
        //             'item_id' => 1,
        //             'inquiry_id' => $request->input('inquiry_id'),
        //         ];
        //     }
        //     $test = DB::table("sales__inquiry_item_attachments")
        //         ->where('attachment_id', $request->input('attachment_id'))
        //         ->update($data);
        // }
        // return $data;

        if ($item_id != "") {
            return response()->json(['success' => true, 'message' => 'Sales Inquiry updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

    // SalesInquiryItemRemove
    public function SalesInquiryItemRemove(Request $request)
    {
        $removed = DB::table('sales__inquiry_item')
            ->where('item_id', $request->input('item_id'))
            ->delete();

        if ($removed == 1) {
            return response()->json(['success' => true, 'message' => 'Department has been removed successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

    public function SalesInquiryItemDocumentRemove(Request $request){
        $removed = DB::table('sales__inquiry_item_attachments')
        ->where('attachment_id', $request->input('attachment_id'))
        ->delete();

    if ($removed == 1) {
        return response()->json(['success' => true, 'message' => 'Department has been removed successfully']);
    } else {
        return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
    }
    }

}
