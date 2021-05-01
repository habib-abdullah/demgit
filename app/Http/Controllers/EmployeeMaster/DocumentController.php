<?php

namespace App\Http\Controllers\EmployeeMaster;

use App\Http\Controllers\Controller;
use Datatables;
use DB;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    //document show  function
    public function Document()
    {
        return view('EmployeeMaster.Document');
    }
    public function DocumentCreate()
    {
        $data = DB::table('employee__doc_cat')->get();
        $employees = DB::table('employee__personal_detail')
        ->get();
        return view('EmployeeMaster.DocumentCreate', ['categories' => $data, 'employees' => $employees]);
    }
    public function DocumentCreateId($employee_id)
    {
        $data = DB::table('employee__doc_cat')->get();
        $employees = DB::table('employee__personal_detail')
        // ->where('employee_id',$employee_id)
        ->get();
        return view('EmployeeMaster.DocumentCreate', ['categories' => $data, 'employees' => $employees,'employee_id' =>$employee_id]);
    }
    public function DocumentStore(Request $request)
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
    public function EmployeeList()
    {
        $data = DB::table('employee__personal_detail')->get();
        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                $url = url('/').'/'.'Admin/Employee/' . $data->employee_id . "/Documents";
                return
                '<a href="' . $url . '" type="button" class="btn btn-info btn-circle"><i class="fas fa-eye"></i></a>';
            })
            ->addColumn('Name', function ($data) {
                return $data->first_name . ' ' . $data->middle_name . ' ' . $data->last_name;
            })
            ->rawColumns(['Name', 'action'])
            ->make(true);

            // '<a href="/Employee/'  '/Documents" type="button" class="btn btn-info btn-circle"><i class="fas fa-eye"></i></a>';
    }
    public function EmployeeDocuments($employee_id)
    {
        $data = DB::table('employee__personal_detail')
            ->where('employee_id', $employee_id)
            ->get();
        return view('EmployeeMaster.EmployeeDocumentsList', ['employee' => $data[0]]);
    }
    public function EmployeeDocumentsShow(Request $request)
    {
        $emp_name = DB::table('employee__personal_detail')
            ->where('employee_id', $request->input('employee_id'))
            ->get();
        $data = DB::table('employee__documents')
            ->where('employee_id', $request->input('employee_id'))
            ->get();
        // return $data;
        return Datatables::of($data)
            ->addColumn('documents', function ($data) {
                return '<a href="'.url('/').'/public/Employee/' . $data->attachment . '" target="_blank" >' . $data->attachment . '</a>';
            })
            ->addColumn('action', function ($data) {
                return '<button type="button" onclick="DocumentRemove(' . $data->document_id . ')" class="btn btn-danger"><i class="fas fa-trash"></i></button>';
            })
            ->rawColumns(['documents','action'])
            ->make(true);
    }
    public function EmployeeDocumentsRemove(Request $request)
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
    public function DocumentCategory()
    {
        return view('EmployeeMaster.DocumentCategory');
    }
    public function DocumentCategoryShow()
    {
        $data = DB::table('employee__doc_cat')->get();
        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return
                '<button type="button" class="btn btn-danger" id=""
            onclick="DocumentCategoryRemove(' . $data->category_id . ')"><i class="fas fa-trash"></i>
            </button>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function DocumentCategoryStore(Request $request)
    {
        if ($request->input('cat_name') == '') {
            return response()->json(['success' => false, 'message' => 'Please enter category name']);
        }
        $created = DB::table('employee__doc_cat')
            ->insert(['category_name' => $request->input('cat_name')]);

        if ($created == 1) {
            return response()->json(['success' => true, 'message' => 'Category created successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function DocumentCategoryRemove(Request $request)
    {
        $created = DB::table('employee__doc_cat')
            ->where('category_id', $request->input('category_id'))
            ->delete();

        if ($created == 1) {
            return response()->json(['success' => true, 'message' => 'Category removed successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wrong, please check!']);
        }
    }
    public function documentcreateView()
    {
        return view('document.documentcreate');
    }

}