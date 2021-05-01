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
                            <li class="nav-item"><a class="nav-link active" href="#tab_3" data-toggle="tab">Passport
                                    details</a></li>
                            <li class="nav-item"><a class="nav-link"
                                    href="Employee-{{$employee_id}}-Residency">Residency details</a>
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
                                <div class="tab-pane active" id="tab_3">
                                    <div class="form-row justify-content-center mt-5">
                                        <div class="form-group col-md-4">
                                            <label>Passport No</label>
                                            <input type="text" class="form-control required" name="passport_no"
                                                id="passport_no" placeholder="Employee passort no"
                                                value="{{$employee->passport_no ?? ''}}">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Passport Issued Place</label>
                                            <input type="text" class="form-control nationality_er requiredr"
                                                name="passport_issude_place" id="passport_issude_place"
                                                placeholder="Employee passport issued place"
                                                value="{{$employee->passport_issue_place ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Passport Issue Date</label>
                                            <input type="date" class="form-control required" name="passport_issue_date"
                                                id="passport_issue_date" placeholder="Employee passport issue date"
                                                value="{{$employee->passport_issue_date ?? ''}}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Passport Expiry Date</label>
                                            <input type="date" class="form-control required" name="passport_expiry_date"
                                                id="passport_expiry_date" placeholder="Employee passport expiry date"
                                                value="{{$employee->passport_expiry_date ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-8">
                                            <label>Permanent Address In Passport</label>
                                            <input type="text" class="form-control required"
                                                name="permanent_address_in_passport" id="permanent_address_in_passport"
                                                placeholder="Employee permanent address in passport"
                                                value="{{$employee->permanent_add_in_passport ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Father Name</label>
                                            <input type="text" class="form-control required" name="father_name"
                                                id="father_name" placeholder="Employee father name"
                                                value="{{$employee->father_name ?? ''}}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Mother Name</label>
                                            <input type="text" class="form-control required" name="mother_name"
                                                id="mother_name" placeholder="Employee mother name"
                                                value="{{$employee->mother_name ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>PP Personal No.</label>
                                            <input type="text" class="form-control required" name="pp_personal_no"
                                                id="pp_personal_no" placeholder="Employee PP personal no"
                                                value="{{$employee->pp_personal_no ?? ''}}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>NIC Card No</label>
                                            <input type="text" class="form-control required" name="nic_card_no"
                                                id="nic_card_no" placeholder="Employee NIC Card No"
                                                value="{{$employee->nic_card_no ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>NIC Expiry</label>
                                            <input type="date" class="form-control required" name="nic_expiry"
                                                id="nic_expiry" placeholder="Employee NIC expiry"
                                                value="{{$employee->nic_expiry ?? ''}}">
                                        </div>
                                        <div class="form-group col-md-4">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group" id="show_error">
                                        </div>
                                    </div>
                                    <a href="Employee-{{$employee_id}}-Profile"
                                        class="btn btn-primary text-white float-left" style="font-size: 18px;"> Previous
                                    </a>
                                    <a href="Employee-{{$employee_id}}-Residency" class="btn btn-warning mx-2 px-4 float-right" style="font-size: 18px;"> Skip </a>
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
    $("#btnSkip").click(function(event) {
        window.location.href = 'Employee-' + "{{$employee_id}}" + '-Passport';
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
            url: "{{route('Employee-Passport-Store')}}",
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
                        next_url = 'Employee-' + data['employee_id'] + '-Residency';
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