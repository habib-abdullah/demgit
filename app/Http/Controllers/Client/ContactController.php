<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Datatables;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DateTime;

class ContactController extends Controller
{
    public function ClientContactShow(Request $request)
    {
        $data = DB::table('client__contact')
        ->where('client_id',$request->input("client_id"))
        ->get();

        return Datatables::of($data)
        ->addColumn('action',function($data)
        {
           return 
            '<button type="button" onclick="ClientContactEdit('.$data->contact_id.')" class="btn btn-warning btn-circle"><i class="fa fa-pen"></i></button>
            <button type="button" onclick="ClientContactRemove('.$data->contact_id.')" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></button>';
        })
        ->rawColumns(['action'])
        ->make(true);

        // <a href="Client-'.$data->client_id.'-Profile" class="btn btn-info btn-circle"><i class="fa fa-eye"></i></a>
    }
    public function ClientContactStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_id' => 'bail|required',
            'title' => 'required|string',
            'contact_name' => 'required|string',
            'contact_alias' => 'required|string',
            'contact_mobile' => 'required',
            'contact_phone' => 'required',
            'contact_ext' => 'required|string',
            'contact_email' => 'required|email',
            'contact_designation' => 'required|string',
            'contact_department' => 'required|string',
        ]);
        if (!$validator->passes()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->all()]);
        }

        date_default_timezone_set('Asia/Calcutta');
        $datetime = new DateTime();
        $date_now = $datetime->format('Y-m-d');
        $time_now = $datetime->format('H:i:s');
        $date_time = $datetime->format('Y-m-d').' '.$datetime->format('H:i:s');

        // return response()->json(['success' => true]);
        $created = DB::table("client__contact")
            ->insert([
                'client_id' => $request->input('client_id'),
                'title' => $request->input('title'),
                'contact_name' => $request->input('contact_name'),
                'contact_alias' => $request->input('contact_alias'),
                'contact_mobile' => $request->input('contact_mobile'),
                'contact_phone' => $request->input('contact_phone'),
                'contact_ext' => $request->input('contact_ext'),
                'contact_email' => $request->input('contact_email'),
                'contact_designation' => $request->input('contact_designation'),
                'contact_department' => $request->input('contact_department'),
                'created_at'=> $date_time,
            ]);

        if ($created == 1) {
            return response()->json(['success' => true, 'message' => 'Contact addedd successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function ClientContactEdit(Request $request,$contact_id)
    {
        $client__contact = DB::table('client__contact')
        ->where('contact_id',$contact_id)
        ->get();

        $data = json_decode($client__contact);
        return $data;
    }
    public function ClientContactUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'contacts_id' => 'bail|required',
            'contacts_designation' => 'required|string',
            'titles' => 'required|string',
            'contacts_name' => 'required',
            'contacts_alias' => 'required',
            'contacts_mobile' => 'required',
            'contacts_phone' => 'required',
            'contacts_ext' => 'required',
            'contacts_email' => 'required|email',
            'contacts_department' => 'required|string',
        ]);
        if (!$validator->passes()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->all()]);
        }

        date_default_timezone_set('Asia/Calcutta');
        $datetime = new DateTime();
        $date_now = $datetime->format('Y-m-d');
        $time_now = $datetime->format('H:i:s');
        $date_time = $datetime->format('Y-m-d').' '.$datetime->format('H:i:s');

        // return response()->json(['success' => true]);
        $updated = DB::table("client__contact")
        ->where('contact_id',$request->input('contacts_id'))
            ->update([
                'contact_designation' => $request->input('contacts_designation'),
                'title' => $request->input('titles'),
                'contact_name' => $request->input('contacts_name'),
                'contact_alias' => $request->input('contacts_alias'),
                'contact_mobile' => $request->input('contacts_mobile'),
                'contact_phone' => $request->input('contacts_phone'),
                'contact_ext' => $request->input('contacts_ext'),
                'contact_email' => $request->input('contacts_email'),
                'contact_department' => $request->input('contacts_department'),
                'updated_at'=> $date_time,
            ]);

        if ($updated == 1) {
            return response()->json(['success' => true, 'message' => 'Contact has been updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function ClientContactRemove(Request $request)
    {
        $removed = DB::table('client__contact')
            ->where('contact_id',$request->input('contact_id'))
            ->delete();

        if ($removed == 1) {
            return response()->json(['success' => true, 'message' => 'Contact has been removed successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

}