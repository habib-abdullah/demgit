@extends('layout')

@section('content')
<link rel="stylesheet" href="{{url('Croppie/croppie.css')}}" />
<section class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <!-- Custom Tabs -->
        <div class="card ">
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
              <li class="nav-item"><a class="nav-link " href="Employee-{{$employee_id}}-Edit-Detail"> Personal info </a>
              </li>
              <li class="nav-item"><a class="nav-link" href="Employee-{{$employee_id}}-Profile">Profile</a></li>
              <li class="nav-item"><a class="nav-link " href="Employee-{{$employee_id}}-Passport">Passport details</a>
              </li>
              <li class="nav-item"><a class="nav-link " href="Employee-{{$employee_id}}-Residency">Residency details</a>
              </li>
              <li class="nav-item"><a class="nav-link " href="Employee-{{$employee_id}}-Mol-Record">MOL record</a></li>
              <li class="nav-item"><a class="nav-link " href="Employee-{{$employee_id}}-Health">Health</a></li>
              <li class="nav-item"><a class="nav-link " href="Employee-{{$employee_id}}-Contact">Contact Info</a></li>
              <li class="nav-item"><a class="nav-link" href="Employee-{{$employee_id}}-Bank">Bank details</a></li>
              <li class="nav-item"><a class="nav-link active" href="#tab_9" data-toggle="tab">Company & Login
                  Details</a></li>
            </ul>
          </div>
          <div class="card-body">
            <form id="EmployeeStore" enctype="multipart/form-data">
              <div class="tab-content">
                @csrf
                <input type="hidden" class="form-control" value="{{$employee_id}}" id="employee_id" name="employee_id">
                <div class="tab-pane active" id="tab_9">
                  <div class="form-row justify-content-center mt-5">
                    <div class="form-group col-md-4">
                      <label>Company Site</label>
                      <select name="company_site" id="company_site" class="form-control">
                        <option selected disabled>Select</option>
                        @if($employee->company_site == 'main_site')
                        <option selected value="main_site">Main Site</option>
                        <option value="customer_site">Work @ Customer Site</option>
                        @else
                        <!-- <option selected disabled>Select</option> -->
                        <option value="main_site">Main Site</option>
                        <option value="customer_site">Work @ Customer Site</option>
                        @endif
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Email</label>
                      <input type="text" class="form-control required" name="employee_email" id="employee_email"
                        placeholder="Employee email" value="{{$employee->email ?? ''}}">
                    </div>
                  </div>
                  <div class="form-row justify-content-center mt-2">

                    @if(empty($employee->password))
                    <div class="form-group col-md-4">
                      <label>Password</label>
                      <input type="password" class="form-control required txtNewPassword" name="employee_password"
                        id="employee_password" placeholder="Employee password" value="">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Confirm Password</label>
                      <input type="password" class="form-control txtConfirmPassword" name="employee_password" id=""
                        placeholder="Employee password">
                    </div>
                    @else
                    <div class="form-group col-md-4">
                      <label>Change Password</label>
                      <input type="password" class="form-control required txtNewPassword" name="employee_password"
                        id="employee_password" placeholder="Employee password" value="{{$employee->password ?? ''}}">
                    </div>
                    <div class="form-group col-md-4">
                    </div>
                    @endif
                  </div>
                  <!-- <div class="form-row justify-content-center mt-2">
                    <div class="form-group">
                      <span id="Insert_error_area" style="display: none;" class="m-auto"></span>
                    </div>
                  </div> -->
                  <!-- <div class="form-row justify-content-center mt-2">
                    <div class="form-group">
                      <button type="button" id="emp_submit" class="btn btn-primary m-auto">Submit
                      </button>
                    </div>
                  </div> -->
                  <div class="form-row justify-content-center mt-2">
                    <div class="form-group" id="show_error">
                    </div>
                  </div>
                  <a href="Employee-{{$employee_id}}-Bank" class="btn btn-primary text-white float-left"
                    style="font-size: 18px;"> Previous
                  </a>
                  <a href="{{route('Employe-Master-Show')}}" class="btn btn-warning mx-2 px-4 float-right"
                    style="font-size: 18px;"> Skip </a>
                  <button type="button" id="btnSubmit" class="btn btn-success text-white float-right"
                    style="font-size: 18px;"> Submit
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
    // console.log($("#company_site option:selected").text());return false;
    if ($("#company_site option:selected").text() == 'Select') {
      $("#show_error").removeClass().html('');
      $("#show_error").show().addClass('alert alert-danger').html('The company site field is required.');
      return false;
    } else {
      $("#show_error").removeClass().html('').hide();
    }

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
    <?php if(empty($employee->password)): ?>
    if ($(".txtNewPassword").val() != $(".txtConfirmPassword").val()) {
      $("#show_error").removeClass().show().html('');
      $("#show_error").addClass("alert alert-danger").html("Passwords does not match!");
      return false;
    } else {
      $("#show_error").hide().removeClass().html('');
    }
    <?php endif; ?>

    $("#btnSubmit").prop("disabled", true);
    $.ajax({
      type: "POST",
      url: "{{route('Employee-Login-Detail-Store')}}",
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
          $("#show_error").removeClass().show().html('');
          $("#show_error").addClass("alert alert-success").html(data['message']);
          setTimeout(() => {
            window.location.href = "{{route('Employe-Master-Show')}}";
          }, 1500);
        } else {
          if (data['validation'] == false) {
            $("#show_error").removeClass().show().html('');
            $("#show_error").addClass("alert alert-danger").html(data['message'][0]);
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