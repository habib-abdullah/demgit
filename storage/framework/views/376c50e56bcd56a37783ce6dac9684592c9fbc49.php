<?php $__env->startSection('content'); ?>

<div class="container-fluid" style="padding-top:20px ">
    <!-- Card -->
    <div class="card card-primary">
        <div class="card-header bg-gradient-info">
            <h3>Add New Member</h3>
            <!-- <span id="input_error" style="float:right; padding-right: 10px;"></span> -->
            <?php if(Session::get('type_id')==1): ?>
            <a href="<?php echo e(url('AllMembersReport')); ?>" class="btn btn-primary float-right">All Member Report</a>
            <?php endif; ?>
        </div>
        <!-- errors -->
        <div class="card-body mx-auto" id="error_area" style=" display:none; margin-botton:0 !important;padding-bottom:0 !important;">
            <p id="error" class="text-align: justify;text-justify: inter-word; mb-0" style="color:red;"></p>
        </div>
        <!-- Form Member -->
        <form role="form" id="MemberForm" enctype="multipart/form-data">
            <input type="hidden" id="loggedin_user_id" name="loggedin_user_id" value="<?php echo e(Session::get('user_id')); ?>">
            <!-- Row Start -->
            <div class="row">
                <!-- Col-6 Start -->
                
                <div class="col-xl-6 col-md-6">
                    <div class="card-body bg-grey">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">
                                <span style="color:red; font-size:18px;">*</span>Member Type:
                            </label>
                            <select class="form-control" id="member_type" name="member_type">
                                <option selected disabled>Select Member</option>
                                <?php if(Session::get('type_id')==1): ?>
                                <option value="Master Distributor">Master Distributor</option>
                                <option value="Api">API</option>
                                <?php elseif(Session::get('type_id')==2): ?>
                                <option value="Distributor">Distributor</option>
                                <option value="Retailer">Retailer</option>
                                <?php elseif(Session::get('type_id')==3): ?>
                                <option value="Retailer">Retailer</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group" style="display: none;" id="dist_list">
                            <label for="recipient-name" class="col-form-label">
                                <span style="color:red; font-size:18px;">*</span>Select Parent: (Distributor)
                            </label>
                            <select class="form-control" id="distributor" name="distributor">
                                <option selected disabled>Select</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1"><span style="color:red; font-size:18px;">*</span>Name</label>
                            <input type="text" name="member_name" class="form-control" id="member_name"
                                placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="member_email" class="form-control" id="member_email"
                                placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>Mobile
                                Number</label>
                            <input type="text" maxlength="10" name="member_mobile" class="form-control"
                                id="member_mobile" placeholder="Enter Mobile Number" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Date Of Birth</label>
                            <input type="date" name="member_dob" class="form-control" id="member_dob"
                                placeholder="Enter Date Of Birth">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="card-body bg-grey">
                        <div class="form-group" style="padding-top: 9px;">
                            <label for="exampleInputEmail1">Shop Name</label>
                            <input type="text" name="shop_name" class="form-control" id="shop_name"
                                placeholder="Enter Shop Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>Minimum
                                Amount</label>
                            <input type="number" name="member_amount" class="form-control" id="member_amount"
                                placeholder="Enter Minimum Amount">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span
                                    style="color:red; font-size:18px;">*</span>Address</label>
                            <input type="text" name="member_address" class="form-control" id="member_address"
                                placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">GST No</label>
                            <input type="text" name="member_gst_no" class="form-control" id="member_gst_no"
                                placeholder="Enter GST No">
                        </div>
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span
                                    style="color:red; font-size:18px;">*</span>Password</label>
                            <input type="password" name="member_password" class="form-control" id="member_password"
                                placeholder="Enter Member Password">
                        </div>
                        <div class="card-body mx-auto" id="password_error_area" style=" display:none; margin-botton:0 !important;padding-bottom:0 !important;">
                            <p id="password_error" class="text-align: justify;text-justify: inter-word; mb-0" style="color:red;"></p>
                        </div>
                    </div>
                </div>
                <div class="mx-auto" style="margin-bottom: 15px;">
                    <button type="button" id="btnSave" class="btn btn-primary" onclick="InsertMember()">Submit</button>
                    
                </div>
            </div>
        </form>
        <!-- ./Form  -->
    </div>
    <!-- ./Card  -->
</div>

<script>
$(function() {
    $('#member_type').on('change', function() {
        // alert(this.value);
        if (this.value == "Retailer") {
            $.get(
                "<?php echo e(url('GetRetailerParent')); ?>", 
                {member_id: <?php echo Session::get('user_id'); ?>},
                function(data) {
                    console.log(data);
                    $("#dist_list").css("display","block");
                    $("#distributor").append(data);
            });
        }
        // else{
        // 	alert("good by");
        // }
    });
});

function ValidPassword(){
    var member_password = $("#member_password").val();
    var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{6,20})");
    if(!strongRegex.test(member_password)){
        $("#password_error_area").show();
        $("#password_error").html('Password must be 6 digit'+"<br>"+'Password must have atleast 1 upper case'+"<br>"+'Password must have atleast 1 lower case'+"<br>"+'Password must have atleast 1 number'+"<br>"+'Password must have atleast 1 special character');
        // console.log("regular");
        return false;
    }else {
        $("#password_error_area").hide();
    }
}




function InsertMember() {
    // All inputs for client side validation
    var member_type = $("#member_type").val();
    var shop_name = $("#shop_name").val();
    var member_name = $("#member_name").val();
    var member_email = $("#member_email").val();
    var member_mobile = $("#member_mobile").val();
    var member_dob = $("#member_dob").val();
    var member_amount = $("#member_amount").val();
    var member_address = $("#member_address").val();
    var member_gst_no = $("#member_gst_no").val();
    var member_password = $("#member_password").val();
    var distributor = $("#distributor").val();

    // if (member_type == "" || member_name == "" || member_email == "" ||
    //     member_mobile == "" || member_amount == "" || member_address == "" || member_password == "") {
    //     $("#error_area").show();
    //     $("#error").html('Please fill all mandatory fields');
    //     return false;
    // } else {
    //     $("#error_area").hide();
    // }
    // if (!$('#member_mobile').val().match('[0-9]{10}')) {
    //     $("#error_area").show();
    //     $("#error").html('Mobile number should be 10 digit');
    //     return false;
    // } else {
    //     $("#error_area").hide();
    // }
    // var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{6,20})");
    // if(!strongRegex.test(member_password)){
    //     $("#password_error_area").show();
    //     $("#password_error").html('Password must be 6 digit'+"<br>"+'Password must have atleast 1 upper case'+"<br>"+'Password must have atleast 1 lower case'+"<br>"+'Password must have atleast 1 number'+"<br>"+'Password must have atleast 1 special character');
    //     // console.log("regular");
    //     return false;
    // }else {
    //     $("#password_error_area").hide();
    // }
    // console.log(member_type+" | "+shop_name+" | "+member_name+" | "+member_email+" | "+member_mobile
    // +" | "+member_dob+" | "+member_amount+" | "+member_address+" | "+member_gst_no);
    console.log("reach");
    return false;
    // $("#btnSave").prop("disabled",true)
    $.ajax({
        type: 'POST',
        url: "<?php echo e(url('InsertMember')); ?>",
        data: $("#MemberForm").serialize()+"&distributor"+distributor,
        success: function(data) {
            console.log(data);
            // $("#response").html(data);
            if (data.includes('Member added successfully')) {
                window.location.href = "<?php echo e(url('Dashboard')); ?>";
            }
            // $("#btnSave").prop("disabled",false);
        }
    });
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PerfectRecharge\resources\views/Member/CreateMember.blade.php ENDPATH**/ ?>