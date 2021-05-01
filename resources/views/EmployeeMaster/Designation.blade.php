@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 mb-2">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Employee Designation</div>
                            <!-- <div class="h5 mb-0 ">
                                <a href="{{url('Admin/EmployeMaster')}}" style="font-size: 18px;"><i
                                class="fas fa-arrow-circle-left mr-2"></i>Back</a>
                            </div> -->
                        </div>
                        <div class="col-auto">
                            <div class="card-title">
                                <!-- <a href="{{url('Admin/EmployeMaster')}}" style="font-size: 18px;"><i
                                class="fas fa-arrow-circle-left mr-2"></i>Back</a> -->
                                <button type="button" class="btn btn-primary float-right px-4" data-toggle="modal"
                                data-target="#designationModal">Add Designation</button>
                            </div>
                            
                            <div class="modal fade" id="designationModal">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-primary">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Designation</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form id="DesignationStore">
                                                @csrf
                                                <div class="form-group">
                                                    <span class=""
                                                        style="color:red; font-size: 22px; font-weight: bolder;"> *
                                                    </span>
                                                    <label>Designation</label>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary"
                                                        placeholder="Enter designation name" id="designation"
                                                        name="designation" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <span class=""
                                                        style="color:red; font-size: 22px; font-weight: bolder;"> *
                                                    </span>
                                                    <label>Workshop Employee</label>
                                                    <select class="form-control" name="workshop_emp" id="workshop_emp">
                                                        <option selected value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" style="display:none;">
                                                    <label>Employee Status</label>
                                                    <select class="form-control" name="emp_status" id="emp_status">
                                                        <option selected value="1">True</option>
                                                        <option value="0">False</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <span class=""
                                                        style="color:red; font-size: 22px; font-weight: bolder;"> *
                                                    </span>
                                                    <label>Working site</label>
                                                    <select class="form-control" name="working_site" id="working_site">
                                                        <option selected value="main_site">Main site</option>
                                                        <option value="customer_site">Workd at customer site</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer mx-auto text-center">
                                            <div id="error_area" style="display: none;" class="m-auto"></div>
                                        </div>
                                        <div class="modal-footer">
                                            
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" id="btnSubmit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <!-- <div class="card-header">
        <button type="button" class="btn btn-primary float-right px-4" data-toggle="modal"
                                data-target="#designationModal">Add</button>
        </div> -->
        <div class="card-body">
            <div class="table-responsive">
                <table id="DataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>UID</th>
                            <th>Designation</th>
                            <th>Workshop Emp</th>
                            <th>Working Site</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="designationEditModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-primary">
            <div class="modal-header">
                <h4 class="modal-title">Designation Edit</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="editBody">

            </div>
            <div class="modal-footer mx-auto text-center">
                <div id="edit_error_area" style="display: none;" class="m-auto"></div>
            </div>
            <div class="modal-footer">
                <span id="" style="display: none;" class="m-auto"></span>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btnUpdate" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>
<script src="{{url('public/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript">
$(function() {
    var tables = $("#DataTable").DataTable({"autoWidth": true,
        "autoWidth": true,
    "responsive": true,
    dom: 'lBfrtip',
    buttons: [
      // 'excel', 'print'
      // { "extend": 'pageLength', "className": 'btn btn-default btn-sm px-4' },
      {
        "extend": 'excel',
        "text": 'Export',
        "className": 'btn btn-default btn-sm px-4 mx-1'
      },
      {
        "extend": 'print',
        "text": 'Print',
        "className": 'btn btn-default btn-sm px-4 mx-1'
      }
    ],
        processing: true,
        serverSide: true,
        ajax: "{{route('Designation-Report')}}",
        columns: [{
                data: 'designation_id'
            },
            {
                data: 'designation_name'
            },
            {
                data: 'workshop_emp',
                render: function(data) {
                    if (data == 1) {
                        return 'Yes';
                    } else {
                        return 'No';
                    }
                }
            },
            {
                data: 'working_site',
                render: function(data) {
                    return value = data.replaceAll('_', ' ');
                }
            },
            {
                data: 'action'
            }
        ]
    });
});
$('#btnSubmit').click(function() {

    var designation = $('#designation').val();
    var workshop_emp = $('#workshop_emp').find(":selected").text();
    var working_site = $('#working_site').find(":selected").text();
    // console.log(workshop_emp);
    // return false;
    if (designation == '') {
        $('#error_area').removeClass().html('');
        $('#error_area').addClass('alert alert-danger').show().html('The designation field is required.');
        return false;
    } else {
        $('#error_area').hide();
    }
    $.ajax({
        type: "POST",
        url: "{{route('Designation-Store')}}",
        data: $("#DesignationStore").serialize(),
        success: function(data) {
            // console.log(data);
            if (data["success"] == true) {
                $("#error_area").removeClass().show();
                $("#error_area").addClass("alert alert-success").html(data['message']);
                setTimeout(function() {
                    $("#designationModal").modal('hide');
                    $("#DesignationStore")[0].reset();
                    $('#error_area').hide();
                    let tables = $("#DataTable").dataTable();
                    tables.fnPageChange('first', 1);
                }, 2000);
                // location.reload()
            } else {
                if (data['validation'] == false) {
                    $("#error_area").removeClass().show().html('');
                    $("#error_area").addClass("alert alert-danger").html(data['message'][0]);
                    return false;
                }
                $('#error_area').removeClass().html('');
                $('#error_area').addClass('alert alert-danger').show().html(data['message']);
                return false;
            }
        }
    });
});

function DesignationEdit(designation_id) {
    $.get("{{url('Admin/DesignationEdit')}}", {
        designation_id: designation_id
    }, function(data) {
        // console.log(data[0].designation_id);
        // let checker = data[0].workshop_emp == 1 ? 
        // $('form#edit_workshop_emp option[value=1]').attr('selected','selected') :
        // $('form#edit_workshop_emp option[value=0]').attr('selected','selected');

        $('#editBody').html(data);
        // console.log(checker);
        return false;
        // $("#edit_designation_id").val(data[0].designation_id);
        // $("#edit_designation_name").val(data[0].designation_name);
        // $("#edit_workshop_emp").val(data[0].workshop_emp);
        // $("#edit_working_site").val(data[0].working_site);
    });
}

$('#btnUpdate').click(function() {
    // alert();return false;
    var designation_id = $('#edit_designation_id').val();
    var designation_name = $('#edit_designation_name').val();
    var workshop_emp = $('#edit_workshop_emp').find(":selected").text();
    var working_site = $('#edit_working_site').find(":selected").text();
    // console.log(workshop_emp);
    // return false;
    if (designation == '') {
        $('#edit_error_area').removeClass().html('');
        $('#edit_error_area').addClass('alert alert-danger').show().html('The designation field is required.');
        return false;
    } else {
        $('#edit_error_area').hide();
    }
    $.ajax({
        type: "POST",
        url: "{{route('Designation-Update')}}",
        data: $("#DesignationUpdate").serialize(),
        success: function(data) {
            // console.log(data);
            if (data["success"] == true) {
                $("#edit_error_area").removeClass().show();
                $("#edit_error_area").addClass("alert alert-success").html(data['message']);
                setTimeout(function() {
                    $("#designationEditModal").modal('hide');
                    $("#DesignationUpdate")[0].reset();
                    $('#edit_error_area').hide();
                    let tables = $("#DataTable").dataTable();
                    tables.fnPageChange('first', 1);
                }, 2000);
                // location.reload()
            } else {
                if (data['validation'] == false) {
                    $("#edit_error_area").removeClass().show().html('');
                    $("#edit_error_area").addClass("alert alert-danger").html(data['message'][0]);
                    return false;
                }
                $('#edit_error_area').removeClass().html('');
                $('#edit_error_area').addClass('alert alert-danger').show().html(data['message']);
                return false;
            }
        }
    });
});

function DesignationRemove(designation_id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.get("{{route('Designation-Remove')}}", {
                designation_id: designation_id
            }, function(data) {
                // console.log(data);
                if (data["success"] == true) {
                    swal("Poof! Designation has been removed!", {
                        icon: "success",
                    });
                    setTimeout(function() {
                        let tables = $("#DataTable").dataTable();
                        tables.fnPageChange('first', 1);
                    }, 2000);
                    // location.reload()
                } else {
                    swal("Poof! Designation remove failed!", {
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