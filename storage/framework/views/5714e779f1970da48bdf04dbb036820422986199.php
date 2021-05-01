<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12 mb-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="<?php echo e(route('Sales-Inquiry')); ?>" style="font-size: 18px;"><i class="fas fa-arrow-circle-left"></i>
                            Back </a>
                    </h3>
                    <h3 class="h3 text-center text-bold text-uppercase"> Sales Inquiry Estimation Information </h3>
                    <h3 class="h5 text-center text-capitalize"> Sales Inquiry Number 0101-SIQ-132 | Details
                    </h3>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body box-profile">
                            <p class="text-muted text-center"></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="" style="visibility:hidden;"></li>
                                <li class=" text-capitalize" style="list-style:none;">
                                    <b> Inquiry Date & time </b>
                                    <a class="float-right"><?php echo e($inquiry[0]->inquiry_date); ?></a>
                                    <hr>
                                </li>
                                <li class=" text-capitalize" style="list-style:none;">
                                    <b>Assignee</b> <a class="float-right"><?php echo e($inquiry[0]->first_name); ?>

                                        <?php echo e($inquiry[0]->last_name); ?></a>
                                    <hr>
                                </li>
                                <li class=" text-capitalize" style="list-style:none;">
                                    <b>Inquiry Channel</b> <a class="float-right"><?php echo e($inquiry[0]->inquiry_channel); ?></a>
                                    <hr>
                                </li>
                                <li class=" text-capitalize" style="list-style:none;">
                                    <b>Email</b> <a class="float-right"><?php echo e($inquiry[0]->inquiry_person_email); ?></a>
                                    <hr>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body box-profile">
                            <div class="text-center">
                            </div>
                            <p class="text-muted text-center"></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="" style="visibility:hidden;"></li>
                                <li class="" style="list-style:none;">
                                    <b>Customer</b> <a class="float-right"><?php echo e($inquiry[0]->company_name); ?></a>
                                    <hr>
                                </li>
                                <li class="" style="list-style:none;">
                                    <b>Inquiry Response Deadline</b> <a
                                        class="float-right"><?php echo e($inquiry[0]->inquiry_response_date); ?></a>
                                    <hr>
                                </li>
                                <li class="" style="list-style:none;">
                                    <b>Inquiry Subject</b> <a class="float-right"><?php echo e($inquiry[0]->inquiry_subject); ?></a>
                                    <hr>
                                </li>
                                <li class="" style="list-style:none;">
                                    <b>Status</b> <a class="float-right" id="status">
                                        <?php if($inquiry[0]->status == 1): ?>
                                        Pending
                                        <?php elseif($inquiry[0]->status == 2): ?>
                                        Draft
                                        else($inquiry[0]->status == 3)
                                        Estimation Compeleted
                                        <?php endif; ?>
                                    </a>
                                    <hr>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 mb-2">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="h4">Item Estimation Details</h3>
                </div>
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="table-responsive">
                            <table id="Table" class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="">UID</th>
                                        <th>Item Description</th>
                                        <th>Unit</th>
                                        <th>Qty</th>
                                        <th>Note</th>
                                        <th>Item Gross Total</th>
                                        <th>Item Vat</th>
                                        <th>Item Net Total</th>
                                        <th>Status</th>
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
</div>

<script src="<?php echo e(url('public/plugins/jquery/jquery.min.js')); ?>"></script>
<script>
$(document).ready(function() {

    $.get("<?php echo e(Route('Estimation-Item-Show')); ?>", { inquiry_id : "<?php echo e($inquiry_id); ?>" }, function(data){
        console.log(data);
    });
    
    var table = $("#Table").DataTable({
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
            url: "<?php echo e(Route('Estimation-Item-Show')); ?>",
            data: { inquiry_id : "<?php echo e($inquiry_id); ?>" },
        },
        columns: [{
                data: 'item_id',
                'searchable': false,
                'orderable': false,
                'className': 'd-none',
            },
            {
                data: 'item_description',
                'searchable': true,
                'orderable': true,
            },
            {
                data: 'uom_name',
                'searchable': true,
                'orderable': false,
            },
            {
                data: 'item_quantity',
                'searchable': true,
                'orderable': false,
            },
            {
                data: 'item_note',
                'searchable': true,
                'orderable': false,
            },
            {
                data: 'gross_total',
                render: function(data){
                    if(data != null){
                        return data.toFixed(2);
                    }else{
                        return '';
                    }
                },
                'searchable': true,
                'orderable': false,
            },
            {
                data: 'vat_total',
                render: function(data){
                    if(data != null){
                        return data.toFixed(2);
                    }else{
                        return '';
                    }
                },
                'searchable': true,
                'orderable': false,
            },
            {
                data: 'net_total',
                render: function(data){
                    if(data != null){
                        return data.toFixed(2);
                    }else{
                        return '';
                    }
                },
                'searchable': true,
                'orderable': false,
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
            },
            {
                data: 'action',
                'searchable': true,
                'orderable': false,
                'className': 'text-center',
            },
        ],
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchishty\resources\views/SalesInquiry/Estimation/Estimation.blade.php ENDPATH**/ ?>