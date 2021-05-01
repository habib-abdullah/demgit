@extends('layout')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a href="{{route('Employee-Contact-Detail-Show')}}" style="font-size: 18px;"><i
                                    class="fas fa-arrow-circle-left"></i></a> Add Employee Contact Detail
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="EmployeeContactDetailForm">
                        @csrf
                        <div class="form-row justify-content-center mt-3">
                            <div class="form-group col-md-2 mt-3" id="emp_profile_img">

                            </div>
                        </div>

                        <div class="form-row justify-content-center mt-3">

                            <div class="form-group col-md-4">
                                <label>Employee Name<span class="text-danger">**</span></label>
                                <select class="form-control" name="emp_name" id="emp_name">
                                    <option selected disabled>Select</option>
                                    @foreach($row as $rows)
                                    <option value="{{$rows->employee_id}}">{{$rows->first_name}} {{$rows->last_name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Employee Email</label>
                                <input type="email" class="form-control emp_email_err" name="emp_email" id="emp_email"
                                    placeholder="Enter Employee Email Address">
                                <div class="emp_email_err_msg"></div>
                            </div>

                        </div>

                        <div class="form-row justify-content-center mt-2">

                            <div class="form-group col-md-4">
                                <label>Contact no</label>
                                <input type="number" class="form-control emp_cont_err" name="emp_con_no" id="emp_con_no"
                                    placeholder="Enter Contact Number">
                                <div class="emp_cont_err_msg"></div>
                            </div>

                            <div class="form-group col-md-4">
                                <label>WhatsApp no</label>
                                <input type="number" class="form-control emp_whatsapp_no_err" name="emp_whatsapp_no"
                                    id="emp_whatsapp_no" placeholder="Enter WhatsApp Number">
                                <div class="emp_whatsapp_no_err_msg"></div>
                            </div>

                        </div>

                        <div class="form-row justify-content-center mt-2">
                            <div class="form-group col-md-4">
                                <label>Imo no</label>
                                <input type="text" class="form-control emp_imo_no_err" name="emp_imo_no" id="emp_imo_no"
                                    placeholder="Enter Imo Number">
                                <div class="emp_imo_no_err_msg"></div>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Facebook Id</label>
                                <input type="text" class="form-control emp_fb_id_err" name="emp_fb_id" id="emp_fb_id"
                                    placeholder="Enter Facebook Id">
                                <div class="emp_fb_id_err_msg"></div>
                            </div>
                        </div>
                        <div class="form-row justify-content-center mt-2">
                            <div class="form-group col-md-4">
                                <label>Permanent Contact Name</label>
                                <input type="text" class="form-control emp_per_con_name_err" name="emp_per_con_name"
                                    id="emp_per_con_name" placeholder="Enter Permanent Contact Name">
                                <div class="emp_per_con_name_err_msg"></div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Permanent Contact no</label>
                                <input type="number" class="form-control emp_per_con_no_err" name="emp_per_con_no"
                                    id="emp_per_con_no" placeholder="Enter Permanent Contact no">
                                <div class="emp_per_con_no_err_msg"></div>
                            </div>
                        </div>

                        <div class="form-row justify-content-center mt-2">
                            <div class="form-group col-md-4">
                                <label>Permanent Contact Relation</label>
                                <input type="text" class="form-control emp_per_con_rel_err" name="emp_per_con_rel"
                                    id="emp_per_con_rel" placeholder="Enter Permanent Contact Relation">
                                <div class="emp_per_con_rel_err_msg"></div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>UAE Emergency Contact no</label>
                                <input type="number" class="form-control emp_uae_con_no_err" name="emp_uae_con_no"
                                    id="emp_uae_con_no" placeholder="Enter UAE Emergency Contact no">
                                <div class="emp_uae_con_no_err_msg"></div>
                            </div>
                        </div>

                        <div class="form-row justify-content-center mt-2">
                            <div class="form-group col-md-4">
                                <label>UAE Contact Name</label>
                                <input type="text" class="form-control emp_uae_con_name_err" name="emp_uae_con_name"
                                    id="emp_uae_con_name" placeholder="Enter UAE Contact Name">
                                <div class="emp_uae_con_name_err_msg"></div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>UAE Contact Relation</label>
                                <input type="text" class="form-control emp_uae_con_rel_err" name="emp_uae_con_rel"
                                    id="emp_uae_con_rel" placeholder="Enter UAE Contact Relation">
                                <div class="emp_uae_con_rel_err_msg"></div>
                            </div>
                        </div>

                        <div class="form-row justify-content-center mt-2">
                            <div class="form-group col-md-4">
                                <label>UAE Permanent Address</label>
                                <input type="text" class="form-control emp_uae_per_add_err" name="emp_uae_per_add"
                                    id="emp_uae_per_add" placeholder="Enter UAE Permanent Address">
                                <div class="emp_uae_per_add_err_msg"></div>
                            </div>
                            <div class="form-group col-md-4" style="margin-top: 30px;">
                                <button type="button" onclick="EmployeeContactStore()" id="emp_contact_submit"
                                    class="btn btn-primary pr-4 pl-4">Submit
                                </button>
                                <span id="emp_contact_error_area" style="display: none;" class="m-auto"></span>
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
$(function() {
    $("#emp_name").select2({
        theme: "classic",
        width: 'resolve'
    });
});
$(document).ready(function() {
    $('#emp_name').on('change', function() {
        let id = $(this).val();
        $('#emp_profile_img').empty();
        $('#emp_profile_img').append(``);
        $.ajax({
            type: 'GET',
            url: 'GetEmployeeProfilePicture/' + id,
            success: function(response) {
                var response = JSON.parse(response);
                console.log(response);
                $('#emp_profile_img').empty();
                $('#emp_profile_img').append(``);
                response.forEach(element => {
                    $('#emp_profile_img').append(
                        `<img src="http://localhost/Al_Chisty/public/crop_image/${element['emp_profile_img']}" alt="No image available" style="width:100px;height:auto;">`
                        );
                });
            }
        });
    });
});

function EmployeeContactStore() {

    //form validation code

    //Validation for email start
    var email_validate = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var email_val = $("#emp_email").val();
    if (email_val == "") {

        $('.emp_email_err').addClass('border border-danger');
        $('.emp_email_err_msg').html('Please Fill The Email Address').addClass('text-danger');
        $("#emp_contact_error_area").show();
        $("#emp_contact_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({
            "color": "#fff"
        });
        return false;
    } else {
        $('.emp_email_err').removeClass('border border-danger');
        $('.emp_email_err_msg').html('').removeClass('text-danger');
        $("#emp_contact_error_area").removeClass("alert alert-danger").html("").css({
            "color": "#fff"
        });
    }
    //var Email_val = $('#form_email').val();
    if (!email_validate.test(email_val)) {
        $('.emp_email_err').addClass('border border-danger');
        $('.emp_email_err_msg').html('Email Must be Validated').addClass('text-danger');
        $("#emp_contact_error_area").show();
        $("#emp_contact_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({
            "color": "#fff"
        });
        return false;
    } else {
        $('.emp_email_err').removeClass('border border-danger');
        $('.emp_email_err_msg').html('').removeClass('text-danger');
        $("#emp_contact_error_area").removeClass("alert alert-danger").html("").css({
            "color": "#fff"
        });
    }
    //Validation for email End

    var cont_no_val = $("#emp_con_no").val();
    if (cont_no_val == "") {

        $('.emp_cont_err').addClass('border border-danger');
        $('.emp_cont_err_msg').html('Please Fill Contact Number').addClass('text-danger');
        $("#emp_contact_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({
            "color": "#fff"
        });
        return false;
    } else {
        $('.emp_cont_err').removeClass('border border-danger');
        $('.emp_cont_err_msg').html('').removeClass('text-danger');
        $("#emp_contact_error_area").removeClass("alert alert-danger").html("").css({
            "color": "#fff"
        });
    }

    var whatsapp_no_val = $("#emp_whatsapp_no").val();
    if (whatsapp_no_val == "") {

        $('.emp_whatsapp_no_err').addClass('border border-danger');
        $('.emp_whatsapp_no_err_msg').html('Please Fill WhatsApp Number').addClass('text-danger');
        $("#emp_contact_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({
            "color": "#fff"
        });
        return false;
    } else {
        $('.emp_whatsapp_no_err').removeClass('border border-danger');
        $('.emp_whatsapp_no_err_msg').html('').removeClass('text-danger');
        $("#emp_contact_error_area").removeClass("alert alert-danger").html("").css({
            "color": "#fff"
        });
    }

    var imo_no_val = $("#emp_imo_no").val();
    if (imo_no_val == "") {

        $('.emp_imo_no_err').addClass('border border-danger');
        $('.emp_imo_no_err_msg').html('Please Fill IMO Number').addClass('text-danger');
        $("#emp_contact_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({
            "color": "#fff"
        });
        return false;
    } else {
        $('.emp_imo_no_err').removeClass('border border-danger');
        $('.emp_imo_no_err_msg').html('').removeClass('text-danger');
        $("#emp_contact_error_area").removeClass("alert alert-danger").html("").css({
            "color": "#fff"
        });
    }
    var fb_id_val = $("#emp_fb_id").val();
    if (fb_id_val == "") {

        $('.emp_fb_id_err').addClass('border border-danger');
        $('.emp_fb_id_err_msg').html('Please Fill Facebook ID').addClass('text-danger');
        $("#emp_contact_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({
            "color": "#fff"
        });
        return false;
    } else {
        $('.emp_fb_id_err').removeClass('border border-danger');
        $('.emp_fb_id_err_msg').html('').removeClass('text-danger');
        $("#emp_contact_error_area").removeClass("alert alert-danger").html("").css({
            "color": "#fff"
        });
    }
    var per_con_name_val = $("#emp_per_con_name").val();
    if (per_con_name_val == "") {

        $('.emp_per_con_name_err').addClass('border border-danger');
        $('.emp_per_con_name_err_msg').html('Please Fill Permanent Contact Name').addClass('text-danger');
        $("#emp_contact_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({
            "color": "#fff"
        });
        return false;
    } else {
        $('.emp_per_con_name_err').removeClass('border border-danger');
        $('.emp_per_con_name_err_msg').html('').removeClass('text-danger');
        $("#emp_contact_error_area").removeClass("alert alert-danger").html("").css({
            "color": "#fff"
        });
    }

    var per_con_no_val = $("#emp_per_con_no").val();
    if (per_con_no_val == '') {
        $('.emp_per_con_no_err').addClass('border border-danger');
        $('.emp_per_con_no_err_msg').html('Please Fill Permanent Contact Number').addClass('text-danger');
        $("#emp_contact_error_area").show();
        $("#emp_contact_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({
            "color": "#fff"
        });
        return false;
    } else {
        $('.emp_per_con_no_err').removeClass('border border-danger');
        $('.emp_per_con_no_err_msg').html('').removeClass('text-danger');
        $("#emp_contact_error_area").removeClass("alert alert-danger").html("").css({
            "color": "#fff"
        });
    }

    var per_con_rel_val = $("#emp_per_con_rel").val();
    if (per_con_rel_val == '') {
        $('.emp_per_con_rel_err').addClass('border border-danger');
        $('.emp_per_con_rel_err_msg').html('Please Fill Permanent Contact Relation').addClass('text-danger');
        $("#emp_contact_error_area").show();
        $("#emp_contact_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({
            "color": "#fff"
        });
        return false;
    } else {
        $('.emp_per_con_rel_err').removeClass('border border-danger');
        $('.emp_per_con_rel_err_msg').html('').removeClass('text-danger');
        $("#emp_contact_error_area").removeClass("alert alert-danger").html("").css({
            "color": "#fff"
        });
    }

    var uae_con_no_val = $("#emp_uae_con_no").val();
    if (uae_con_no_val == '') {
        $('.emp_uae_con_no_err').addClass('border border-danger');
        $('.emp_uae_con_no_err_msg').html('Please Fill UAE Contact Number').addClass('text-danger');
        $("#emp_contact_error_area").show();
        $("#emp_contact_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({
            "color": "#fff"
        });
        return false;
    } else {
        $('.emp_uae_con_no_err').removeClass('border border-danger');
        $('.emp_uae_con_no_err_msg').html('').removeClass('text-danger');
        $("#emp_contact_error_area").removeClass("alert alert-danger").html("").css({
            "color": "#fff"
        });
    }

    var uae_con_name_val = $("#emp_uae_con_name").val();
    if (uae_con_name_val == '') {
        $('.emp_uae_con_name_err').addClass('border border-danger');
        $('.emp_uae_con_name_err_msg').html('Please Fill UAE Contact Name').addClass('text-danger');
        $("#emp_contact_error_area").show();
        $("#emp_contact_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({
            "color": "#fff"
        });
        return false;
    } else {
        $('.emp_uae_con_name_err').removeClass('border border-danger');
        $('.emp_uae_con_name_err_msg').html('').removeClass('text-danger');
        $("#emp_contact_error_area").removeClass("alert alert-danger").html("").css({
            "color": "#fff"
        });
    }

    var uae_con_rel_val = $("#emp_uae_con_rel").val();
    if (uae_con_rel_val == '') {
        $('.emp_uae_con_rel_err').addClass('border border-danger');
        $('.emp_uae_con_rel_err_msg').html('Please Fill UAE Contact Relation').addClass('text-danger');
        $("#emp_contact_error_area").show();
        $("#emp_contact_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({
            "color": "#fff"
        });
        return false;
    } else {
        $('.emp_uae_con_rel_err').removeClass('border border-danger');
        $('.emp_uae_con_rel_err_msg').html('').removeClass('text-danger');
        $("#emp_contact_error_area").removeClass("alert alert-danger").html("").css({
            "color": "#fff"
        });
    }

    var uae_per_add_val = $("#emp_uae_per_add").val();
    if (uae_per_add_val == '') {
        $('.emp_uae_per_add_err').addClass('border border-danger');
        $('.emp_uae_per_add_err_msg').html('Please Fill UAE Permanent Address').addClass('text-danger');
        $("#emp_contact_error_area").show();
        $("#emp_contact_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({
            "color": "#fff"
        });
        return false;
    } else {
        $('.emp_uae_per_add_err').removeClass('border border-danger');
        $('.emp_uae_per_add_err_msg').html('').removeClass('text-danger');
        $("#emp_contact_error_area").removeClass("alert alert-danger").html("").css({
            "color": "#fff"
        });
    }

    $("#emp_contact_submit").attr("disabled", true);
    $.ajax({

        type: "POST",
        url: "{{route('Employee-Contact-Store')}}",
        data: $("#EmployeeContactDetailForm").serialize(),
        error: function(jqXHR, textStatus, errorThrown) {
            $("#emp_contact_error_area").show();
            $("#emp_contact_error_area").addClass("alert alert-danger").html(errorThrown).css({
                "color": "#fff"
            });
            return false;
        },
        success: function(data) {
            console.log(data);
            $("#emp_contact_submit").attr("disabled", false);
            if (data["success"] == true) {
                swal({
                    title: "Stored..!",
                    text: "Employee Contact Detail Stored Successfully...",
                    icon: "success",
                });
                window.location.href = "{{route('Employee-Contact-Detail-Show')}}";

            } else {
                $("#emp_contact_error_area").show();
                $("#emp_contact_error_area").addClass("alert alert-danger").html(data['message']).css({
                    "color": "#fff"
                });
                return false;
            }
        }
    });
}
</script>

@endsection