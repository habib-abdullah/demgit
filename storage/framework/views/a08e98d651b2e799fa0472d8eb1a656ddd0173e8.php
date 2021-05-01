<?php $__env->startSection('content'); ?>

<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<section class="content mt-3">
    <div class="container-fluid">
        <!-- general form elements -->
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Books Stock</h3>
                <span id="input_error" style="float:right; padding-right: 10px;"></span>
            </div>
            <div class="card-body">
            	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddVendorModal" data-whatever="@getbootstrap">Add Vendor</button>
                <!-- <a href="<?php echo e(url('Test')); ?>" class="float-right btn">Go Back To Tests</a> -->
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
                <th>Name</th>
                <th>Firm</th>
                <th>Mobile</th>
                <th style="width:120px">Action</th>
            </tr>
        </thead>
    </table>
</div>

<!-- Insert Vendor Modal -->
<div class="modal fade" id="AddVendorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Vendor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="VendorForm" enctype="multipart/form-data">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Vendor Name:</label>
            <input type="text" class="form-control" id="vendor_name" name="vendor_name">
          </div>
          
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Vendor Firm:</label>
            <input type="text" class="form-control" id="vendor_firm" name="vendor_firm">
          </div>
          
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Vendor Mobile:</label>
            <input type="text" class="form-control" id="vendor_mobile" name="vendor_mobile">
          </div>
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="saveVendor()" class="btn btn-primary">Insert</button>
      </div>
    </div>
  </div>
</div>
<!-- ./Insert Vendor Modal -->
<!-- Updated Vendor Modal -->
<div class="modal fade" id="UpdateVendorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Vendor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="UpdateVendorForm" enctype="multipart/form-data">
            <input type="hidden" class="form-control" id="purchase_id" name="purchase_id">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Vendor Name:</label>
            <input type="text" class="form-control" id="update_vendor_name" name="update_vendor_name">
          </div>
          
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Vendor Firm:</label>
            <input type="text" class="form-control" id="update_vendor_firm" name="update_vendor_firm">
          </div>
          
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Vendor Mobile:</label>
            <input type="text" class="form-control" id="update_vendor_mobile" name="update_vendor_mobile">
          </div>
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="UpdateVendor()" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
<!-- ./Insert Vendor Modal -->


<script>
$(function(){
    $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '<?php echo e(url('getVendorsReport')); ?>',
        columns: [
                { data: 'purchase_id' },
                { data: 'vendor_name' },
                { data: 'vendor_firm' },
                { data: 'vendor_mobile' },
                { data: 'action' }
              ]
    });
});

function saveVendor(){
    var vendor_name = $("#vendor_name").val();
    var vendor_firm = $("#vendor_firm").val();
    var vendor_mobile = $("#vendor_mobile").val();
    if(vendor_name == '' || vendor_firm == '' || vendor_mobile == ''){
        alert('Please Fill All Fields');
        return false;
    }

    $.post("<?php echo e(url('AddVendor')); ?>",$("#VendorForm").serialize(),function(data){
        console.log(data);
        if(data.includes('Inserted')){
            window.location.href = "<?php echo e(url('Library/Inventory')); ?>";
        }
    });
}

function GetVendorUpdateInfo(id){
    $.get("<?php echo e(url('GetVendorUpdateInfo')); ?>/"+id+"",function(data){
        // console.log(data);
        // $("#LoadUpdatePreviousDetails").html(data);
        var json = JSON.parse(data);
        $("#purchase_id").val(json["purchase_id"]);
        $("#update_vendor_name").val(json["vendor_name"]);
        $("#update_vendor_firm").val(json["vendor_firm"]);
        $("#update_vendor_mobile").val(json["vendor_mobile"]);
    });
}

function UpdateVendor(){
    $.post("<?php echo e(url('UpdateVendor')); ?>",$("#UpdateVendorForm").serialize(),function(data){
        console.log(data);
        if(data.includes('Updated')){
            window.location.href = "<?php echo e(url('Library/Inventory')); ?>";
        }
    });
}
function RemoveVendor(id){
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var verifyOk = confirm('Sure to remove vendor: '+id);
    if(verifyOk == true){
        $.post("<?php echo e(url('RemoveVendor')); ?>",{id:id},function(data) {
            console.log(data);
            if(data.includes('Removed')){
                window.location.href = "<?php echo e(url('Library/Inventory')); ?>";
            }
        });
    }else{
        alert('Remove Cancel');
    }
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hcoi\resources\views/Library/BooksInventory.blade.php ENDPATH**/ ?>