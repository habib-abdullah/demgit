<?php $__env->startSection('content'); ?>


<div class="container-fluid" style="padding-top:20px ">
		<!-- Card -->
<div class="card card-outline card-primary  " >
			<div class="card-header" >
				<h3 class="card-title pt-2">New Member</h3>
				<!-- <span id="input_error" style="float:right; padding-right: 10px;"></span> -->
				<a href="<?php echo e(url('MembersReport')); ?>" class="btn btn-primary float-right"   >All Member Report</a>
			</div>
			<!-- Form Member -->
			<form role="form" id="MemberForm" enctype="multipart/form-data">
				<!-- Row Start -->
				<div class="row">
					<!-- Col-6 Start -->
					<div class="col-md-6">
						<div class="card-body bg-grey">
							<div class="form-group">
								<label for="recipient-name" class="col-form-label"><span style="color:red; font-size:18px;">*</span>Member Type:</label>
								<select class="form-control" id="member_type" name="member_type">
									<option selected disabled>Select Member</option>
									<option value="master_distributor">Master Distributor</option>
									<option value="ditributor">Distributor</option>
									<option value="retailer">Retailer</option>
								</select>
							</div>
							<div class="form-group">
								<label for="Name"><span style="color:red; font-size:18px;">*</span>Name</label>
								<input type="text" name="member_name" class="form-control" id="member_name" placeholder="Enter Name"> </div>
							<div class="form-group">
								<label for="exampleInputEmail1">Email</label>
								<input type="email" name="member_email" class="form-control" id="member_email" placeholder="Enter Email"> </div>
							<div class="form-group">
								<label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>Mobile Number</label>
								<input type="text" maxlength="10" name="member_mobile" class="form-control" id="member_mobile" placeholder="Enter Mobile Number"> </div>
							<div class="form-group">
								<label for="exampleInputEmail1">Date Of Birth</label>
								<input type="date" name="member_dob" class="form-control" id="member_dob" placeholder="Enter Date Of Birth"> </div>
						</div>	
					</div>
						<div class="col-xl-6">
							<div class="card-body bg-grey">
								<div class="form-group" style="padding-top: 9px;">
								<label for="exampleInputEmail1">Shop Name</label>
									<input type="text" name="shop_name" class="form-control" id="shop_name" placeholder="Enter Shop Name"> </div>
						
								<div class="form-group">
									<label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>Minimum Amount</label>
									<input type="text" name="member_amount" class="form-control" id="member_amount" placeholder="Enter Minimum Amount"> </div>
								<div class="form-group">
									<label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>Adress</label>
									<input type="text"  name="member_address" class="form-control" id="member_address" placeholder="Enter Address"> </div>
								<div class="form-group">
									<label for="exampleInputEmail1">GST No</label>
									<input type="text" name="member_gst_no" class="form-control" id="member_gst_no" placeholder="Enter GST No"> </div>
									<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
								<div class="form-group">
									<label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>Password</label>
									<input type="password"  name="member_password" class="form-control" id="member_password" placeholder="Enter Member Password"> </div>
								<div id=""></div>
							</div>
						</div>
							<div class="mx-auto" style="margin-bottom: 15px;">
								<button type="button" id="btnSave" class="btn btn-primary" onclick="InsertMember()">Submit</button>
								<span id="response"></span>
							</div>
					</div>
			</form>
			<!-- ./Form  -->
		</div>
		<!-- ./Card  -->
	</div>

<script>

function InsertMember(){

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

	if(member_type == "" || shop_name == ""  || member_name == "" || member_email == "" || 
		member_mobile == "" || member_amount == "" || member_address == "" || member_password == "")
	{
		$("form#MemberForm input[type=text],input[type=number],input[type=date]").css("border-color","red");
		alert('please fill all mandatory fields');
		$("#response").html('Please fill all mandatory fields');
		return false;
	}else{
		$("form#MemberForm input[type=text],input[type=number],input[type=date],input[type=password]").css("border-color","#CED4DA");
	}
	if(!$('#member_mobile').val().match('[0-9]{10}')){
		alert('Mobile number should be 10 digit');
		$('#member_mobile').css("border-color","red");
		return false;
	}else{
		$('#member_mobile').css("border-color","#CED4DA");
	}
	// console.log(member_type+" | "+shop_name+" | "+member_name+" | "+member_email+" | "+member_mobile
	// +" | "+member_dob+" | "+member_amount+" | "+member_address+" | "+member_gst_no);

	// $("#btnSave").prop("disabled",true)
	$.ajax({
		type:'POST',
		url:"<?php echo e(url('InsertMember')); ?>",
		data:$("#MemberForm").serialize(),
		success:function(data){
			console.log(data);
			$("#response").html(data);
			// $("#btnSave").prop("disabled",false);
			if(data.includes('Member added successfully')){
				window.location.href = "<?php echo e(url('AllMemberReport')); ?>";
			}
		}
	});
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PerfectRecharge1\resources\views/Member/CreateMember.blade.php ENDPATH**/ ?>