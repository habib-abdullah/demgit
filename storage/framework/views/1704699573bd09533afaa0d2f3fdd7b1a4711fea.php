<?php $__env->startSection('content'); ?>

<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<div class="container">
        
    <table class="table table-bordered" id="table">
        <thead>
            <tr>
                <th>UID</th>
                <th>Name</th>
                <th>Mobile Number</th>
                <th>Father Name</th>
                <th>Father's Contact</th>
                <th>Place</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
    </div>
<script>
    $(function() {
        $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '<?php echo e(url('getReport')); ?>',
        columns: [
                { data: 'candidate_id' },
                { data: 'full_name' },
                { data: 'mobile_number' },
                { data: 'father_name' },
                { data: 'father_mobile_number' },
                { data: 'place' },
                { data: 'action' },
                ]
    });
    });

    function loadDetails(id){
        //alert(id)
        $.get('<?php echo e(url('LoadCandidatesDetails')); ?>',{id:id},function(data){
            $("#loadDetailsArea").html(data)
        });
    }
    </script>
<div id="infoModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        
      </div>
      <div class="modal-body" id="loadDetailsArea">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lara\hcoi\resources\views/AdmissionReport.blade.php ENDPATH**/ ?>