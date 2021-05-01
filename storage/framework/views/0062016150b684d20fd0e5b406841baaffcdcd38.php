<?php $__env->startSection('content'); ?>

<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<div class="container" style="padding-top: 30px;padding-bottom: 30px;">
        
    <table class="table table-bordered" id="table">
        <thead>
            <tr>
                <th style="width:30px;">UID</th>
                <th>Name</th>
                <th>Docuemnts</th>
                <th style="max-width:150px;">Action</th>
            </tr>
        </thead>
    </table>
    </div>
<script>
    $(function() {
        $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '<?php echo e(url('GetCandidateDocumentDetail')); ?>',
        columns: [
                { data: 'candidate_id' },
                { data: 'full_name' },
                { data: 'mobile_number' },
                { data: 'action' },
                ]
          });
    });

    function UploadDocuments(id){
        //alert(id)
        $.get('<?php echo e(url('UploadDocuments')); ?>',{id:id},function(data){
            $("#loadDetailsArea").html(data);
        });
        $.get('<?php echo e(url('GetCandidateDocuments')); ?>',{id:id},function(data){
            $("#documentResponse").html(data);
        });
    }
    
    </script>
<div id="DocumentUploadModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        
      </div>
      <div class="modal-body" id="">
      <div id="loadDetailsArea"></div>
      <div id="documentResponse"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hcoi\resources\views/PrintCandidateDetail/CandidateDocumentUpload.blade.php ENDPATH**/ ?>