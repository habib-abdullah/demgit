<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12 mb-2">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Purchases List</div>
                        </div>
                        <div class="col-auto">
                            <!-- <a href="<?php echo e(route('Employee-Document-Category')); ?>" class="btn btn-primary">Category</a> -->
                            <!-- <a href="#" class="btn btn-primary">Add Documents</a> -->
                            <button class="btn btn-primary" data-toggle="modal" data-target="#PurchaseInsertModal">Add
                                Purchase</button>
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
                            <th>OrderId</th>
                            <th>OrderItemId</th>
                            <th>BillNo</th>
                            <th>VendorId</th>
                            <th>Description</th>
                            <th>TotalAmount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- Here Is Insert MOdal -->
<!-- Modal -->
<div class="modal fade" id="PurchaseInsertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="PurchaseStoreForm">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <lable>Bill no</lable>
                        <input type="text" class="form-control form-control-user border-primary required "
                            id="purchase_no" name="purchase_no" autocomplete=" off">
                    </div>
                    <div class="form-group">
                        <lable>Description</lable>
                        <input type="text" class="form-control form-control-user border-primary required"
                            id="purchase_discrep" name="purchase_discrep" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <lable>Quantity</lable>
                        <input type="text" class="form-control form-control-user border-primary required"
                            id="purchase_quantity" name="purchase_quantity" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <lable>Rate</lable>
                        <input type="number" class="form-control form-control-user border-primary required"
                            id="purchase_rate" name="purchase_rate" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <lable>Total Amount</lable>
                        <input type="number" class="form-control form-control-user border-primary required"
                            id="purchase_amount" name="purchase_amount" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <lable>Order Id</lable>
                        <select class="form-control required" name="order_id" id="order_id">
                            <option value="1">True</option>
                            <option value="0">False</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <lable>Order Item Id</lable>
                        <select class="form-control required" name="order_item_id" id="order_item_id">
                            <option value="main_site">Main Site</option>
                            <option value="customer_site">Work @ Customer Site</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <lable>Vendor Id</lable>
                        <select class="form-control required" name="vendor_id" id="vendor_id">
                            <option value="main_site">Main Site</option>
                            <option value="customer_site">Work @ Customer Site</option>
                        </select>
                    </div>
                </form>
            </div>
            <span id="purchase_error_area" style="display: none; margin:0 30px; text-align:center;"
                class="m-auto"></span>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="PurchaseInsert()">Add Purchse</button>
            </div>
        </div>
    </div>
</div>
<!-- Here Is MOdal -->
<!-- Here Is Insert MOdal -->

<!-- Here Is Edit/Update MOdal -->
<!-- Modal -->
<div class="modal fade" id="PurchaseEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="PurchaseUpdateForm">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <lable>Bill no</lable>
                        <input type="hidden" class="form-control form-control-user border-primary" id="purchase_id"
                            name="purchase_id" autocomplete=" off">
                        <input type="text" class="form-control form-control-user border-primary edit-required"
                            id="edit_no" name="edit_no" autocomplete=" off">
                    </div>
                    <div class="form-group">
                        <lable>Description</lable>
                        <input type="text" class="form-control form-control-user border-primary edit-required"
                            id="edit_discrep" name="edit_discrep" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <lable>Quantity</lable>
                        <input type="text" class="form-control form-control-user border-primary edit-required"
                            id="edit_quantity" name="edit_quantity" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <lable>Rate</lable>
                        <input type="number" class="form-control form-control-user border-primary edit-required"
                            id="edit_rate" name="edit_rate" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <lable>Total Amount</lable>
                        <input type="number" class="form-control form-control-user border-primary "
                            id="edit_amount" name="edit_amount" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <lable>Order Id</lable>
                        <select class="form-control" name="edit_order_id" id="edit_order_id">
                            <option value="1">True</option>
                            <option value="0">False</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <lable>Order Item Id</lable>
                        <select class="form-control" name="edit_order_item_id" id="order_item_id">
                            <option value="main_site">Main Site</option>
                            <option value="customer_site">Work @ Customer Site</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <lable>Vendor Id</lable>
                        <select class="form-control" name="edit_vendor_id" id="vendor_id">
                            <option value="main_site">Main Site</option>
                            <option value="customer_site">Work @ Customer Site</option>
                        </select>
                    </div>
                </form>
            </div>
            <span id="purchase_error_update" style="display: none; margin:0 30px; text-align:center;"
                class="m-auto"></span>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="PurchaseUpdate()">Update Purchase</button>
            </div>
        </div>
    </div>
</div>
<!-- Here Is MOdal -->
<!-- Here Is Insert MOdal -->

<!-- Here Is View Modal -->
<div class="modal fade" id="PurchseViewModal">
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
                    <!-- <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Purchse Id </b>
                        <a class="float-right" id="purchase_id"></a>
                    </li> -->
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Order Id </b>
                        <a class="float-right" id="order_id_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Order Item Id </b>
                        <a class="float-right" id="order_item_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Vendor Id </b>
                        <a class="float-right" id="vendor_id_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Bill No </b>
                        <a class="float-right" id="bill_no_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Description </b>
                        <a class="float-right" id="descrep_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Quantity </b>
                        <a class="float-right" id="quantity_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Rate </b>
                        <a class="float-right" id="rate_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Total Amount </b>
                        <a class="float-right" id="total_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Created At </b>
                        <a class="float-right" id="created_at"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Updated On </b>
                        <a class="float-right" id="updated_at"></a>
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
<!-- Here Is View Modal -->

<!-- Main Script -->
<script src="<?php echo e(url('public/plugins/jquery/jquery.min.js')); ?>"></script>
<script type="text/javascript">
var tables = '';
$(function() {

    var tables = $("#DataTable").DataTable({
        processing: true,
        serverSide: true,
        ajax: "<?php echo e(route('Purchase-Show')); ?>",
        columns: [{
                data: 'purchase_id',
                'searchable': false,
                'orderable': true,
                'class': 'text-center'
            },
            {
                data: 'order_item_id',
                'searchable': false,
                'orderable': true,
                'class': 'text-center'
            },
            {
                data: 'purchase_bill_no',
                'searchable': false,
                'orderable': true,
                'class': 'text-center'
            },
            {
                data: 'vendor_id',
                'searchable': false,
                'orderable': true,
                'class': 'text-center'
            },
            {
                data: 'purchase_description',
                'searchable': false,
                'orderable': true,
                'class': 'text-center'
            },
            {
                data: 'purchase_total',
                'searchable': false,
                'orderable': true,
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

});

// ---Main Insert Purchse--- \\

function PurchaseInsert() {
    var fields = $("input[class*='required']");
    // console.log(fields.val());
    for (let i = 0; i <= fields.length; i++) {
        // console.log(fields);
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('id');
            var value = currentElement.replaceAll('_', ' ');
            $("#purchase_error_area").removeClass().html('');
            $("#purchase_error_area").show().addClass('alert alert-danger').html('The ' + value +
                ' field is required.');
            return false;
        } else {
            $("#purchase_error_area").hide().removeClass().html('');
        }
    }

    // Main Ajax Request
    $.ajax({
        type: "POST",
        url: "<?php echo e(route('Purchase-Store')); ?>",
        data: $('#PurchaseStoreForm').serialize(),
        success: function(data) {
            if (data['success'] == true) {
                $("#purchase_error_area").removeClass().html('').show();
                $("#purchase_error_area").addClass("alert alert-success").html(data['message']);
                setTimeout(() => {
                    $("#PurchaseInsertModal").modal('hide');
                    $("#purchase_error_area").removeClass().html('').hide();
                    $("#PurchaseStoreForm")[0].reset();
                    tables = $("#DataTable").dataTable();
                    tables.fnPageChange('first', 1);
                }, 2000);
            } else {
                $("#purchase_error_area").removeClass().html('').show();
                $("#purchase_error_area").addClass("alert alert-danger").html(data['message'][0]);
                return false;
            }
        }
    })
}

// --- Main Edit --- \\
function PurchaseEdit(purchase_id) {
    $.ajax({
        type: "GET",
        url: "<?php echo e(route('Purchase-Edit')); ?>",
        data: {
            purchase_id: purchase_id
        },
        success: function(data) {
            $('#purchase_id').val(data[0]['purchase_id'])
            $('#edit_no').val(data[0]['purchase_bill_no'])
            $('#edit_discrep').val(data[0]['purchase_description'])
            $('#edit_quantity').val(data[0]['purchase_quantity'])
            $('#edit_rate').val(data[0]['purchase_rate'])
            $('#edit_amount').val(data[0]['purchase_total'])
            $("#PurchaseEditModal").modal('show');
        }
    })
}
// --- Main View --- \\
function PurchaseView(purchase_id) {
    $('#PurchseViewModal').modal('show')
    $.ajax({
        type: "GET",
        url: "<?php echo e(route('Purchase-View')); ?>",
        data: {
            purchase_id: purchase_id
        },
        success: function(data) {
            // console.log(data)
            $("#order_id_view").text(data[0]['order_id']);
            $('#order_item_view').text(data[0]['order_item_id'])
            $('#vendor_id_view').text(data[0]['vendor_id'])
            $('#bill_no_view').text(data[0]['purchase_bill_no'])
            $('#descrep_view').text(data[0]['purchase_description'])
            $('#quantity_view').text(data[0]['purchase_quantity'])
            $('#rate_view').text(data[0]['purchase_rate'])
            $('#total_view').text(data[0]['purchase_total'])
            $('#created_at').text(data[0]['created_at'])
            $('#updated_at').text(data[0]['updated_at'])
        }
    })
}

// ---Main Update--- \\
function PurchaseUpdate() {
    var fields = $("input[class*='edit-required']");
    // console.log(fields.val());
    // return false;
    for (let i = 0; i <= fields.length; i++) {
        // console.log(fields);
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('id');
            var value = currentElement.replaceAll('_', ' ');
            $("#purchase_error_update").removeClass().html(''); 
            $("#purchase_error_update").show().addClass('alert alert-danger').html('The ' + value +
                ' field is required.');
            return false;
        } else {
            $("#purchase_error_update").hide().removeClass().html('');
        }
    }

    // Main Ajax Request
    $.ajax({
        type: "POST",
        url: "<?php echo e(route('Purchase-Update')); ?>",
        data: $('#PurchaseUpdateForm').serialize(),
        success: function(data) {
            // console.log(data)
            // return false
            if (data['success'] == true) {
                $("#purchase_error_update").removeClass().html('').show();
                $("#purchase_error_update").addClass("alert alert-success").html(data['message']);
                setTimeout(() => {
                    $("#PurchaseEditModal").modal('hide');
                    $("#purchase_error_update").removeClass().html('').hide();
                    $("#PurchaseUpdateForm")[0].reset();
                    tables = $("#DataTable").dataTable();
                    tables.fnPageChange('first', 1);
                }, 2000);
            } else {
                $("#purchase_error_update").removeClass().html('').show();
                $("#purchase_error_update").addClass("alert alert-danger").html(data['message'][0]);
                return false;
            }
        }
    })
}

// PurchaseRemove
function PurchaseRemove(purchase_id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.get("<?php echo e(route('Purchase-Remove')); ?>", {
                purchase_id: purchase_id
            }, function(data) {
                console.log(data);
                // return false;
                if (data['success'] == true) {
                    swal("Poof! Department has been deleted!", {
                        icon: "success",
                    });
                    //toastr.success('Employee Bank Detail Removed Successfully..')
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchisty-main\resources\views/purchase/purchase.blade.php ENDPATH**/ ?>