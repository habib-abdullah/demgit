
<img src="<?php echo e(url('public/img/card.png')); ?>" style="position:absolute; height: 380px; width: 244px; margin-left: 300px;">
<div style="position:absolute; margin-left: 300px;">
    <div style="">
    	<h3 style="text-align:center; padding-left: 18px; color: #fff; font-family: helvetica;">
			HCOI IAS Coaching<br/> & Guidance Institute
		</h3>
		<?php if($row->candidate_picture): ?>
		<p style="text-align: center; padding-bottom: 4px; margin-top: -10px; margin-bottom: 0;">
			<img src="<?php echo e(url('public/img/')); ?>/<?php echo e($row->candidate_picture); ?>"  style="height: 110px; border-radius: 50%; padding: 0; margin: 0;">
		</p>
		<?php else: ?>
		<p style="text-align: center; padding-bottom: 4px; margin-top: -10px; margin-bottom: 0;">
			<img src="<?php echo e(url('public/img/default.jpg')); ?>" style="height: 110px; border-radius: 50%; padding: 0; margin: 0;"  >
		</p>
		<?php endif; ?>
        <table class="table no-border" style="padding-left: 18px; padding-top: ; font-family: helvetica; ">
            <tr><td>Name</td><td style="padding-left: 6px;"><?php echo e($row->full_name); ?></td></tr>
            <tr><td>Father Name</td><td style="padding-left: 6px;"><?php echo e($row->father_name); ?></td></tr>
            <tr><td>Date Of Birth</td><td style="padding-left: 6px;"><?php echo e($row->date_of_birth); ?></td></tr>
            <tr><td>Mobile Number</td><td style="padding-left: 6px;"><?php echo e($row->mobile_number); ?></td></tr>
            <tr><td>Native Address</td><td style="padding-left: 6px;"><?php echo e($row->native_address); ?></td></tr>
            <tr><td>Department</td><td style="padding-left: 6px;"><?php echo e($row->qualification); ?></td></tr>
		</table>
		<p style="text-align:center; margin: 0; padding-top: 6px;">
			<img src="<?php echo e(url('public/img/barcode.png')); ?>" style="height: 60px; width: 130px;" >
		</p>
    </div>
</div>
<style>
/* td{
	text-transform: uppercase;
} */
</style><?php /**PATH C:\xampp\htdocs\hcoi\resources\views/PrintCandidateDetail/SingleIdCard.blade.php ENDPATH**/ ?>