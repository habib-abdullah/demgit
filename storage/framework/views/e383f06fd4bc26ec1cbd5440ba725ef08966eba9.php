<?php $__env->startSection('content'); ?>

<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<section class="content mt-3">
    <div class="container-fluid">
        <!-- general form elements -->
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Manage Notifications</h3>
                <span id="input_error" style="float:right; padding-right: 10px;"></span>
            </div>
            <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddNotificationModal" data-whatever="@getbootstrap">Add Notification</button>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
           
        </div>
    </div>
</section>

<div class="container" style="padding-top: 30px;padding-bottom: 30px;">
        
    <table class="table table-bordered" id="table">
        <thead>
            <tr>
                <th style="width:30px">UID</th>
                <th>Title</th>
                <th>Description</th>
                <th style="width:80px">Action</th>
            </tr>
        </thead>
    </table>
</div>

<!-- Insert Notification Modal -->
<div class="modal fade" id="AddNotificationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Notification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="NotificationForm" enctype="multipart/form-data">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Notification Title:</label>
            <input type="text" class="form-control" id="notification_title" name="notification_title">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Notification Description:</label>
            <input type="text" class="form-control" id="notification_description" name="notification_description">
          </div>
          
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="InsertNotification()" class="btn btn-primary">Insert</button>
      </div>
    </div>
  </div>
</div>
<!-- ./Insert Notification Modal -->
<!-- Update Notification Modal -->
<div class="modal fade" id="EditNotficationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Notification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="UpdateNotificationForm" enctype="multipart/form-data">
		<input type="hidden" id="update_notification_id" name="update_notification_id">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Notification Title:</label>
            <input type="text" class="form-control" id="update_notification_title" name="update_notification_title">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Notification Description:</label>
            <input type="text" class="form-control" id="update_notification_description" name="update_notification_description">
          </div>
          
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="UpdateNotification()" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
<!-- ./Insert Book Modal -->


<script>
$(function(){
    // alert('ready');
    $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '<?php echo e(url('getNotificationsReport')); ?>',
        columns: [
                { data: 'notification_id' },
                { data: 'notification_titile' },
                { data: 'notification_details' },
                { data: 'action' },
              ]
    });
});

function InsertNotification(){
  // alert('clidsdsd');
  var title =  $("#notification_title").val();
  var desc = $("#notification_description").val();
  if(title == '' || desc == ''){
    alert('Fill All Fields');
    return false;
  }
    $.post("<?php echo e(url('InsertNotification')); ?>",$("#NotificationForm").serialize(),function(data){
        console.log(data);
        if(data.includes('Inserted')){
          window.location.href = "<?php echo e(url('Notification')); ?>";
        }
    });
}

function GetnotificationUpdateInfo(id){
	// alert(id);
	$.get("<?php echo e(url('GetnotificationUpdateInfo')); ?>/"+id+"",function(data){
		// console.log(data);
		var json = JSON.parse(data);
		$("#update_notification_title").val(json["notification_titile"]);
		$("#update_notification_description").val(json["notification_details"]);
		$("#update_notification_id").val(json["notification_id"]);
	});
}
function UpdateNotification(){
	var id = $("#update_notification_id").val();
	// alert(id);
	$.post("<?php echo e(url('UpdateNotification')); ?>",$("#UpdateNotificationForm").serialize(),function(data){
		console.log(data);
		if(data.includes('Updated')){
			window.location.href = "<?php echo e(url('Notification')); ?>";
		}
	});
}
function RemoveNotification(id){
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var verifyOk = confirm('Sure to remove notifcation');
    if(verifyOk == true){
      $.post("<?php echo e(url('RemoveNotification')); ?>",{id:id},function(data) {
        console.log(data);
        if(data.includes('Deleted')){
          window.location.href = "<?php echo e(url('Notification')); ?>";
        }
      });
    }
    // else{
    //     alert('Remove Cancel');
    // }
}

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hcoi\resources\views/Notification.blade.php ENDPATH**/ ?>