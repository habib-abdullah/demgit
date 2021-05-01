<?php $__env->startSection('content'); ?>







<a href="<?php echo e(url('report')); ?>" class="btn btn-primary float-right"   >Transaction Report</a>

        <form id="TransferForm">
            <input type="hidden" id="member_type" name="member_type" value="<?php echo e($rows[0]->type_id); ?>">
            <?php echo csrf_field(); ?>
            <!-- <div class="form-row"> -->
                <div class="form-group">
                    <label for="inputState">Select Member</label>
                    <select id="member_id" name="member_id" class="form-control">
                        <option selected>Select</option>
                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($row->member_id); ?>"><?php echo e($row->member_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputState">Transfer Type</label>
                    <select id="voucher_type" name="voucher_type" class="form-control">
                        <option selected>Select</option>
                        <option value="main">Main Wallet</option>
                        <option value="dmr">DMR Wallet</option>
                    </select>
                </div>
            <!-- </div> -->
            <div class="form-group">
                <label for="inputAddress2">Amount</label>
                <input type="text" class="form-control" id="wallet_amount" name="wallet_amount" placeholder="Enter Amount">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Remarks</label>
                <textarea id="remarks" name="remarks" class="form-control" rows="2"></textarea>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="TransferBalance()" class="btn btn-primary">Transfer</button>
    </div>

<script>
function TransferBalance(){
    $.post("<?php echo e(url('TransferBalance')); ?>",$("#TransferForm").serialize(),function(data){
        // console.log(data);
        if(data.includes('Amount Transfered Succesfully')){
			window.location.href = "<?php echo e(url('Dashboard')); ?>";
		}
    });
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PerfectRecharge\resources\views/transaction.blade.php ENDPATH**/ ?>