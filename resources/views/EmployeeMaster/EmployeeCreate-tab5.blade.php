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
                        <ul class="nav nav-pills mr-auto p-2">
                            <li class="nav-item"><a class="nav-link " href="Employee-{{$employee_id}}-Edit-Detail">
                                    Personal info </a>
                            </li>
                            <li class="nav-item"><a class="nav-link"
                                    href="Employee-{{$employee_id}}-Profile">Profile</a></li>
                            <li class="nav-item"><a class="nav-link " href="Employee-{{$employee_id}}-Passport">Passport
                                    details</a>
                            </li>
                            <li class="nav-item"><a class="nav-link "
                                    href="Employee-{{$employee_id}}-Residency">Residency details</a>
                            </li>
                            <li class="nav-item"><a class="nav-link active" href="#tab_5" data-toggle="tab">MOL
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
                    <div class="card-body">
                        <form id="EmployeeStore" enctype="multipart/form-data">
                            <div class="tab-content">
                                @csrf
                                <input type="hidden" class="form-control" value="{{$employee_id}}" id="employee_id"
                                    name="employee_id">
                                <div class="tab-pane active" id="tab_5">
                                    <div class="form-row justify-content-center mt-5">
                                        <div class="form-group col-md-4">
                                            <label>Work Permit No</label>
                                            <input type="text" class="form-control required" name="work_permit_no"
                                                id="work_permit_no" placeholder="Employee work permit no"
                                                value="{{$employee->work_permit_no ?? ''}}">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Personal No</label>
                                            <input type="text" class="form-control required" name="personal_no"
                                                id="personal_no" placeholder="Employee personal no"
                                                value="{{$employee->personal_no ?? ''}}">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Work Permit Expiry</label>
                                            <input type="date" class="form-control required" name="work_permit_expiry"
                                                id="work_permit_expiry" placeholder="Employee work permit expiry"
                                                value="{{$employee->work_permit_expiry ?? ''}}">
                                            <div class=""></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group" id="show_error">
                                        </div>
                                    </div>
                                    <a href="Employee-{{$employee_id}}-Residency"
                                        class="btn btn-primary text-white float-left" style="font-size: 18px;"> Previous
                                    </a>
                                    <a href="Employee-{{$employee_id}}-Health" class="btn btn-warning mx-2 px-4 float-right" style="font-size: 18px;"> Skip </a>
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
            url: "{{route('Employee-Mol-Record-Store')}}",
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
                        next_url = 'Employee-' + data['employee_id'] + '-Health';
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