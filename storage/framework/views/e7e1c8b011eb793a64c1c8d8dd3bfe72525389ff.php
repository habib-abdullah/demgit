<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3>Sales Order Edit</h3>
        </div>
        <div class="card-body">
            <form id="SalesOrderEditForm">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <input type="hidden" class="form-control form-control-user" id="sales_order_id"
                        name="sales_order_id" value="<?php echo e($sales[0]->sales_order_id ?? ''); ?>">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <lable>Order Date</lable>
                            <input type="date" class="form-control form-control-user SalesOrder_input " id="order_date"
                                name="edit_order_date" value="<?php echo e($sales[0]->sales_order_date ?? ''); ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <lable>Sales Mode</lable>
                            <select class="form-control SalesOrder_input " name="edit_mode" id="edit_mode">
                                <?php if($sales[0]->sales_mode == 'Cash'): ?>
                                <option selected value="Cash">Cash</option>
                                <option value="Credit">Credit</option>
                                <?php else: ?>
                                <option value="Cash">Cash</option>
                                <option selected value="Credit">Credit</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group ">
                            <lable>Customer</lable>
                            <select class="form-control select4" name="edit_customer_by" id="customer_by"
                                style="width: 100%;">
                                <option selected disabled>Select</option>
                                <?php if(count($clients) > 0): ?>
                                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($sales[0]->cust_id == $client->client_id): ?>
                                <option selected value="<?php echo e($client->client_id); ?>">
                                    <?php echo e($client->company_name); ?>

                                </option>
                                <?php else: ?>
                                <option value="<?php echo e($client->client_id); ?>">
                                    <?php echo e($client->company_name); ?>

                                </option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group ">
                            <lable>Booked By</lable>
                            <select id="id" class="form-control select4" name="edit_booked_by" id="edit_booked_by"
                                style="width: 100%;">
                                <option selected disabled>Select</option>
                                <?php if(count($clients) > 0): ?>
                                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($sales[0]->receiver_id == $client->client_id): ?>
                                <option selected value="<?php echo e($client->client_id); ?>">
                                    <?php echo e($client->client_name); ?>

                                </option>
                                <?php else: ?>
                                <option value="<?php echo e($client->client_id); ?>">
                                    <?php echo e($client->client_name); ?>

                                </option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <lable>Contact Person Name</lable>
                            <input type="text" class="form-control form-control-user SalesOrder_input" id="person_name"
                                name="edit_person_name" autocomplete="off" placeholder="Enter Contact Person Name"
                                value="<?php echo e($sales[0]->sales_person_name ?? ''); ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <lable>Contact Person Number</lable>
                            <input type="number" class="form-control form-control-user SalesOrder_input"
                                id="person_number" name="edit_person_number" autocomplete="off"
                                placeholder="Enter Contact Person Number"
                                value="<?php echo e($sales[0]->sales_person_number ?? ''); ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <lable>Receiving Date</lable>
                            <input type="date" class="form-control form-control-user SalesOrder_input"
                                id="receiving_date" name="edit_receiving_date" autocomplete="off"
                                value="<?php echo e($sales[0]->sales_receiving_date ?? ''); ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <lable>Delivery Date</lable>
                            <input type="date" class="form-control form-control-user SalesOrder_input"
                                id="delivery_date" name="edit_delivery_date" autocomplete="off"
                                value="<?php echo e($sales[0]->sales_delivery_date ?? ''); ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <lable>LPO#</lable>
                            <input type="text" class="form-control form-control-user SalesOrder_input" id="lpo"
                                name="edit_lpo" autocomplete="off" placeholder="Enter LPO"
                                value="<?php echo e($sales[0]->sales_lpo ?? ''); ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <lable>Focus SO#</lable>
                            <input type="text" class="form-control form-control-user SalesOrder_input" id="focus_so"
                                name="edit_focus_so" autocomplete="off" placeholder="Enter SO"
                                value="<?php echo e($sales[0]->sales_focus_so ?? ''); ?>">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mx-auto">
                    <div class="form-group">
                        <lable class="text-center">Subject</lable>
                        <input type="text" class="form-control form-control-user SalesOrder_input" id="order_subject"
                            name="edit_order_subject" autocomplete="off" placeholder="Enter subject"
                            value="<?php echo e($sales[0]->sales_order_subject ?? ''); ?>">
                    </div>
                </div>
            </form>
            <div class="form-group text-center">
                <span id="ordert_edit_show_error" style="display: none;" class="m-auto"></span>
            </div>
            <!-- Modal footer -->
            <div class="card-footer text-center">
                <span id="visitor_error_area" style="display: none;" class="m-auto"></span>
                <button type="button" id="btnUpdate" onclick="SalesOrderUpdate()"
                    class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>


<!-- Sales Order Details -->
<!-- .table -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header d-flex">
            <h3>Sales Order Details</h3>
            <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#SalesOrderItemStoreModal">Add Item
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="Table" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Item No</th>
                            <th>Description</th>
                            <th>Receiving Date</th>
                            <th>Delivery Date</th>
                            <th>Current Status</th>
                            <th>UOM</th>
                            <th>Qty</th>
                            <th>Rate</th>
                            <th>Total EST Time</th>
                            <th>Gross Total </th>
                            <th>Note</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- .table -->

<!-- Sales Order Details Store Modal -->
<div class="modal fade" id="SalesOrderItemStoreModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Sales Order Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal body -->

            <div class="modal-body">
                <form id="SalesOrderItemStoreForm">
                    <input type="hidden" class="form-control form-control-user" id="sales_order_id"
                        name="sales_order_id" autocomplete=" off" placeholder="Enter Item Description"
                        value="<?php echo e($sales[0]->sales_order_id); ?>">
                    <input type="hidden" class="form-control form-control-user" id="item_id" name="item_id"
                        autocomplete=" off" placeholder="Enter Item Description">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <lable>Description</lable>
                        <input type="text" class="form-control form-control-user required " id="item_description"
                            name="item_description" autocomplete=" off" placeholder="Enter Item Description">
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <lable>Receiving Date</lable>
                                <input type="datetime-local" class="form-control form-control-user required "
                                    id="receive_date" name="receive_date" autocomplete=" off"
                                    placeholder="Enter Site Name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <lable>Delivery Date</lable>
                                <input type="datetime-local" class="form-control form-control-user required "
                                    id="delivery_date" name="delivery_date" autocomplete=" off"
                                    placeholder="Enter Item Delivery Date">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <lable>UOM</lable>
                                <select id="id" class="form-control select4" name="uom_id" id="uom_id"
                                    style="width: 100%;">
                                    <option selected disabled>Select</option>
                                    <?php if(count($uom) > 0): ?>
                                    <?php $__currentLoopData = $uom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->uom_id); ?>">
                                        <?php echo e($row->uom_name); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <lable>Qty</lable>
                                <input type="number" class="form-control form-control-user required " id="item_quantity"
                                    name="item_quantity" autocomplete=" off" placeholder="Enter Item Quantity">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <lable>Rate</lable>
                                <input type="number" class="form-control form-control-user required " id="item_rate"
                                    name="item_rate" autocomplete=" off" placeholder="Enter Item Rate">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <lable>Gross Total</lable>
                                <input type="number" class="form-control form-control-user required " id="gross_total"
                                    name="gross_total" autocomplete=" off" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <lable>VAT</lable>
                                <input type="number" class="form-control form-control-user required " id="vat_total"
                                    name="vat_total" autocomplete=" off" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <lable>Net</lable>
                                <input type="number" class="form-control form-control-user required " id="net_total"
                                    name="net_total" autocomplete=" off" readonly>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <lable> Interval</lable>
                                <!-- <input type="text" class="form-control form-control-user required " id="time_interval"
                                    name="time_interval" autocomplete=" off"> -->

                                <select class="form-control form-control-user required " id="time_interval"
                                    name="time_interval" autocomplete=" off">
                                    <option selected disabled>Select</option>
                                    <option>Min</option>
                                    <option>Hour</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <lable> Time/Unit</lable>
                                <input type="text" class="form-control form-control-user required " id="time_unit"
                                    name="time_unit" autocomplete=" off">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <lable> Cost/Unit</lable>
                                <input type="text" class="form-control form-control-user required " id="cost_unit"
                                    name="cost_unit" autocomplete=" off">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <lable> Total (Mins)</lable>
                                <input type="text" class="form-control form-control-user required " id="total_time"
                                    name="total_time" autocomplete=" off" readonly>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <lable> Note </lable>
                                <input type="text" class="form-control form-control-user required " id="item_note"
                                    name="item_note" autocomplete=" off">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <lable> Attachments </lable>
                                <input type="file" class="form-control form-control-user" id="attachment"
                                    name="attachment[]" multiple>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="form-group text-center">
                <span id="show_error" style="display: none;" class="m-auto"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btnSubmit" onclick="SalesOrderItemsStore()"
                    class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- Sales Order Details Store Modal -->

<!-- Sales Order Details Edit Modal -->
<div class="modal fade" id="SalesOrderItemEditModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Sales Order Details Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal body -->

            <div class="modal-body" id="SalesOrderItemContent">

            </div>
            <!-- Modal footer -->
            <div class="form-group text-center">
                <span id="show_error_edit" style="display: none;" class="m-auto"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btnSubmit" onclick="SalesOrderItemsUpdate()"
                    class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- Sales Order Details Edit Modal -->

<!-- Sales Order Details File Modal -->
<div class="modal fade" id="SalesOrderItemFileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sales Order Details Documents</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="SalesOrderItemFileStoreForm" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-row justify-content-center mt-1">
                        <div class="form-group col-md-12 d-none">
                            <label>Item Id</label>
                            <input type="text" class="form-control " name="item_id" id="item_id_for_file">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Attachment</label>
                            <input type="file" class="form-control " name="attachment[]" multiple id="attachment">
                        </div>
                    </div>
                    <!-- <div class="form-row justify-content-left">
            <div class="form-group col-md-12">
              <span id="filename"></span>
            </div>
          </div> -->
                </form>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-hover">
                    <tbody id="AttachmentBody">

                    </tbody>
                </table>
            </div>
            <div class="modal-body text-center">
                <span id="attachment_show_error" style="display: none; text-align:center; margin:20px;" class="m-auto">
                </span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="btnSubmit" type="button" class="btn btn-primary"
                    onclick="SalesOrderItemFileStore()">Upload</button>
            </div>
        </div>
    </div>
</div>

<!-- Sales Order Details File Modal -->

<!-- Sales Order Details -->
<script src="<?php echo e(url('public/plugins/jquery/jquery.min.js')); ?>"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script type="text/javascript">
// Data Table Ajax
var base_url = "<?php echo e(url('/')); ?>";

$(function() {

    var tables = $("#Table").DataTable({
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
        "processing": true,
        "serverSide": true,
        ajax: {
            url: "<?php echo e(route('SalesOrderItem-Show')); ?>",
            data: {
                sales_order_id: "<?php echo e($sales[0]->sales_order_id); ?>"
            }
        },
        columns: [{
                data: 'item_id',
                'searchable': false,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'item_description',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'receive_date',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'delivery_date',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'status',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'uom_name',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'item_quantity',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'item_rate',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'time_interval',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'gross_total',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'item_note',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'action',
                'searchable': false,
                'orderable': false,
                'class': 'text-center'
            },
        ]
    });

});


$(document).ready(function() {
    $(".select4").select2({
        theme: "classic",
    });
});


function SalesOrderUpdate() {
    var fields = $("input[class*='SalesOrder_input']");
    for (let i = 0; i <= fields.length; i++) {
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('id');
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
                    window.location.href = "<?php echo e(route('Sales-Order')); ?>";
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



// --- Sales Order Details Crud ---- \\
// main SalesOrderDetailsStore
function SalesOrderItemsStore() {
    var fields = $("input[class*='required']");
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

    $("#btnSubmit").prop("disabled", true);

    let myForm = document.getElementById('SalesOrderItemStoreForm');
    let formData = new FormData(myForm);
    $.ajax({
        type: "POST",
        url: "<?php echo e(route('SalesOrderItem-Store')); ?>",
        data: formData,
        processData: false,
        contentType: false,
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
                    $("#SalesOrderItemStoreModal").modal('hide');
                    $("#show_error").removeClass().html('').hide();
                    $("#SalesOrderItemStoreForm")[0].reset();
                    tables = $("#Table").dataTable();
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
// main SalesOrderItemsStore

function SalesOrderItemEdit(item_id) {
    $.ajax({
        type: "GET",
        url: "<?php echo e(route('SalesOrderItem-Edit')); ?>",
        data: {
            item_id: item_id
        },
        success: function(data) {
            // console.log(data);
            $('#SalesOrderItemContent').html(data)
            $("#SalesOrderItemEditModal").modal('show');
        }
    })
}
// main SalesOrderItemsUpdate
function SalesOrderItemsUpdate() {
    var fields = $("input[class*='isrequired']");
    for (let i = 0; i <= fields.length; i++) {
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('name');
            var value = currentElement.replaceAll('_', ' ');
            $("#show_error_edit").removeClass().html('');
            $("#show_error_edit").show().addClass('alert alert-danger').html('The ' + value + ' field is required.');
            return false;
        } else {
            $("#show_error_edit").hide().removeClass().html('');
        }
    }

    $("#btnSubmit").prop("disabled", true);

    let myForm = document.getElementById('SalesOrderItemEditForm');
    let formData = new FormData(myForm);
    $.ajax({
        type: "POST",
        url: "<?php echo e(route('SalesOrderItem-Update')); ?>",
        data: formData,
        processData: false,
        contentType: false,
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btnSubmit").prop("disabled", false);
            $("#show_error_edit").removeClass().html('').show();
            $("#show_error_edit").addClass("alert alert-danger").html(errorThrown);
            return false;
        },
        success: function(data) {
            $("#btnSubmit").prop("disabled", false);
            // console.log(data);
            // return false;
            if (data["success"] == true) {
                $("#show_error_edit").removeClass().html('').show();
                $("#show_error_edit").addClass("alert alert-success").html(data['message']);
                setTimeout(() => {
                    $("#SalesOrderItemEditModal").modal('hide');
                    $("#show_error_edit").removeClass().html('').hide();
                    $("#SalesOrderItemEditForm")[0].reset();
                    tables = $("#Table").dataTable();
                    tables.fnPageChange('first', 1);
                }, 2000);
            } else {
                if (data['validation'] == false) {
                    $("#show_error_edit").removeClass().show().html('');
                    $("#show_error_edit").addClass("alert alert-danger").html(data['message'][0]);
                    return false;
                }
                $("#show_error_edit").removeClass().html('').show();
                $("#show_error_edit").addClass("alert alert-danger").html(data['message']);
                return false;
            }
        }
    });
}
// main SalesOrderItemsUpdate


// Main SalesOrderItemFile
function SalesOrderItemFile(item_id) {
    // alert(item_id);
    $("#AttachmentBody").html('').removeClass();
    // console.log("data");
    $.get("<?php echo e(route('SalesOrderItemFile-Show')); ?>", {
        item_id: item_id
    }, function(data) {
        // console.log(data);
        if (data.length > 0) {
            // console.log("greater");
            let ginty = 1;
            for (rows of data) {
                // console.log(rows.attachment_id+" | "+rows.attachment_file);
                $("#AttachmentBody").append(
                    '<tr class="removeRow"><td style="max-width:400px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><a target="_blank" download href="<?php echo e(url("/")); ?>/public/SalesOrder/Detail/' +
                    rows.attachment_file + '">' + rows.attachment_file +
                    '</a></td><td><button type="button" class="btn btn-danger btn-circle  float-right FileRemove" id="' +
                    rows.attachment_id + '" value="' +
                    rows.attachment_id + '"><i class="fa fa-trash"></i></button></td></tr>');
            }
        } else {
            console.log("no data available");
        }
        $("#item_id_for_file").val(item_id);
        $("#SalesOrderItemFileModal").modal('show');
    });
    return false;
}
// Main SalesOrderItemFile


// Main SalesOrderItemFileStore
function SalesOrderItemFileStore() {
    let myForm = document.getElementById('SalesOrderItemFileStoreForm');
    let formData = new FormData(myForm);
    $("#btnSubmit").prop("disabled", true);
    $.ajax({
        type: "POST",
        url: "<?php echo e(route('SalesOrderItemFile-Store')); ?>",
        data: formData,
        contentType: false,
        processData: false,
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btnSubmit").prop("disabled", false);
            $("#attachment_show_error").removeClass().html('').show();
            $("#attachment_show_error").addClass("alert alert-danger").html(errorThrown);
            return false;
        },
        success: function(data) {
            $("#btnSubmit").prop("disabled", false);
            console.log(data);
            // return false;
            if (data["success"] == true) {
                $("#attachment_show_error").removeClass().html('').show();
                $("#attachment_show_error").addClass("alert alert-success").html(data['message']);
                setTimeout(() => {
                    $("#SalesOrderItemFileModal").modal('hide');
                    $("#attachment_show_error").removeClass().html('').hide();
                    $("#filename").removeClass().html('').hide();
                    // window.location.href = "<?php echo e(route('Sales-Inquiry')); ?>";
                }, 1500);
            } else {
                if (data['validation'] == false) {
                    $("#attachment_show_error").removeClass().html('').show();
                    $("#attachment_show_error").addClass("alert alert-danger").html(data['message'][0]);
                    return false;
                }
                $("#attachment_show_error").removeClass().html('').show();
                $("#attachment_show_error").addClass("alert alert-danger").html(data['message']);
                return false;
            }
        }
    });
}
// Main SalesOrderItemFileStore

// Main SalesOrderItemFileRemove
$(document).ready(function() {

    $(document).on('click', '.FileRemove', function() {
        //   alert("Hello World")
        //   return false;

        if ($("#attachment").val == "") {
            $("#show_error_edit").removeClass().html('').show();
            $("#show_error_edit").addClass("alert alert-danger").html("Attachmet field is required");
            return false;
        } else {
            $("#show_error_edit").removeClass().html('').hide();
        }

        // alert($(this).attr('id'));
        let attachment_id = $(this).attr('id');
        var $table_row = $(this).closest('td');
        // console.log(attachment_id);
        // $(this).closest('tr').hide('slow', function(){ $(this).remove(); });
        // return false;
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.get("<?php echo e(route('SalesOrderItemFile-Remove')); ?>", {
                    attachment_id: attachment_id
                }, function(data) {
                    // console.log(data);
                    // return false;
                    if (data['success'] == true) {
                        swal("Poof! Inquiry Document has been removed successfuly...", {
                            icon: "success",
                        });
                        setTimeout(() => {
                            $table_row.closest('tr').hide('slow', function() {
                                $(this).remove();
                            });
                        }, 1500);
                        //toastr.success('Employee Bank Detail Removed Successfully..')
                        // tables = $("#Table").dataTable();
                        // tables.fnPageChange('first', 1);
                    } else {
                        swal("Oops something went wrong!, please check", {
                            icon: "error",
                        });
                    }
                });
            } else {
                swal("Your file is safe!");
            }
        });
    });

});
// Main SalesOrderItemFileRemove



// main SalesOrderItemRemove
function SalesOrderItemRemove(item_id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.get("<?php echo e(route('SalesOrderItem-Remove')); ?>", {
                item_id: item_id
            }, function(data) {
                console.log(data);
                if (data['success'] == true) {
                    swal("Poof! Inquiry Document has been removed successfuly...", {
                        icon: "success",
                    });
                    //toastr.success('Employee Bank Detail Removed Successfully..')
                    tables = $("#Table").dataTable();
                    tables.fnPageChange('first', 1);
                } else {
                    swal("Oops something went wrong!, please check", {
                        icon: "error",
                    });
                }
            });
        } else {
            swal("Your file is safe!");
        }
    });
}

// --- Sales Order Details Crud ---- \\
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchishty\resources\views/SalesOrder/SalesOrderEdit.blade.php ENDPATH**/ ?>