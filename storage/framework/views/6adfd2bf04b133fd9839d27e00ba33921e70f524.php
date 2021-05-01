<?php $__env->startSection('content'); ?>

<div class="card card-primary col-lg-7 col-md-8 mx-auto">
  <div class="card-header bg-gradient-info">
    <h3>Create New API</h3>
    <!-- <span id="input_error" style="float:right; padding-right: 10px;"></span> -->
  </div>
  <!-- Form Member -->
  <form role="form" id="APIForm" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="row">
      <div class="col-md-12">
        <div class="card-body bg-grey">
          <div class="form-group">
            <label for="Name"><span style="color:red; font-size:18px;">*</span>API Name</label>
            <input type="text" name="api_name" class="form-control" id="api_name" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">API Margin</label>
            <input type="text" name="api_margin" class="form-control" id="api_margin" placeholder="Enter api_margin">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">API Margin Type</label>
            <input type="text" maxlength="10" name="api_margin_type" class="form-control" id="api_margin_type"
              placeholder="Enter api_margin_type">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>API URL</label>
            <input type="text" name="api_url" class="form-control" id="api_url"
              placeholder="Enter API URL">
          </div>
          <div class="text-center" style="margin-bottom:-20px;">
            <button type="button" id="btnSave" class="btn btn-primary" onclick="InsertAPI()">Submit</button>
          </div>
					<br>
          <span id="response"></span>
        </div>
      </div>
    </div>
  </form>
</div>
<script>
function InsertAPI() {
  var api_name = $("#api_name").val();
  var api_margin = $("#api_margin").val();
  var api_margin_type = $("#api_margin_type").val();
  var api_url = $("#api_url").val();
  // console.log(api_name+"||"+api_margin+"||"+api_margin_type);

if(api_name == "" && api_url == ""){
  
}

  $.ajax({
    type: 'POST',
    url: "<?php echo e(url('InsertAPI')); ?>",
    data: $("#APIForm").serialize(),
    success: function(data) {
      // console.log(data);
      // $("#response").html(data);
      if (data.includes('API Added')) {
        window.location.href = "<?php echo e(url('API')); ?>";
      }
    }
  });

}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PerfectRecharge\resources\views/APIS/CreateAPI.blade.php ENDPATH**/ ?>