<?php $__env->startSection('content'); ?>

<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<section class="content mt-3">
    <div class="container-fluid">
        <!-- general form elements -->
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Mess Library</h3>
                <span id="input_error" style="float:right; padding-right: 10px;"></span>
            </div>
            <div class="card-body">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddMessModal" data-whatever="@getbootstrap">Add Mess Meals</button>
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
                <th>BreakFast</th>
                <th>Lunch</th>
                <th>Snacks</th>
                <th>Dinner</th>
                <th style="width:100px;">Date</th>
                <th style="width:100px;">Action</th>
            </tr>
        </thead>
    </table>
</div>

<!-- Insert Meal Of The Day Modal -->
<div class="modal fade" id="AddMessModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Mess Meals</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="MealForm" enctype="multipart/form-data">
          
          <div class="form-row">
            <div class="col">
              <label for="recipient-name" class="col-form-label">BreakFast:</label>
              <input type="text" id="breakfast" name="breakfast" class="form-control" placeholder="Breakfast Details">
            </div>
            <div class="col-5">
              <label for="recipient-name" class="col-form-label">Time:</label>
              <input type="time" id="breakfast_time" name="breakfast_time"  class="form-control" placeholder="Date">
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <label for="recipient-name" class="col-form-label">Lunch:</label>
              <input type="text" id="lunch" name="lunch"  class="form-control" placeholder="Lunch Details">
            </div>
            <div class="col-5">
              <label for="recipient-name" class="col-form-label">Time:</label>
              <input type="time" id="lunch_time" name="lunch_time"  class="form-control" placeholder="Date">
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <label for="recipient-name" class="col-form-label">Snacks:</label>
              <input type="text" id="snacks" name="snacks"  class="form-control" placeholder="Snacks Details">
            </div>
            <div class="col-5">
              <label for="recipient-name" class="col-form-label">Time:</label>
              <input type="time" id="snacks_time" name="snacks_time"  class="form-control" >
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <label for="recipient-name" class="col-form-label">Dinner:</label>
              <input type="text" id="dinner" name="dinner"  class="form-control" placeholder="Dinner Details">
            </div>
            <div class="col-5">
              <label for="recipient-name" class="col-form-label">Time:</label>
              <input type="time"  id="dinner_time" name="dinner_time" class="form-control" placeholder="Date">
            </div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Date:</label>
            <input type="date" class="form-control" id="meal_date" name="meal_date">
          </div>
          
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="saveMeal()" class="btn btn-primary">Insert</button>
      </div>
    </div>
  </div>
</div>
<!-- ./Insert Meal Of The Day Modal -->

<!-- Update Meal Of The Day Details Modal -->
<div class="modal fade" id="EditMealModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="UpdateMealForm" enctype="multipart/form-data">
          <input type="hidden" id="update_id" name="update_id">
          <div class="form-row">
            <div class="col">
              <label for="recipient-name" class="col-form-label">BreakFast:</label>
              <input type="text" id="update_breakfast" name="update_breakfast" class="form-control" value="">
            </div>
            <div class="col-5">
              <label for="recipient-name" class="col-form-label">Time:</label>
              <input type="time" id="update_breakfast_time" name="update_breakfast_time"  class="form-control" >
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <label for="recipient-name" class="col-form-label">Lunch:</label>
              <input type="text" id="update_lunch" name="update_lunch"  class="form-control" >
            </div>
            <div class="col-5">
              <label for="recipient-name" class="col-form-label">Time:</label>
              <input type="time" id="update_lunch_time" name="update_lunch_time"  class="form-control" >
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <label for="recipient-name" class="col-form-label">Snacks:</label>
              <input type="text" id="update_snacks" name="update_snacks"  class="form-control" placeholder="Snacks Details">
            </div>
            <div class="col-5">
              <label for="recipient-name" class="col-form-label">Time:</label>
              <input type="time" id="update_snacks_time" name="update_snacks_time"  class="form-control" >
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <label for="recipient-name" class="col-form-label">Dinner:</label>
              <input type="text" id="update_dinner" name="update_dinner"  class="form-control" >
            </div>
            <div class="col-5">
              <label for="recipient-name" class="col-form-label">Time:</label>
              <input type="time"  id="update_dinner_time" name="update_dinner_time" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Date:</label>
            <input type="date" class="form-control" id="update_meal_date" name="update_meal_date">
          </div>
          
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="updateMeal()" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
<!-- ./Update Meal Of The Day Details Modal -->

<script>
$(function(){
    $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '<?php echo e(url('getMealsReport')); ?>',
        columns: [
                { data: 'mess_id' },
                { data: 'mess_breakfast' },
                { data: 'mess_lunch' },
                { data: 'mess_snacks' },
                { data: 'mess_dinner' },
                { data: 'mess_day' },
                { data: 'action' },
              ]
    });
});

function saveMeal(){
  var breakfast = $("#breakfast").val();
  var lunch = $("#lunch").val();
  var dinner = $("#dinner").val();
  var snacks = $("#snacks").val();
  var meal_date = $("#meal_date").val();

  if(breakfast == '' || lunch == '' || dinner == '' || meal_date == '' || snacks == '' ){
    alert('Please Fill All Fields');
    return false;
  }
  
  $.ajax({
    type: 'POST',
    url: "<?php echo e(url('Mess/AddMeal')); ?>",
    data: $("#MealForm").serialize(),
    success: function(data){
      console.log(data);
      $("#MealForm").val('');
      if(data.includes('Successfully')){
          window.location.href = "<?php echo e(url('Mess/MessReport')); ?>";
      }
    }
  });

}
function GetMealUpdateInfo(id){
  // alert(id);
  $.get("<?php echo e(url('GetMealUpdateInfo')); ?>/"+id+"",function(data){
    // console.log(data); 
    var json = JSON.parse(data);
    // console.log(json["mess_breakfast"]);
    $("#update_breakfast").val(json["mess_breakfast"]);
    $("#update_breakfast_time").val(json["mess_breakfast_time"]);
    $("#update_lunch").val(json["mess_lunch"]);
    $("#update_lunch_time").val(json["mess_lunch_time"]);
    $("#update_snacks").val(json["mess_snacks"]);
    $("#update_snacks_time").val(json["mess_snacks_time"]);
    $("#update_dinner").val(json["mess_dinner"]);
    $("#update_dinner_time").val(json["mess_dinner_time"]);
    $("#update_meal_date").val(json["mess_day"]);
    $("#update_id").val(json["mess_id"]);
  });
}

function updateMeal(){
  var id = $("#update_id").val();
  // alert(id);
  $.post("<?php echo e(url('UpdateMeal')); ?>",$("#UpdateMealForm").serialize(),function(data){
    console.log(data);
    if(data.includes('Updated')){
      window.location.href = "<?php echo e(url('Mess/MessReport')); ?>";
    }
  });
}

function RemoveMeal(id){
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var verifyOk = confirm('Sure to remove meal: '+id);
    if(verifyOk == true){
      $.post("<?php echo e(url('RemoveMeal')); ?>",{id:id},function(data) {
        console.log(data);
        if(data.includes('Deleted')){
          window.location.href = "<?php echo e(url('Mess/MessReport')); ?>";
        }
      });
    }else{
        alert('Remove Cancel');
    }
  }

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hcoi\resources\views/Mess/MessReport.blade.php ENDPATH**/ ?>