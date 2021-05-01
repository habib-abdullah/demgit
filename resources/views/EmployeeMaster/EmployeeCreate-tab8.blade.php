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
                            <li class="nav-item"><a class="nav-link " href="Employee-{{$employee_id}}-Contact">Contact
                                    Info</a></li>
                            <li class="nav-item"><a class="nav-link active" href="#tab_8" data-toggle="tab">Bank
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
                                <input type="hidden" class="form-control" id="emp_bank_id" name="emp_bank_id">
                                <input type="hidden" class="form-control" id="employee_id" name="employee_id"
                                    value="{{$employee_id}}">
                                <div class="tab-pane active" id="tab_8">
                                    <div class="form-row justify-content-center mt-5">
                                        <div class="form-group col-md-4">
                                            <label>Bank Name</label>
                                            <input type="text" class="form-control required" name="bank_name"
                                                id="bank_name" placeholder="Employee bank name">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Branch</label>
                                            <input type="text" class="form-control required" name="branch_name"
                                                id="branch_name" placeholder="Employee branch">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Account Name</label>
                                            <input type="text" class="form-control required" name="account_name"
                                                id="account_name" placeholder="Employee account name">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Account No</label>
                                            <input type="text" class="form-control required" name="account_no"
                                                id="account_no" placeholder="Employee account no">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Account Type</label>
                                            <input type="text" class="form-control required" name="account_type"
                                                id="account_type" placeholder="Employee account type">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>IBAN</label>
                                            <input type="text" class="form-control required" name="iban" id="iban"
                                                placeholder="Employee IBAN">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Swift</label>
                                            <input type="text" class="form-control required" name="swift" id="swift"
                                                placeholder="Employee swift">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Credit/Debit Card No</label>
                                            <input type="text" class="form-control required" name="card_no" id="card_no"
                                                placeholder="Employee credit/debit card no">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group" id="show_error">
                                        </div>
                                    </div>
                                    <a href="Employee-{{$employee_id}}-Contact"
                                        class="btn btn-primary text-white float-left" style="font-size: 18px;"> Previous
                                    </a>
                                    <a href="Employee-{{$employee_id}}-Login-Detail"
                                        class="btn btn-warning mx-2 px-4 float-right" style="font-size: 18px;"> Skip
                                    </a>
                                    <button type="button" id="btnSubmit" class="btn btn-success text-white float-right"
                                        style="font-size: 18px;"> Add New Bank & Next
                                    </button>
                                    <button type="button" id="btnUpdate" class="btn btn-warning float-right"
                                        style="font-size: 18px; display:none;">Update
                                        Bank & Next </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Main Employee Detail -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <!-- <th> Bank Id </th> -->
                                <th> Bank Name </th>
                                <th> Branch </th>
                                <th> Account Name </th>
                                <th> Account No </th>
                                <th> Account Type </th>
                                <th> IBAN </th>
                                <th> Swift </th>
                                <th> Credit/Debit Card </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Employee Detail -->
</section>

<script src="{{url('public/plugins/jquery/jquery.min.js')}}"></script>
<!-- //Select 2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<!-- croppie plugin -->
<script src="{{url('Croppie/croppie.js')}}"></script>

<script type="text/javascript">
$(function() {
    // $.get("{{route('Bank-Account-Detail')}}",{employee_id:"{{$employee_id}}"},function(data){
    // 	console.log(data);
    // });
    var tables = $("#dataTable").DataTable({
      "autoWidth": true,
        "responsive": true,
        dom: 'Bfrtip',
        buttons: [
            'excel', 'print'
        ],
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{route('Bank-Account-Detail')}}",
            data: {
                employee_id: "{{$employee_id}}"
            },
        },
        columns: [
            // {
            //     data: 'emp_bank_id'
            // },
            {
                data: 'bank_name'
            },
            {
                data: 'branch_name'
            },
            {
                data: 'account_name'
            },
            {
                data: 'account_number'
            },
            {
                data: 'account_type'
            },
            {
                data: 'iban'
            },
            {
                data: 'swift'
            },
            {
                data: 'card_no',
            },
            {
                data: 'action'
            }
        ]
    });

    $("#btnSubmit").click(function(event) {
        // console.log('submit');return false;

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
            url: "{{route('Employee-Bank-Store')}}",
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
                        $("#show_error").addClass("alert alert-success").html(data[
                            'message']);
                        next_url = 'Employee-' + data['employee_id'] +
                            '-Login-Detail';
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
var base_url = "{{url('/')}}";

function EmployeeBankEdit(emp_bank_id) {
    $("#btnSubmit").remove();
    $('#btnUpdate').show();
    $("#show_error").removeClass().show().html('');
    var url_edit = base_url + "/Admin/EmployeeBank/" + emp_bank_id + "/Edit";
    // console.log("# "+url_edit);return false;
    $.get(url_edit, function(data) {
        console.log(data[0]);
        // return false;
        $("#emp_bank_id").val(data[0]['emp_bank_id']);
        // $("#employee_id").val(data[0]['employee_id']);
        $("#bank_name").val(data[0]['bank_name']);
        $("#branch_name").val(data[0]['branch_name']);
        $("#account_name").val(data[0]['account_name']);
        $("#account_no").val(data[0]['account_number']);
        $("#account_type").val(data[0]['account_type']);
        $("#iban").val(data[0]['iban']);
        $("#swift").val(data[0]['swift']);
        $("#card_no").val(data[0]['card_no']);

    });
}

$("#btnUpdate").click(function(event) {
    // console.log('submit');return false;

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
        url: "{{route('Employee-Bank-Store')}}",
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
                    next_url = 'Employee-' + data['employee_id'] + '-Login-Detail';
                    window.location.href = next_url;
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

function EmployeeBankRemove(emp_bank_id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.get("{{route('Employee-Bank-Remove')}}", {
                emp_bank_id: emp_bank_id
            }, function(data) {
                console.log(data);
                if (data['success'] == true) {
                    swal("Poof! Bank detail has been deleted!", {
                        icon: "success",
                    });
                    //toastr.success('Employee Bank Detail Removed Successfully..')
                    let tables = $("#dataTable").dataTable();
                    tables.fnPageChange('first', 1);
                } else {
                    swal(data['message'], {
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