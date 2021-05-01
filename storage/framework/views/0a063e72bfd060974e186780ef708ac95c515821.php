<?php $__env->startSection('content'); ?>

<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<div class="container" style="padding-top: 30px;padding-bottom: 30px;">
        
    <table class="table table-bordered" id="table">
        <thead>
            <tr>
                <th style="width:30px">UID</th>
                <th>Name</th>
                <th style="width:40px">Mobile</th>
                <th>Father Name</th>
                <th style="width:90px;">UPSC Prelim</th>
                <th>Place</th>
                <th style="width:30px">Action</th>
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
                { data: 'upsc_prelim_attemp' },
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hcoi\resources\views/AdmissionReport.blade.php ENDPATH**/ ?>