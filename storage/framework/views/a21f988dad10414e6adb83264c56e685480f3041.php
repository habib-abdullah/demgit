<?php $__env->startSection('content'); ?>






<form id="purchase_form">
  <?php echo csrf_field(); ?>
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Vendor Name</label>
    <select id="vendor_name" name="vendor_name" class=" form-control col-sm-10">
      <option selected disabled>Select</option>
      <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($row->vendor_id); ?>"><?php echo e($row->vendor_name); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
  </div>
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Item Name</label>
    <select id="item_name" name="item_name" class=" form-control col-sm-10">
      <option selected disabled>Select</option>
      <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($row->item_name); ?>"><?php echo e($row->item_name); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
  </div>
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">price</label>
    <div class="col-sm-10">
      <!-- <input type="text" class="form-control" name="price"> -->
      <input type="text" class="form-control" id="price" name="price">
    </div>
  </div>
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">qty</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="qty">
    </div>
  </div>
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">purchase type</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="purchase_type">
    </div>
  </div>



  <div class="form-group row">
    <div class="col-sm-10">
      <button type="button" onclick="purchase()" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>

<script>
$(function() {
  $('#item_name').on('change', function() {
    // alert( this.value );
    var item_name = $("#item_name option:selected").val();
    $.get("<?php echo e(url('GetPrice')); ?>", {
      item_name: item_name
    }, function(data) {
      console.log(data);
      var json = JSON.parse(data);
      $("#price").val(json["item_price"]);
    });
  });
});

function purchase() {
  $.post("<?php echo e(url('purchase')); ?>", $("#purchase_form").serialize(), function(data) {
    console.log(data);
  });
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LaravelAdminlte3\resources\views/ProductPurchase.blade.php ENDPATH**/ ?>