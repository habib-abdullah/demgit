<form id="SalesOrderEditForm">
    <?php echo csrf_field(); ?>
    <div class="row">
        <input type="text" class="form-control form-control-user border-primary" id="sales_order_id"
            name="sales_order_id" value="<?php echo e($sales[0]->sales_order_id ?? ''); ?>">
        <div class="col-lg-6">
            <div class="form-group">
                <lable>Order Date</lable>
                <input type="date" class="form-control form-control-user border-primary SalesOrder_input "
                    id="edit_order_date" name="edit_order_date" value="<?php echo e($sales[0]->sales_order_date ?? ''); ?>">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <lable>Sales Mode</lable>
                <select class="form-control border-primary SalesOrder_input" name="edit_mode" id="edit_mode">
                    <!-- <option selected="selected" disabled>Select</option> -->
                    <?php if($sales[0]->sales_mode == 'Cash'): ?>
                    <option selected value="Cash">Cash</option>
                    <option value="Credit">Credit</option>
                    <?php else: ?>
                    <option  value="Cash">Cash</option>
                    <option selected value="Credit">Credit</option>
                    <?php endif; ?>
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group ">
                <lable>Customer</lable>
                <select class="form-control select2" name="edit_customer_by" id="edit_customer_by" style="width: 100%;">
                    <option selected disabled>Select</option>
                    <?php if(count($clients) > 0): ?>
                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($sales[0]->cust_id == $client->client_id): ?>
                    <option selected value="<?php echo e($client->client_id); ?>">
                        <?php echo e($client->company_name); ?>

                    </option>
                    <?php else: ?>
                    <option value="<?php echo e($client->client_id); ?>">
                        <?php echo e($client->company_name); ?>

                    </option>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group ">
                <lable>Booked By</lable>
                <select id="id" class="form-control select2" name="edit_booked_by" id="edit_booked_by"
                    style="width: 100%;">
                    <option selected disabled>Select</option>
                    <?php if(count($clients) > 0): ?>
                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($sales[0]->receiver_id == $client->client_id): ?>
                    <option selected value="<?php echo e($client->client_id); ?>">
                        <?php echo e($client->client_name); ?>

                    </option>
                    <?php else: ?>
                    <option value="<?php echo e($client->client_id); ?>">
                        <?php echo e($client->client_name); ?>

                    </option>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <lable>Contact Person Name</lable>
                <input type="text" class="form-control form-control-user border-primary SalesOrder_input"
                    id="edit_person_name" name="edit_person_name" autocomplete="off" placeholder="Enter Contact Person Name" value="<?php echo e($sales[0]->sales_person_name ?? ''); ?>">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <lable>Contact Person Number</lable>
                <input type="number" class="form-control form-control-user border-primary SalesOrder_input"
                    id="edit_person_number" name="edit_person_number" autocomplete="off"  placeholder="Enter Contact Person Number" value="<?php echo e($sales[0]->sales_person_number ?? ''); ?>">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <lable>Receiving Date</lable>
                <input type="date" class="form-control form-control-user border-primary SalesOrder_input"
                    id="edit_receiving_date" name="edit_receiving_date" autocomplete="off" value="<?php echo e($sales[0]->sales_receiving_date ?? ''); ?>" >
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <lable>Delivery Date</lable>
                <input type="date" class="form-control form-control-user border-primary SalesOrder_input"
                    id="edit_delivery_date" name="edit_delivery_date" autocomplete="off" value="<?php echo e($sales[0]->sales_delivery_date ?? ''); ?>">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <lable>LPO#</lable>
                <input type="text" class="form-control form-control-user border-primary SalesOrder_input" id="edit_lpo"
                    name="edit_lpo" autocomplete="off"  placeholder="Enter LPO" value="<?php echo e($sales[0]->sales_lpo ?? ''); ?>">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <lable>Focus SO#</lable>
                <input type="text" class="form-control form-control-user border-primary SalesOrder_input"
                    id="edit_focus_so" name="edit_focus_so" autocomplete="off"  placeholder="Enter SO" value="<?php echo e($sales[0]->sales_focus_so ?? ''); ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <lable>Subject</lable>
        <input type="text" class="form-control form-control-user border-primary SalesOrder_input"
            id="edit_order_subject" name="edit_order_subject" autocomplete="off" placeholder="Enter subject" value="<?php echo e($sales[0]->sales_order_subject ?? ''); ?>">
    </div>
</form><?php /**PATH C:\xampp\htdocs\alchisty\resources\views/SalesOrder/SalesOrderEdit.blade.php ENDPATH**/ ?>