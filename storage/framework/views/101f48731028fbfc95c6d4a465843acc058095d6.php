<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12 mb-2">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Sales Order Lists</div>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#SalesOrderStoreModal">Add</button>

                            <div class="modal fade" id="SalesOrderStoreModal">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-primary">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Salse Order</h4>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form id="SalesOrderStoreForm">
                                                <?php echo csrf_field(); ?>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <lable>Order Date&Time</lable>
                                                            <input type="date"
                                                                class="form-control form-control-user border-primary required "
                                                                id="sales_order_date" name="sales_order_date"
                                                                autocomplete=" off">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <lable>Sales Mode</lable>
                                                            <select class="form-control border-primary required"
                                                                name="sales_mode" id="sales_mode">
                                                                <option selected="selected" disabled>Select</option>
                                                                <option>Cash </option>
                                                                <option>Credit</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group ">
                                                            <lable>Customer</lable>
                                                            <select class="form-control select2"
                                                                name="sales_customer_by" id="sales_customer_by"
                                                                style="width: 100%;">
                                                                <option selected="selected" disabled>Select</option>
                                                                <?php if(count($orders) > 0): ?>
                                                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($order->client_id); ?>">
                                                                    <?php echo e($order->company_name); ?>

                                                                </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group ">
                                                            <lable>Booked By</lable>
                                                            <select class="form-control select2" name="sales_booked_by"
                                                                id="sales_booked_by" style="width: 100%;">
                                                                <option selected="selected" disabled>Select</option>
                                                                <?php if(count($orders) > 0): ?>
                                                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($order->client_id); ?>">
                                                                    <?php echo e($order->client_name); ?>

                                                                </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <lable>Contact Person Name</lable>
                                                            <input type="text"
                                                                class="form-control form-control-user border-primary required"
                                                                id="sales_person_name" name="sales_person_name"
                                                                autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <lable>Contact Person Number</lable>
                                                            <input type="number"
                                                                class="form-control form-control-user border-primary required"
                                                                id="sales_person_number" name="sales_person_number"
                                                                autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <lable>Receiving Date</lable>
                                                            <input type="date"
                                                                class="form-control form-control-user border-primary required"
                                                                id="sales_receiving_date" name="sales_receiving_date"
                                                                autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <lable>Delivery Date</lable>
                                                            <input type="date"
                                                                class="form-control form-control-user border-primary required"
                                                                id="sales_delivery_date" name="sales_delivery_date"
                                                                autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <lable>LPO#</lable>
                                                            <input type="text"
                                                                class="form-control form-control-user border-primary required"
                                                                id="sales_lpo" name="sales_lpo" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <lable>Focus SO#</lable>
                                                            <input type="text"
                                                                class="form-control form-control-user border-primary required"
                                                                id="sales_focus_so" name="sales_focus_so"
                                                                autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <lable>Subject</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required"
                                                        id="sales_order_subject" name="sales_order_subject"
                                                        autocomplete="off">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="form-group text-center">
                                            <span id="show_error" style="display: none;" class="m-auto"></span>
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <span id="visitor_error_area" style="display: none;" class="m-auto"></span>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" id="btnSubmit" onclick="SalesOrderStore()"
                                                class="btn btn-primary">Submit</button>
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

        <div class="card-body">
            <div class="table-responsive">
                <table id="DataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Focus SO#</th>
                            <th>Subject</th>
                            <th>Customer</th>
                            <th>Booked By</th>
                            <th>Delivery Date</th>
                            <th>Current Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="SalesOrderEditModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-primary">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Order&Sales</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="SalesOrderEditForm">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <input type="hidden" class="form-control form-control-user border-primary" id="sales_order_id"
                            name="sales_order_id" autocomplete=" off">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <lable>Order Date&Time</lable>
                                <input type="date"
                                    class="form-control form-control-user border-primary SalesOrder_input "
                                    id="edit_order_date" name="edit_order_date" autocomplete=" off">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <lable>Sales Mode</lable>
                                <select class="form-control border-primary SalesOrder_input" name="edit_mode"
                                    id="edit_mode">
                                    <option selected="selected" disabled>Select</option>
                                    <option>Cash </option>
                                    <option>Credit</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ">
                                <lable>Customer</lable>
                                <select class="form-control select3" name="edit_customer_by" id="edit_customer_by"
                                    style="width: 100%;">
                                    <option disabled>Select</option>
                                    <?php if(count($orders) > 0): ?>
                                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($order->client_id); ?>">
                                        <?php echo e($order->company_name); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ">
                                <lable>Booked By</lable>
                                <select id="id" class="form-control select3" name="edit_booked_by" id="edit_booked_by"
                                    style="width: 100%;">
                                    <option disabled>Select</option>
                                    <?php if(count($orders) > 0): ?>
                                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($order->client_id); ?>">
                                        <?php echo e($order->client_name); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <lable>Contact Person Name</lable>
                                <input type="text"
                                    class="form-control form-control-user border-primary SalesOrder_input"
                                    id="edit_person_name" name="edit_person_name" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <lable>Contact Person Number</lable>
                                <input type="number"
                                    class="form-control form-control-user border-primary SalesOrder_input"
                                    id="edit_person_number" name="edit_person_number" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <lable>Receiving Date</lable>
                                <input type="date"
                                    class="form-control form-control-user border-primary SalesOrder_input"
                                    id="edit_receiving_date" name="edit_receiving_date" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <lable>Delivery Date</lable>
                                <input type="date"
                                    class="form-control form-control-user border-primary SalesOrder_input"
                                    id="edit_delivery_date" name="edit_delivery_date" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <lable>LPO#</lable>
                                <input type="text"
                                    class="form-control form-control-user border-primary SalesOrder_input" id="edit_lpo"
                                    name="edit_lpo" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <lable>Focus SO#</lable>
                                <input type="text"
                                    class="form-control form-control-user border-primary SalesOrder_input"
                                    id="edit_focus_so" name="edit_focus_so" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <lable>Subject</lable>
                        <input type="text" class="form-control form-control-user border-primary SalesOrder_input"
                            id="edit_order_subject" name="edit_order_subject" autocomplete="off">
                    </div>
                </form>
            </div>
            <div class="form-group text-center">
                <span id="ordert_edit_show_error" style="display: none;" class="m-auto"></span>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <span id="visitor_error_area" style="display: none;" class="m-auto"></span>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btnUpdate" onclick="SalesOrderUpdate()"
                    class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="SalesOrderViewModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-primary">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Department</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <ul class="list-group">
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Order Datetime </b>
                        <a class="float-right" id="order_date_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Sales Mode </b>
                        <a class="float-right" id="order_salesmode_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Customer </b>
                        <a class="float-right" id="order_customer_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Booked By </b>
                        <a class="float-right" id="order_book_by_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Receiving Date </b>
                        <a class="float-right" id="order_rec_date_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Delivery Date </b>
                        <a class="float-right" id="order_del_date_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Focus SO# </b>
                        <a class="float-right" id="order_so_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> LPO# </b>
                        <a class="float-right" id="order_lpo_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Subject </b>
                        <a class="float-right" id="order_subject_view"></a>
                    </li>
                </ul>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo e(url('public/plugins/jquery/jquery.min.js')); ?>"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script type="text/javascript">
var base_url = "<?php echo e(url('/')); ?>";
$(function() {

    var tables = $("#DataTable").DataTable({
        "processing": true,
        "serverSide": true,
        ajax: {
            url: "<?php echo e(route('SalesOrder-Show')); ?>"
        },
        columns: [{
                data: 'sales_order_date',
                'searchable': false,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'sales_focus_so',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'sales_order_subject',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'company_name',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'client_name',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'sales_delivery_date',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'status',
                render: function(data) {
                    if (data == 1) {
                        return 'Pending';
                    }
                    if (data == 2) {
                        return 'In Progress';
                    } else {
                        return 'Completed';
                    }
                },
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
    $(".select2").select2({
        theme: "classic",
        // width: 'resolve'
    });
    $(".select3").select2({
        theme: "classic",
        // width: 'resolve'
    });

});

function SalesOrderStore() {
    var fields = $("input[class*='required']");
    // console.log(fields.val());
    for (let i = 0; i <= fields.length; i++) {
        // console.log(fields);
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

    $("#btnSubmit").prop("disabled", true);
    $.ajax({
        type: "POST",
        url: "<?php echo e(route('SalesOrder-Store')); ?>",
        data: $("#SalesOrderStoreForm").serialize(),
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btnSubmit").prop("disabled", false);
            $("#show_error").removeClass().html('').show();
            $("#show_error").addClass("alert alert-danger").html(errorThrown);
            return false;
        },
        success: function(data) {
            $("#btnSubmit").prop("disabled", false);
            // console.log(data);
            // return false;
            if (data["success"] == true) {
                $("#show_error").removeClass().html('').show();
                $("#show_error").addClass("alert alert-success").html(data['message']);
                setTimeout(() => {
                    $("#SalesOrderStoreModal").modal('hide');
                    $("#show_error").removeClass().html('').hide();
                    $("#SalesOrderStoreForm")[0].reset();
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

function SalesOrderEdit(sales_order_id) {
    var url_edit = base_url + "/Admin/SalesOrder-" + sales_order_id + "-Edit";
    $.get(url_edit, function(data) {
        $("#sales_order_id").val(data[0]['sales_order_id']);
        $("#edit_order_date").val(data[0]['sales_order_date']);
        $("#edit_mode").val(data[0]['sales_mode']);
        $("#edit_person_name").val(data[0]['sales_person_name']);
        $("#edit_person_number").val(data[0]['sales_person_number']);
        $("#edit_receiving_date").val(data[0]['sales_receiving_date']);
        $("#edit_delivery_date").val(data[0]['sales_delivery_date']);
        $("#edit_lpo").val(data[0]['sales_lpo']);
        $("#edit_focus_so").val(data[0]['sales_focus_so']);
        $("#edit_order_subject").val(data[0]['sales_order_subject']);
        // $("#edit_customer_by").val(data[0]['customer_id']);
        // $("#booked_by_id").val(data[0]['customer_id']);

        $("#SalesOrderEditModal").modal('show');
    });
}

function SalesOrderView(sales_order_id) {
    var url_edit = base_url + "/Admin/SalesOrder-" + sales_order_id + "-Edit";
    $.get(url_edit, function(data) {

        $("#order_date_view").text(data[0]['sales_order_date']);
        $("#order_salesmode_view").text(data[0]['sales_mode']);
        $("#order_rec_date_view").text(data[0]['sales_receiving_date']);
        $("#order_del_date_view").text(data[0]['sales_delivery_date']);
        $("#order_lpo_view").text(data[0]['sales_lpo']);
        $("#order_so_view").text(data[0]['sales_focus_so']);
        $("#order_subject_view").text(data[0]['sales_order_subject']);

        $("#SalesOrderViewModal").modal('show');
    });
}


function SalesOrderUpdate() {
    var fields = $("input[class*='SalesOrder_input']");
    for (let i = 0; i <= fields.length; i++) {
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('name');
            var value = currentElement.replaceAll('_', ' ');
            $("#ordert_edit_show_error").removeClass().html('');
            $("#ordert_edit_show_error").show().addClass('alert alert-danger').html('The ' + value +
                ' field is required.');
            return false;
        } else {
            $("#ordert_edit_show_error").hide().removeClass().html('');
        }
    }

    $("#btnUpdate").prop("disabled", true);
    $.ajax({
        type: "POST",
        url: "<?php echo e(route('SalesOrder-Update')); ?>",
        data: $("#SalesOrderEditForm").serialize(),
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btnUpdate").prop("disabled", false);
            $("#ordert_edit_show_error").removeClass().html('').show();
            $("#ordert_edit_show_error").addClass("alert alert-danger").html(errorThrown);
            return false;
        },
        success: function(data) {
            $("#btnUpdate").prop("disabled", false);
            console.log(data);
            // return false;
            if (data["success"] == true) {
                // console.log(data)
                $("#ordert_edit_show_error").removeClass().html('').show();
                $("#ordert_edit_show_error").addClass("alert alert-success").html(data['message']);
                setTimeout(() => {
                    $("#SalesOrderEditModal").modal('hide');
                    $("#SalesOrderEditForm")[0].reset();
                    $("#ordert_edit_show_error").removeClass().html('').hide();
                    tables = $("#DataTable").dataTable();
                    tables.fnPageChange('first', 1);
                }, 2000);
            } else {
                if (data['validation'] == false) {
                    $("#ordert_edit_show_error").removeClass().show().html('');
                    $("#ordert_edit_show_error").addClass("alert alert-danger").html(data['message'][0]);
                    return false;
                }
                $("#ordert_edit_show_error").removeClass().html('').show();
                $("#ordert_edit_show_error").addClass("alert alert-danger").html(data['message']);
                return false;
            }
        }
    });
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchisty-main\resources\views/SalesOrder/SalesOrder.blade.php ENDPATH**/ ?>