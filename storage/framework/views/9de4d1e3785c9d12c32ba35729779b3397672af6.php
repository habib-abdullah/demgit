<!-- Insert Form  -->
<form id="SalesInquiryEditFrom">
    <?php echo csrf_field(); ?>
    <input type="hidden" class="form-control" name="inquiry_id" id="inquiry_id" value="<?php echo e($data[0]->inquiry_id); ?>">
    <input type="hidden" class="form-control" name="item_id" id="item_id" value="<?php echo e($data[0]->item_id); ?>">
    <input type="hidden" class="form-control" name="attachment_id" id="attachment_id">
    <div class="form-group">
        <label>Item Description</label>
        <input type="text" class="form-control required_edit" name="edit_item_description" id="item_description"
            placeholder="Item Description" value="<?php echo e($data[0]->item_description); ?>">
    </div>
    <div class="form-group">
        <label>Item Qty</label>
        <input type="number" class="form-control required_edit" name="edit_item_quantity" id="item_quantity"
            placeholder="Item Quantity" value="<?php echo e($data[0]->item_quantity); ?>">
    </div>
    <div class="form-group">
        <label>Item Unit</label>
        <select class="form-control selectBox select2 required_edit" name="edit_item_unit" id="item_unit"
            style="width:100%;">
            <option selected disabled>Select</option>
            <?php if(count($uom) > 0): ?>
            <?php $__currentLoopData = $uom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($data[0]->uom_id == $client->uom_id): ?>
            <option selected value="<?php echo e($client->uom_id); ?>">
                <?php echo e($client->uom_name); ?>

            </option>
            <?php else: ?>
            <option value="<?php echo e($client->uom_id); ?>">
                <?php echo e($client->uom_name); ?>

            </option>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Item Note</label>
        <input type="text" class="form-control required_edit" name="edit_item_note" id="item_note"
            placeholder="Item Note" value="<?php echo e($data[0]->item_note); ?>">
    </div>
    <!-- <div class="custom-file form-group">
        <label>Item Attachments</label>
        <input type="file" class=" form-control " id="item_attachments" name="edit_item_attachment[]" multiple>
    </div> -->
</form>
<!-- Insert Form  -->
<?php /**PATH C:\xampp\htdocs\alchishty\resources\views/SalesInquiry/SalesInquiryItemEdit.blade.php ENDPATH**/ ?>