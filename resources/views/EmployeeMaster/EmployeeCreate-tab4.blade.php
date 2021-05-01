@extends('layout')

@section('content')
<link rel="stylesheet" href="{{url('Croppie/croppie.css')}}" />
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <!-- Custom Tabs -->
                <div class="card">
                    <div class="card-header p-0">
                        <h3 class="card-title p-3">
                            <a href="{{route('Employe-Master-Show')}}" style="font-size: 18px;"><i
                                    class="fas fa-arrow-circle-left"></i> Back </a>
                        </h3>
                        <div class=" float-right">
                            <h3 class="card-title p-3">
                                Add Employee Detail
                            </h3>
                        </div>
                    </div>

                    <div class="card-header d-flex p-0">
                        <!-- <h3 class="card-title p-3">Tabs</h3> -->
                        <ul class="nav nav-pills mr-auto p-2">
                            <li class="nav-item"><a class="nav-link " href="Employee-{{$employee_id}}-Edit-Detail">
                                    Personal info </a>
                            </li>
                            <li class="nav-item"><a class="nav-link"
                                    href="Employee-{{$employee_id}}-Profile">Profile</a></li>
                            <li class="nav-item"><a class="nav-link " href="Employee-{{$employee_id}}-Passport">Passport
                                    details</a>
                            </li>
                            <li class="nav-item"><a class="nav-link active" href="#tab_4" data-toggle="tab">Residency
                                    details</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="Employee-{{$employee_id}}-Mol-Record">MOL
                                    record</a></li>
                            <li class="nav-item"><a class="nav-link" href="Employee-{{$employee_id}}-Health">Health</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="Employee-{{$employee_id}}-Contact">Contact
                                    Info</a></li>
                            <li class="nav-item"><a class="nav-link" href="Employee-{{$employee_id}}-Bank">Bank
                                    details</a></li>
                            <li class="nav-item"><a class="nav-link"
                                    href="Employee-{{$employee_id}}-Login-Detail">Company & Login
                                    Details</a></li>
                        </ul>
                    </div>

                    <div class=" card-body">
                        <form id="EmployeeStore" enctype="multipart/form-data">
                            <div class="tab-content">
                                @csrf
                                <input type="hidden" class="form-control" value="{{$employee_id}}" id="employee_id"
                                    name="employee_id">
                                <div class="tab-pane active" id="tab_4">
                                    <div class="form-row justify-content-center mt-5">
                                        <div class="form-group col-md-4">
                                            <label>Entry Permit No</label>
                                            <input type="text" class="form-control required" name="entry_permit_no"
                                                id="entry_permit_no" placeholder="Employee entry permit no"
                                                value="{{$employee->entry_permit_no ?? ''}}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Entry Permit Date</label>
                                            <input type="date" class="form-control required" name="entry_permit_date"
                                                id="entry_permit_date" placeholder="Employee entry permit date"
                                                value="{{$employee->entry_permit_date ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>UID No</label>
                                            <input type="text" class="form-control required" name="uid_no" id="uid_no"
                                                placeholder="Employee uid no" value="{{$employee->uid_no ?? ''}}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>File No</label>
                                            <input type="text" class="form-control required" name="file_no" id="file_no"
                                                placeholder="Employee file no" value="{{$employee->file_no ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Profession In Residence</label>
                                            <input type="text" class="form-control required"
                                                name="profession_in_residence" id="profession_in_residence"
                                                placeholder="Employee profession in residence"
                                                value="{{$employee->profession_in_residence ?? ''}}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Residence Issue Date</label>
                                            <input type="date" class="form-control required" name="residence_issue_date"
                                                id="residence_issue_date" placeholder="Employee residence issue date"
                                                value="{{$employee->residence_issude_date ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Residence Expiry Date</label>
                                            <input type="date" class="form-control required"
                                                name="residence_expiry_date" id="residence_expiry_date"
                                                placeholder="Employee residence expiry date"
                                                value="{{$employee->residence_expiry_date ?? ''}}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Emirates Id No</label>
                                            <input type="text" class="form-control required" name="emirate_id_no"
                                                id="emirate_id_no" placeholder="Employee emirates id no"
                                                value="{{$employee->emirate_id_no ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Emirates Id Expiry Date</label>
                                            <input type="date" class="form-control required" name="emirate_id_expiry"
                                                id="emirate_id_expiry" placeholder="Employee emirates id expiry date"
                                                value="{{$employee->emirate_id_expiry ?? ''}}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>E Id Card No</label>
                                            <input type="text" class="form-control required" name="e_id_card_no"
                                                id="e_id_card_no" placeholder="Employee E Id card no"
                                                value="{{$employee->e_id_card_no ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group" id="show_error">
                                        </div>
                                    </div>
                                    <a href="Employee-{{$employee_id}}-Passport"
                                        class="btn btn-primary text-white float-left" style="font-size: 18px;"> Previous
                                    </a>
                                    <a href="Employee-{{$employee_id}}-Mol-Record" class="btn btn-warning mx-2 px-4 float-right" style="font-size: 18px;"> Skip </a>
                                    <button type="button" id="btnSubmit" class="btn btn-success text-white float-right"
                                        style="font-size: 18px;"> Submit &
                                        Next
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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

    $("#btnSubmit").click(function(event) {

        var fields = $("input[class*='required']");
        for (let i = 0; i <= fields.length; i++) {
            if ($(fields[i]).val() === '') {
                var currentElement = $(fields[i]).attr('id');
                var value = currentElement.replaceAll('_', ' ');
                $("#show_error").removeClass().html('');
                $("#show_error").show().addClass('alert alert-danger').html('The ' + value +
                    ' field is required.');
                return false;
            } else {
                $("#show_error").hide().removeClass().html('');
            }
        }
        $("#btnSubmit").prop("disabled", true);
        $.ajax({
            type: "POST",
            url: "{{route('Employee-Residency-Store')}}",
            data: $("#EmployeeStore").serialize(),
            error: function(jqXHR, textStatus, errorThrown) {
                $("#show_error").removeClass().show().html('');
                $("#show_error").addClass("alert alert-danger").html(errorThrown);
                $("#btnSubmit").prop("disabled", false);
            },
            success: function(data) {
                $("#btnSubmit").prop("disabled", false);
                console.log(data);
                // return false;
                if (data['success'] == true) {
                    // console.log(data['message']);
                    setTimeout(() => {
                        $("#show_error").removeClass().show().html('');
                        $("#show_error").addClass("alert alert-success").html(data['message']);
                        next_url = 'Employee-' + data['employee_id'] + '-Mol-Record';
                    window.location.href = next_url;
                    }, 1500);
                    
                } else {
                    if (data['validation'] == false) {
                        $("#show_error").removeClass().show().html('');
                        $("#show_error").addClass("alert alert-danger").html(data['message']
                            [0]);
                        return false;
                    }
                    $("#show_error").removeClass().show().html('');
                    $("#show_error").addClass("alert alert-danger").html(data['message']);
                }
            }
        });
    });

});
</script>
@endsection