                              <form class="DesigForm" id="AdminRole">
                               <?php echo csrf_field(); ?>
                               <div class="card-body">
                                  <input type="hidden" name="eid" id="eid" value="<?php echo e($row->eid); ?>">  
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="Designation_name" id="Designation_name" value="<?php echo e($row->Employe_Desig_Name); ?>" autocomplete="off">
                                  <span name="error_form" id="Designation_name_err"></span>
                                </div>
                                </div>
                              </form><?php /**PATH C:\xampp\htdocs\Al_Chisty\resources\views/EmployeeMaster/DesignationEdit.blade.php ENDPATH**/ ?>