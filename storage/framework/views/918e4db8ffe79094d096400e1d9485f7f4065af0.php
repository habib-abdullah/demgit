<form id="UpdateQuestionForm" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo e($question_data->question_id); ?>" id="question_id" name="question_id">
    <div class="form-group">
    <label for="recipient-name" class="col-form-label">Question:</label>
    <input type="text" class="form-control" value="<?php echo e($question_data->question); ?>"  id="question" name="question">
    </div>
    <div class="form-group">
    <label for="recipient-name" class="col-form-label">Question A:</label>
    <input type="text" class="form-control" value="<?php echo e($question_data->question_a); ?>"  id="question_a" name="question_a">
    </div>
    <div class="form-group">
    <label for="recipient-name" class="col-form-label">Question B:</label>
    <input type="text" class="form-control" value="<?php echo e($question_data->question_b); ?>"  id="question_b" name="question_b">
    </div>
    <div class="form-group">
    <label for="recipient-name" class="col-form-label">Question C:</label>
    <input type="text" class="form-control" value="<?php echo e($question_data->question_c); ?>"  id="question_c" name="question_c">
    </div>
    <div class="form-group">
    <label for="recipient-name" class="col-form-label">Question D:</label>
    <input type="text" class="form-control" value="<?php echo e($question_data->question_d); ?>"  id="question_d" name="question_d">
    </div>
    <div class="form-group">
    <label for="recipient-name" class="col-form-label">Question Answer:</label>
    <input type="text" class="form-control" value="<?php echo e($question_data->question_answer); ?>"  id="question_answer" name="question_answer">
    </div>
    <div class="form-group">
    <label for="recipient-name" class="col-form-label">Question Marks:</label>
    <input type="text" class="form-control" value="<?php echo e($question_data->question_marks); ?>"  id="question_marks" name="question_marks">
    </div>
    
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
</form><?php /**PATH C:\xampp\htdocs\hcoi\resources\views/UpdateQuestion.blade.php ENDPATH**/ ?>