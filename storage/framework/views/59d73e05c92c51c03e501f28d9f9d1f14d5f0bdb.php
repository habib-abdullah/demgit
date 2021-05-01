<?php $__env->startSection('content'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-rupee-sign"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text text-bold">Main Wallet</span>
                        <span class="info-box-number font-weight-normal">
                            Current Balance <?php echo e($MainTotal); ?>

                            <small><i class="fas fa-rupee-sign"></i></small>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-rupee-sign"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text text-bold">DMR Wallet</span>
                        <span class="info-box-number font-weight-normal">
                            Current Balance <?php echo e($DMRTotal); ?>

                            <small><i class="fas fa-rupee-sign"></i></small>
                        </span>
                    </div>
                </div>
            </div>

            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-mobile-alt"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Today's Recharge</span>
                        <small>0 <i class="fas fa-rupee-sign"></i></small>
                    </div>
                </div>
            </div>
            
        </div>
        <?php if(Session::get('type_id') == 1): ?>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text text-bold">Master Distributors</span>
                        <span class="info-box-number font-weight-normal">
                             <?php echo e($TotalMasters); ?>

                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text text-bold">Distributors</span>
                        <span class="info-box-number font-weight-normal">
                            <?php echo e($TotalDistributors); ?>

                        </span>
                    </div>
                </div>
            </div>

            <div class="clearfix hidden-md-up"></div>

            
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text text-bold">Retailers</span>
                        <span class="info-box-number font-weight-normal">
                            <?php echo e($TotalRetailers); ?>

                        </span>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- <button type="button" onclick="truncate()">Truncate</button> -->
<script>
function truncate() {
    $.get("<?php echo e(url('truncate')); ?>", function(data) {
        console.log(data);
    });
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PerfectRecharge\resources\views/Dashboard.blade.php ENDPATH**/ ?>