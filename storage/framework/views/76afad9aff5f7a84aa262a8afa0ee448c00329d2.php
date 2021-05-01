<?php $__env->startSection('content'); ?>

<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<div class="container">
        
    <table class="table table-bordered" id="table">
        <thead>
            <tr>
                <th>UID</th>
                <th>Name</th>
                <th>Father Name</th>
                <th>Mobile Number</th>
                <th>Address</th>
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
        ajax: '<?php echo e(url('GetIdCardList')); ?>',
        columns: [
                { data: 'candidate_id' },
                { data: 'full_name' },
                { data: 'father_name' },
                { data: 'mobile_number' },
                { data: 'place' },
                { data: 'action' },
                ]
    });
    });

    function loadCardDetails(id){
        //alert(id)
        $.get('<?php echo e(url('LoadSingleCard')); ?>',{id:id},function(data){
            $("#loadDetailsArea").html(data)
        });
    }
    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hcoi\resources\views/Admission/IdCardList.blade.php ENDPATH**/ ?>