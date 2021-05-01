<?php $__env->startSection('content'); ?>

<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<section class="content pt-3">
    <div class="container-fluid">
        <!-- general form elements -->
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Borrowed Books List</h3>
                <span id="input_error" style="float:right; padding-right: 10px;"></span>
            </div>
            <div class="card-body">
              <a href="<?php echo e(url('Library/BookBorrow')); ?>" class="float-right btn">Go Back To Transaction</a>
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
                <th>Candidate Name</th>
                <th>Book Name</th>
                <!-- <th style="width:80px">Action</th> -->
            </tr>
        </thead>
    </table>
</div>

<script>

$(function(){
    // $('#table').DataTable({
    //     processing: true,
    //     serverSide: true,
    //     ajax: '<?php echo e(url('getBooksBorrowed')); ?>',
    //     columns: [
    //             { data: 'candidate_id' },
    //             { data: 'full_name' },
    //             { data: 'book_title' },
                
    //             // { data: 'action' },
    //           ]
    // });
    $.get("<?php echo e(url('getBooksBorrowed')); ?>",function(data){
        console.log(data);
    });
});

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hcoi\resources\views/Library/BooksBorrowed.blade.php ENDPATH**/ ?>