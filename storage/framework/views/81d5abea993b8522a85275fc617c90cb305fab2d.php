<?php $__env->startSection('content'); ?>







<div class="container" style="padding-top: 30px;padding-bottom: 30px;"> 
    <table class="table table-bordered" id="table">
        <thead>
            <tr>
                <th style="width:30px">UID</th>
                <th>date</th>
                <th>vendor</th>
                <th>product</th>
                <th>price</th>
                <th>qty</th>
                <th>total</th>
                <th>stock in</th>
                <th>stock out</th>
                <th style="width:80px">Action</th>
            </tr>
        </thead>
    </table>
</div>

<script>
$(function() {
  $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '<?php echo e(url('ProductPurchaseReport')); ?>',
        columns: [
                { data: 'ledger_id' },
                { data: 'ledger_date' },
                { data: 'vendor_id' },
                { data: 'item_name' },
                { data: 'item_price' },
                { data: 'item_qty' },
                { data: 'total' },
                { data: 'stock_in' },
                { data: 'stock_out' },
                { data: 'action' },
              ]
    });
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LaravelAdminlte3\resources\views/ProductPurchaseList.blade.php ENDPATH**/ ?>