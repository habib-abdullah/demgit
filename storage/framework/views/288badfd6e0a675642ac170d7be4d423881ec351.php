<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(url('Croppie/croppie.css')); ?>" />
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <!-- Custom Tabs -->
                <div class="card">
                    <div class="card-header p-0">
                        <h3 class="card-title p-3">
                            <a href="<?php echo e(route('Employe-Master-Show')); ?>" style="font-size: 18px;"><i
                                    class="fas fa-arrow-circle-left"></i> Back </a>
                        </h3>
                        <div class=" float-right">
                            <h3 class="card-title p-3">
                                Add Employee Detail
                            </h3>
                        </div>
                    </div>

                    <div class="card-header d-flex p-0">
                        <!-- <h3 class="card-title p-3">Tabs</h3> -->
                        <ul class="nav nav-pills mr-auto p-2">
                            <?php if(empty($employee)): ?>
                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Personal
                                    info</a></li>
                            <li class="nav-item" style="cursor:pointer;"><a onclick="SubmitAlert(event)"
                                    class="nav-link"> Profile
                                </a></li>
                            <li class="nav-item" style="cursor:pointer;"><a onclick="SubmitAlert(event)"
                                    class="nav-link">Passport
                                    details</a></li>
                            <li class="nav-item" style="cursor:pointer;"><a onclick="SubmitAlert(event)"
                                    class="nav-link">Residency
                                    details</a></li>
                            <li class="nav-item" style="cursor:pointer;"><a onclick="SubmitAlert(event)"
                                    class="nav-link">MOL
                                    record</a></li>
                            <li class="nav-item" style="cursor:pointer;"><a onclick="SubmitAlert(event)"
                                    class="nav-link">Health</a>
                            </li>
                            <li class="nav-item" style="cursor:pointer;"><a onclick="SubmitAlert(event)"
                                    class="nav-link">Contact
                                    Info</a></li>
                            <li class="nav-item" style="cursor:pointer;"><a onclick="SubmitAlert(event)"
                                    class="nav-link">Bank
                                    details</a></li>
                            <li class="nav-item" style="cursor:pointer;"><a onclick="SubmitAlert(event)"
                                    class="nav-link">Company &
                                    Login Details</a></li>
                            <?php else: ?>
                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab"> Personal
                                    info </a>
                            </li>
                            <li class="nav-item"><a class="nav-link"
                                    href="Employee-<?php echo e($employee_id); ?>-Profile">Profile</a></li>
                            <li class="nav-item"><a class="nav-link " href="Employee-<?php echo e($employee_id); ?>-Passport">Passport
                                    details</a>
                            </li>
                            <li class="nav-item"><a class="nav-link "
                                    href="Employee-<?php echo e($employee_id); ?>-Residency">Residency details</a>
                            </li>
                            <li class="nav-item"><a class="nav-link " href="Employee-<?php echo e($employee_id); ?>-Mol-Record">MOL
                                    record</a></li>
                            <li class="nav-item"><a class="nav-link " href="Employee-<?php echo e($employee_id); ?>-Health">Health</a>
                            </li>
                            <li class="nav-item"><a class="nav-link " href="Employee-<?php echo e($employee_id); ?>-Contact">Contact
                                    Info</a></li>
                            <li class="nav-item"><a class="nav-link" href="Employee-<?php echo e($employee_id); ?>-Bank">Bank
                                    details</a></li>
                            <li class="nav-item"><a class="nav-link "
                                    href="Employee-<?php echo e($employee_id); ?>-Login-Detail">Company & Login
                                    Details</a></li>
                            <?php endif; ?>
                            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                  Dropdown <span class="caret"></span>
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" tabindex="-1" href="#">Action</a>
                  <a class="dropdown-item" tabindex="-1" href="#">Another action</a>
                  <a class="dropdown-item" tabindex="-1" href="#">Something else here</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" tabindex="-1" href="#">Separated link</a>
                </div>
              </li> -->
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <form id="EmployeeStore" enctype="multipart/form-data">
                            <div class="tab-content">
                                <?php echo csrf_field(); ?>
                                <!-- /.tab-pane -->
                                <div class="tab-pane active " id="tab_1">
                                    <input type="hidden" class="form-control" value="<?php echo e($employee->employee_id ?? ''); ?>"
                                        id="employee_id" name="employee_id">
                                    <div class="form-row justify-content-center mt-5">
                                        <div class="form-group col-md-4">
                                            <label>Employee Type</label>
                                            <input type="text" class="form-control type_err required"
                                                name="employee_type" id="employee_type" placeholder="Employee Type"
                                                value="<?php echo e($employee->employee_type ?? ''); ?>">
                                            <div class="type_err_msg"></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Designation</label>
                                            <select name="employee_designation" id="employee_designation"
                                                class="form-control Designation_err select2  " style="width:100%;">
                                                <option selected disabled>Select</option>
                                                <?php if(!empty($employee)): ?>
                                                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($employee->designation_id == $row->designation_id): ?>
                                                <option selected
                                                    value="<?php echo e($row->designation_name); ?>:<?php echo e($row->designation_id); ?>">
                                                    <?php echo e($row->designation_name); ?>

                                                </option>
                                                <?php else: ?>
                                                <option value="<?php echo e($row->designation_name); ?>:<?php echo e($row->designation_id); ?>">
                                                    <?php echo e($row->designation_name); ?>

                                                </option>
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($row->designation_name); ?>:<?php echo e($row->designation_id); ?>">
                                                    <?php echo e($row->designation_name); ?>

                                                </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                            <div class="Designation_err_msg"></div>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>First Name</label>
                                            <input type="text" class="form-control fname_err required" name="first_name"
                                                id="first_name" placeholder="First Name"
                                                value="<?php echo e($employee->first_name ?? ''); ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Middle Name</label>
                                            <input type="text" class="form-control mname_err required"
                                                name="middle_name" id="middle_name" placeholder="Middle Name"
                                                value="<?php echo e($employee->middle_name ?? ''); ?>">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control lname_err required" name="last_name"
                                                id="last_name" placeholder="Last Name"
                                                value="<?php echo e($employee->last_name ?? ''); ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Employee code</label>
                                            <input type="text" class="form-control lname_err required"
                                                name="employee_code" id="employee_code" placeholder="Employee code"
                                                value="<?php echo e($employee->employee_code ?? ''); ?>">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Date Of Birth</label>
                                            <input type="Date" class="form-control dob_err required" name="employee_dob"
                                                id="employee_dob" placeholder="Date Of Birth"
                                                value="<?php echo e($employee->birth_date ?? ''); ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Nationality</label>
                                            <input type="text" class="form-control nationality_err required"
                                                name="employee_nationality" id="employee_nationality"
                                                placeholder="Nationality" value="<?php echo e($employee->nationality ?? ''); ?>">
                                        </div>
                                    </div>

                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4">
                                            <label>Marital Status</label>
                                            <!-- <input type="text" class="form-control marital_status_err" name="emp_marital_status"
                                            id="emp_marital_status" placeholder="Marital Status"> -->
                                            <select name="marital_status" id="marital_status"
                                                class="form-control marital_status_err">
                                                <?php if(!empty($employee)): ?>
                                                <?php if($employee->marital_status == 'unmarried'): ?>
                                                <option disabled>Select</option>
                                                <option selected value="unmarried">Unmarried</option>
                                                <option value="married">Married</option>
                                                <option value="divorced">divorced</option>
                                                <?php elseif($employee->marital_status == 'married'): ?>
                                                <option disabled>Select</option>
                                                <option value="unmarried">Unmarried</option>
                                                <option selected value="married">Married</option>
                                                <option value="divorced">divorced</option>
                                                <?php else: ?>
                                                <option disabled>Select</option>
                                                <option value="unmarried">Unmarried</option>
                                                <option value="married">Married</option>
                                                <option selected value="divorced">divorced</option>
                                                <?php endif; ?>
                                                <?php else: ?>
                                                <option selected disabled>Select</option>
                                                <option value="unmarried">Unmarried</option>
                                                <option value="married">Married</option>
                                                <option value="divorced">divorced</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Visa Issued From</label>
                                            <input type="text" class="form-control visa_err required"
                                                name="employee_visa" id="employee_visa" placeholder="Visa issued from"
                                                value="<?php echo e($employee->visa_Issued_from ?? ''); ?>">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group col-md-4 clearfix">
                                            <label>Gender</label>
                                            <br>
                                            <!-- <div class="icheck-primary d-inline">
                                                <label>Male</label>
                                                <input type="radio" id="gender" name="gender" value="Male" checked>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <label>Female</label>
                                                <input type="radio" id="gender" name="gender" value="Female">
                                            </div> -->
                                            <?php if(!empty($employee)): ?>
                                            <?php if($employee->gender == 'Male'): ?>
                                            <div class="icheck-primary d-inline">
                                                <label>Male</label>
                                                <input type="radio" id="gender" name="gender" value="Male" checked>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <label>Female</label>
                                                <input type="radio" id="gender" name="gender" value="Female">
                                            </div>
                                            <?php else: ?>
                                            <div class="icheck-primary d-inline">
                                                <label>Male</label>
                                                <input type="radio" id="gender" name="gender" value="Male">
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <label>Female</label>
                                                <input type="radio" id="gender" name="gender" value="Female" checked>
                                            </div>
                                            <?php endif; ?>
                                            <?php else: ?>
                                            <div class="icheck-primary d-inline">
                                                <label>Male</label>
                                                <input type="radio" id="gender" name="gender" value="Male" checked>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <label>Female</label>
                                                <input type="radio" id="gender" name="gender" value="Female">
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group col-md-4">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="form-group" id="show_error">
                                        </div>
                                    </div>
                                    <?php if(!empty($employee_id)): ?>
                                    <a href="Employee-<?php echo e($employee_id); ?>-Profile" class="btn btn-warning mx-2 px-4 float-right" style="font-size: 18px;"> Skip </a>
                                    <?php endif; ?>
                                    <a id="temp_submit" class="btn btn-success float-right text-white"
                                        style="font-size: 18px; cursor:pointer;"> Submit &
                                        Next
                                    </a>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                        </form>
                        <!-- /.tab-content -->
                    </div>
                </div>
                <!-- ./card -->
            </div>
            <!-- /.col -->
        </div>
    </div>
</section>

<!-- //Select 2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<!-- croppie plugin -->
<script src="<?php echo e(url('Croppie/croppie.js')); ?>"></script>

<script type="text/javascript">
$(document).ready(function() {

    $("#employee_designation").select2({
        theme: "classic",
        width: 'resolve'
    });

    $("#temp_submit").click(function(event) {

        var fields = $("input[class*='required']");
        // console.log(fields.val());
        for (let i = 0; i <= fields.length; i++) {
            // console.log(fields);
            if ($(fields[i]).val() === '') {
                var currentElement = $(fields[i]).attr('id');
                var value = currentElement.replaceAll('_', ' ');
                $("#show_error").removeClass().html('');
                $("#show_error").show().addClass('alert alert-danger').html('The ' + value +
                    ' field is required.');
                return false;
            } else {
                $("#show_error").hide().removeClass().html('');
            }
        }
        var selected_option = $('#employee_designation option:selected').text();

        if ($('#employee_designation option:selected').text() === 'Select') {
            $("#show_error").removeClass().html('');
            $("#show_error").show().addClass('alert alert-danger').html(
                'The designation field is required.');
            return false;
        } else {
            $("#show_error").hide().removeClass().html('');
        }
        if ($('#marital_status option:selected').text() === 'Select') {
            $("#show_error").removeClass().html('');
            $("#show_error").show().addClass('alert alert-danger').html(
                'The marital status field is required.');
            return false;
        } else {
            $("#show_error").hide().removeClass().html('');
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "<?php echo e(route('Employee-Store')); ?>",
            data: $("#EmployeeStore").serialize(),
            // processData: false,
            // contentType: false,
            error: function(jqXHR, textStatus, errorThrown) {
                $("#show_error").removeClass().show().html('');
                $("#show_error").addClass("alert alert-danger").html(errorThrown);
                console.log("hello");
                $("#emp_submit").prop("disabled", false);
            },
            success: function(data) {

                $("#emp_submit").prop("disabled", false);

                console.log(data);
                // next_url = 'Employee-' + data['employee_id'] + '-Profile';
                // console.log(next_url);
                // return false;
                if (data['success'] == true) {
                    // console.log(data['message']);
                    setTimeout(() => {
                        $("#show_error").removeClass().show().html('');
                        $("#show_error").addClass("alert alert-success").html(data['message']);
                        next_url = 'Employee-' + data['employee_id'] + '-Profile';
                        window.location.href = next_url;
                    }, 1500);
                    // if (data['employee_id'] == 'no') {
                    // }
                } else {
                    if (data['validation'] == false) {
                        $("#show_error").removeClass().show().html('');
                        $("#show_error").addClass("alert alert-danger").html(data['message']
                            [0]);
                        return false;
                    }
                    $("#show_error").removeClass().show().html('');
                    $("#show_error").addClass("alert alert-danger").html(data['message']);
                    return false;
                }
            }
        });
    });

});

function SubmitAlert(event) {
    event.preventDefault();
    swal({
        title: "Please fill the form and press Submit & Next",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    });
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchishty\resources\views/EmployeeMaster/EmployeeCreate.blade.php ENDPATH**/ ?>