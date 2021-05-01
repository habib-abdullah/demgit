<?php $__env->startSection('content'); ?>

<div class="card card-primary" >
    <div class="card-header bg-gradient-info" >
        <h3><?php echo e($member_name); ?> All Transactions</h3>
        <!-- <span id="input_error" style="float:right; padding-right: 10px;"></span> -->
        <input type="hidden" name="" id="" value="<?php echo e($member_id); ?>">
    </div>
    <div class="container" style="padding-top: 30px;padding-bottom: 30px;">
        <!-- <button>Back</button> -->
        <table class="table table-bordered" id="table">
            <thead class="table-primary">
                <tr>
                    <th>Date</th>
                    <th style="width:60px;">#Id</th>
                    <!-- <th>From</th> -->
                    <th>Particular</th>
                    <th>Credit</th>
                    <th>Debit</th>
                    <!-- <th style="width:30px">Action</th> -->
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
        ajax:  {
            url: "<?php echo e(url('GetDistributorIndividualTransactions')); ?>",
            data: {member_id:"<?=$member_id?>"}
        },
        columns: [
            { data: 'date' },
            { data: 'transaction_id' },
            // { data: 'from_member_name' },
            { data: 'to_member_name' },
            { data: 'debit' },
            { data: 'credit' },
            // { data: 'action' }
        ]
    });
});
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PerfectRecharge\resources\views/MemberTransaction/DistIndividualTransactions.blade.php ENDPATH**/ ?>