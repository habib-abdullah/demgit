<?php $__env->startSection('content'); ?>

    <!-- Card -->
<div class="card card-primary" >
        <div class="card-header bg-gradient-info" >
            <h3>Create New API Attribute</h3>
        </div>
       
        <form role="form" id="APIAttributeForm" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body bg-grey">
                        <div class="form-group">
                            <select class="form-control" id="api_id" name="api_id">
                                 <option selected disabled style="color:#d2d6de" >Select API</option>
                                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->api_id); ?>"><?php echo e($item->api_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </select>
                         </div>
                                <div class="form-group">
                                    <label for="Name"><span style="color:red; font-size:18px;">*</span>API Attribute Name</label>
                                    <input type="text" name="api_attr_name" class="form-control" id="api_attr_name" placeholder="Enter Name"> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">API Attribute Key</label>
                                    <input type="text" name="api_attr_key" class="form-control" id="api_attr_key" placeholder="Enter key">
                                 </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>API Attribute value</label>
                                    <input type="text" maxlength="10" name="api_attr_value" class="form-control" id="api_attr_value" placeholder="Enter value"> 
                                </div>
                                <div  style="margin-bottom: 15px;">
                                        <button type="button" id="btnSave" class="btn btn-primary float-right"  onclick="InsertAPIAttribute()">Submit</button>
                                </div><br>
                                 <span id="response"></span>
                     </div>
                </div>
            </div>
         </form>
</div>


<script>
    function  InsertAPIAttribute(){
        var api_id = $("#api_id").val();
        var api_attr_name = $("#api_attr_name").val();
        var api_attr_key = $("#api_attr_key").val();
        var api_attr_value = $("#api_attr_value").val();
        //console.log(api_attr_name+"||"+api_attr_key+"||"+api_attr_value);
        $.ajax({
        type:'POST',
		url:"<?php echo e(url('InsertAPIAttribute')); ?>",
		data:$("#APIAttributeForm").serialize(),
		success:function(data){
			// console.log(data);
            // $("#response").html(data);
            if(data.includes('API Attribute Added')){
                window.location.href = "<?php echo e(url('APIAttributeReport')); ?>";
            }
			
			
		}
        });

    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PerfectRecharge\resources\views/APIs/APIAttribute.blade.php ENDPATH**/ ?>