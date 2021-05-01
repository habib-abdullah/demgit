<?php $__env->startSection('content'); ?>

<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<div class="container" style="padding-top: 30px;padding-bottom: 30px;">
	<table class="table table-bordered" id="table">
		<thead>
			<tr>
				<th style="width:30px">UID</th>
				<th>Name</th>
				<th style="width:40px">Mobile</th>
				<!-- <th>Father Name</th> -->
				<th style="width:90px;">UPSC Prelim</th>
				<th>Place</th>
				<th style="width:30px">Action</th>
			</tr>
		</thead>
	</table>
</div>
<script>
    $(function(){
        $('#table').DataTable({
          processing: true,
          serverSide: true,
          ajax: '<?php echo e(url('getReport')); ?>',
          columns: [
                  { data: 'candidate_id' },
                  { data: 'full_name' },
                  { data: 'mobile_number' },
                  { data: 'upsc_prelim_attemp' },
                  { data: 'place' },
                  { data: 'action' },
                  ]
        });
    });
    function loadDetails(id){
        //alert(id)
        $.get('<?php echo e(url('LoadCandidatesDetails')); ?>',{id:id},function(data){
            $("#loadDetailsArea").html(data);
        });
    }
</script>
<div id="infoModal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header"> </div>
			<div class="modal-body" id="loadDetailsArea">

			</div>
			<div class="modal-footer">
				<button data-toggle="modal" data-target="#KrcListModal" class="btn btn-xs btn-primary">Assign KRC</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div id="KrcListModal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-md">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">Assign Krc To Candidate</div>
			<div class="modal-body">
				<form id="KrcForm">
					<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
					<!-- <input type="hidden" name="krc_candidate_id" id="krc_candidate_id"> -->
					<!-- <input type="text" name="krc_id" id="krc_id" value="<?php echo e($krcs[0]->krc_id); ?>"> -->
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">KRC Seat Location:</label>
						<select name="krc_seat_location" id="krc_seat_location" class="form-control">
							<option selected disabled>Select Location</option>
							<option value="Reading Room 1">Reading Room 1</option>
							<option value="Reading Room 2">Reading Room 2</option>
							<option value="Girls Reading Room">Girls Reading Room</option>
						</select>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">KRC Seat Label:</label>
						<select name="krc_seat_label" id="krc_seat_label" class="form-control">
						
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button onclick="assignKrc()" class="btn btn-xs btn-primary">Confirm KRC</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script>

	$(function(){
		$("#krc_seat_location").on('change', function(){
			var matchvalue = $(this).val(); // this.value
			$.ajax({ 
				url: "<?php echo e(url('getKrcSeats')); ?>",
				data: $("#KrcForm").serialize(),
				type: 'post',
				success: function(data){
					// console.log(data);
					$("#krc_seat_label").html(data);
				}
			});
		});
	
	});

	function assignKrc(){
		var id = $("#candidate_uid").val();
		var kid = $("#krc_id").val();
		// alert("candidate "+id+" krc "+kid);
		$.post(
			"<?php echo e(url('assignKrc')); ?>",
			$("#KrcForm").serialize()+"&candidate_uid="+id,
			function(data){
				console.log(data);
				if(data.includes('KRC Assigned Successfully')){
					location.reload();
				}
			}
		);
	}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hcoi\resources\views/Admission/AdmissionReport.blade.php ENDPATH**/ ?>