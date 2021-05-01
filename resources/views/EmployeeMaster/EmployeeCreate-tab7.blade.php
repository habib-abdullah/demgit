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
                            <li class="nav-item"><a class="nav-link " href="Employee-{{$employee_id}}-Mol-Record">MOL
                                    record</a></li>
                            <li class="nav-item"><a class="nav-link " href="Employee-{{$employee_id}}-Health">Health</a>
                            </li>
                            <li class="nav-item"><a class="nav-link active" href="#tab_7" data-toggle="tab">Contact
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
                                <div class="tab-pane active" id="tab_7">
                                    <div class="form-row justify-content-center mt-5">
                                        <div class="form-group col-md-4">
                                            <label>Contact</label>
                                            <input type="number" class="form-control contact_required"
                                                name="employee_contact" id="employee_contact"
                                                placeholder="Employee contact" value="{{$employee->contact ?? ''}}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Whatsapp No</label>
                                            <input type="number" class="form-control contact_required"
                                                name="employee_whatsapp_no" id="employee_whatsapp_no"
                                                placeholder="Employee whatsapp no"
                                                value="{{$employee->whatsapp_no ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>IMO No</label>
                                            <input type="text" class="form-control contact_required"
                                                name="employee_imo_no" id="employee_imo_no"
                                                placeholder="Employee imo no" value="{{$employee->imo_no ?? ''}}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Facebook</label>
                                            <input type="text" class="form-control contact_required"
                                                name="employee_facebook" id="employee_facebook"
                                                placeholder="Employee facebook" value="{{$employee->facebook ?? ''}}">
                                        </div>
                                    </div>
                                    <!-- <div class="form-row justify-content-center my-2">
                                        <div class="form-group col-md-8">
                                            <h4 class="modal-title">Relative Contacts In UAE</h4>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Permanent Contact Name</label>
                                            <input type="text" class="form-control required"
                                                name="permanent_contact_name" id="permanent_contact_name"
                                                placeholder="Employee permanent contact name"
                                                value="{{$employee->permanent_contact_name ?? ''}}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Permanent Contact Number</label>
                                            <input type="number" class="form-control required"
                                                name="permanent_contact_number" id="permanent_contact_number"
                                                placeholder="Employee permanent contact number"
                                                value="{{$employee->permanent_contact_no ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Permanent Contact Relation</label>
                                            <input type="text" class="form-control required"
                                                name="permanent_contact_relation" id="permanent_contact_relation"
                                                placeholder="Employee permanent contact relation"
                                                value="{{$employee->permanent_contact_relation ?? ''}}">
                                        </div>
                                        <div class="form-group col-md-4">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>UAE Emergency Contact Name</label>
                                            <input type="text" class="form-control required"
                                                name="uae_emergency_contact_name" id="uae_emergency_contact_name"
                                                placeholder="Employee UAE emergency contact name"
                                                value="{{$employee->uae_emergency_contact_name ?? ''}}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>UAE Emergency Contact No</label>
                                            <input type="number" class="form-control required"
                                                name="uae_emergency_contact_no" id="uae_emergency_contact_no"
                                                placeholder="Employee UAE emergency contact no"
                                                value="{{$employee->uae_emergency_contact_no ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-8">
                                            <label>Emergency Cont. Per. Address</label>
                                            <input type="text" class="form-control required"
                                                name="emergency_contact_per_address" id="emergency_contact_per_address"
                                                placeholder="Employee emergency cont. per. address"
                                                value="{{$employee->uae_emergency_contact_address ?? ''}}">
                                        </div>
                                    </div>-->
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group" id="contact_show_error">
                                        </div>
                                    </div>
                                    <a href="Employee-{{$employee_id}}-Health"
                                        class="btn btn-primary text-white float-left" style="font-size: 18px;"> Previous
                                    </a>
                                    <a href="Employee-{{$employee_id}}-Bank"
                                        class="btn btn-warning mx-2 px-4 float-right" style="font-size: 18px;"> Skip
                                    </a>
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
<!-- Additional Contact Section  -->
<section>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header text-right">
                <p class="card-title">Additional Relation Contacts</p>
                <button class="btn btn-primary" data-toggle="modal" data-target="#AdditionalInfoModal">Add
                    Contact</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="DataTable" class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>UID</th>
                                <th>Contact Name</th>
                                <th>Contact Relation</th>
                                <th>Contact Number</th>
                                <th>Contact Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Additional Contact Section  -->

<!-- Insert Modal -->
<div class="modal fade" id="AdditionalInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Additional Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Insert Form -->
                <form id="AdditionalInfoForm">
                    @csrf
                    <input type="hidden" id="employee_id" name="employee_id" value="{{$employee_id}}">
                    <div class="form-group">
                        <lable>Contact Name</lable>
                        <input type="text" class="form-control form-control-user border-primary info_input "
                            id="contact_name" name="contact_name" autocomplete=" off">
                    </div>
                    <div class="form-group">
                        <lable>Contact Relation</lable>
                        <input type="text" class="form-control form-control-user border-primary info_input"
                            id="contact_relation" name="contact_relation" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <lable>Contact Number</lable>
                        <input type="number" class="form-control form-control-user border-primary info_input"
                            id="contact_number" name="contact_number" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <lable>Contact Address</lable>
                        <input type="text" class="form-control form-control-user border-primary info_input"
                            id="contact_address" name="contact_address" autocomplete="off">
                    </div>
                </form>
                <!-- Insert Form -->
            </div>
            <div class="modal-body mx-auto text-center">
                <div id="show_error" style="display: none;"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="AdditionalIInfoInsert()">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- Insert Modal -->

<!-- Edit Modal -->
<div class="modal fade" id="EditInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Additional Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Insert Form -->
                <form id="AdditionalInfoEditForm">
                    @csrf
                    <input type="hidden" id="contact_id" name="contact_id">
                    <div class="form-group">
                        <lable>Contact Name</lable>
                        <input type="text" class="form-control form-control-user border-primary info_edit_input "
                            id="edit_name" name="contact_name" autocomplete=" off">
                    </div>
                    <div class="form-group">
                        <lable>Contact Relation</lable>
                        <input type="text" class="form-control form-control-user border-primary info_edit_input"
                            id="edit_relation" name="contact_relation" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <lable>Contact Number</lable>
                        <input type="number" class="form-control form-control-user border-primary info_edit_input"
                            id="edit_number" name="contact_number" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <lable>Contact Address</lable>
                        <input type="text" class="form-control form-control-user border-primary info_edit_input"
                            id="edit_address" name="contact_address" autocomplete="off">
                    </div>
                </form>
                <!-- Insert Form -->
            </div>
            <div class="modal-body mx-auto text-center">
                <span id="show_edit_error" style="display: none; "></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="AdditionalIInfoUpdate()">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Modal -->

<!-- //Select 2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<!-- croppie plugin -->
<script src="{{url('Croppie/croppie.js')}}"></script>

<script type="text/javascript">
var base_url = "{{url('/')}}";
$(document).ready(function() {

    $("#btnSubmit").click(function(event) {
        // event.preventDefault();

        var fields = $("input[class*='contact_required']");
        for (let i = 0; i <= fields.length; i++) {
            if ($(fields[i]).val() === '') {
                var currentElement = $(fields[i]).attr('id');
                var value = currentElement.replaceAll('_', ' ');
                $("#contact_show_error").removeClass().html('');
                $("#contact_show_error").show().addClass('alert alert-danger').html('The ' + value +
                    ' field is required.');
                return false;
            } else {
                $("#contact_show_error").hide().removeClass().html('');
            }
        }
        $("#btnSubmit").prop("disabled", true);
        $.ajax({
            type: "POST",
            url: "{{route('Employee-Contact-Store')}}",
            data: $("#EmployeeStore").serialize(),
            error: function(jqXHR, textStatus, errorThrown) {
                $("#contact_show_error").removeClass().show().html('');
                $("#contact_show_error").addClass("alert alert-danger").html(errorThrown);
                $("#btnSubmit").prop("disabled", false);
            },
            success: function(data) {
                $("#btnSubmit").prop("disabled", false);
                console.log(data);
                // return false;
                if (data['success'] == true) {
                    // console.log(data['message']);
                    setTimeout(() => {
                        $("#contact_show_error").removeClass().show().html('');
                        $("#contact_show_error").addClass("alert alert-success")
                            .html(data['message']);
                        next_url = 'Employee-' + data['employee_id'] + '-Bank';
                        window.location.href = next_url;
                    }, 1500);

                } else {
                    if (data['validation'] == false) {
                        $("#contact_show_error").removeClass().show().html('');
                        $("#contact_show_error").addClass("alert alert-danger").html(data[
                            'message'][0]);
                        return false;
                    }
                    $("#contact_show_error").removeClass().show().html('');
                    $("#contact_show_error").addClass("alert alert-danger").html(data[
                        'message']);
                }
            }
        });
    });

    // Additional Information

    var tables = $("#DataTable").DataTable({
        "autoWidth": true,
        "responsive": true,
        dom: 'Bfrtip',
        buttons: [
            'excel', 'print'
        ],
        "processing": true,
        "serverSide": true,
        ajax: {
            url: "{{route('Addtional-Info-Show')}}",
            data: {
                employee_id: "{{$employee_id}}"
            },
        },
        columns: [{
                data: 'contact_id',
                'searchable': false,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'contact_name',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'contact_relation',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'contact_number',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'contact_address',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'action',
                'searchable': false,
                'orderable': false,
                'class': 'text-center'
            }
        ]
    });

    $("#department_supervised_by").select2({
        theme: "classic",
        // width: 'resolve'
    });

});


// Additional Information Insert()
function AdditionalIInfoInsert() {
    var fields = $("input[class*='info_input']");
    for (let i = 0; i <= fields.length; i++) {
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('id');
            var value = currentElement.replaceAll('_', ' ');
            $("#show_error").removeClass().html('');
            $("#show_error").show().addClass('alert alert-danger').html('The ' + value + ' field is required.');
            return false;
        } else {
            $("#show_error").hide().removeClass().html('');
        }
    }

    // Main Ajax Request
    $("#btnSubmit").prop("disabled", true);
    $.ajax({
        type: "POST",
        url: "{{route('Additionalinfo-Store')}}",
        data: $("#AdditionalInfoForm").serialize(),
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btnSubmit").prop("disabled", false);
            $("#show_error").removeClass().html('').show();
            $("#show_error").addClass("alert alert-danger").html(errorThrown);
            return false;
        },
        success: function(data) {
            $("#btnSubmit").prop("disabled", false);
            console.log(data);
            // return false;
            if (data["success"] == true) {
                $("#show_error").removeClass().html('').show();
                $("#show_error").addClass("alert alert-success").html(data['message']);
                setTimeout(() => {
                    $("#AdditionalInfoModal").modal('hide');
                    $("#show_error").removeClass().html('').hide();
                    $("#AdditionalInfoForm")[0].reset();
                    tables = $("#DataTable").dataTable();
                    tables.fnPageChange('first', 1);
                }, 2000);
            } else {
                if (data['validation'] == false) {
                    $("#show_error").removeClass().show().html('');
                    $("#show_error").addClass("alert alert-danger").html(data['message'][0]);
                    return false;
                }
                $("#show_error").removeClass().html('').show();
                $("#show_error").addClass("alert alert-danger").html(data['message']);
                return false;
            }
        }
    });
}

// Main Edit Fucntion

function AdditionalInfoEdit(contact_id) {

    var url_edit = base_url + "/Admin/AdditionalInfo-" + contact_id + "-Edit";
    $.get(url_edit, function(data) {
        $("#EditInfoModal").modal('show');
        $("#contact_id").val(data[0]['contact_id']);
        $("#edit_name").val(data[0]['contact_name']);
        $("#edit_number").val(data[0]['contact_number']);
        $("#edit_relation").val(data[0]['contact_relation']);
        $("#edit_address").val(data[0]['contact_address']);
    });
}

// Main Update Fucntion
function AdditionalIInfoUpdate() {
    var fields = $("input[class*='info_edit_input']");
    for (let i = 0; i <= fields.length; i++) {
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('name');
            var value = currentElement.replaceAll('_', ' ');
            $("#show_edit_error").removeClass().html('');
            $("#show_edit_error").show().addClass('alert alert-danger').html('The ' + value + ' field is required.');
            return false;
        } else {
            $("#show_edit_error").hide().removeClass().html('');
        }
    }

    // Mian Ajax Request
    $.ajax({
        type: "POST",
        url: "{{route('AdditionalInfo-Update')}}",
        data: $("#AdditionalInfoEditForm").serialize(),
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btnUpdate").prop("disabled", false);
            $("#show_edit_error").removeClass().html('').show();
            $("#show_edit_error").addClass("alert alert-danger").html(errorThrown);
            return false;
        },
        success: function(data) {
            $("#btnUpdate").prop("disabled", false);
            console.log(data);
            // return false;
            if (data["success"] == true) {
                $("#show_edit_error").removeClass().html('').show();
                $("#show_edit_error").addClass("alert alert-success").html(data['message']);
                setTimeout(() => {
                    $("#EditInfoModal").modal('hide');
                    $("#AdditionalInfoEditForm")[0].reset();
                    $("#show_edit_error").removeClass().html('').hide();
                    tables = $("#DataTable").dataTable();
                    tables.fnPageChange('first', 1);
                }, 2000);
            } else {
                if (data['validation'] == false) {
                    $("#show_error").removeClass().show().html('');
                    $("#show_error").addClass("alert alert-danger").html(data['message'][0]);
                    return false;
                }
                $("#show_edit_error").removeClass().html('').show();
                $("#show_edit_error").addClass("alert alert-danger").html(data['message']);
                return false;
            }
        }
    });
}

// Main Remove Function
function AdditionalInfoRemove(contact_id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.get("{{route('AdditionalInfo-Remove')}}", {
                contact_id: contact_id
            }, function(data) {
                console.log(data);
                if (data['success'] == true) {
                    swal("Poof! Department has been deleted!", {
                        icon: "success",
                    });
                    let DepartmentDataTable = $("#DataTable").dataTable();
                    DepartmentDataTable.fnPageChange('first', 1);
                } else {
                    swal("Oops something went wrong, please check!", {
                        icon: "error",
                    });
                }
            });
        } else {
            swal("Your record is safe!");
        }
    });
}
</script>
@endsection