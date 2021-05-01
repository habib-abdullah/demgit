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
            	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddQuestionModal" data-whatever="@getbootstrap">Add Questions</button>
              <a href="<?php echo e(url('Test')); ?>" class="float-right btn">Go Back To Tests</a>
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
                <th>Question</th>
                <th>Question A</th>
                <th>Question B</th>
                <th>Question C</th>
                <th>Question D</th>
                <th>Question Answer</th>
                <th>Question Marks</th>
                <th style="width:60px">Action</th>
            </tr>
        </thead>
    </table>
</div>

<input type="hidden" value="<?php echo e($test_id); ?>" id="test_id" name="test_id">
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
          <input type="hidden" value="<?php echo e($test_id); ?>" id="test_id" name="test_id">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Question:</label>
            <input type="text" class="form-control" id="question" name="question">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Question A:</label>
            <input type="text" class="form-control" id="question_a" name="question_a">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Question B:</label>
            <input type="text" class="form-control" id="question_b" name="question_b">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Question C:</label>
            <input type="text" class="form-control" id="question_c" name="question_c">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Question D:</label>
            <input type="text" class="form-control" id="question_d" name="question_d">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Question Answer:</label>
            <input type="text" class="form-control" id="question_answer" name="question_answer">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Question Marks:</label>
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
<!-- Update Test Questions Modal -->
<div class="modal fade" id="EditQuestionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Test Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="LoadUpdatePreviousDetails">

        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="UpdateQuestion()" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
<!-- ./Update Test Questions Modal -->

<script>
$(function(){
  ///var test_id = $("#test_id").val();
    $('#table').DataTable({
        processing: true,
        serverSide: true,
        // ajax: '<?php echo e(url('getQuestionsReport')); ?>',
        ajax: {
          url: "<?php echo e(url('getQuestionsReport')); ?>",
          data: {test_id: "<?php echo e($test_id); ?>"},
        },
        columns: [
                { data: 'question_id'},
                { data: 'question'},
                { data: 'question_a'},
                { data: 'question_b'},
                { data: 'question_c'},
                { data: 'question_d'},
                { data: 'question_answer'},
                { data: 'question_marks'},
                { data: 'action'},
              ]
    });
    
    // $.get("<?php echo e(url('getQuestionsReport')); ?>",{test_id:test_id},function(data){console.log(data);});
});

function InsertQuestion(){
	var test_id = $("#test_id").val();
    $.post("<?php echo e(url('InsertQuestion')); ?>",$("#QuestionForm").serialize(),function(data){
        console.log(data);
		$("#QuestionForm").val('');
        if(data.includes('Inserted')){
			location.reload();
        }
    });
}

function GetQuestionUpdateInfo(id){
	// alert(id);
	$.get("<?php echo e(url('GetQuestionUpdateInfo')); ?>/"+id+"",function(data){
		// console.log(data);
    	$("#LoadUpdatePreviousDetails").html(data);
  	});
}

function UpdateQuestion(){
	var id = $("#question_id").val();
	// alert(id);
	$.post("<?php echo e(url('UpdateQuestion')); ?>",$("#UpdateQuestionForm").serialize(),function(data){
		console.log(data);
		if(data.includes('Updated')){
			location.reload();
		}
	});
}

function RemoveQuestion(id){
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var verifyOk = confirm('Sure to remove question: '+id);
    if(verifyOk == true){
      $.post("<?php echo e(url('RemoveQuestion')); ?>",{id:id},function(data) {
        console.log(data);
        if(data.includes('Deleted')){
          location.reload();
        }
      });
    }else{
        alert('Remove Cancel');
    }
}

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hcoi\resources\views/TestQuestion.blade.php ENDPATH**/ ?>