@extends('layout')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12 mb-2">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Employee Contact Detail</div>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('Employe-Contact-Detail-Create')}}">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#myModal">Add
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table id="DataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>WhatsApp</th>
                            <th>Imo</th>
                            <th>Facebook</th>
                            <!-- <th>Contact Name</th> -->
                            <!-- <th>Contact no</th> -->
                            <!-- <th>Contact Rel</th> -->
                            <!-- <th>UAE Contact Name</th> -->
                            <!-- <th>UAE Contact no</th> -->
                            <!-- <th>UAE Contact Rel</th> -->
                            <th>UAE Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

</div>

<script src="{{url('public/plugins/jquery/jquery.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
$(function() {
    var tables = $("#DataTable").DataTable({
        "autoWidth": true,
        "responsive": true,
        dom: 'Bfrtip',
        buttons: [
            'excel', 'print'
        ],
        processing: true,
        serverSide: true,
        ajax: "{{route('Employee-Contact-Report')}}",
        columns: [{
                data: 'emp_contact_detail_id'
            },
            {
                data: 'Name'
            },
            {
                data: 'emp_email'
            },
            {
                data: 'emp_contact_no'
            },
            {
                data: 'emp_whatsapp_no'
            },
            {
                data: 'emp_imo_no'
            },
            {
                data: 'emp_facebook_id'
            },
            // {data : 'emp_permanent_contact_name'},
            // {data : 'emp_permanent_contact_no'},
            // {data : 'emp_permanent_contact_relation'},
            // {data : 'emp_uae_emerge_contact_no'},
            // {data : 'emp_uae_emerge_contact_name'},
            // {data : 'emp_uae_contact_relation'},
            {
                data: 'emp_uae_permanent_address'
            },
            {
                data: 'action'
            }
        ]
    });

});

function EmployeeContactRemove(id) {
    swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })

        .then((willDelete) => {
            if (willDelete) {
                $.get("{{route('Employee-Contact-Remove')}}", {
                    id: id
                }, function(data) {
                    console.log(data);
                    if (data.includes("User Remove successfully")) {
                        swal("Poof! Bank Detail has been deleted!", {
                            icon: "success",
                        });
                        //toastr.success('Employee Bank Detail Removed Successfully..')
                        tables = $("#DataTable").dataTable();
                        tables.fnPageChange('first', 1);
                    }
                });
            } else {
                swal("Your file is safe!");
            }
        });
}
</script>


@endsection