<?php $__env->startSection('content'); ?>
<div class="container-fluid" style="padding-top:20px ">
    <!-- Card -->
<div class="card card-outline card-warning  " >
        <div class="card-header" >
            <h3 class="card-title pt-2">Update Member</h3>
            <!-- <span id="input_error" style="float:right; padding-right: 10px;"></span> -->
            <a href="<?php echo e(url('AllMembersReport')); ?>" class="btn btn-primary float-right"   >All Member Report</a>
        </div>
        <!-- Form Member -->
        <form role="form" id="MemberUpdateForm" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="text" id="member_id" name="member_id" value="<?php echo e($rows->member_id); ?>" />
            <!-- Row Start -->
            <div class="row">
                <!-- Col-6 Start -->
                <div class="col-md-6">
                    <div class="card-body bg-grey">
                        
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label"><span style="color:red; font-size:18px;">*</span>Member Type:</label>
                            <select class="form-control" id="member_type" name="member_type">
                                <?php foreach ($member_types as $types):?>
                                    <?php if ($types->type_id == $rows->type_id):?>
                                        <option selected ><?php echo e($types->member_name); ?></option>
                                    <?php endif;?>
                                <?php endforeach;?>
                                <option value="master_distributor">Master distributor</option>
                                <option value="distributor">Distributor</option>
                                <option value="retailer">Retailer</option>
                                <option value="api">API</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Name"><span style="color:red; font-size:18px;">*</span>Name</label>
                            <input type="text" name="member_name" class="form-control" id="member_name" placeholder="Enter Name" value="<?php echo e($rows->member_name); ?>"> </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="member_email" class="form-control" id="member_email" placeholder="Enter Email" value="<?php echo e($rows->member_email); ?>"> </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>Mobile Number</label>
                            <input type="text" maxlength="10" name="member_mobile" class="form-control" id="member_mobile" placeholder="Enter Mobile Number" value="<?php echo e($rows->member_mobile); ?>"> </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Date Of Birth</label>
                            <input type="date" name="member_dob" class="form-control" id="member_dob" placeholder="Enter Date Of Birth" value="<?php echo e($rows->member_dob); ?>"> </div>
                    </div>	
                </div>
                    <div class="col-xl-6">
                        <div class="card-body bg-grey">
                            <div class="form-group" style="padding-top: 9px;">
                            <label for="exampleInputEmail1">Shop Name</label>
                                <input type="text" name="shop_name" class="form-control" id="shop_name" placeholder="Enter Shop Name" value="<?php echo e($rows->member_shop_name); ?>"> </div>
                    
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>Minimum Amount</label>
                                <input type="text" name="member_amount" class="form-control" id="member_amount" placeholder="Enter Minimum Amount" value="<?php echo e($rows->member_min_amount); ?>"> </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>Adress</label>
                                <input type="text"  name="member_address" class="form-control" id="member_address" placeholder="Enter Address"value="<?php echo e($rows->member_address); ?>"> </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">GST No</label>
                                <input type="text" name="member_gst_no" class="form-control" id="member_gst_no" placeholder="Enter GST No" value="<?php echo e($rows->member_gst_no); ?>"> </div>
                                
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>Password</label>
                                <input type="password"  name="member_password" class="form-control" id="member_password" placeholder="Enter Member Password" value="<?php echo e($rows->member_password); ?>"> </div>
                            <div id=""></div>
                        </div>
                    </div>
                        <div class="mx-auto" style="margin-bottom: 15px;">
                            <button type="button" id="btnSave" class="btn btn-primary" onclick="UpdateMember()">Update</button>
                            <span id="response"></span>
                        </div>
                </div>
        </form>
        <!-- ./Form  -->
    </div>
    <!-- ./Card  -->
</div>
<script>
    function UpdateMember(){
        // alert("!!");
        var member_type = $("#member_type").val();
        var member_name = $("#member_name").val();
        var member_email = $("#member_email").val();
        var member_mobile = $("#member_mobile").val();
        var member_dob = $("#member_dob").val();
        var shop_name = $("#shop_name").val();
        var member_amount = $("#member_amount").val();
        var member_address = $("#member_address").val();
        var member_gst_no = $("#member_gst_no").val();
        var member_password = $("#member_password").val();
    //    console.log(member_type);
    //    return false;
        
        $.ajax({
            type : "POST",
            url : "<?php echo e(url('UpdateMember')); ?>",
            data : $("#MemberUpdateForm").serialize(),
            success : function(data){
                console.log(data);
                if(data.includes('Updated')){
                    window.location.href = "<?php echo e(url('AllMembersReport')); ?>";
                }
            }
        });
    }
    


</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PerfectRecharge\resources\views/Member/MemberUpdate.blade.php ENDPATH**/ ?>