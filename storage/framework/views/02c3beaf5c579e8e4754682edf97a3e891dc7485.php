<?php $__env->startSection('content'); ?>
<!-- Yajra Datatables -->

<div class="card card-primary  " >
    <div class="card-header bg-gradient-info" >
        <h3>API  Attribute Report</h3>
        <!-- <span id="input_error" style="float:right; padding-right: 10px;"></span> -->
    </div>
    <div class="container" style="padding-top: 30px;padding-bottom: 30px;">
        <table class="table table-bordered" id="table" style="width: 100%">
            <thead>
                <tr>
                    <th style="width:40px">Attr_ID</th>
                    <th style="width:30px">API_name</th>
                    <th> API Attribute Name</th>
                    <th>API Attribute key </th>
                    <th>API Attribute Value</th>
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
          ajax: "<?php echo e(url('GetAPIAttribute')); ?>",
          columns: [
                  { data: 'api_attr_id' },
                  { data: 'api_name' },
                  { data: 'api_attr_name' },
                  { data: 'api_attr_key' },
                  { data: 'api_attr_value' },
                  { data: 'action' }
                 
                  ]
        });
    });
    function RemoveAPIAttributeData(id){
    alert(id);
    // return false;
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        
        var verifyOk = confirm('Sure to remove');

        if(verifyOk == true){
            $.post("<?php echo e(url('RemoveAPIAttributeData')); ?>",{id:id},function(data){
                console.log(data);   
                if(data.includes('deleted')){
                    location.reload();
                }   
            });
        }
}
    
</script>
    


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PerfectRecharge\resources\views/APIs/APIAttributeReport.blade.php ENDPATH**/ ?>