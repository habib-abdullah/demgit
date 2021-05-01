@extends('layout')

@section('content')
<link rel="stylesheet" href="{{url('Croppie/croppie.css')}}" />
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <!-- Custom Tabs -->
                <div class="card card-outline card-primary">
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
                                    <input type="hidden" class="form-control" value="{{Session::get('eid')}}"
                                        id="emp_id" name="emp_id">
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
                                    <a href="#tab_2" data-toggle="tab" class=" nav-link btn btn-success float-right"
                                        style="font-size: 18px;"> Submit <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">
                                    <div class="form-row justify-content-center mt-5">
                                        <div class="form-group col-md-4">
                                            <label>Employee Type</label>
                                            <input type="text" class="form-control type_err required"
                                                name="employee_type" id="employee_type" placeholder="Employee Type">
                                            <div class="type_err_msg"></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Designation</label>
                                            <select name="employee_designation" id="employee_designation"
                                                class="form-control Designation_err select2" style="width:100%;">
                                                <option selected disabled>Select</option>
                                                @foreach($rows as $row)
                                                <option value="{{$row->designation_name}}:{{$row->designation_id}}">
                                                    {{$row->designation_name}}
                                                </option>
                                                @endforeach
                                            </select>
                                            <div class="Designation_err_msg"></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>First Name</label>
                                            <input type="text" class="form-control fname_err required" name="first_name"
                                                id="first_name" placeholder="First Name">
                                            <div class="fname_err_msg"></div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Middle Name</label>
                                            <input type="text" class="form-control mname_err required"
                                                name="middle_namae" id="emp_mname" placeholder="Middle Name">
                                            <div class="mname_err_msg"></div>
                                        </div>

                                    </div>
                                    <div class="form-row justify-content-center mt-2">

                                        <div class="form-group col-md-4">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control lname_err required" name="last_name"
                                                id="last_name" placeholder="Last Name">
                                            <div class="lname_err_msg"></div>
                                        </div>
                                        <div class="form-group col-md-4 clearfix">
                                            <label>Gender</label>
                                            <br>
                                            <div class="icheck-primary d-inline">
                                                <label>Male</label>
                                                <input type="radio" id="gender" name="gender" value="Male" checked>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <label>Female</label>
                                                <input type="radio" id="gender" name="gender" value="Female">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Date Of Birth</label>
                                            <input type="Date" class="form-control dob_err required" name="employee_dob"
                                                id="employee_dob" placeholder="Date Of Birth">
                                            <div class="dob_err_msg"></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Nationality</label>
                                            <input type="text" class="form-control nationality_err required"
                                                name="employee_nationality" id="employee_nationality"
                                                placeholder="Nationality">
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
                                                <option selected disabled>Select</option>
                                                <option value="unmarried">Unmarried</option>
                                                <option value="married">Married</option>
                                                <option value="divorced">divorced</option>
                                            </select>
                                            <div class="marital_status_err_msg"></div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Visa Issued From</label>
                                            <input type="text" class="form-control visa_err required"
                                                name="employee_visa" id="employee_visa" placeholder="Visa Issued">
                                            <div class="visa_err_msg"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_3">
                                    <div class="form-row justify-content-center mt-5">
                                        <div class="form-group col-md-4">
                                            <label>Passport No</label>
                                            <input type="text" class="form-control required" name="passport_no"
                                                id="passport_no" placeholder="Employee passort no">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Passport Issued Place</label>
                                            <input type="text" class="form-control nationality_er requiredr"
                                                name="passport_issude_place" id="passport_issude_place"
                                                placeholder="Employee passport issued place">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Passport Issue Date</label>
                                            <input type="date" class="form-control required" name="passport_issue_date"
                                                id="passport_issue_date" placeholder="Employee passport issue date">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Passport Expiry Date</label>
                                            <input type="date" class="form-control required" name="passport_expiry_date"
                                                id="passport_expiry_date" placeholder="Employee passport expiry date">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-8">
                                            <label>Permanent Address In Passport</label>
                                            <input type="text" class="form-control required"
                                                name="permanent_address_in_passport" id="permanent_address_in_passport"
                                                placeholder="Employee permanent address in passport">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Father Name</label>
                                            <input type="text" class="form-control required" name="father_name"
                                                id="father_name" placeholder="Employee father name">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Mother Name</label>
                                            <input type="text" class="form-control required" name="mother_name"
                                                id="mother_name" placeholder="Employee mother name">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>PP Personal No.</label>
                                            <input type="text" class="form-control required" name="pp_personal_no"
                                                id="pp_personal_no" placeholder="Employee PP personal no">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>NIC Card No</label>
                                            <input type="text" class="form-control required" name="nic_card_no"
                                                id="nic_card_no" placeholder="Employee NIC Card No">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>NIC Expiry</label>
                                            <input type="date" class="form-control required" name="nic_expiry"
                                                id="nic_expiry" placeholder="Employee NIC expiry">
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
                                                id="entry_permit_no" placeholder="Employee entry permit no">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Entry Permit Date</label>
                                            <input type="date" class="form-control required" name="entry_permit_date"
                                                id="entry_permit_date" placeholder="Employee entry permit date">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>UID No</label>
                                            <input type="text" class="form-control required" name="uid_no" id="uid_no"
                                                placeholder="Employee uid no">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>File No</label>
                                            <input type="text" class="form-control required" name="file_no" id="file_no"
                                                placeholder="Employee file no">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Profession In Residence</label>
                                            <input type="text" class="form-control required"
                                                name="profession_in_residence" id="profession_in_residence"
                                                placeholder="Employee profession in residence">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Residence Issue Date</label>
                                            <input type="date" class="form-control required" name="residence_issue_date"
                                                id="residence_issue_date" placeholder="Employee residence issue date">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Residence Expiry Date</label>
                                            <input type="date" class="form-control required"
                                                name="residence_expiry_date" id="residence_expiry_date"
                                                placeholder="Employee residence expiry date">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Emirates Id No</label>
                                            <input type="text" class="form-control required" name="emirate_id_no"
                                                id="emirate_id_no" placeholder="Employee emirates id no">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Emirates Id Expiry Date</label>
                                            <input type="date" class="form-control required" name="emirate_id_expiry"
                                                id="emirate_id_expiry" placeholder="Employee emirates id expiry date">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>E Id Card No</label>
                                            <input type="text" class="form-control required" name="e_id_card_no"
                                                id="e_id_card_no" placeholder="Employee E Id card no">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_5">

                                    <div class="form-row justify-content-center mt-5">
                                        <div class="form-group col-md-4">
                                            <label>Work Permit No</label>
                                            <input type="text" class="form-control required" name="work_permit_no"
                                                id="work_permit_no" placeholder="Employee work permit no">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Personal No</label>
                                            <input type="text" class="form-control required" name="personal_no"
                                                id="personal_no" placeholder="Employee personal no">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Work Permit Expiry</label>
                                            <input type="date" class="form-control required" name="work_permit_expiry"
                                                id="work_permit_expiry" placeholder="Employee work permit expiry">
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
                                                id="blood_group" placeholder="Employee blood group">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Height</label>
                                            <input type="text" class="form-control required" name="employee_height"
                                                id="employee_height" placeholder="Employee height">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-8">
                                            <label>Medical Issues</label>
                                            <input type="text" class="form-control required" name="medical_issues"
                                                id="medical_issues" placeholder="Employee medical issues">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_7">

                                    <div class="form-row justify-content-center mt-5">
                                        <div class="form-group col-md-4">
                                            <label>Contact</label>
                                            <input type="number" class="form-control required" name="employee_contact"
                                                id="employee_contact" placeholder="Employee contact">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Whatsapp No</label>
                                            <input type="number" class="form-control required"
                                                name="employee_whatsapp_no" id="employee_whatsapp_no"
                                                placeholder="Employee whatsapp no">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>IMO No</label>
                                            <input type="text" class="form-control required" name="employee_imo_no"
                                                id="employee_imo_no" placeholder="Employee imo no">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Facebook</label>
                                            <input type="text" class="form-control required" name="employee_facebook"
                                                id="employee_facebook" placeholder="Employee facebook">
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
                                                placeholder="Employee permanent contact name">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Permanent Contact Number</label>
                                            <input type="number" class="form-control required"
                                                name="permanent_contact_number" id="permanent_contact_number"
                                                placeholder="Employee permanent contact number">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Permanent Contact Relation</label>
                                            <input type="text" class="form-control required"
                                                name="permanent_contact_relation" id="permanent_contact_relation"
                                                placeholder="Employee permanent contact relation">
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
                                                placeholder="Employee UAE emergency contact name">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>UAE Emergency Contact No</label>
                                            <input type="number" class="form-control required"
                                                name="uae_emergency_contact_no" id="uae_emergency_contact_no"
                                                placeholder="Employee UAE emergency contact no">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-8">
                                            <label>Emergency Cont. Per. Address</label>
                                            <input type="text" class="form-control required"
                                                name="emergency_contact_per_address" id="emergency_contact_per_address"
                                                placeholder="Employee emergency cont. per. address">
                                            <div class=""></div>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane" id="tab_8">
                                    <div class="form-row justify-content-center mt-5">
                                        <div class="form-group col-md-4">
                                            <label>Bank Name</label>
                                            <input type="text" class="form-control required" name="bank_name"
                                                id="bank_name" placeholder="Employee bank name">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Branch</label>
                                            <input type="text" class="form-control required" name="branch_name"
                                                id="branch_name" placeholder="Employee branch">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Account Name</label>
                                            <input type="text" class="form-control required" name="account_name"
                                                id="account_name" placeholder="Employee account name">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Account No</label>
                                            <input type="text" class="form-control required" name="account_no"
                                                id="account_no" placeholder="Employee account no">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Account Type</label>
                                            <input type="text" class="form-control required" name="account_type"
                                                id="account_type" placeholder="Employee account type">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>IBAN</label>
                                            <input type="text" class="form-control required" name="iban" id="iban"
                                                placeholder="Employee IBAN">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Swift</label>
                                            <input type="text" class="form-control required" name="swift" id="swift"
                                                placeholder="Employee swift">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Credit/Debit Card No</label>
                                            <input type="text" class="form-control required" name="card_no" id="card_no"
                                                placeholder="Employee credit/debit card no">
                                            <div class=""></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane" id="tab_9">
                                    <div class="form-row justify-content-center mt-5">
                                        <div class="form-group col-md-4">
                                            <label>Company Site</label>
                                            <input type="text" class="form-control required" name="company_site"
                                                id="company_site" placeholder="Company site">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Email</label>
                                            <input type="text" class="form-control required" name="employee_email"
                                                id="employee_email" placeholder="Employee email">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Password</label>
                                            <input type="text" class="form-control required" name="employee_password"
                                                id="employee_password" placeholder="Employee password">
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
                                            <button type="button" id="emp_submit" class="btn btn-primary m-auto">Submit
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

<!-- //Select 2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<!-- croppie plugin -->
<script src="{{url('Croppie/croppie.js')}}"></script>

<script type="text/javascript">
$(document).ready(function() {

    $("#employee_designation").select2({
        theme: "classic",
        width: 'resolve'
    });

    $image_crop = $('#image-preview').croppie({
        enableExif: true,
        viewport: {
            width: 200,
            height: 200,
            type: 'square'
        },
        boundary: {
            width: 240,
            height: 240
        }
    });

    $('#upload_image').change(function(event) {
        var reader = new FileReader();

        reader.onload = function(event) {
            $image_crop.croppie('bind', {
                url: event.target.result
                // $image_crop.croppie('result')
            }).then(function() {
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
        // console.log(reader);
        // console.log('. url .');
        // console.log($image_crop.croppie('result'));
        // return false;
    });

    $("#temp_submit").click(function(event) {

        var fields = $("input[class*='required']");
        // console.log(fields.val());
        // for (let i = 0; i <= fields.length; i++) {
        //   // console.log(fields);
        //   if ($(fields[i]).val() === '') {
        //     var currentElement = $(fields[i]).attr('id');
        //     var value = currentElement.replaceAll('_', ' ');
        //     $("#Insert_error_area").removeClass().html('');
        //     $("#Insert_error_area").show().addClass('alert alert-danger').html('The ' + value +
        //       ' field is required.');
        //     return false;
        //   } else {
        //     $("#Insert_error_area").hide().removeClass().html('');
        //   }
        // }

        $image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport',
        }).then(function(response) {
            // console.log(response); // what you get after image bind
            // return false; 
            var _token = $('input[name=_token]').val();
            var formData = document.getElementById('EmployeeStore');
            var form_data = new FormData(formData);
            form_data.append('image', response);

            $.ajax({

                type: "POST",
                url: "{{route('Employee-Store')}}",
                data: form_data,
                processData: false,
                contentType: false,
                error: function(jqXHR, textStatus, errorThrown) {
                    $("#Insert_error_area").removeClass().show().html('');
                    $("#Insert_error_area").addClass("alert alert-danger").html(
                        errorThrown);
                    $("#emp_submit").prop("disabled", false);
                },
                success: function(data) {

                    $("#emp_submit").prop("disabled", false);

                    console.log(data);
                    return false;
                    // if(data['success'] == false)
                    if (data.includes('Failed')) {
                        $("#Insert_error_area").removeClass().show().html('');
                        $("#Insert_error_area").addClass("alert alert-danger").html(
                            'Failed');
                    }
                    // if(data["success"] == true)
                    if (data.includes('successfully')) {
                        swal({
                            title: "Stored..!",
                            text: "Employee Detail Stored Successfully...",
                            icon: "success",
                        });
                        window.location.href = "{{route('Employe-Master-Show')}}";
                    }
                }
            });
        });
    });

});
</script>
@endsection