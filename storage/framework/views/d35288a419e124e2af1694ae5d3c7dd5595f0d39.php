<?php $__env->startSection('content'); ?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7 mb-5 mt-5">
            <div class="card shadow-lg border-0 rounded-lg mt-2">
                <div class="card-header card-outline card-primary pb-5">
                    <h3 class="text-center font-weight-light my-4">Update Profile</h3>
                    <img src="<?php echo e(url('public/img/default-user.png')); ?>" class="rounded mx-auto d-block" width="150"
                        height="150">
                </div>
                <div class="card-body">
                    <form id="UpdateForm">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label class="small mb-1" for="inputFirstName">User Name</label>
                            <input class="form-control py-4" id="user_name" name="user_name" type="text"
                                value="<?php echo e($rows->member_name); ?>" />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                            <input class="form-control py-4" id="user_email" name="user_email" type="email"
                                aria-describedby="emailHelp" value="<?php echo e($rows->member_email); ?>" />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="inputPassword">Create New Password</label>
                            <input class="form-control py-4" id="user_password" name="user_password" type="password"
                                value="<?php echo e($rows->member_password); ?>" />
                        </div>
                        <div class="form-group mt-4 mb-0"><a class="btn btn-primary text-white btn-block"
                                onclick="UpdateUser()">Update</a></div>
                        <div class="form-group mt-4 mb-0" id="response">
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</div>


<script>
function UpdateUser() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var name = $('#user_name').val();
    var email = $('#user_email').val();
    var password = $('#user_password').val();
    // console.log(name+" " +email+" "+password);
    $.ajax({
        type: "post",
        url: "<?php echo e(url('UpdateUser')); ?>",
        data: $('#UpdateForm').serialize(),
        success: function(data) {
            console.log(data);
            $('#response').html(data);
            if (data.includes('Updated')) {
                window.location.href = "<?php echo e(url('Dashboard')); ?>";
            }
        }
    });
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PerfectRecharge\resources\views/Profile.blade.php ENDPATH**/ ?>