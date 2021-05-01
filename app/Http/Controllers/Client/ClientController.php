<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Datatables;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DateTime;

class ClientController extends Controller
{
    public function ClientCountries()
    {
        // https://api.printful.com/countries
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.printful.com/countries');
        curl_setopt($curl, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        $response_decode = json_decode($response, true);

        return response()->json([$response_decode,$httpcode]);

        return view('Client.Client');
    }
    public function Client()
    {
        return view('Client.Client');
    }
    public function ClientCreate()
    {
        $data = DB::table('employee__doc_cat')->get();
        return view('Client.ClientCreate',['categories' => $data]);
    }
    public function ClientShow()
    {
        $data = DB::table('client')->get();
        return Datatables::of($data)
        ->addColumn('action',function($data)
        {
           return
            '<a href="Client-'.$data->client_id.'-Profile" class="btn btn-info btn-circle"><i class="fa fa-eye"></i></a>
            <a href="Client-'.$data->client_id.'-Documents" class="btn btn-primary btn-circle"><i class="fa fa-file"></i></a>
            <a href="Client-'.$data->client_id.'-Edit" class="btn btn-warning btn-circle"><i class="fa fa-pen"></i></a>
            <button type="button" value="" class="btn btn-danger" id="ClientRemove" 
            onclick="ClientRemove('.$data->client_id.')"><i class="fas fa-trash"></i>
            </button>';
        })
        ->addColumn('clientName',function($data)
        {
           return 
            '<a href="Client-'.$data->client_id.'-Profile"  class="">'.$data->client_name.'</a>';
        })
        ->rawColumns(['action','clientName'])
        ->make(true);

        // <a href="Client-'.$data->client_id.'-Profile" class="btn btn-info btn-circle"><i class="fa fa-eye"></i></a>
    }
    public function ClientStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_name' => 'bail|required|max:255',
            'company_name' => 'required|string|max:255',
            'code' => 'required|string',
            'company_address' => 'required|string',
            'company_state' => 'required|string|max:255',
            'pobox' => 'required|string',
            'company_fax' => 'required|string|max:255',
            'company_phone' => 'bail|numeric',
            'company_mobile' => 'required|numeric',
            'company_email' => 'required|string',
            'company_website' => 'required|string',
            'balance_limit' => 'required|string|max:255',
            'credit_duration' => 'required|string',
            'trade_license_register_authority' => 'required|string|max:255',
            'trade_license_number' => 'bail|required|max:255',
            'trade_license_issue_date' => 'required|string|max:255',
            'trade_license_expiry_date' => 'required|string',
            'trn_number' => 'required|string',
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
        $created = DB::table("client")
            ->insert([
                'client_type' => $request->input('client_type'),
                'client_name' => $request->input('client_name'),
                'company_name' => $request->input('company_name'),
                'client_code' => $request->input('code'),
                'client_address' => '',
                'company_address' => $request->input('company_address'),
                'company_state' => $request->input('company_state'),
                'company_country' => '',
                'pobox' => $request->input('pobox'),
                'client_mobile' => 0,
                'company_mobile' => $request->input('company_mobile'),
                'company_phone' => $request->input('company_phone'),
                'company_fax' => $request->input('company_fax'),
                'client_email' => '',
                'company_email' => $request->input('company_email'),
                'company_website' => $request->input('company_website'),
                'balance_limit' => $request->input('balance_limit'),
                'credit_duration' => $request->input('credit_duration'),
                'trade_license_register_authority' => $request->input('trade_license_register_authority'),
                'trade_license_number' => $request->input('trade_license_number'),
                'trade_license_issue_date' => $request->input('trade_license_issue_date'),
                'trade_license_expiry_date' => $request->input('trade_license_expiry_date'),
                'trn_number' => $request->input('trn_number'),
                'company_site' => $request->input('company_site'),
                'created_at'=> $date_time,
            ]);

        if ($created == 1) {
            return response()->json(['success' => true, 'message' => 'Client addedd successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function ClientEdit($client_id)
    {
        $clients = DB::table('client')
        ->where('client_id',$client_id)
        ->get();

        return view('Client.ClientEdit',["clients"=>$clients]);
    }
    public function ClientProfile($client_id)
    {
        $clients = DB::table('client')
        ->where('client_id',$client_id)
        ->get();

        $documents = DB::table('client__document')
        ->where('client_id',$client_id)
        ->get();

        // return $documents;
        return view('Client.ClientProfile',["clients"=>$clients, 'documents'=>$documents]);
    }
    public function ClientDocuments($client_id)
    {
        $clients = DB::table('client')
        ->where('client_id',$client_id)
        ->get();
        // return $clients;
        

        return view('Client.ClientDocuments',["clients"=>$clients]);
    }
    public function ClientDocumentStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_id' => 'required|numeric',
            'document_name' => 'required',
            'document_file' => 'required|max:2048',
        ]);
        if (!$validator->passes()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->all()]);
        }

        $client_id = $request->input('client_id');
        $document_name = $request->input('document_name');
        $document_file = $request->input('document_file');

        $NameWithExt = $FileName = $Extension = $NameToStore = $File = "";

        if ($request->hasfile('document_file')) {
            $i = 0;
            foreach ($request->file('document_file') as $File) {

                $NameWithExt = $File->getClientOriginalName();
                $FileName = pathinfo($NameWithExt, PATHINFO_FILENAME);
                $NameToStore = $FileName . '_' . mt_rand(100, 99999) . '.' . $File->extension();
                $File->move('./public/Client/ClientDocuments/', $NameToStore);

                $created = DB::table("client__document")->insert([
                    'client_id' => $request->input('client_id'),
                    'document_name' => $document_name[$i],
                    'document_file' => $NameToStore,
                ]);
                $i++;
            }
        }

        if ($created == 1) {
            return response()->json(['success' => true, 'message' => 'Document uploaded successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function Old_ClientDocumentStore(Request $request) //not in use
    {
        $validator = Validator::make($request->all(), [
            'trade_license' => 'required|max:2048',
            'trn_certificate' => 'required|max:2048',
            'chamber_of_commerce_certificate' => 'required|max:2048',
            'credit_application' => 'required|max:2048',
            'power_of_attorney' => 'required|max:2048',
        ]);
        if (!$validator->passes()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->all()]);
        }

        $fileNameWithExt5 = $filesName5 = $extension5 = $file5Store = $file5 = '';
        if ($request->hasFile('trade_license')) {
            $this->validate($request, [
                'trade_license' => 'required|max:2048',
            ]);
            $fileNameWithExt5 = $request->file('trade_license')->getClientOriginalName();
            $filesName5 = pathinfo($fileNameWithExt5, PATHINFO_FILENAME);
            $extension5 = $request->file('trade_license')->extension();
            $trade_license = $filesName5 . '_' . rand(99,99999999) . '.' . $extension5;
            $Image = $request->file('trade_license')->move('./public/Client/ClientDocuments/', $trade_license);
        }

        $fileNameWithExt1 = $filesName1 = $extension1 = $file1Store = $file1 = '';
        if ($request->hasFile('trn_certificate')) {
            $this->validate($request, [
                'trn_certificate' => 'required|max:2048',
            ]);
            $fileNameWithExt1 = $request->file('trn_certificate')->getClientOriginalName();
            $filesName1 = pathinfo($fileNameWithExt1, PATHINFO_FILENAME);
            $extension1 = $request->file('trn_certificate')->extension();
            $trn_certificate = $filesName1 . '_' . rand(99,99999999) . '.' . $extension1;
            $Image = $request->file('trn_certificate')->move('./public/Client/ClientDocuments/', $trn_certificate);
        }

        $fileNameWithExt2 = $filesName2 = $extension2 = $file2Store = $file2 = '';
        if ($request->hasFile('chamber_of_commerce_certificate')) {
            $this->validate($request, [
                'chamber_of_commerce_certificate' => 'required|max:2048',
            ]);
            $fileNameWithExt2 = $request->file('chamber_of_commerce_certificate')->getClientOriginalName();
            $filesName2 = pathinfo($fileNameWithExt2, PATHINFO_FILENAME);
            $extension2 = $request->file('chamber_of_commerce_certificate')->extension();
            $chamber_of_commerce_certificate = $filesName2 . '_' . rand(99,99999999) . '.' . $extension2;
            $Image = $request->file('chamber_of_commerce_certificate')->move('./public/Client/ClientDocuments/', $chamber_of_commerce_certificate);
        }
        
        $fileNameWithExt3 = $filesName3 = $extension3 = $file3Store = $file3 = '';
        if ($request->hasFile('credit_application')) {
            $this->validate($request, [
                'credit_application' => 'required|max:2048',
            ]);
            $fileNameWithExt3 = $request->file('credit_application')->getClientOriginalName();
            $filesName3 = pathinfo($fileNameWithExt3, PATHINFO_FILENAME);
            $extension3 = $request->file('credit_application')->extension();
            $credit_application = $filesName3 . '_' . rand(99,99999999) . '.' . $extension3;
            $Image = $request->file('credit_application')->move('./public/Client/ClientDocuments/', $credit_application);
        }

        $fileNameWithExt4 = $filesName4 = $extension4 = $file4Store = $file4 = '';
        if ($request->hasFile('power_of_attorney')) {
            $this->validate($request, [
                'power_of_attorney' => 'required|max:2048',
            ]);
            $fileNameWithExt4 = $request->file('power_of_attorney')->getClientOriginalName();
            $filesName4 = pathinfo($fileNameWithExt4, PATHINFO_FILENAME);
            $extension4 = $request->file('power_of_attorney')->extension();
            $power_of_attorney = $filesName4 . '_' . rand(99,99999999) . '.' . $extension4;
            $Image = $request->file('power_of_attorney')->move('./public/Client/ClientDocuments/', $power_of_attorney);
        }
        // if ($request->file('trade_license')->isValid()) { // try this also
        //     dd('write code here');
        // }

        date_default_timezone_set('Asia/Calcutta');
        $datetime = new DateTime();
        $date_time = $datetime->format('Y-m-d').' '.$datetime->format('H:i:s');

        $created = DB::table('client__document')
        ->insert([
            'client_id' => $request->input('client_id'),
            'trade_license' => $trade_license,
            'trn_certificate' => $trn_certificate,
            'chamber_of_commerce_certificate' => $chamber_of_commerce_certificate,
            'credit_application' => $credit_application,
            'power_of_attorney' => $power_of_attorney,
            'created_at' => $date_time,
        ]);

        if ($created == 1) {
            return response()->json(['success' => true, 'message' => 'Client documents has been uploaded successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }

        return view('Client.ClientDocuments',["clients"=>$clients]);
    }
    public function ClientUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_name' => 'bail|required|max:255',
            'company_name' => 'required|string|max:255',
            'code' => 'required|string',
            'company_address' => 'required|string',
            'company_state' => 'required|string|max:255',
            'pobox' => 'required|string',
            'company_fax' => 'required|string|max:255',
            'company_phone' => 'bail|numeric',
            'company_mobile' => 'required|numeric',
            'company_email' => 'required|string',
            'company_website' => 'required|string',
            'balance_limit' => 'required|string|max:255',
            'credit_duration' => 'required|string',
            'trade_license_register_authority' => 'required|string|max:255',
            'trade_license_number' => 'bail|required|max:255',
            'trade_license_issue_date' => 'required|string|max:255',
            'trade_license_expiry_date' => 'required|string',
            'trn_number' => 'required|string',
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
        $updated = DB::table("client")
        ->where('client_id',$request->input('client_id'))
            ->update([
                'client_type' => $request->input('client_type'),
                'client_name' => $request->input('client_name'),
                'company_name' => $request->input('company_name'),
                'client_code' => $request->input('code'),
                'client_address' => '',
                'company_address' => $request->input('company_address'),
                'company_state' => $request->input('company_state'),
                'company_country' => '',
                'pobox' => $request->input('pobox'),
                'client_mobile' => 0,
                'company_mobile' => $request->input('company_mobile'),
                'company_phone' => $request->input('company_phone'),
                'company_fax' => $request->input('company_fax'),
                'client_email' => '',
                'company_email' => $request->input('company_email'),
                'company_website' => $request->input('company_website'),
                'balance_limit' => $request->input('balance_limit'),
                'credit_duration' => $request->input('credit_duration'),
                'trade_license_register_authority' => $request->input('trade_license_register_authority'),
                'trade_license_number' => $request->input('trade_license_number'),
                'trade_license_issue_date' => $request->input('trade_license_issue_date'),
                'trade_license_expiry_date' => $request->input('trade_license_expiry_date'),
                'trn_number' => $request->input('trn_number'),
                'company_site' => $request->input('company_site'),
                'status' => $request->input('client_status'),
                'updated_at'=> $date_time,
            ]);

        if ($updated == 1) {
            return response()->json(['success' => true, 'message' => 'Client has been updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function ClientRemove(Request $request)
    {
        $removed = DB::table('client')
            ->where('client_id', $request->input('client_id'))
            ->delete();

        if ($removed == 1) {
            return response()->json(['success' => true, 'message' => 'Client has been removed successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

    // Main Client Document Remove
    public function ClientdocumentRemove(Request $request,$document_id){
        // die($document_id);
        $documents = DB::table('client__document')
        ->where('document_id', $document_id)
        ->get();
        if (!empty($documents[0]->document_file) and file_exists('public/Client/ClientDocuments/' . $documents[0]->document_file)) {
            unlink('public/Client/ClientDocuments/' . $documents[0]->document_file);
        }
        $remove = DB::table('client__document')
        ->where('document_id', $document_id)
        ->delete();
        if ($remove == 1) {
            return response()->json(['success' => true, 'message' => 'Document has been removed successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }

}