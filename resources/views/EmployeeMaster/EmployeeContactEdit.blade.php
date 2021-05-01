@extends('layout')

@section('content')

<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <a href="{{route('Employee-Contact-Detail-Show')}}" style="font-size: 18px;"><i
                  class="fas fa-arrow-circle-left"></i></a> Edit Employee Contact Detail
            </h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form id="EmployeeContactDetailEditForm">
            @csrf

            <div class="form-row justify-content-center mt-3">
              <input type="hidden" class="form-control" id="emp_contact_id" value="{{$detail->emp_contact_detail_id}}"
                name="emp_contact_id">
              <div class="form-group col-md-4">
                <label>Employee Name</label>
                <select class="form-control" name="emp_name" id="emp_name">
                  <option selected disabled>Select</option>
                  @foreach($row as $rows)
                  @if($rows->employee_id == $detail->employee_id)
                  <option selected value="{{$rows->employee_id}}">{{$rows->first_name}}
                    {{$rows->last_name}}</option>

                  @else
                  <option value="{{$rows->employee_id}}">{{$rows->first_name}}
                    {{$rows->last_name}}</option>
                  @endif
                  @endforeach
                </select>
              </div>

              <div class="form-group col-md-4">
                <label>Employee Email</label>
                <input type="email" class="form-control" name="emp_email" id="emp_email" value="{{$detail->emp_email}}"
                  placeholder="Enter Employee Email Address">
                <span id="email_error" style="color:red; font-style:italic; display: none;">This field Required</span>
              </div>

            </div>

            <div class="form-row justify-content-center mt-2">

              <div class="form-group col-md-4">
                <label>Contact no</label>
                <input type="number" class="form-control" name="emp_con_no" id="emp_con_no"
                  value="{{$detail->emp_contact_no}}" placeholder="Enter Contact Number">
                <span id="contact_error" style="color:red; font-style:italic; display: none;">This field Required</span>
              </div>

              <div class="form-group col-md-4">
                <label>WhatsApp no</label>
                <input type="number" class="form-control" name="emp_whatsapp_no" id="emp_whatsapp_no"
                  value="{{$detail->emp_whatsapp_no}}" placeholder="Enter WhatsApp Number">
                <span id="whatsapp_error" style="color:red; font-style:italic; display: none;">This field
                  Required</span>
              </div>

            </div>

            <div class="form-row justify-content-center mt-2">
              <div class="form-group col-md-4">
                <label>Imo no</label>
                <input type="text" class="form-control" name="emp_imo_no" id="emp_imo_no"
                  value="{{$detail->emp_imo_no}}" placeholder="Enter Imo Number">
                <span id="imo_error" style="color:red; font-style:italic; display: none;">This field Required</span>
              </div>

              <div class="form-group col-md-4">
                <label>Facebook Id</label>
                <input type="text" class="form-control" name="emp_fb_id" id="emp_fb_id"
                  value="{{$detail->emp_facebook_id}}" placeholder="Enter Facebook Id">
                <span id="fb_error" style="color:red; font-style:italic; display: none;">This field Required</span>
              </div>
            </div>
            <div class="form-row justify-content-center mt-2">
              <div class="form-group col-md-4">
                <label>Permanent Contact Name</label>
                <input type="text" class="form-control" name="emp_per_con_name" id="emp_per_con_name"
                  value="{{$detail->emp_permanent_contact_name}}" placeholder="Enter Permanent Contact Name">
                <span id="per_con_name_error" style="color:red; font-style:italic; display: none;">This field
                  Required</span>
              </div>
              <div class="form-group col-md-4">
                <label>Permanent Contact no</label>
                <input type="text" class="form-control" name="emp_per_con_no" id="emp_per_con_no"
                  value="{{$detail->emp_permanent_contact_no}}" placeholder="Enter Permanent Contact no">
                <span id="per_con_no_error" style="color:red; font-style:italic; display: none;">This field
                  Required</span>
              </div>
            </div>

            <div class="form-row justify-content-center mt-2">
              <div class="form-group col-md-4">
                <label>Permanent Contact Relation</label>
                <input type="text" class="form-control" name="emp_per_con_rel" id="emp_per_con_rel"
                  value="{{$detail->emp_permanent_contact_relation}}" placeholder="Enter Permanent Contact Relation">
                <span id="per_con_rel_error" style="color:red; font-style:italic; display: none;">This field
                  Required</span>
              </div>
              <div class="form-group col-md-4">
                <label>UAE Emergency Contact no</label>
                <input type="text" class="form-control" name="emp_uae_con_no" id="emp_uae_con_no"
                  value="{{$detail->emp_uae_emerge_contact_no}}" placeholder="Enter UAE Emergency Contact no">
                <span id="uae_con_no_error" style="color:red; font-style:italic; display: none;">This field
                  Required</span>
              </div>
            </div>

            <div class="form-row justify-content-center mt-2">
              <div class="form-group col-md-4">
                <label>UAE Contact Name</label>
                <input type="text" class="form-control" name="emp_uae_con_name" id="emp_uae_con_name"
                  value="{{$detail->emp_uae_emerge_contact_name}}" placeholder="Enter UAE Contact Name">
                <span id="uae_con_name_error" style="color:red; font-style:italic; display: none;">This field
                  Required</span>
              </div>
              <div class="form-group col-md-4">
                <label>UAE Contact Relation</label>
                <input type="text" class="form-control" name="emp_uae_con_rel" id="emp_uae_con_rel"
                  value="{{$detail->emp_uae_contact_relation}}" placeholder="Enter UAE Contact Relation">
                <span id="uae_con_rel_error" style="color:red; font-style:italic; display: none;">This field
                  Required</span>
              </div>
            </div>

            <div class="form-row justify-content-center mt-2">
              <div class="form-group col-md-4">
                <label>UAE Permanent Address</label>
                <input type="text" class="form-control" name="emp_uae_per_add" id="emp_uae_per_add"
                  value="{{$detail->emp_uae_permanent_address}}" placeholder="Enter UAE Permanent Address">
                <span id="uae_per_add_error" style="color:red; font-style:italic; display: none;">This field
                  Required</span>
              </div>
              <div class="form-group col-md-4" style="margin-top: 30px;">
                <button type="button" id="employee_contact_update" onclick="EmployeeContactDetailUpdate()"
                  id="emp_contact_submit" class="btn btn-primary pr-5 pl-5">Submit
                </button>
                <span id="emp_contact_update_error_area" style="display: none;" class="m-auto"></span>
              </div>
            </div>

            <div class="form-row justify-content-center mt-2">

            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /.card -->
<script src="{{url('public/plugins/jquery/jquery.min.js')}}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('public/dist/js/demo.js')}}"></script>
<script>
$(document).ready(function() {

  $("#emp_name").select2({
    theme: "classic",
    width: 'resolve'
  });

});

function EmployeeContactDetailUpdate() {
  var emp_name_val = $("#emp_name").val();
  var emp_email_val = $("#emp_email").val();
  var emp_con_no_val = $("#emp_con_no").val();
  var emp_whatsapp_no_val = $("#emp_whatsapp_no").val();
  var emp_imo_no_val = $("#emp_imo_no").val();
  var emp_facebook_id_val = $("#emp_fb_id").val();
  var emp_per_con_name_val = $("#emp_per_con_name").val();
  var emp_per_con_no_val = $("#emp_per_con_no").val();
  var emp_per_con_rel_val = $("#emp_per_con_rel").val();
  var emp_uae_con_no_val = $("#emp_uae_con_no").val();
  var emp_uae_con_name_val = $("#emp_uae_con_name").val();
  var emp_uae_con_rel_val = $("#emp_uae_con_rel").val();
  var emp_uae_per_add_val = $("#emp_uae_per_add").val();

  if (emp_name_val == '' || emp_email_val == '' || emp_con_no_val == '' || emp_whatsapp_no_val == '' ||
    emp_imo_no_val == '' || emp_facebook_id_val == '' || emp_per_con_name_val == '' || emp_per_con_no_val == '' ||
    emp_per_con_rel_val == '' || emp_uae_con_no_val == '' || emp_uae_con_name_val == '' || emp_uae_con_rel_val == '' ||
    emp_uae_per_add_val == '') {
    $("#emp_contact_update_error_area").show();
    $("#emp_contact_update_error_area").addClass("alert alert-danger").html("All Field Must be Required");
    return false;
  } else {
    $("#emp_contact_update_error_area").hide();
    $("#emp_contact_update_error_area").removeClass("alert alert-danger");
  }

  $("#employee_contact_update").attr("disabled", true);
  $.ajax({
    type: "POST",
    url: "{{route('Employee-Contact-Detail-Update')}}",
    data: $("#EmployeeContactDetailEditForm").serialize(),
    error: function(jqXHR, textStatus, errorThrown) {
      $("#emp_contact_update_error_area").show();
      $("#emp_contact_update_error_area").addClass("alert alert-danger").html(errorThrown).css({
        "color": "#fff"
      });
      return false;
    },
    success: function(data) {
      console.log(data);
      $("#employee_contact_update").attr("disabled", true);

      if (data["success"] == true) {
        swal({
          title: "Updated..!",
          text: "Employee Contact Detail Updated Successfully...",
          icon: "success",
        });
        window.location.href = "{{route('Employee-Contact-Detail-Show')}}";

      } else {
        $("#emp_bank_error_area").show();
        $("#emp_bank_error_area").addClass("alert alert-danger").html(data['message']).css({
          "color": "#fff"
        });
        return false;
      }
    }
  });
}
</script>

@endsection