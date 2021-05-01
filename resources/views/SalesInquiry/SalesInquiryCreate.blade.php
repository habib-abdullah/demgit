@extends('layout')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex">
                    <h3 class="card-title">
                        <a href="{{route('Sales-Inquiry')}}" style="font-size: 18px;"><i
                                class="fas fa-arrow-circle-left"></i>Back</a>
                    </h3>
                    <h4 class="ml-auto">Add Presales Inquiry</h4>
                </div>
                <!-- form start -->
                <form id="InquiryStoreForm">
                    @csrf
                    <div class="form-row justify-content-center mt-5">
                        <div class="form-group col-md-4">
                            <label>Inquiry Date & time</label>
                            <input type="datetime-local" class="form-control inquiryrequired" name="inquiry_date"
                                id="inquiry_date" placeholder="Enter Inquiry Date and time">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Inquiry Response Deadline</label>
                            <input type="datetime-local" class="form-control inquiryrequired"
                                name="inquiry_response_date" id="inquiry_response_date"
                                placeholder="Enter Inquiry Response Deadline">
                        </div>
                    </div>
                    <div class="form-row justify-content-center mt-3">
                        <div class="form-group col-md-4 mt-2">
                            <lable>Customer</lable><br>
                            <select class="form-control selectBox Customer" name="client_id" id="client_id">
                                <option selected="selected" disabled>Select</option>
                                @if(count($client) > 0)
                                @foreach($client as $row)
                                <option value="{{$row->client_id}}">
                                    {{$row->company_name}}
                                </option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Asignee</label>
                            <select class="form-control selectBox Customer" name="employee_id" id="employee_id">
                                <option selected="selected" disabled>Select</option>
                                @if(count($Employee) > 0)
                                @foreach($Employee as $emp)
                                <option value="{{$emp->employee_id}}">
                                    {{$emp->first_name}} {{$emp->last_name}}
                                </option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-row justify-content-center mt-3">
                        <div class="form-group col-md-4">
                            <label>Contact Person</label>
                            <input type="text" class="form-control inquiryrequired" name="inquiry_person"
                                id="inquiry_person" placeholder="Enter Contact Person">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Contact Person Number</label>
                            <input type="number" class="form-control inquiryrequired" name="inquiry_person_mobile"
                                id="inquiry_person_mobile" placeholder="Enter Contact Person Number">
                        </div>
                    </div>
                    <div class="form-row justify-content-center mt-3">
                        <div class="form-group col-md-4">
                            <label>Email</label>
                            <input type="email" class="form-control inquiryrequired " name="inquiry_person_email"
                                id="inquiry_person_email" placeholder="Enter email">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Inquiry Channel</label>
                            <input type="text" class="form-control inquiryrequired" name="inquiry_channel"
                                id="inquiry_channel" placeholder="Enter Inquiry Channel">
                        </div>
                    </div>
                    <div class="form-row justify-content-center mt-3">
                        <div class="form-group col-md-4">
                            <label>Inquiry No</label>
                            <input type="text" class="form-control inquiryrequired" name="inquiry_no" id="inquiry_no"
                                placeholder="Enter Inquiry No">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Inquiry Subject</label>
                            <input type="text" class="form-control inquiryrequired" name="inquiry_subject"
                                id="inquiry_subject" placeholder="Enter Inquiry Subject">
                        </div>
                    </div>
                    <div class="form-row justify-content-center mt-3">
                        <div class="form-group col-md-4">
                            <label>Note</label>
                            <input type="text" class="form-control inquiryrequired" name="inquiry_note"
                                id="inquiry_note" placeholder="Enter inquiry note">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Attachments</label>
                            <input type="file" class="form-control " name="inquiry_attachment[]"
                                id="inquiry_attachment" >
                        </div>
                    </div>
                </form>
                <div class="form-row justify-content-center mt-3">
                    <div class="form-group ">
                        <span id="show_error" style="display: none;" class="m-auto"></span>
                    </div>
                </div>
                <div class="form-row justify-content-center mt-2">
                    <div class="form-group">
                        <span id="emp_bank_error_area" style="display: none;" class="m-auto"></span>
                        <button type="button" onclick="InquiryStore()" id="btnSubmit"
                            class="btn btn-primary m-auto">Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{url('public/plugins/jquery/jquery.min.js')}}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    $(".Customer").select2({
        theme: "classic",
        width: 'resolve'
    });
})

function InquiryStore() {
    var fields = $("input[class*='required']");
    console.log(fields.val());
    for (let i = 0; i <= fields.length; i++) {
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('id');
            // $("input[class*='required']")[i].focus();
            // currentElement.addClass('border border-danger');  not working
            var value = currentElement.replaceAll('_', ' ');
            $("#show_error").removeClass().html('');
            $("#show_error").show().addClass('alert alert-danger').html('The ' + value + ' field is required.');

            return false;
        } else {
            $("#show_error").hide().removeClass().html('');
        }
    }

    if ($("#client_id option:selected").text() == 'Select') {
        $("#show_error").removeClass().html('');
        $("#show_error").show().addClass('alert alert-danger').html('The customer field is required.');
        return false;
    } else {
        $("#show_error").removeClass().html('').hide();
    }
    if ($("#employee_id option:selected").text() == 'Select') {
        $("#show_error").removeClass().html('');
        $("#show_error").show().addClass('alert alert-danger').html('The assignee field is required.');
        return false;
    } else {
        $("#show_error").removeClass().html('').hide();
    }

    let myForm = document.getElementById('InquiryStoreForm');
    let formData = new FormData(myForm);
    $("#btnSubmit").prop("disabled", true);
    $.ajax({

        type: "POST",
        url: "{{route('SalesInquiry-Store')}}",
        // data: $("#InquiryStoreForm").serialize(),
        data: formData,
        contentType: false,
        processData: false,
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btnSubmit").prop("disabled", false);
            $("#show_error").removeClass().html('').show();
            $("#show_error").addClass("alert alert-danger").html(errorThrown);
            return false;
        },
        success: function(data) {
            $("#btnSubmit").prop("disabled", false);
            console.log(data);
            if (data["success"] == true) {
                setTimeout(() => {
                    $("#show_error").removeClass().html('').show();
                    $("#show_error").addClass("alert alert-success").html(data['message']);
                    window.location.href = "{{route('Sales-Inquiry')}}";
                }, 1500);
            } else {
                if (data['validation'] == false) {
                    $("#show_error").removeClass().html('').show();
                    $("#show_error").addClass("alert alert-danger").html(data['message'][0]);
                    return false;
                }
                $("#show_error").removeClass().html('').show();
                $("#show_error").addClass("alert alert-danger").html(data['message'][0]);
                return false;
            }
        }
    });
}
</script>

@endsection()