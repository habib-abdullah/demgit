<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Datatables;
use DateTime;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BankController extends Controller
{
    public function ClientBankShow(Request $request)
    {
        $data = DB::table('client__bank')
            ->where('client_id', $request->input("client_id"))
            ->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return
                '<button type="button" onclick="ClientBankEdit(' . $data->bank_id . ')" class="btn btn-warning btn-circle"><i class="fa fa-pen"></i></button>
            <button type="button" onclick="ClientBankRemove(' . $data->bank_id . ')" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></button>';
            })
            ->rawColumns(['action'])
            ->make(true);

        // <a href="Client-'.$data->client_id.'-Profile" class="btn btn-info btn-circle"><i class="fa fa-eye"></i></a>
    }
    public function ClientBankStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_id' => 'bail|required',
            'bank_name' => 'required|string',
            'account_name' => 'required|string',
            'account_number' => 'required',
            'bank_branch' => 'required',
            'bank_swift' => 'required',
            'bank_iban' => 'required',

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
        $created = DB::table("client__bank")
            ->insert([
                'client_id' => $request->input('client_id'),
                'bank_name' => $request->input('bank_name'),
                'account_name' => $request->input('account_name'),
                'account_number' => $request->input('account_number'),
                'bank_branch' => $request->input('bank_branch'),
                'bank_swift' => $request->input('bank_swift'),
                'bank_iban' => $request->input('bank_iban'),
                'created_at' => $date_time,
            ]);

        if ($created == 1) {
            return response()->json(['success' => true, 'message' => 'Bank addedd successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function ClientBankEdit(Request $request, $bank_id)
    {
        $client__bank = DB::table('client__bank')
            ->where('bank_id', $bank_id)
            ->get();

        $data = json_decode($client__bank);
        return $data;
    }

    public function ClientBankUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'banks_name' => 'bail|required|string',
            'accounts_name' => 'required|string',
            'accounts_number' => 'required',
            'banks_branch' => 'required',
            'banks_swift' => 'required',
            'banks_iban' => 'required',

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
        $updated = DB::table("client__bank")
            ->where('bank_id',$request->input('banks_id'))
            ->update([
                'bank_name' => $request->input('banks_name'),
                'account_name' => $request->input('accounts_name'),
                'account_number' => $request->input('accounts_number'),
                'bank_branch' => $request->input('banks_branch'),
                'bank_swift' => $request->input('banks_swift'),
                'bank_iban' => $request->input('banks_iban'),
                'updated_at' => $date_time,
            ]);

        if ($updated == 1) {
            return response()->json(['success' => true, 'message' => 'Bank has been updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function ClientBankRemove(Request $request)
    {
        $removed = DB::table('client__bank')
            ->where('bank_id', $request->input('bank_id'))
            ->delete();

        if ($removed == 1) {
            return response()->json(['success' => true, 'message' => 'Bank has been removed successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

}
