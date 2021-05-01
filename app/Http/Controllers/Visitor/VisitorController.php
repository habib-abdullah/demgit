<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use DateTime;
use DB;
use Illuminate\Http\Request;
use Response;
use Validator;
use Yajra\Datatables\Datatables;

class VisitorController extends Controller
{
    public function Visitor()
    {
        $clients = DB::table('client')->get();
        $employees = DB::table('employee__personal_detail')->get();

        return view('Visitor.Visitor', ['clients' => $clients, 'employees' => $employees]);
    }
    public function VisitorStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'visitor_type' => 'bail|required',
            'visit_time' => 'required',
            // 'client_id' => 'required',
            'visitor_name' => 'required',
            'visitor_mobile' => 'required',
            'employee_id' => 'required',
            'visitor_purpose' => 'required',
            // 'visitor_note' => 'required',
            // 'attachment_file' => 'required',

        ]);
        if (!$validator->passes()) {
            return response()->json(['success' => false, "validation" => false, 'message' => $validator->errors()->all()]);
        }

        date_default_timezone_set('Asia/Calcutta');
        $datetime = new DateTime();
        $data_now = $datetime->format('Y-m-d');
        $date_time = $datetime->format('Y-m-d') . ' ' . $datetime->format('H:i:s');

        $created = DB::table('visitor__log')
            ->insertGetId([
                'visitor_type' => $request->input("visitor_type"),
                'visit_time' => $request->input("visit_time"),
                'client_id' => $request->input("client_id"),
                'visitor_name' => $request->input("visitor_name"),
                'visitor_mobile' => $request->input("visitor_mobile"),
                'employee_id' => $request->input("employee_id"),
                'visitor_purpose' => $request->input("visitor_purpose"),
                'visitor_note' => $request->input("visitor_note"),
                'created_at' => $date_time,
                'date_now' => $data_now,
            ]);

        $FileNameWithExt = $FileName = $Extension = $FileNameToStore = $File = "";

        $attachments = [];
        if ($request->hasfile('attachment_file')) {
            foreach ($request->file('attachment_file') as $file) {
                $FileNameWithExt = $file->getClientOriginalName();
                $FileName = pathinfo($FileNameWithExt, PATHINFO_FILENAME);
                $FileNameToStore = $FileName . '_' . mt_rand(100, 99999) . uniqid() . '.' . $file->extension();
                $file->move('public/Client/ClientLog/', $FileNameToStore);
                $attachments[] = [
                    'attachment_file' => $FileNameToStore,
                    'visitor_id' => $created,
                    'created_at' => $date_time,
                ];
            }
            DB::table("visitor__attachments")->insert($attachments);
        }
        if ($created != 0) {
            return response()->json(['success' => true, 'message' => 'Visitor has been added successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function VisitorShow(Request $request)
    {
        date_default_timezone_set('Asia/Calcutta');
        $datetime = new DateTime();
        $data_now = $datetime->format('Y-m-d');
        $date_time = $datetime->format('Y-m-d') . ' ' . $datetime->format('H:i:s');

        $from_date = $request->input('from_date');
        $end_date = $request->input('to_date');

        if (!empty($from_date)) {
            // $end_date = '';
            // if ($duration == 'today') {
            //     $from_date = $data_now;
            //     $end_date = $data_now;
            // }elseif($duration == 'yesterday') {
            //     $from_date = $data_now;
            //     $end_date = date('Y-m-d', strtotime('-1 days'));
            // }elseif($duration == 'seven_day') {
            //     $from_date = $data_now;
            //     $end_date = date('Y-m-d', strtotime('-7 days'));
            // }elseif($duration == 'thirty_day') {
            //     $from_date = $data_now;
            //     $end_date = date('Y-m-d', strtotime('-30 days'));
            // }
            // else {
            //     $from_date = $data_now;
            //     $end_date = $data_now;
            // }

            $visitors = DB::table('visitor__log')
                ->select(
                    'client.company_name',
                    'employee__personal_detail.first_name',
                    'employee__personal_detail.middle_name',
                    'employee__personal_detail.last_name',
                    'visitor__log.*',
                )
                ->leftjoin('client', 'client.client_id', '=', 'visitor__log.client_id')
                ->leftjoin('employee__personal_detail', 'employee__personal_detail.employee_id', 'visitor__log.employee_id')
                ->whereBetween('visitor__log.date_now', array($from_date, $end_date))
                ->orderBy('visitor__log.visitor_id', 'desc')
                ->get();
        } else {
            $visitors = DB::table('visitor__log')
                ->select(
                    'client.company_name',
                    'employee__personal_detail.first_name',
                    'employee__personal_detail.middle_name',
                    'employee__personal_detail.last_name',
                    'visitor__log.*',
                )
                ->leftjoin('client', 'client.client_id', '=', 'visitor__log.client_id')
                ->leftjoin('employee__personal_detail', 'employee__personal_detail.employee_id', 'visitor__log.employee_id')
                ->where('visitor__log.date_now', '=', $data_now)
                ->orderBy('visitor__log.visitor_id', 'desc')
                ->get();
        }
        return Datatables::of($visitors)
            ->addColumn('action', function ($visitors) {
                return
                '<button type="button" onclick="VisitorEdit(' . $visitors->visitor_id . ')" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></button>
                <a href="Visitor-Log-' . $visitors->visitor_id . '-View" class="btn btn-info btn-circle"><i class="fa fa-eye"></i></a>';
            })
            ->addColumn('employee_name', function ($visitors) {
                return $visitors->first_name . ' ' . $visitors->middle_name . ' ' . $visitors->last_name;
            })
            ->rawColumns(['action', 'employee_name'])
            ->make(true);

    }
    public function VisitorEdit(Request $request, $visitor_id)
    {
        $visitors = DB::table('visitor__log')
        // ->select(
        //     'client.company_name',
        //     'employee__personal_detail.first_name',
        //     'employee__personal_detail.middle_name',
        //     'employee__personal_detail.last_name',
        //     'visitor__log.*',
        // )
            ->leftjoin('client', 'client.client_id', '=', 'visitor__log.client_id')
            ->leftjoin('employee__personal_detail', 'employee__personal_detail.employee_id', 'visitor__log.employee_id')
            ->where('visitor__log.visitor_id', $visitor_id)
            ->get();
        $data = json_decode($visitors);
        return $data;
        // return view('Visitor.VisitorEdit', ["visitors" => $visitors[0]]);
    }
    public function VisitorUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'visitor_type' => 'bail|required',
            'visit_time' => 'required',
            // 'client_id' => 'required',
            'visitor_name' => 'required',
            'visitor_mobile' => 'required',
            'employee_id' => 'required',
            'visitor_purpose' => 'required',
            // 'visitor_note' => 'required',
            // 'attachment_file' => 'required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['success' => false, "validation" => false, 'message' => $validator->errors()->all()]);
        }

        date_default_timezone_set('Asia/Calcutta');
        $datetime = new DateTime();
        $date_now = $datetime->format('Y-m-d');
        $time_now = $datetime->format('H:i:s');
        $date_time = $datetime->format('Y-m-d') . ' ' . $datetime->format('H:i:s');

        $updated = DB::table("visitor__log")
            ->where('visitor_id', $request->input('visitor_id'))
            ->update([
                'visitor_type' => $request->input("visitor_type"),
                'visit_time' => $request->input("visit_time"),
                'client_id' => $request->input("client_id"),
                'visitor_name' => $request->input("visitor_name"),
                'visitor_mobile' => $request->input("visitor_mobile"),
                'employee_id' => $request->input("employee_id"),
                'visitor_purpose' => $request->input("visitor_purpose"),
                'visitor_note' => $request->input("visitor_note"),
                'updated_at' => $date_time,
            ]);

        if ($updated == 1) {
            return response()->json(['success' => true, 'message' => 'Visitor log has been updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function VisitorView(Request $request, $visitor_id)
    {
        $visitors = DB::table('visitor__log')
        // ->select(
        //     'client.company_name',
        //     'employee__personal_detail.first_name',
        //     'employee__personal_detail.middle_name',
        //     'employee__personal_detail.last_name',
        //     'visitor__log.*',
        // )
            ->leftjoin('client', 'client.client_id', '=', 'visitor__log.client_id')
            ->leftjoin('employee__personal_detail', 'employee__personal_detail.employee_id', 'visitor__log.employee_id')
            ->where('visitor__log.visitor_id', $visitor_id)
            ->get();
        $attachements = DB::table('visitor__attachments')
            ->where('visitor_id', $visitor_id)
            ->get();
        return view('Visitor.VisitorView',['visitors'=>$visitors,'attachements'=>$attachements]);
        // $data = json_decode($visitors);
        // return $data;
    }
    public function VisitorAttachemntRemove(Request $request)
    {
        $files_data = DB::table('visitor__attachments')
            ->where('attachment_id', $request->input('attachment_id'))
            ->get();

        // if(count($files_data) > 0){
        //     foreach ($files_data as $row) {
                if (file_exists('public/Client/ClientLog/' . $files_data[0]->attachment_file) and !empty($files_data[0]->attachment_file)) {
                    unlink('public/Client/ClientLog/' . $files_data[0]->attachment_file);
                }
        //     }
        // }

        $removed = DB::table('visitor__attachments')
            ->where('attachment_id', $request->input('attachment_id'))
            ->delete();
        if ($removed == 1) {
            return response()->json(['success' => true, 'message' => 'File has been removed successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
}
