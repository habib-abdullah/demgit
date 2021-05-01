<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex">
                    <h3 class="card-title">
                        <a href="<?php echo e(route('Sales-Inquiry')); ?>" style="font-size: 18px;"><i
                                class="fas fa-arrow-circle-left"></i>Back</a>
                    </h3>
                    <h4 class="ml-auto">Sales Inquiry Information</h4>
                </div>
                <!-- form start -->
                <form id="SalesInquiryEditForm">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="inquiry_id" name="inquiry_id" value="<?php echo e($sales[0]->inquiry_id); ?>">
                    <div class="form-row justify-content-center mt-5">
                        <div class="form-group col-md-4">
                            <label>Inquiry Date & time </label>
                            <input type="datetime-local" class="form-control inquirey_required" name="inquiry_date"
                                id="edit_edit_inquiry_date" value="<?php echo e($sales[0]->inquiry_date); ?>"
                                placeholder="Enter Inquiry Date and time">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Inquiry Response Deadline</label>
                            <input type="datetime-local" class="form-control inquirey_required"
                                name="inquiry_response_date" id="edit_inquiry_response_date"
                                value="<?php echo e($sales[0]->inquiry_response_date); ?>"
                                placeholder="Enter Inquiry Response Deadline">
                        </div>
                    </div>
                    <div class="form-row justify-content-center mt-3">
                        <div class="form-group col-md-4">
                            <label>Customer</label>
                            <select class="form-control selectBox Customer" name="client_id" id="client_id">
                                <option selected disabled>Select</option>
                                <?php if(count($clients) > 0): ?>
                                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($sales[0]->client_id == $row->client_id): ?>
                                <option selected value="<?php echo e($row->client_id); ?>">
                                    <?php echo e($row->company_name); ?>

                                </option>
                                <?php else: ?>
                                <option value="<?php echo e($row->client_id); ?>">
                                    <?php echo e($row->company_name); ?>

                                </option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Asignee</label>
                            <select class="form-control selectBox Customer" name="employee_id" id="employee_id">
                                <option selected disabled>Select</option>
                                <?php if(count($Employees) > 0): ?>
                                <?php $__currentLoopData = $Employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($sales[0]->employee_id == $employee->employee_id): ?>
                                <option selected value="<?php echo e($employee->employee_id); ?>">
                                    <?php echo e($employee->first_name); ?> <?php echo e($employee->last_name); ?>

                                </option>
                                <?php else: ?>
                                <option value="<?php echo e($employee->employee_id); ?>">
                                    <?php echo e($employee->first_name); ?> <?php echo e($employee->last_name); ?>

                                </option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row justify-content-center mt-3">
                        <div class="form-group col-md-4">
                            <label>Contact Person</label>
                            <input type="text" class="form-control inquirey_required" name="inquiry_person"
                                id="inquiry_person" value="<?php echo e($sales[0]->inquiry_person); ?>"
                                placeholder="Enter Contact Person">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Contact Person Number</label>
                            <input type="number" class="form-control inquirey_required" name="inquiry_person_mobile"
                                id="inquiry_person_mobile" value="<?php echo e($sales[0]->inquiry_person_mobile); ?>"
                                placeholder="Enter Contact Person Number">
                        </div>
                    </div>
                    <div class="form-row justify-content-center mt-3">
                        <div class="form-group col-md-4">
                            <label>Email</label>
                            <input type="text" class="form-control inquirey_required " name="inquiry_person_email"
                                id="inquiry_person_email" value="<?php echo e($sales[0]->inquiry_person_email); ?>"
                                placeholder="Enter inquiry person email">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Inquiry Channel</label>
                            <input type="text" class="form-control inquirey_required" name="inquiry_channel"
                                id="inquiry_channel" value="<?php echo e($sales[0]->inquiry_channel); ?>"
                                placeholder="Enter Inquiry Channel">
                        </div>
                    </div>
                    <div class="form-row justify-content-center mt-3">
                        <div class="form-group col-md-4">
                            <label>Inquiry No</label>
                            <input type="text" class="form-control inquirey_required" name="inquiry_no" id="inquiry_no"
                                value="<?php echo e($sales[0]->inquiry_no); ?>" placeholder="Enter Inquiry No">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Inquiry Subject</label>
                            <input type="text" class="form-control inquirey_required" name="inquiry_subject"
                                id="inquiry_subject" value="<?php echo e($sales[0]->inquiry_subject); ?>"
                                placeholder="Enter Inquiry Subject">
                        </div>
                    </div>
                    <div class="form-row justify-content-center mt-3">

                        <div class="form-group col-md-4">
                            <label>Note</label>
                            <input type="text" class="form-control inquirey_required" name="inquiry_note"
                                id="inquiry_note" value="<?php echo e($sales[0]->inquiry_note); ?>" placeholder="Enter inquiry Note">
                        </div>
                        <div class="form-group col-md-4"></div>
                    </div>
                </form>
                <div class="form-row justify-content-center mt-3">
                    <div class="form-group ">
                        <span id="show_error" style="display: none;" class="m-auto"></span>
                    </div>
                </div>
                <div class="form-row justify-content-center mt-2">
                    <div class="form-group">
                        <button type="button" onclick="InquiryUpdate()" id="btnSubmit"
                            class="btn btn-success m-auto">Update
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<!-- Sales Inquiry Items Details -->
<div class="container-fluid">
    <!--  -->
    <div class="col-lg-12 mb-2">
        <div class="card shadow">
            <div class="card-header d-flex justify-conten-between">
                <div class="col">
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Sales Inquiry Items Details</div>
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#SalesInquiryStoreModal">Add
                        Item</button>
                </div>
            </div>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    
                    <div class="table-responsive">
                        <table id="Table" class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Item Description</th>
                                    <th>Item Qty</th>
                                    <th>Item Note</th>
                                    <th>Item Unit</th>
                                    <th>Status </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Sales Inquiry Items Details -->


<!-- Sales Inquiry Items Details Insert -->
<!-- Modal -->
<div class="modal fade" id="SalesInquiryStoreModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Sales Inquiry Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Insert Form  -->
                <form id="SalesInquiryStoreFrom">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" class="form-control isrequired" name="inquiry_id" id="inquiry_id"
                        value="<?php echo e($sales[0]->inquiry_id); ?>">
                    <div class="form-group">
                        <label>Item Description</label>
                        <input type="text" class="form-control isrequired" name="item_descriptions" id="descriptions"
                            placeholder="Item Description">
                    </div>
                    <div class="form-group">
                        <label>Item Qty</label>
                        <input type="number" class="form-control isrequired" name="item_quantity" id="quantity"
                            placeholder="Item Quantity">
                    </div>
                    <div class="form-group">
                        <label>Item Unit</label>
                        <select class="form-control selectBox select2 isrequired" name="item_unit" id="item_unit"
                            style="width:100%;">
                            <option selected="selected" disabled>Select</option>
                            <?php if(count($uom) > 0): ?>
                            <?php $__currentLoopData = $uom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($row->uom_id); ?>">
                                <?php echo e($row->uom_name); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Item Note</label>
                        <input type="text" class="form-control" name="item_note" id="note"
                            placeholder="Item Note">
                    </div>
                    <label>Item Attachments</label>
                    <div class="custom-file form-group">
                        <input type="file" class=" form-control" id="attachments" name="item_attachment[]"
                            multiple>
                    </div>
                </form>
                <!-- Insert Form  -->
            </div>
            <span id="salesinquirystore_error" style="display: none; text-align:center; margin:20px;"
                class="m-auto"></span>
            <div class="modal-footer">
                <button id="btnItemSubmit" type="button" class="btn btn-primary"
                    onclick="SalesInquiryStore()">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- Sales Inquiry Items Details Insert -->
<!-- Sales Inquiry Items Details Insert -->
<!-- Modal -->
<div class="modal fade" id="SalesInquiryEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sales Inquiry Item Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="SaleInquiryEditBody">

            </div>
            <span id="salesinquirystore_edit_error" style="display: none; text-align:center; margin:20px;"
                class="m-auto"></span>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="btnSubmit" type="button" class="btn btn-primary"
                    onclick="SalesInquiryUpdate()">Update</button>
            </div>
        </div>
    </div>
</div>


<!--  -->
<!-- Sales Inquiry Items Details Insert -->
<!-- Modal -->
<div class="modal fade" id="SalesInquiryViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Item Documents</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="SaleInquiryViewBody">

            </div>
            <span id="salesinquirystore_edit_error" style="display: none; text-align:center; margin:20px;"
                class="m-auto"></span>
            <div class="modal-footer">
                <!-- <button id="btnSubmit" type="button" class="btn btn-primary"
                    onclick="SalesInquiryUpdate()">Update</button> -->
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

    // setInterval(function() {
    //     ObserveInputValue($('#input_id').val()); 
    // }, 100);

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
            url: "<?php echo e(route('SalesInquiryItem-Show')); ?>",
            data: {
                inquiry_id: "<?php echo e($inquiry_id); ?>"
            }
        },
        columns: [{
                data: 'item_description',
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
                data: 'item_note',
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
                data: 'status',
                render: function(data) {
                    if (data === 1) {
                        return 'Pending';
                    } else if (data === 2) {
                        return 'Draft';
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

    $(".selectBox").select2({
        theme: "classic",
        // width: 'resolve'
    });
    // $("#item_unit").select2({
    //     theme: "classic",
    //     // width: 'resolve'
    // });

});

function InquiryUpdate() {
    var fields = $("input[class*='inquirey_required']");
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

    $("#btnSubmit").prop("disabled", true);
    $.ajax({

        type: "POST",
        url: "<?php echo e(route('SalesInquiry-Update')); ?>",
        data: $("#SalesInquiryEditForm").serialize(),
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
                    window.location.href = "<?php echo e(route('Sales-Inquiry')); ?>";
                }, 1500);
            } else {
                if (data['validation'] == false) {
                    $("#show_error").removeClass().html('').show();
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


// inquiry item store function
function SalesInquiryStore() {
    var fields = $("input[class*='isrequired']");
    console.log(fields.val());
    for (let i = 0; i <= fields.length; i++) {
        // console.log(fields);
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('id');
            var value = currentElement.replaceAll('_', ' ');
            $("#salesinquirystore_error").removeClass().html('');
            $("#salesinquirystore_error").show().addClass('alert alert-danger').html('The ' + value +
                ' field is required.');
            return false;
        } else {
            $("#salesinquirystore_error").hide().removeClass().html('');
        }
    }

    if ($("#item_unit option:selected").text() == 'Select') {
        $("#salesinquirystore_error").removeClass().html('');
        $("#salesinquirystore_error").show().addClass('alert alert-danger').html('The item unit field is required.');
        return false;
    } else {
        $("#salesinquirystore_error").removeClass().html('').hide();
    }
    // console.log('areafdsf');
    // return false;

    $("#btnItemSubmit").prop("disabled", true);
    let myForm = document.getElementById('SalesInquiryStoreFrom');
    let formData = new FormData(myForm);
    $.ajax({
        type: "POST",
        url: "<?php echo e(route('SalesInquiryItem-Store')); ?>",
        data: formData,
        contentType: false,
        processData: false,
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btnItemSubmit").prop("disabled", false);
            $("#salesinquirystore_error").removeClass().html('').show();
            $("#salesinquirystore_error").addClass("alert alert-danger").html(errorThrown);
            return false;
        },
        success: function(data) {
            $("#btnItemSubmit").prop("disabled", false);
            // console.log(data);
            // return false;
            if (data["success"] == true) {
                $("#salesinquirystore_error").removeClass().html('').show();
                $("#salesinquirystore_error").addClass("alert alert-success").html(data['message']);
                setTimeout(() => {
                    $("#SalesInquiryStoreModal").modal('hide');
                    $("#salesinquirystore_error").removeClass().html('').hide();
                    $("#SalesInquiryStoreFrom")[0].reset();
                    tables = $("#Table").dataTable();
                    tables.fnPageChange('first', 1);
                }, 2000);
            } else {
                if (data['validation'] == false) {
                    $("#salesinquirystore_error").removeClass().show().html('');
                    $("#salesinquirystore_error").addClass("alert alert-danger").html(data['message'][0]);
                    return false;
                }
                $("#salesinquirystore_error").removeClass().html('').show();
                // $("#salesinquirystore_error").addClass("alert alert-danger").html(data['message']);
                return false;
            }
        }
    });
}

// inquiry item edit
function SalesInquiryItemEdit(item_id) {
    $.ajax({
        type: "GET",
        url: "<?php echo e(route('SalesInquiryItem-Edit')); ?>",
        data: {
            item_id: item_id
        },
        success: function(data) {
            // $("#SalesInquiryEditModal").modal('show');
            // $("#item_id").val(data[0]['item_id']);
            // $("#item_description").val(data[0]['item_description']);
            // $("#item_quantity").val(data[0]['item_quantity']);
            // $("#item_unit").val(data[0]['uom_name']);
            // $("#item_note").val(data[0]['item_note']);
            $("#SaleInquiryEditBody").html(data);
            $("#SalesInquiryEditModal").modal('show');
        }
    })
}

// inquiry item view
function SalesInquiryItemView(item_id) {
    $.ajax({
        type: "GET",
        url: "<?php echo e(route('SalesInquiryItem-View')); ?>",
        data: {
            item_id: item_id
        },
        success: function(data) {
            // console.log(data)
            // return false;
            $("#SaleInquiryViewBody").html(data);
            $("#SalesInquiryViewModal").modal('show');
        }
    })
}

// inquiry item document remove
function documentRemove(attachment_id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.get("<?php echo e(route('SalesInquiryItemDocument-Remove')); ?>", {
                attachment_id: attachment_id
            }, function(data) {

                if (data['success'] == true) {
                    swal("Poof! Item document has been deleted!", {
                        icon: "success",
                    });
                    // $(this).closest('.removeClass').remove();
                    // console.log('removed');
                    $('#SalesInquiryViewModal').modal('hide')
                } else {
                    swal("Oops something went wrong, please check!", {
                        icon: "error",
                    });
                }
            });
        } else {
            swal("Your file is safe!");
        }
    });
}

// inquiry item update
function SalesInquiryUpdate() {
    var fields = $("input[class*='required_edit']");
    for (let i = 0; i <= fields.length; i++) {
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('id');
            var value = currentElement.replaceAll('_', ' ');
            $("#salesinquirystore_edit_error").removeClass().html('');
            $("#salesinquirystore_edit_error").show().addClass('alert alert-danger').html('The ' + value +
                ' field is required.');
            return false;
        } else {
            $("#salesinquirystore_edit_error").hide().removeClass().html('');
        }
    }

    $("#btnSubmit").prop("disabled", true);
    let myForm = document.getElementById('SalesInquiryEditFrom');
    let formData = new FormData(myForm);
    $.ajax({
        type: "POST",
        url: "<?php echo e(route('SalesInquiryItem-Update')); ?>",
        data: formData,
        contentType: false,
        processData: false,
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btnSubmit").prop("disabled", false);
            $("#salesinquirystore_edit_error").removeClass().html('').show();
            $("#salesinquirystore_edit_error").addClass("alert alert-danger").html(errorThrown);
            return false;
        },
        success: function(data) {
            $("#btnSubmit").prop("disabled", false);
            // console.log(data);
            // return false;
            if (data["success"] == true) {
                $("#salesinquirystore_edit_error").removeClass().html('').show();
                $("#salesinquirystore_edit_error").addClass("alert alert-success").html(data['message']);
                setTimeout(() => {
                    $("#SalesInquiryEditModal").modal('hide');
                    $("#salesinquirystore_edit_error").removeClass().html('').hide();
                    $("#SalesInquiryEditFrom")[0].reset();
                    tables = $("#Table").dataTable();
                    tables.fnPageChange('first', 1);
                }, 2000);
            } else {
                if (data['validation'] == false) {
                    $("#salesinquirystore_edit_error").removeClass().show().html('');
                    $("#salesinquirystore_edit_error").addClass("alert alert-danger").html(data['message'][
                        0
                    ]);
                    return false;
                }
                $("#salesinquirystore_edit_error").removeClass().html('').show();
                $("#salesinquirystore_edit_error").addClass("alert alert-danger").html(data['message']);
                return false;
            }
        }
    });
}

// inquiry item remove
function SalesInquiryItemRemove(item_id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.get("<?php echo e(route('SalesInquiryItem-Remove')); ?>", {
                item_id: item_id
            }, function(data) {

                if (data['success'] == true) {
                    swal("Poof! Department has been deleted!", {
                        icon: "success",
                    });
                    //toastr.success('Employee Bank Detail Removed Successfully..')
                    let DepartmentDataTable = $("#Table").dataTable();
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchishty\resources\views/SalesInquiry/SalesInquiryEdit.blade.php ENDPATH**/ ?>