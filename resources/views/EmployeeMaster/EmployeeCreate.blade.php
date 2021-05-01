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
                            @if(empty($employee))
                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Personal
                                    info</a></li>
                            <li class="nav-item" style="cursor:pointer;"><a onclick="SubmitAlert(event)"
                                    class="nav-link"> Profile
                                </a></li>
                            <li class="nav-item" style="cursor:pointer;"><a onclick="SubmitAlert(event)"
                                    class="nav-link">Passport
                                    details</a></li>
                            <li class="nav-item" style="cursor:pointer;"><a onclick="SubmitAlert(event)"
                                    class="nav-link">Residency
                                    details</a></li>
                            <li class="nav-item" style="cursor:pointer;"><a onclick="SubmitAlert(event)"
                                    class="nav-link">MOL
                                    record</a></li>
                            <li class="nav-item" style="cursor:pointer;"><a onclick="SubmitAlert(event)"
                                    class="nav-link">Health</a>
                            </li>
                            <li class="nav-item" style="cursor:pointer;"><a onclick="SubmitAlert(event)"
                                    class="nav-link">Contact
                                    Info</a></li>
                            <li class="nav-item" style="cursor:pointer;"><a onclick="SubmitAlert(event)"
                                    class="nav-link">Bank
                                    details</a></li>
                            <li class="nav-item" style="cursor:pointer;"><a onclick="SubmitAlert(event)"
                                    class="nav-link">Company &
                                    Login Details</a></li>
                            @else
                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab"> Personal
                                    info </a>
                            </li>
                            <li class="nav-item"><a class="nav-link"
                                    href="Employee-{{$employee_id}}-Profile">Profile</a></li>
                            <li class="nav-item"><a class="nav-link " href="Employee-{{$employee_id}}-Passport">Passport
                                    details</a>
                            </li>
                            <li class="nav-item"><a class="nav-link "
                                    href="Employee-{{$employee_id}}-Residency">Residency details</a>
                            </li>
                            <li class="nav-item"><a class="nav-link " href="Employee-{{$employee_id}}-Mol-Record">MOL
                                    record</a></li>
                            <li class="nav-item"><a class="nav-link " href="Employee-{{$employee_id}}-Health">Health</a>
                            </li>
                            <li class="nav-item"><a class="nav-link " href="Employee-{{$employee_id}}-Contact">Contact
                                    Info</a></li>
                            <li class="nav-item"><a class="nav-link" href="Employee-{{$employee_id}}-Bank">Bank
                                    details</a></li>
                            <li class="nav-item"><a class="nav-link "
                                    href="Employee-{{$employee_id}}-Login-Detail">Company & Login
                                    Details</a></li>
                            @endif
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
                                    <input type="hidden" class="form-control" value="{{$employee->employee_id ?? ''}}"
                                        id="employee_id" name="employee_id">
                                    <div class="form-row justify-content-center mt-5">
                                        <div class="form-group col-md-4">
                                            <label>Employee Type</label>
                                            <input type="text" class="form-control type_err required"
                                                name="employee_type" id="employee_type" placeholder="Employee Type"
                                                value="{{$employee->employee_type ?? ''}}">
                                            <div class="type_err_msg"></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Designation</label>
                                            <select name="employee_designation" id="employee_designation"
                                                class="form-control Designation_err select2  " style="width:100%;">
                                                <option selected disabled>Select</option>
                                                @if(!empty($employee))
                                                @foreach($rows as $row)
                                                @if($employee->designation_id == $row->designation_id)
                                                <option selected
                                                    value="{{$row->designation_name}}:{{$row->designation_id}}">
                                                    {{$row->designation_name}}
                                                </option>
                                                @else
                                                <option value="{{$row->designation_name}}:{{$row->designation_id}}">
                                                    {{$row->designation_name}}
                                                </option>
                                                @endif
                                                @endforeach
                                                @else
                                                @foreach($rows as $row)
                                                <option value="{{$row->designation_name}}:{{$row->designation_id}}">
                                                    {{$row->designation_name}}
                                                </option>
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
                                                id="first_name" placeholder="First Name"
                                                value="{{$employee->first_name ?? ''}}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Middle Name</label>
                                            <input type="text" class="form-control mname_err required"
                                                name="middle_name" id="middle_name" placeholder="Middle Name"
                                                value="{{$employee->middle_name ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control lname_err required" name="last_name"
                                                id="last_name" placeholder="Last Name"
                                                value="{{$employee->last_name ?? ''}}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Employee code</label>
                                            <input type="text" class="form-control lname_err required"
                                                name="employee_code" id="employee_code" placeholder="Employee code"
                                                value="{{$employee->employee_code ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Date Of Birth</label>
                                            <input type="Date" class="form-control dob_err required" name="employee_dob"
                                                id="employee_dob" placeholder="Date Of Birth"
                                                value="{{$employee->birth_date ?? ''}}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Nationality</label>
                                            <input type="text" class="form-control nationality_err required"
                                                name="employee_nationality" id="employee_nationality"
                                                placeholder="Nationality" value="{{$employee->nationality ?? ''}}">
                                        </div>
                                    </div>

                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Marital Status</label>
                                            <!-- <input type="text" class="form-control marital_status_err" name="emp_marital_status"
                                            id="emp_marital_status" placeholder="Marital Status"> -->
                                            <select name="marital_status" id="marital_status"
                                                class="form-control marital_status_err">
                                                @if(!empty($employee))
                                                @if($employee->marital_status == 'unmarried')
                                                <option disabled>Select</option>
                                                <option selected value="unmarried">Unmarried</option>
                                                <option value="married">Married</option>
                                                <option value="divorced">divorced</option>
                                                @elseif($employee->marital_status == 'married')
                                                <option disabled>Select</option>
                                                <option value="unmarried">Unmarried</option>
                                                <option selected value="married">Married</option>
                                                <option value="divorced">divorced</option>
                                                @else
                                                <option disabled>Select</option>
                                                <option value="unmarried">Unmarried</option>
                                                <option value="married">Married</option>
                                                <option selected value="divorced">divorced</option>
                                                @endif
                                                @else
                                                <option selected disabled>Select</option>
                                                <option value="unmarried">Unmarried</option>
                                                <option value="married">Married</option>
                                                <option value="divorced">divorced</option>
                                                @endif
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Visa Issued From</label>
                                            <input type="text" class="form-control visa_err required"
                                                name="employee_visa" id="employee_visa" placeholder="Visa issued from"
                                                value="{{$employee->visa_Issued_from ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4 clearfix">
                                            <label>Gender</label>
                                            <br>
                                            <!-- <div class="icheck-primary d-inline">
                                                <label>Male</label>
                                                <input type="radio" id="gender" name="gender" value="Male" checked>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <label>Female</label>
                                                <input type="radio" id="gender" name="gender" value="Female">
                                            </div> -->
                                            @if(!empty($employee))
                                            @if($employee->gender == 'Male')
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
                                            @else
                                            <div class="icheck-primary d-inline">
                                                <label>Male</label>
                                                <input type="radio" id="gender" name="gender" value="Male" checked>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <label>Female</label>
                                                <input type="radio" id="gender" name="gender" value="Female">
                                            </div>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-4">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group" id="show_error">
                                        </div>
                                    </div>
                                    @if(!empty($employee_id))
                                    <a href="Employee-{{$employee_id}}-Profile" class="btn btn-warning mx-2 px-4 float-right" style="font-size: 18px;"> Skip </a>
                                    @endif
                                    <a id="temp_submit" class="btn btn-success float-right text-white"
                                        style="font-size: 18px; cursor:pointer;"> Submit &
                                        Next
                                    </a>
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

    $("#temp_submit").click(function(event) {

        var fields = $("input[class*='required']");
        // console.log(fields.val());
        for (let i = 0; i <= fields.length; i++) {
            // console.log(fields);
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
        var selected_option = $('#employee_designation option:selected').text();

        if ($('#employee_designation option:selected').text() === 'Select') {
            $("#show_error").removeClass().html('');
            $("#show_error").show().addClass('alert alert-danger').html(
                'The designation field is required.');
            return false;
        } else {
            $("#show_error").hide().removeClass().html('');
        }
        if ($('#marital_status option:selected').text() === 'Select') {
            $("#show_error").removeClass().html('');
            $("#show_error").show().addClass('alert alert-danger').html(
                'The marital status field is required.');
            return false;
        } else {
            $("#show_error").hide().removeClass().html('');
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "{{route('Employee-Store')}}",
            data: $("#EmployeeStore").serialize(),
            // processData: false,
            // contentType: false,
            error: function(jqXHR, textStatus, errorThrown) {
                $("#show_error").removeClass().show().html('');
                $("#show_error").addClass("alert alert-danger").html(errorThrown);
                console.log("hello");
                $("#emp_submit").prop("disabled", false);
            },
            success: function(data) {

                $("#emp_submit").prop("disabled", false);

                console.log(data);
                // next_url = 'Employee-' + data['employee_id'] + '-Profile';
                // console.log(next_url);
                // return false;
                if (data['success'] == true) {
                    // console.log(data['message']);
                    setTimeout(() => {
                        $("#show_error").removeClass().show().html('');
                        $("#show_error").addClass("alert alert-success").html(data['message']);
                        next_url = 'Employee-' + data['employee_id'] + '-Profile';
                        window.location.href = next_url;
                    }, 1500);
                    // if (data['employee_id'] == 'no') {
                    // }
                } else {
                    if (data['validation'] == false) {
                        $("#show_error").removeClass().show().html('');
                        $("#show_error").addClass("alert alert-danger").html(data['message']
                            [0]);
                        return false;
                    }
                    $("#show_error").removeClass().show().html('');
                    $("#show_error").addClass("alert alert-danger").html(data['message']);
                    return false;
                }
            }
        });
    });

});

function SubmitAlert(event) {
    event.preventDefault();
    swal({
        title: "Please fill the form and press Submit & Next",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    });
}
</script>
@endsection