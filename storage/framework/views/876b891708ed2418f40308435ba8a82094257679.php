<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12 mb-2">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Employee Shift Control</div>
                        </div>
                        <div class="col-auto">
                            <!-- <a href="<?php echo e(route('Designation-Create')); ?>"><button type="button" class="btn btn-primary"
                  data-toggle="modal" data-target="#myModal">Designation</button></a> -->
                            <a href="<?php echo e(url('Employee-Shift-Create')); ?>"><button type="button" class="btn btn-primary">Add
                                    Shift</button></a>
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
                            <th>Employee</th>
                            <th>Shift Start</th>
                            <th>Shift End</th>
                            <th>Break Start</th>
                            <th>Break End</th>
                            <th>Emp Code</th>
                            <th>Name</th>
                            <th>Started At</th>
                            <th>Ended At</th>
                            <th>Length</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th></th>
                            <th>
                                <button type="button" class="btn btn-block btn-warning" id="checkStartShift"><i
                                        class="fas fa-check"></i></button>
                            </th>
                            <th>
                                <button type="button" class="btn btn-block btn-warning" id="checkEndShift"><i
                                        class="fas fa-check"></i></button>
                            </th>
                            <th>
                                <button type="button" class="btn btn-block btn-warning" id="checkStartBreak"><i
                                        class="fas fa-check"></i></button>
                            </th>
                            <th>
                                <button type="button" class="btn btn-block btn-warning" id="checkEndBreak"><i
                                        class="fas fa-check"></i></button>
                            </th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

</div>
<script src="<?php echo e(url('public/plugins/jquery/jquery.min.js')); ?>"></script>
<script type="text/javascript">
$("#checkStartShift").click(function() {
    if (!$('.shift_start_check').prop("checked")) {
        $(".shift_start_check").prop("checked", true);
    } else {
        $(".shift_start_check").prop("checked", false);
    }
});

$("#checkEndShift").click(function() {
    if (!$('.shift_end_check').prop("checked")) {
        $(".shift_end_check").prop("checked", true);
    } else {
        $(".shift_end_check").prop("checked", false);
    }
});

$("#checkStartBreak").click(function() {
    if (!$('.break_start_check').prop("checked")) {
        $(".break_start_check").prop("checked", true);
    } else {
        $(".break_start_check").prop("checked", false);
    }
});

$("#checkEndBreak").click(function() {
    if (!$('.break_end_check').prop("checked")) {
        $(".break_end_check").prop("checked", true);
    } else {
        $(".break_end_check").prop("checked", false);
    }
});

$(function() {
    var tables = $("#DataTable").DataTable({
        processing: true,
        serverSide: true,
        ajax: "<?php echo e(route('Employee-Shift-Show')); ?>",
        columnDefs: [{
            orderable: false,
            className: 'select_checkbox',
            targets: 0
        }],
        select: {
            style: 'os',
            selector: 'td:first-child'
        },
        columns: [{
                data: 'emp_profile_img',
                render: function(data) {
                    if (data != null) {
                        return '<img src="<?php echo e(url("public/crop_image/")); ?>/' + data +
                            '" style="width:70px;height:auto;">';
                    } else {
                        return '<img src="<?php echo e(url("public/crop_image/default.jpg")); ?>" style="width:70px;height:auto;">';
                    }
                },
                "seachable": false,
                "orderable": false,
            },
            {
                data: 'shift_start',
                "seachable": false,
                "orderable": false,
                "className": 'text-center'
            },
            {
                data: 'shift_end',
                "seachable": false,
                "orderable": false,
                "className": 'text-center'
            },
            {
                data: 'break_start',
                "seachable": false,
                "orderable": false,
                "className": 'text-center'
            },
            {
                data: 'break_end',
                "seachable": false,
                "orderable": false,
                "className": 'text-center'
            },
            {
                data: 'employee_id',
                "seachable": false,
                "orderable": true,
                "className": 'text-center'
            },
            {
                data: 'name',
                "seachable": true,
                "orderable": true,
                "className": 'text-center'
            },
            {
                data: 'start_time',
                "seachable": false,
                "orderable": false,
                "className": 'text-center'
            },
            {
                data: 'end_time',
                "seachable": false,
                "orderable": false,
                "className": 'text-center'
            },
            {
                data: 'total_length',
                "seachable": false,
                "orderable": false,
                "className": 'text-center'
            },
            {
                data: 'action',
                "seachable": false,
                "orderable": false,
                "className": 'text-center'
            },
        ]
    });
});

function EmployeeRemove(id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.get("<?php echo e(route('Employee-Remove')); ?>", {
                id: id
            }, function(data) {
                console.log(data);
                if (data.includes("User Remove successfully")) {
                    swal("Poof! Employee Detail has been deleted!", {
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchisty-main\resources\views/EmployeeMaster/EmployeeShift.blade.php ENDPATH**/ ?>