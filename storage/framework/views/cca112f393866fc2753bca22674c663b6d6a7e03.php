<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="<?php echo e(url('Croppie/croppie.css')); ?>" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">    
    <br/>
        <h3 align="center">How to Crop And Upload Image in Laravel 6 using jQuery Ajax</h3>
      <br />
      <div class="card">
        <div class="card-header">Crop and Upload Image</div>
        <div class="card-body">
          <div class="form-group">
            <?php echo csrf_field(); ?>
            <div class="row">
              <div class="col-md-4" style="border-right:1px solid #ddd;">
                <div id="image-preview"></div>
              </div>
              <div class="col-md-4" style="padding:75px; border-right:1px solid #ddd;">
                <p><label>Select Image</label></p>
                <input type="file" name="upload_image" id="upload_image" />
                <br />
                <br />
                <button class="btn btn-success crop_image">Crop & Upload Image</button>
              </div>
              <div class="col-md-4" style="padding:75px;background-color: #333">
                <div id="uploaded_image" align="center"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br />
          <br />
          
          <br />
          <br />
    </div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="<?php echo e(url('Croppie/croppie.js')); ?>"></script>
	<script type="text/javascript">
$(document).ready(function(){
  
  $image_crop = $('#image-preview').croppie({
    enableExif:true,
    viewport:{
      width:200,
      height:200,
      type:'circle'
    },
    boundary:{
      width:300,
      height:300
    }
  });

  $('#upload_image').change(function(){
    var reader = new FileReader();

    reader.onload = function(event){
      $image_crop.croppie('bind', {
        url:event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
  });
  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type:'canvas',
      size:'viewport'
    }).then(function(response){
      var _token = $('input[name=_token]').val();
      $.ajax({
        url:'<?php echo e(route("image_crop.upload")); ?>',
        type:'post',
        data:{"image":response, _token:_token},
        dataType:"json",
        success:function(data)
        {
        	console.log(data);

        if(data["success"] == true)
          {
             
              window.location.href="<?php echo e(route('Employee-Bank-Show')); ?>";

          }else{
              $("#emp_bank_error_area").show();
              $("#emp_bank_error_area").addClass("alert alert-danger").html(data['message']).css({
                "color": "#fff"});
              return false;
          }
        }
      });
    });
  });
  
});  
	</script>
</body>
</html><?php /**PATH C:\xampp\htdocs\Al_Chisty\resources\views/demo_cropie.blade.php ENDPATH**/ ?>