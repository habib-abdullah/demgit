                              <form class="VisitorForm" id="AdminRole">
                               <?php echo csrf_field(); ?>
                               <div class="card-body">
                                  <input type="hidden" name="type_id" id="type_id" value="<?php echo e($row->type_id); ?>">  
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="Visitor_name" id="Visitor_name" value="<?php echo e($row->type_name); ?>" autocomplete="off">
                                  <span name="error_form" id="Visitor_name_err"></span>
                                </div>
                                </div>
                              </form><?php /**PATH C:\xampp\htdocs\Al_Chisty\resources\views/Visitor/VisitorEdit.blade.php ENDPATH**/ ?>