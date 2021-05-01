@extends('layout')

@section('content')
<link rel="stylesheet" href="{{url('Croppie/croppie.css')}}" />
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Custom Tabs -->
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">
                            <a href="{{route('Employe-Master-Show')}}" style="font-size: 18px;"><i
                                    class="fas fa-arrow-circle-left"></i></a> Add Employee Detail
                        </h3>
                    </div>

                    <div class="card-header d-flex p-0">
                        <!-- <h3 class="card-title p-3">Tabs</h3> -->
                        <ul class="nav nav-pills mr-auto p-2">
                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Profile</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Personal info</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Passport
                                    details</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Residency
                                    details</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">MOL record</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_6" data-toggle="tab">Health</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_7" data-toggle="tab">Contact Info</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#tab_8" data-toggle="tab">Bank details</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#tab_9" data-toggle="tab">Company & Login
                                    Details</a></li>

                            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                  Dropdown <span class="caret"></span>
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" tabindex="-1" href="#">Action</a>
                  <a class="dropdown-item" tabindex="-1" href="#">Another action</a>
                  <a class="dropdown-item" tabindex="-1" href="#">Something else here</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" tabindex="-1" href="#">Separated link</a>
                </div>
              </li> -->
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <form id="EmployeeStore" enctype="multipart/form-data">
                            <div class="tab-content">
                                @csrf
                                <!-- /.tab-pane -->
                                <div class="tab-pane active " id="tab_1">
                                    <input type="hidden" class="form-control" value="{{$rows->employee_id}}"
                                        id="employee_id" name="employee_id">
                                    <div class="form-row justify-content-center mt-3">
                                        <div class="form-group col-md-4 mt-3">
                                            <div id="image-preview" class="mt-3"></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center ml-5">
                                        <div class="form-group col-md-4">
                                            <input type="file" name="upload_image" id="upload_image"
                                                accept="image/x-png,image/jpeg" />
                                            <div class="profile_img_err_msg"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">
                                    <div class="form-row justify-content-center mt-5">
                                        <div class="form-group col-md-4">
                                            <label>Employee Type</label>
                                            <input type="text" class="form-control type_err required"
                                                name="employee_type" id="employee_type"
                                                value="{{$rows->employee_type}}">
                                            <!--  -->
                                            <div class="type_err_msg"></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Designation</label>
                                            <select name="employee_designation" id="employee_designation"
                                                class="form-control Designation_err">
                                                <option disabled>Select</option>
                                                @if(count($designation) > 0)
                                                @foreach($designation as $designationRow)
                                                @if($rows->designation_id == $designationRow->designation_id)
                                                <option selected
                                                    value="{{$designationRow->designation_name}}:{{$designationRow->designation_id}}">
                                                    {{$designationRow->designation_name}}</option>
                                                @else
                                                <option
                                                    value="{{$designationRow->designation_name}}:{{$designationRow->designation_id}}">
                                                    {{$designationRow->designation_name}}</option>
                                                @endif
                                                @endforeach
                                                @endif
                                            </select>
                                            <div class="Designation_err_msg"></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>First Name</label>
                                            <input type="text" class="form-control fname_err required" name="first_name"
                                                id="first_name" value="{{$rows->first_name}}">
                                            <div class="fname_err_msg"></div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Middle Name</label>
                                            <input type="text" class="form-control mname_err required"
                                                name="middle_namae" id="emp_mname" value="{{$rows->middle_name}}">
                                            <div class="mname_err_msg"></div>
                                        </div>

                                    </div>
                                    <div class="form-row justify-content-center mt-2">

                                        <div class="form-group col-md-4">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control lname_err required" name="last_name"
                                                id="last_name" value="{{$rows->last_name}}">
                                            <div class="lname_err_msg"></div>
                                        </div>
                                        <div class="form-group col-md-4 clearfix">
                                            <label>Gender</label>
                                            <br>
                                            @if($rows->gender == 'Male')
                                            <div class="icheck-primary d-inline">
                                                <label>Male</label>
                                                <input type="radio" id="gender" name="gender" value="Male" checked>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <label>Female</label>
                                                <input type="radio" id="gender" name="gender" value="Female">
                                            </div>
                                            @else
                                            <div class="icheck-primary d-inline">
                                                <label>Male</label>
                                                <input type="radio" id="gender" name="gender" value="Male">
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <label>Female</label>
                                                <input type="radio" id="gender" name="gender" value="Female" checked>
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Date Of Birth</label>
                                            <input type="date" class="form-control dob_err required" name="employee_dob"
                                                id="employee_dob" value="{{$rows->birth_date}}">
                                            <div class="dob_err_msg"></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Nationality</label>
                                            <input type="text" class="form-control nationality_err required"
                                                name="employee_nationality" id="employee_nationality"
                                                value="{{$rows->nationality}}">
                                            <div class="nationality_err_msg"></div>
                                        </div>
                                    </div>

                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Marital Status</label>
                                            <!-- <input type="text" class="form-control marital_status_err" name="emp_marital_status"
                      id="emp_marital_status" placeholder="Marital Status"> -->
                                            <select name="marital_status" id="marital_status"
                                                class="form-control marital_status_err">
                                                <option disabled>Select</option>
                                                @if($rows->marital_status == 'unmarried')
                                                <option selected value="unmarried">Unmarried</option>
                                                <option value="married">Married</option>
                                                <option value="divorced">divorced</option>
                                                @elseif($rows->marital_status == 'married')
                                                <option value="unmarried">Unmarried</option>
                                                <option selected value="married">Married</option>
                                                <option value="divorced">divorced</option>
                                                @else
                                                <option value="unmarried">Unmarried</option>
                                                <option value="married">Married</option>
                                                <option selected value="divorced">divorced</option>
                                                @endif
                                            </select>
                                            <div class="marital_status_err_msg"></div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Visa Issued From</label>
                                            <input type="text" class="form-control visa_err required"
                                                name="employee_visa" id="employee_visa"
                                                value="{{$rows->visa_Issued_from}}">
                                            <div class="visa_err_msg"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_3">
                                    <div class="form-row justify-content-center mt-5">
                                        <div class="form-group col-md-4">
                                            <label>Passport No</label>
                                            <input type="text" class="form-control required" name="passport_no"
                                                id="passport_no" value="{{$rows->passport_no}}">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Passport Issued Place</label>
                                            <input type="text" class="form-control nationality_er requiredr"
                                                name="passport_issude_place" id="passport_issude_place"
                                                value="{{$rows->passport_issue_place}}">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Passport Issue Date</label>
                                            <input type="date" class="form-control required" name="passport_issue_date"
                                                id="passport_issue_date" value="{{$rows->passport_issue_date}}">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Passport Expiry Date</label>
                                            <input type="date" class="form-control required" name="passport_expiry_date"
                                                id="passport_expiry_date" value="{{$rows->passport_expiry_date}}">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-8">
                                            <label>Permanent Address In Passport</label>
                                            <input type="text" class="form-control required"
                                                name="permanent_address_in_passport" id="permanent_address_in_passport"
                                                value="{{$rows->permanent_add_in_passport}}">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Father Name</label>
                                            <input type="text" class="form-control required" name="father_name"
                                                id="father_name" value="{{$rows->father_name}}">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Mother Name</label>
                                            <input type="text" class="form-control required" name="mother_name"
                                                id="mother_name" value="{{$rows->mother_name}}">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>PP Personal No.</label>
                                            <input type="text" class="form-control required" name="pp_personal_no"
                                                id="pp_personal_no" value="{{$rows->pp_personal_no}}">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>NIC Card No</label>
                                            <input type="text" class="form-control required" name="nic_card_no"
                                                id="nic_card_no" value="{{$rows->nic_card_no}}">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>NIC Expiry</label>
                                            <input type="date" class="form-control required" name="nic_expiry"
                                                id="nic_expiry" value="{{$rows->nic_expiry}}">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane" id="tab_4">
                                    <div class="form-row justify-content-center mt-5">
                                        <div class="form-group col-md-4">
                                            <label>Entry Permit No</label>
                                            <input type="text" class="form-control required" name="entry_permit_no"
                                                id="entry_permit_no" value="{{$rows->entry_permit_no}}">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Entry Permit Date</label>
                                            <input type="date" class="form-control required" name="entry_permit_date"
                                                id="entry_permit_date" value="{{$rows->entry_permit_date}}">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>UID No</label>
                                            <input type="text" class="form-control required" name="uid_no" id="uid_no"
                                                value="{{$rows->uid_no}}">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>File No</label>
                                            <input type="text" class="form-control required" name="file_no" id="file_no"
                                                value="{{$rows->file_no}}">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Profession In Residence</label>
                                            <input type="text" class="form-control required"
                                                name="profession_in_residence" id="profession_in_residence"
                                                value="{{$rows->profession_in_residence}}">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Residence Issue Date</label>
                                            <input type="date" class="form-control required" name="residence_issue_date"
                                                id="residence_issue_date" value="{{$rows->residence_issude_date}}">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Residence Expiry Date</label>
                                            <input type="date" class="form-control required"
                                                name="residence_expiry_date" id="residence_expiry_date"
                                                value="{{$rows->residence_expiry_date}}">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Emirates Id No</label>
                                            <input type="text" class="form-control required" name="emirate_id_no"
                                                id="emirate_id_no" value="{{$rows->emirate_id_no}}">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Emirates Id Expiry Date</label>
                                            <input type="date" class="form-control required" name="emirate_id_expiry"
                                                id="emirate_id_expiry" value="{{$rows->emirate_id_expiry}}">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>E Id Card No</label>
                                            <input type="text" class="form-control required" name="e_id_card_no"
                                                id="e_id_card_no" value="{{$rows->e_id_card_no}}">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_5">

                                    <div class="form-row justify-content-center mt-5">
                                        <div class="form-group col-md-4">
                                            <label>Work Permit No</label>
                                            <input type="text" class="form-control required" name="work_permit_no"
                                                id="work_permit_no" value="{{$rows->work_permit_no}}">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Personal No</label>
                                            <input type="text" class="form-control required" name="personal_no"
                                                id="personal_no" value="{{$rows->personal_no}}">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Work Permit Expiry</label>
                                            <input type="date" class="form-control required" name="work_permit_expiry"
                                                id="work_permit_expiry" value="{{$rows->work_permit_expiry}}">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane" id="tab_6">
                                    <div class="form-row justify-content-center mt-5">
                                        <div class="form-group col-md-4">
                                            <label>Blood Group</label>
                                            <input type="text" class="form-control required" name="blood_group"
                                                id="blood_group" value="{{$rows->blood_group}}">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Height</label>
                                            <input type="text" class="form-control required" name="employee_height"
                                                id="employee_height" value="{{$rows->height}}">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-8">
                                            <label>Medical Issues</label>
                                            <input type="text" class="form-control required" name="medical_issues"
                                                id="medical_issues" value="{{$rows->medical_issues}}">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_7">

                                    <div class="form-row justify-content-center mt-5">
                                        <div class="form-group col-md-4">
                                            <label>Contact</label>
                                            <input type="text" class="form-control required" name="employee_contact"
                                                id="employee_contact" value="{{$rows->contact}}">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Whatsapp No</label>
                                            <input type="number" class="form-control required"
                                                name="employee_whatsapp_no" id="employee_whatsapp_no"
                                                value="{{$rows->whatsapp_no}}">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>IMO No</label>
                                            <input type="text" class="form-control required" name="employee_imo_no"
                                                id="employee_imo_no" value="{{$rows->imo_no}}">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Facebook</label>
                                            <input type="text" class="form-control required" name="employee_facebook"
                                                id="employee_facebook" value="{{$rows->facebook}}">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center my-2">
                                        <div class="form-group col-md-8">
                                            <h4 class="modal-title">Relative Contacts In UAE</h4>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Permanent Contact Name</label>
                                            <input type="text" class="form-control required"
                                                name="permanent_contact_name" id="permanent_contact_name"
                                                value="{{$rows->permanent_contact_name}}">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Permanent Contact Number</label>
                                            <input type="text" class="form-control required"
                                                name="permanent_contact_number" id="permanent_contact_number"
                                                value="{{$rows->permanent_contact_no}}">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Permanent Contact Relation</label>
                                            <input type="text" class="form-control required"
                                                name="permanent_contact_relation" id="permanent_contact_relation"
                                                value="{{$rows->permanent_contact_relation}}">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>UAE Emergency Contact Name</label>
                                            <input type="text" class="form-control required"
                                                name="uae_emergency_contact_name" id="uae_emergency_contact_name"
                                                value="{{$rows->uae_emergency_contact_name}}">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>UAE Emergency Contact No</label>
                                            <input type="text" class="form-control required"
                                                name="uae_emergency_contact_no" id="uae_emergency_contact_no"
                                                value="{{$rows->uae_emergency_contact_no}}">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-8">
                                            <label>Emergency Cont. Per. Address</label>
                                            <input type="text" class="form-control required"
                                                name="emergency_contact_per_address" id="emergency_contact_per_address"
                                                value="{{$rows->uae_emergency_contact_address}}">
                                            <div class=""></div>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane" id="tab_8">
                                    <div class="form-row justify-content-center mt-5">
                                        <div class="form-group col-md-4">
                                            <label>Bank Name</label>
                                            <input type="text" class="form-control required" name="bank_name"
                                                id="bank_name" value="{{$bank[0]->bank_name ?? ''}}">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Branch</label>
                                            <input type="text" class="form-control required" name="branch_name"
                                                id="branch_name" value="{{$bank[0]->branch_name ?? ''}}">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Account Name</label>
                                            <input type="text" class="form-control required" name="account_name"
                                                id="account_name" value="{{$bank[0]->account_name ?? ''}}">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Account No</label>
                                            <input type="text" class="form-control required" name="account_no"
                                                id="account_no" value="{{$bank[0]->account_number ?? ''}}">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Account Type</label>
                                            <input type="text" class="form-control required" name="account_type"
                                                id="account_type" value="{{$bank[0]->account_type ?? ''}}">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>IBAN</label>
                                            <input type="text" class="form-control required" name="iban" id="iban"
                                                value="{{$bank[0]->iban ?? ''}}">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Swift</label>
                                            <input type="text" class="form-control required" name="swift" id="swift"
                                                value="{{$bank[0]->swift ?? ''}}">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Credit/Debit Card No</label>
                                            <input type="text" class="form-control required" name="card_no" id="card_no"
                                                value="{{$bank[0]->card_no ?? ''}}">
                                            <div class=""></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane" id="tab_9">
                                    <div class="form-row justify-content-center mt-5">
                                        <div class="form-group col-md-4">
                                            <label>Company Site</label>
                                            <input type="text" class="form-control required" name="company_site"
                                                id="company_site" value="{{$rows->company_site ?? ''}}">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Email</label>
                                            <input type="text" class="form-control required" name="employee_email"
                                                id="employee_email" value="{{$rows->email ?? ''}}">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Password</label>
                                            <input type="text" class="form-control required" name="employee_password"
                                                id="employee_password" value="{{$rows->password ?? ''}}">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group">
                                            <span id="Insert_error_area" style="display: none;" class="m-auto"></span>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group">
                                            <button type="button" id="btnUpdate" class="btn btn-primary m-auto">Update
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.tab-pane -->
                            </div>
                        </form>
                        <!-- /.tab-content -->
                    </div>
                </div>
                <!-- ./card -->
            </div>
            <!-- /.col -->
        </div>
    </div>
</section>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="{{url('Croppie/croppie.js')}}"></script>

<script src="{{url('Croppie/croppie.js')}}"></script>
<!-- /.card -->
<script type="text/javascript">
$(function() {
    $("#emp_designation").select2({
        theme: "classic",
        width: 'resolve'
    });

    $image_crop = $('#image-preview').croppie({
        enableExif: true,
        viewport: {
            width: 100,
            height: 100,
            type: 'circle'
        },
        boundary: {
            width: 200,
            height: 200
        }
    });

    $('#upload_image').change(function(event) {
        var reader = new FileReader();

        reader.onload = function(event) {
            $image_crop.croppie('bind', {
                url: event.target.result
            }).then(function() {
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
    });
});
$("#btnUpdate").click(function(event) {

    var emp_type_val = $("#emp_type").val();
    var emp_designation_val = $("#emp_designation").val();
    var emp_fname_val = $("#emp_fname").val();
    var emp_mname_val = $("#emp_mname").val();
    var emp_lname_val = $("#emp_lname").val();
    var emp_dob_val = $("#emp_dob").val();
    var emp_nationality_val = $("#emp_nationality").val();
    var emp_marital_status_val = $("#emp_marital_status").val();
    var emp_visa_val = $("#emp_visa").val();
    // console.log("type "+emp_type_val+" des "+emp_designation_val);
    // return false;
    // if (emp_type_val == '' || emp_designation_val == '' || emp_designation_val == null || emp_fname_val == '' ||
    //   emp_mname_val == '' || emp_lname_val == '' || emp_dob_val == '' || emp_nationality_val == '' ||
    //   emp_marital_status_val == '' || emp_visa_val == '') {
    //   $("#update_error_area").show();
    //   $("#update_error_area").addClass("alert alert-danger").html("All field are required");
    //   return false;
    // } else {
    //   $("#update_error_area").hide();
    //   $("#update_error_area").removeClass("alert alert-danger");
    // }

    $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function(response) {

        // var _token = $('input[name=_token]').val();        
        var formData = document.getElementById('EmployeeStore');
        var form_data = new FormData(formData);
        form_data.append('image', response);


        $("#btnUpdate").prop("disabled", true);

        $.ajax({
            type: "POST",
            url: "{{route('Employee-Update')}}",
            data: form_data,
            processData: false,
            contentType: false,
            error: function(jqXHR, textStatus, errorThrown) {
                $("#update_error_area").show();
                $("#update_error_area").addClass("alert alert-danger").html(errorThrown)
                    .css({
                        "color": "#fff"
                    });
                return false;
            },
            success: function(data) {
                $("#btnUpdate").prop("disabled", false);
                console.log(data);
                // return false;
                if (data['success'] == false) {
                    $("#update_error_area").show();
                    $("#update_error_area").addClass("alert alert-danger").html(data[
                        'message']);
                    return false;
                }
                if (data["success"] == true) {

                    // $("#update_error_area").show();
                    // $("#update_error_area").html(data['message']);
                    // $("#update_error_area").addClass("alert alert-success").html(data['message']);
                    swal({
                        title: "Updated!",
                        text: "Employee Detail Updated Successfully...",
                        icon: "success",
                    });
                    window.location.href = "{{route('Employe-Master-Show')}}";
                }
            }
        });
    });
});
</script>
@endsection