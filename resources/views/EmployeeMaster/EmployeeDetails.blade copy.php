@extends('layout')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row">
    
    <div class="col-md-4 mb-2">
      <div class="card">
        <div class="card-body box-profile">
          <div class="text-center">
            <!-- <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg"
              alt="User profile picture"> -->
          </div>

          <h3 class="profile-username text-center text-bold"> Personal Info</h3>

          <p class="text-muted text-center"></p>

          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>Name</b> <a class="float-right">{{$employees[0]->first_name ?? ''}} {{$employees[0]->last_name ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Designation</b> <a class="float-right">{{$employees[0]->designation ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Birth Date</b> <a class="float-right">{{$employees[0]->birth_date ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Nationality</b> <a class="float-right">{{$employees[0]->nationality ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Marital Status</b> <a class="float-right">{{$employees[0]->marital_status ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>VISA Issued From</b> <a class="float-right">{{$employees[0]->visa_Issued_from ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Employee Type</b> <a class="float-right">{{$employees[0]->employee_type ?? ''}}</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="col-md-8 mb-2">
      <div class="card card-primary">
        <div class="card-body box-profile">
          <div class="text-center">
          </div>

          <h3 class="profile-username text-center text-bold"> Passport Details </h3>

          <p class="text-muted text-center"></p>

          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>Passport No</b> <a class="float-right">{{$employees->passport_no ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Passport Issue Date</b> <a class="float-right">{{$employees->passport_issue_date ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Passport Expiry Date</b> <a class="float-right">{{$employees->passport_expiry_date ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Passport Issued Place</b> <a class="float-right">{{$employees->passport_issue_place ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Nationality</b> <a class="float-right">{{$employees->nationality ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Permanent Address In Passport</b> <a class="float-right">{{$employees->permanent_add_in_passport ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Father Name</b> <a class="float-right">{{$employees->father_name ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Mother Name</b> <a class="float-right">{{$employees->mother_name ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>PP Personal No</b> <a class="float-right">{{$employees->pp_personal_no ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>NIC Card No</b> <a class="float-right">{{$employees->nic_card_no ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>NIC Expiry</b> <a class="float-right">{{$employees->nic_expiry ?? ''}}</a>
            </li>
          </ul>
          
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-2">
      <div class="card">
        <div class="card-body box-profile">
          <div class="text-center">
          </div>

          <h3 class="profile-username text-center text-bold"> MOL Record</h3>

          <p class="text-muted text-center"></p>

          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>Work Permit No</b> <a class="float-right">{{$employees->work_permit_no ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Personal No</b> <a class="float-right">{{$employees->personal_no ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Work Permit Expiry</b> <a class="float-right">{{$employees->work_permit_expiry ?? ''}}</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class=" col-md-8  mb-2">
      <div class="card card-primary">
        <div class="card-body box-profile">
          <div class="text-center">
          </div>

          <h3 class="profile-username text-center text-bold"> Residency Details </h3>

          <p class="text-muted text-center"></p>

          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>Entry Permit No</b> <a class="float-right">{{$employees->entry_permit_no ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Entry Permit Date</b> <a class="float-right">{{$employees->entry_permit_date ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Status Change Date</b> <a class="float-right"> </a>
            </li>
            <li class="list-group-item">
              <b>UID No</b> <a class="float-right">{{$employees->uid_no ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>File No</b> <a class="float-right">{{$employees->file_no ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Profession In Residence</b> <a class="float-right">{{$employees->profession_in_residence ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Residence Issue Date</b> <a class="float-right">{{$employees->residence_issude_date ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Residence Expiry Date</b> <a class="float-right">{{$employees->residence_expiry_date ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Emirates Id No</b> <a class="float-right">{{$employees->emirate_id_no ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Emirates Id Expiry Date</b> <a class="float-right">{{$employees->emirate_id_expiry ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>E Id Card No</b> <a class="float-right">{{$employees->e_id_card_no ?? ''}}</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-2">
      <div class="card">
        <div class="card-body box-profile">
          <div class="text-center">
          </div>

          <h3 class="profile-username text-center text-bold"> Health Info</h3>

          <p class="text-muted text-center"></p>

          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>Blood Group</b> <a class="float-right">{{$employees->blood_group ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Height</b> <a class="float-right">{{$employees->height ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Medical Issues</b> <a class="float-right">{{$employees->medical_issues ?? ''}}</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class=" col-md-8  mb-2">
      <div class="card card-primary">
        <div class="card-body box-profile">
          <div class="text-center">
          </div>

          <h3 class="profile-username text-center text-bold"> Contact Details </h3>

          <p class="text-muted text-center"></p>

          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>Email</b> <a class="float-right">{{$employees->email ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Contact</b> <a class="float-right">{{$employees->contact ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Whatsapp Number</b> <a class="float-right">{{$employees->whatsapp_no ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>IMO No</b> <a class="float-right">{{$employees->imo_no ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Facebook</b> <a class="float-right">{{$employees->facebook ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Permanent Contact Name</b> <a class="float-right">{{$employees->permanent_contact_name ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Permanent Contact Number</b> <a class="float-right">{{$employees->permanent_contact_no ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Permanent Contact Relation</b> <a class="float-right">{{$employees->permanent_contact_relation ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>UAE Emergency Contact Name</b> <a class="float-right">{{$employees->uae_emergency_contact_name ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>UAE Emergency Contact No.</b> <a class="float-right">{{$employees->uae_emergency_contact_no ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Emergency Cont. Relation</b> <a class="float-right">{{$employees->permanent_contact_relation ?? ''}}</a>
            </li>
            <li class="list-group-item">
              <b>Emergency Cont. Per. Address</b> <a
                class="float-right">{{$employees->uae_emergency_contact_address ?? ''}}</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-2">
      <div class="card">
        <div class="card-body box-profile">
          <div class="text-center">
          </div>

          <h3 class="profile-username text-center text-bold"> Status</h3>

          <p class="text-muted text-center"></p>

          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>Resigned</b> <a class="float-right">{{ $employees->status == 1? 'In Service' : 'Resigned' }}
              </a>
            </li>
            <li class="list-group-item">
              <b>Active</b> <a class="float-right">{{ $employees->status == 1? 'True' : 'False' }}</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class=" col-md-8  mb-2">
      <div class="card card-primary">
        <div class="card-body box-profile">
          <div class="text-center">
          </div>

          <h3 class="profile-username text-center text-bold"> Bank Details </h3>

          <p class="text-muted text-center"></p>

          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>Bank Name</b> <a class="float-right">{{$banks->bank_name ?? ""}}</a>
            </li>
            <li class="list-group-item">
              <b>Branch</b> <a class="float-right">{{$banks->branch_name ?? ""}}</a>
            </li>
            <li class="list-group-item">
              <b>Account Type</b> <a class="float-right">{{$banks->account_type ?? ""}}</a>
            </li>
            <li class="list-group-item">
              <b>Account Name</b> <a class="float-right">{{$banks->account_name ?? ""}}</a>
            </li>
            <li class="list-group-item">
              <b>Account No</b> <a class="float-right">{{$banks->account_number ?? ""}}</a>
            </li>
            <li class="list-group-item">
              <b>IBAN</b> <a class="float-right">{{$banks->iban ?? ""}}</a>
            </li>
            <li class="list-group-item">
              <b>Swift</b> <a class="float-right">{{$banks->swift ?? ""}}</a>
            </li>
            <li class="list-group-item">
              <b>Credit/Debit Card No</b> <a class="float-right">{{$banks->card_no ?? ""}}</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

  </div>
</div>
<script src="{{url('public/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript">
$(function() {

});
</script>

@endsection