<?php $__env->startSection('content'); ?>
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<section class="content mt-3">
    <div class="container-fluid">
        <!-- general form elements -->
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Allot KRC</h3>
                <span id="input_error" style="float:right; padding-right: 10px;"></span>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#KrcModal" data-whatever="@getbootstrap">Add KRC</button>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
           
        </div>
    </div>
</section>


<!-- <div class="container" style="padding-top: 30px;padding-bottom: 30px;">
    <table class="table table-bordered" id="table">
        <thead>
            <tr>
                <th style="width:30px">KRC ID</th>
                <th>KRC Location</th>
                <th>KRC Label</th>
                
                <th>KRC Status</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div> -->

<div class="content">
    <div class="container-fluid">
        <h3>Reading Room 1</h3>
        <div class="row">
		<?php if(count($reading_1) != 0): ?>
            <?php foreach($reading_1 as $row): ?>
                <div class="col-2">
                    <div class="card" style="width: 8rem;">
					<div class="card-header" style="height:10px;">
					<button onclick='RemoveKrc("<?php echo e($row->krc_id); ?>")' class="btn btn-xs"><i class="fas fa-trash-alt"></i></button>
					</div>
                        <div class="card-body">
							
                            <?php if($row->krc_status == 1): ?>
                                <img src="<?php echo e(asset('public/krc_img/available.png')); ?>" alt="" height="40" width="40">
                            <?php else: ?>
                                <img src="<?php echo e(asset('public/krc_img/not_available.png')); ?>" alt="" height="40" width="40">
                            <?php endif; ?>
                        </div>
                        <div class="card-footer">
                                <h5 class="card-title">KRC-<?php echo e($row->krc_seat_label); ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
		<?php else: ?>
			<p>Their are no krc seats available</p>
		<?php endif; ?>
        </div>

        <h3>Reading Room 2</h3>
        <div class="row">
		<?php if(count($reading_2) > 0): ?>
            <?php foreach($reading_2 as $row): ?>
                <div class="col-2">
                    <div class="card" style="width: 8rem;">
                        <div class="card-body">
                            <?php if($row->krc_status == 1): ?>
                                <img src="<?php echo e(asset('public/krc_img/available.png')); ?>" alt="" height="40" width="40">
                            <?php else: ?>
                                <img src="<?php echo e(asset('public/krc_img/not_available.png')); ?>" alt="" height="40" width="40">
                            <?php endif; ?>
                        </div>
                        <div class="card-footer">
                                <h5 class="card-title">KRC-<?php echo e($row->krc_seat_label); ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
		<?php else: ?>
		<p>Their are no krc seats available</p>
		<?php endif; ?>
        </div>

        <h3>Girls Reading Room</h3>
        <div class="row">
		<?php if(count($reading_girl) > 0): ?>
            <?php foreach($reading_girl as $row): ?>
                <div class="col-2">
                    <div class="card" style="width: 8rem;">
                        <div class="card-body">
                            <?php if($row->krc_status == 1): ?>
                                <img src="<?php echo e(asset('public/krc_img/available.png')); ?>" alt="" height="40" width="40">
                            <?php else: ?>
                                <img src="<?php echo e(asset('public/krc_img/not_available.png')); ?>" alt="" height="40" width="40">
                            <?php endif; ?>
                        </div>
                        <div class="card-footer">
                                <h5 class="card-title">KRC-<?php echo e($row->krc_seat_label); ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
		<?php else: ?>
		<p>Their are no krc seats available</p>
		<?php endif; ?>
        </div>

    </div>
</div>

<div class="modal fade" id="KrcModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">KRC Student Allotment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="KRCForm">
          
			<div class="form-group">
				<label for="recipient-name" class="col-form-label">KRC Seat Location:</label>
				<!-- <input type="text" class="form-control" id="krc_seat_location" name="krc_seat_location"> -->
				<select name="krc_seat_location" id="krc_seat_location" class="form-control" >
					<option selected disabled>Select</option>
					<option value="Reading Room 1">Reading Room 1</option>
					<option value="Reading Room 2">Reading Room 2</option>
					<option value="Girls Reading Room">Girls Reading Room</option>
				</select>
			</div>
			<div class="form-group">
				<label for="recipient-name" class="col-form-label">KRC Seat Label:</label>
				<input type="text" class="form-control" id="krc_seat_label" name="krc_seat_label">
			</div>
			<!-- <div class="form-group">
				<label for="recipient-name" class="col-form-label">KRC Seat Label:</label>
				<select name="krc_seat_label" id="krc_seat_label" class="form-control" >
					<option selected disabled>Select</option>
					
				</select>
			</div> -->
			<div class="form-group">
					<label for="exampleInputEmail1">KRC Seat Allot:</label><br>
					<label class="checkbox-inline" style="padding-left: 10px;" >
						<label class="form-check-label" for="exampleCheck1">Available</label>
						<input type="radio" id="krc_seat_status" name="krc_seat_status" value="1" style="margin-left:10px;margin-top:5px;" >
					</label>
					<label class="checkbox-inline" style="padding-left: 10px;" >
						<label class="form-check-label" for="exampleCheck1">Taken</label>
						<input type="radio" id="krc_seat_status" name="krc_seat_status" value="2" style="margin-left:10px;margin-top:5px;" >
					</label>
					<label class="checkbox-inline" style="padding-left: 10px;" >
						<label class="form-check-label" for="exampleCheck1">Not Available</label>
						<input type="radio" id="krc_seat_status" name="krc_seat_status" value="3" style="margin-left:10px;margin-top:5px;" >
					</label>
				</div>
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

        </form>

      </div>
      <div class="modal-footer">
      <div id="response"></div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="saveBtn" onclick="Save()" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
<!--  -->
<script>

$(function(){
    // $("#krc_seat_location").on('change', function(){
    //     var matchvalue = $(this).val(); // this.value
    //     $.ajax({ 
    //         url: "<?php echo e(url('getKrcSeats')); ?>",
    //         data: $("#KRCForm").serialize(),
    //         type: 'post',
	// 		success: function(data){
	// 			console.log(data);
	// 			$("#krc_seat_label").html(data);
	// 		}
    //     });
    // });
   
});
    // LoadData();
    // function LoadData(){
    //     $('#table').DataTable({
    //     processing: true,
    //     serverSide: true,
    //     ajax: "<?php echo e(url('getKrc')); ?>",
    //     columns: [
    //             { data: 'krc_id' },
    //             { data: 'krc_location' },
    //             { data: 'krc_seat_label' },
                
    //             { data: 'krc_status' },
    //             { data: 'action' },
    //             ]
    //     });
    // }

    function Save(){
        var krc_seat_label = $("#krc_seat_label").val();
        var krc_seat_location = $("#krc_seat_location").val();
        var krc_seat_status = $("input[name=krc_seat_status]:checked", "#KRCForm").val();

        if(krc_seat_label == '' || krc_seat_location == '' || krc_seat_status == ''){
            $("form#KRCForm input[type=text],input[type=radio]").css('border-color','red');
            $("#response").html('Please Fill Correct Information');
            return false;
        }
        // console.log('label: '+krc_seat_label+ ' location: '+krc_seat_location+' status: '+krc_seat_status);
        $.post("<?php echo e(url('KrcPost')); ?>",$("#KRCForm").serialize(),function(data){
            $("#response").html(data);
            console.log(data);
            // $("#KrcModal").hide();
            // $('#KrcModal').modal('toggle');
            if(data.includes('Allotted')){
                location.reload();
            }
        });
    }

    function RemoveKrc(id){
        // alert(id);
		var verifyOk = confirm('Sure To Remove Seat');
        if(verifyOk == true){
            $.get('<?php echo e(url('RemoveKrc')); ?>',{id:id},function(data){
                // console.log(data);
                if(data.includes('Removed')){
                    location.reload();
                }
            });
        }
    }
    
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hcoi\resources\views/Admission/Krc.blade.php ENDPATH**/ ?>