<div class="row">
    <div class="col-lg-6">
    <h3>Personal Details</h3>
        <table class="table table-striped">
            <?php if($row->date_of_admission==""): ?>
            <tr><td colspan="2"><img src="<?php echo e(asset('public/img/default.jpg')); ?>" width="100"></td></tr>
            <?php else: ?>
            <tr><td colspan="2"><img src="<?php echo e(asset('public/img/candidates/$row->full_name')); ?>" width="100"></td></tr>
            <?php endif; ?>
            
            <tr><td>Full Name</td><td><?php echo e($row->full_name); ?></td></tr>
            <tr><td>Date Of Birth</td><td><?php echo e($row->date_of_birth); ?></td></tr>
            <tr><td>Place</td><td><?php echo e($row->place); ?></td></tr>
            <tr><td>Age</td><td><?php echo e($row->age); ?></td></tr>
            <tr><td>Native Address</td><td><?php echo e($row->native_address); ?></td></tr>
            <tr><td>Mobile Number</td><td><?php echo e($row->mobile_number); ?></td></tr>
            <tr><td>Qualification</td><td><?php echo e($row->qualification); ?></td></tr>
            <tr><td>Admission Date</td><td><?php echo e($row->date_of_admission); ?></td></tr>
            
        </table>
    </div>
    <div class="col-lg-6">
    <h3>Family & Guardian Details</h3>
        <table class="table table-striped">
            <tr><td>Father Name</td><td><?php echo e($row->father_name); ?></td></tr>
            <tr><td>Father's Mobile</td><td><?php echo e($row->father_mobile_number); ?></td></tr>
            <tr><td>Mother Name</td><td><?php echo e($row->mother_name); ?></td></tr>
            <tr><td>Mother's Mobile</td><td><?php echo e($row->mother_mobile_number); ?></td></tr>
            <tr><td>Parent Address</td><td><?php echo e($row->parent_address); ?></td></tr>
            <tr><td>Anual Income</td><td><?php echo e($row->yearly_income); ?></td></tr>
            <tr><td>Guardian Name</td><td><?php echo e($row->local_guardian_name); ?></td></tr>
            <tr><td>Guardian Mobile</td><td><?php echo e($row->local_guardian_mobile_number); ?></td></tr>
            <tr><td>Guardian Address</td><td><?php echo e($row->local_guardian_address); ?></td></tr>
        </table>
    </div>
</div><?php /**PATH C:\xampp\htdocs\lara\hcoi\resources\views/Details.blade.php ENDPATH**/ ?>