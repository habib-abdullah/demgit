<?php $__env->startSection('content'); ?>
<!-- Yajra Datatables -->





<div class="card card-outline card-primary  " >
    <div class="card-header" >
        <h3 class="card-title pt-2">All Member Report</h3>
        <!-- <span id="input_error" style="float:right; padding-right: 10px;"></span> -->
        
    </div>



<div class="container" style="padding-top: 30px;padding-bottom: 30px;">
	<table class="table table-bordered" id="table">
		<thead>
			<tr>
				<th style="width:30px">UID</th>
				<th>Type</th>
				<th>Name</th>
				<th>Email</th>
				<th>Mobile</th>
				<th>Address</th>
				<th>GST</th>
				<th>Status</th>
				<th style="width:30px">Action</th>
			</tr>
		</thead>
	</table>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready( function () {
        // alert('jell');
        $('#table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "<?php echo e(url('AllMemberReport')); ?>",
          columns: [
                  { data: 'member_id' },
                  { data: 'member_type' },
                  { data: 'member_name' },
                  { data: 'member_email' },
                  { data: 'member_mobile' },
                  { data: 'member_address' },
                  { data: 'member_gst_no' },
                  { data: 'member_status' },
                  { data: 'action' }
                  ]
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PerfectRecharge\resources\views/Member/MembersReport.blade.php ENDPATH**/ ?>