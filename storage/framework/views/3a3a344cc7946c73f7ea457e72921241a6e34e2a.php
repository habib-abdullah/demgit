<?php $__env->startSection('content'); ?>

<div class="card card-primary" >
    <div class="card-header bg-gradient-info" >
        
        <h3>Retailer Balance Transfer Report</h3>
        <!-- <span id="input_error" style="float:right; padding-right: 10px;"></span> -->
    </div>
    <div class="container" style="padding-top: 30px;padding-bottom: 30px;">
        <table class="table table-bordered" id="table">
            <thead class="table-primary">
                <tr>
                    <th>Member Name</th>
                    <th>Wallet Type</th>
                    <th>Balance</th>
                    <th style="width:30px">Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready( function () {
        $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "<?php echo e(url('GetRetailerTransactions')); ?>",
            columns: [
                { data: 'member_name' },
                { data: 'voucher_type' },
                { data: 'TotalBalance' },
                { data: 'action' }
            ]
        });
    });
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PerfectRecharge\resources\views/MemberTransaction/RetailerTransactionReport.blade.php ENDPATH**/ ?>