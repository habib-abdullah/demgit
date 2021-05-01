<?php $__env->startSection('content'); ?>

<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<section class="content mt-3">
    <div class="container-fluid">
        <!-- general form elements -->
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Manage Test</h3>
                <span id="input_error" style="float:right; padding-right: 10px;"></span>
            </div>
            <div class="card-body">
            	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddTestModal" data-whatever="@getbootstrap">Add Test</button>
            	<!-- <a type="button" href="<?php echo e(url('TestQuestion')); ?>" class="btn btn-primary">Add Questions</a> -->
            	<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddQuestionModal" data-whatever="@getbootstrap">Add Questions</button> -->
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
                <th>Duration</th>
                <th>Marks</th>
                <th style="width:150px">Action</th>
            </tr>
        </thead>
    </table>
</div>

<!-- Insert Test Modal -->
<div class="modal fade" id="AddTestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Test</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="TestForm" enctype="multipart/form-data">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Test Title:</label>
            <input type="text" class="form-control" id="test_title" name="test_title">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Test Duration:</label>
            <input type="text" class="form-control" id="test_duration" name="test_duration">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Test Marks:</label>
            <input type="text" class="form-control" id="test_passing_marks" name="test_passing_marks">
          </div>
          
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="InsertTest()" class="btn btn-primary">Insert</button>
      </div>
    </div>
  </div>
</div>
<!-- ./Insert Test Modal -->
<!-- Update Test Modal -->
<div class="modal fade" id="EditTestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Test</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="UpdateTestForm" enctype="multipart/form-data">
		      <input type="hidden" id="update_test_id" name="update_test_id">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Test Title:</label>
            <input type="text" class="form-control" id="update_test_title" name="update_test_title">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Test Duration:</label>
            <input type="text" class="form-control" id="update_test_description" name="update_test_description">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Test Marks:</label>
            <input type="text" class="form-control" id="update_test_passing_marks" name="update_test_passing_marks">
          </div>
          
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="UpdateTest()" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
<!-- ./Update Test Modal -->

<!-- Insert Test Questions Modal -->
<div class="modal fade" id="AddQuestionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Test Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="QuestionForm" enctype="multipart/form-data">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Test Question:</label>
            <input type="text" class="form-control" id="question" name="question">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Test Duration:</label>
            <input type="text" class="form-control" id="question_a" name="question_a">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Test Duration:</label>
            <input type="text" class="form-control" id="question_b" name="question_b">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Test Duration:</label>
            <input type="text" class="form-control" id="question_c" name="question_c">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Test Duration:</label>
            <input type="text" class="form-control" id="question_d" name="question_d">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Test Duration:</label>
            <input type="text" class="form-control" id="question_answer" name="question_answer">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Test Duration:</label>
            <input type="text" class="form-control" id="question_marks" name="question_marks">
          </div>
          
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="InsertQuestion()" class="btn btn-primary">Insert</button>
      </div>
    </div>
  </div>
</div>
<!-- ./Insert Test Questions Modal -->

<script>
$(function(){
    // alert('ready');
    $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '<?php echo e(url('getTestsReport')); ?>',
        columns: [
                { data: 'test_id' },
                { data: 'test_title' },
                { data: 'test_duration' },
                { data: 'test_passing_marks' },
                { data: 'action' },
              ]
    });
});

function InsertTest(){
  // alert('clidsdsd');
  var title =  $("#test_title").val();
  var desc = $("#test_duration").val();
  var test_passing_marks = $("#test_passing_marks").val();
  if(title == '' || desc == '' || test_passing_marks == ''){
    alert('Fill All Fields');
    return false;
  }
    $.post("<?php echo e(url('InsertTest')); ?>",$("#TestForm").serialize(),function(data){
        console.log(data);
        if(data.includes('Inserted')){
          window.location.href = "<?php echo e(url('Test')); ?>";
        }
    });
}

function GetTestUpdateInfo(id){
	// alert(id);
	$.get("<?php echo e(url('GetTestUpdateInfo')); ?>/"+id+"",function(data){
		// console.log(data);
		var json = JSON.parse(data);
		$("#update_test_title").val(json["test_title"]);
		$("#update_test_description").val(json["test_duration"]);
		$("#update_test_passing_marks").val(json["test_passing_marks"]);
		$("#update_test_id").val(json["test_id"]);
	});
}

function UpdateTest(){
	var id = $("#update_test_id").val();
	// alert(id);
	$.post("<?php echo e(url('UpdateTest')); ?>",$("#UpdateTestForm").serialize(),function(data){
		console.log(data);
		if(data.includes('Updated')){
			window.location.href = "<?php echo e(url('Test')); ?>";
		}
	});
}

function RemoveTest(id){
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var verifyOk = confirm('Sure to remove test');
    if(verifyOk == true){
      $.post("<?php echo e(url('RemoveTest')); ?>",{id:id},function(data) {
        console.log(data);
        if(data.includes('Deleted')){
          window.location.href = "<?php echo e(url('Test')); ?>";
        }
      });
    }else{
        alert('Remove Cancel');
    }
}

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hcoi\resources\views/Test.blade.php ENDPATH**/ ?>