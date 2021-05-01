<?php if(count($attachments)>0): ?>
<?php $i = 1; ?>
<?php $__currentLoopData = $attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div style="list-style:none; margin-left:0px;" class="removeClass">
    <div class="d-flex justify-content-left">
        <span class="my-4">
            <span class="mr-4">
                <?php echo $i; ?>
            </span>
            <a href="<?php echo e(url('public/Sales/Item/')); ?>/<?php echo e($attachment->attachment_file); ?>"
                target="_blank"><?php echo e($attachment->attachment_file); ?></a>
        </span>
        <span class="ml-auto">
            <button type="button" class="btn btn-danger btn-circle mt-3"
                onclick='documentRemove("<?php echo e($attachment->attachment_id); ?>")'><i class="fas fa-trash-alt"></i></button>
        </span>
        <hr class="m-0 p-0">
    </div>
</div>
<?php $i++; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\alchishty\resources\views/SalesInquiry/SalesInquiryItemView.blade.php ENDPATH**/ ?>