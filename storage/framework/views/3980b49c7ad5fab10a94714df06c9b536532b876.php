<?php $__env->startSection('content'); ?>
<!-- <div class="container-fluid"> -->
    <!-- Page Heading -->
    <!-- <div class="row">
        <div class="col-md-12 mb-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="<?php echo e($backUrl); ?>" style="font-size: 18px;"><i
                                class="fas fa-arrow-circle-left"></i>
                            Back </a>
                    </h3>
                    <h3 class="h3 text-center text-bold text-uppercase"> Sales Order Information </h3>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body box-profile">
                            <p class="text-muted text-center"></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="" style="visibility:hidden;"></li>
                                <li class=" text-capitalize" style="list-style:none;">
                                    <b> Unit </b>
                                    <a class="float-right"><?php echo e($items[0]->uom_name); ?></a>
                                    <hr>
                                </li>
                                <li class=" text-capitalize" style="list-style:none;">
                                    <b> Quantity </b> <a class="float-right"><?php echo e($items[0]->item_quantity ?? 0); ?></a>
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
                                    <b>Item Description</b> <a class="float-right"><?php echo e($items[0]->item_description); ?></a>
                                    <hr>
                                </li>
                                <li class="" style="list-style:none;">
                                    <b>Note</b> <a
                                        class="float-right"><?php echo e($items[0]->item_note); ?></a>
                                    <hr>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<h1>jgodifjgofj</h1>
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
                                        <th class="">Item no</th>
                                        <th>Description</th>
                                        <th>Receiving Date</th>
                                        <th>Delivery Date</th>
                                        <th>CurrentStatus</th>
                                        <th>Gross Total</th>
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

<script>

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchishty\resources\views/SalesOrder/SalesOrdeDetail.blade.php ENDPATH**/ ?>