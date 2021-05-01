<?php $__env->startSection('content'); ?>

<div class="card card-primary">
  <div class="card-header bg-gradient-info">
    <h3>Edit API</h3>
    <!-- <span id="input_error" style="float:right; padding-right: 10px;"></span> -->
  </div>
  <!-- Form Member -->
  <form role="form" id="APIForm" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="api_id" class="form-control" id="api_id" value="<?php echo e($row[0]->api_id); ?>">
    <div class="row">
      <div class="col-md-12">
        <div class="card-body bg-grey">
          <div class="form-group">
            <label for="Name"><span style="color:red; font-size:18px;">*</span>API Name</label>
            <input type="text" name="api_name" class="form-control" id="api_name" placeholder="Enter Name"
              value="<?php echo e($row[0]->api_name); ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">API Margin</label>
            <input type="text" name="api_margin" class="form-control" id="api_margin" placeholder="Enter api_margin"
              value="<?php echo e($row[0]->api_margin); ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>API Margin Type</label>
            <input type="text" maxlength="10" name="api_margin_type" class="form-control" id="api_margin_type"
              placeholder="Enter api_margin_type" value="<?php echo e($row[0]->api_margin_type); ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>API URL</label>
            <input type="text" name="api_url" class="form-control" id="api_url" value="<?php echo e($row[0]->api_url); ?>">
          </div>
          <div style="margin-bottom: 15px;">
            <button type="button" id="btnSave" class="btn btn-primary float-right"
              onclick="UpdateApiData()">Update</button>
          </div><br>
        </div>
        <span id="response"></span>
      </div>
    </div>
  </form>
</div>
<script>
function UpdateApiData() {
  var api_name = $("#api_name").val();
  var api_margin = $("#api_margin").val();
  var api_margin_type = $("#api_margin_type").val();
  //  console.log(api_name+"||"+api_margin+"||"+api_margin_type);
  $.ajax({
    type: 'POST',
    url: "<?php echo e(url('UpdateApiData')); ?>",
    data: $("#APIForm").serialize(),
    success: function(data) {
      // console.log(data);
      // $("#response").html(data);
      if (data.includes('API Updated')) {
        window.location.href = "<?php echo e(url('API')); ?>";
      }
    }
  });
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PerfectRecharge\resources\views/APIs/UpdateApi.blade.php ENDPATH**/ ?>