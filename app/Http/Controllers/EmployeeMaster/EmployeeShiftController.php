<?php

namespace App\Http\Controllers\EmployeeMaster;

use App\Http\Controllers\Controller;
use Datatables;
use DB;
use Illuminate\Http\Request;

class EmployeeShiftController extends Controller
{
    public function Shift()
    {
        return view('EmployeeMaster.EmployeeShift');
    }
    public function ShiftStore(Request $request)
    {
        $employee_id = $request->input('employee_id');
        $document_category = $request->input('document_category');
        $document_name = $request->input('document_name');
        $attachment = $request->input('attachment');
        $document_expiry = $request->input('document_expiry');

        $NameWithExt = $FileName = $Extension = $NameToStore = $File = "";
        // echo $employee_id;
        // print_r($document_category);
        // print_r($document_name);

        if ($request->hasfile('attachment')) {
            $i = 0;
            foreach ($request->file('attachment') as $File) {

                $NameWithExt = $File->getClientOriginalName();
                $FileName = pathinfo($NameWithExt, PATHINFO_FILENAME);
                $NameToStore = $FileName . '_' . mt_rand(100, 99999) . '.' . $File->extension();
                $File->move('public/Employee', $NameToStore);
                $data = [
                    'employee_id' => 0,
                    'document_category' => '',
                    'document_name' => '',
                    'attachment' => $NameToStore,
                ];
                $created = DB::table("employee__documents")->insertGetId($data);

                $data2 = array(
                    'employee_id' => $request->input('employee_id'),
                    'document_category' => $document_category[$i],
                    'document_name' => $document_name[$i],
                    'document_expiry' => $document_expiry[$i],
                );
                $updated = DB::table("employee__documents")
                    ->where('document_id', $created)
                    ->update($data2);
                $i++;
            }
        }
        // print_r($data);
        // return $data;
        // die('#end');

        if ($updated == 1) {
            return response()->json(['success' => true, 'message' => 'Document uploaded successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function ShiftShow()
    {
        $data = DB::table('employee__personal_detail')->get();
        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '<a href="#" type="button" class="btn btn-success mx-1 btn-circle"><i class="fas fa-check"></i></a>';
            })
            ->addColumn('name', function ($data) {
                return $data->first_name . ' ' . $data->middle_name . ' ' . $data->last_name;
            })
            ->addColumn('shift_start', function ($data) {
                return '<input type="checkbox" class="shift_start_check" id="shift_start" name="shift_start[]" value="' . $data->employee_id . '" />';
            })
            ->addColumn('shift_end', function ($data) {
                return '<input type="checkbox" class="shift_end_check" id="shift_end" name="shift_end[]" value="' . $data->employee_id . '" />';
            })
            ->addColumn('break_start', function ($data) {
                return '<input type="checkbox" class="break_start_check" id="break_start" name="break_start[]" value="' . $data->employee_id . '" />';
            })
            ->addColumn('break_end', function ($data) {
                return '<input type="checkbox" class="break_end_check" id="break_end" name="break_end[]" value="' . $data->employee_id . '" />';
            })
            ->addColumn('start_time', function ($data) {
                return $data->employee_id;
            })
            ->addColumn('end_time', function ($data) {
                return $data->employee_id;
            })
            ->addColumn('total_length', function ($data) {
                return $data->employee_id;
            })
            ->rawColumns(['name','shift_start','shift_end','break_start','break_end','start_time','end_time','total_length','action'])
            ->make(true);
    }
    public function ShiftRemove(Request $request)
    {
        $documents = DB::table('employee__documents')
            ->where('document_id', $request->input('document_id'))
            ->get();
        $image = $documents[0]->attachment;

        if (count($documents) > 0) {
            $address = 'public/Employee/' . $documents[0]->attachment;
            if (is_file($address) && file_exists($address)) {
                // foreach ($documents as $row) {
                unlink('public/Employee/' . $documents[0]->attachment);
                // }
            }
        }
        $created = DB::table('employee__documents')
            ->where('document_id', $request->input('document_id'))
            ->delete();

        if ($created == 1) {
            return response()->json(['success' => true, 'message' => 'Document removed successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

}
