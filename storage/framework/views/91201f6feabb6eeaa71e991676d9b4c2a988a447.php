<?php $__env->startSection('content'); ?>
<div class="container ">
    <div class="row">
        <div class="col-6 mx-auto">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Generate Amount</h3>
              </div>
<form class="" id="AmountForm">
    <?php echo csrf_field(); ?>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Enter Amount</label>
                    <div class="col-sm-10">
                      <input type="text" name="user_amount" id="user_amount" class="form-control" placeholder="Enter Amount">
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button onclick="AddAmount()" class="btn btn-info">Add</button>
                  
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
  // alert('as');
});

function AddAmount(){
  var Amount = $('#user_amount').val();
  console.log(Amount);

}




</script>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PerfectRecharge\resources\views/Amount.blade.php ENDPATH**/ ?>