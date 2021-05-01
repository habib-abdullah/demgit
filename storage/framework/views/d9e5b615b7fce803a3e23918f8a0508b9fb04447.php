<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">

        <div class="col-2">
            <div class="info-box bg-success">
                <span class="info-box-icon"><i class="fas fa-mobile-alt fa-2x"></i></span>
                <div class="info-box-content">
                    <a class="nav-link text-white" href="<?php echo e(url('Recharge')); ?>">MOBILE</a>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="info-box bg-info">
                <span class="info-box-icon"><i class="fas fa-tv fa-2x"></i></span>
                <div class="info-box-content">
                    <a class="nav-link text-white" href="<?php echo e(url('DTH')); ?>">DTH</a>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="info-box bg-danger">
                <span class="info-box-icon"><i class="fas fa-phone fa-2x"></i></span>
                <div class="info-box-content">
                    <a class="nav-link text-white" href="<?php echo e(url('PostPaid')); ?>">POSTPAID</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card bg-light shadow-md border-0 rounded-lg">
                    <div class="card-body p-5">
                        <form id="UpdateForm">
                            <?php echo csrf_field(); ?>

                            <div class="form-group">
                                <label for="inputFirstName">Mobile Number</label>
                                <input class="form-control" type="text" maxlength="10" name="number"
                                    placeholder="Enter Number"
                                    onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Operator</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>Select</option>
                                    <option>TATA Sky</option>
                                    <option>Airtel D2H</option>
                                    <option>Videocon D2h</option>
                                    <option> Dish tv</option>
                                    <option> Sun Direct</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <label for="inputEmailAddress">Recharge Amount</label>
                                        <input class="form-control" type="text" placeholder="Enter Amount" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-4 mb-0"><a class="btn btn-info text-white"
                                    onclick="Recharge()">Recharge</a></div>
                            <div class="form-group mt-4 mb-0" id="response">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>










<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PerfectRecharge\resources\views/Recharge/DTH.blade.php ENDPATH**/ ?>