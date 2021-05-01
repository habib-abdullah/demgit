<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12 mb-2">
            <div class="card">
                <!-- <div class="card-header">
          <h3 class="h3 profile-username text-bold"> Personal Info</h3>
        </div> -->
                <div class="card-header p-0">
                    <h3 class="card-title p-3">
                        <a href="<?php echo e(route('Employe-Master-Show')); ?>" style="font-size: 18px;"><i
                                class="fas fa-arrow-circle-left"></i>
                            Back </a>
                    </h3>
                    <div class=" float-right">
                        <h3 class="card-title p-3">
                            Employee profile
                        </h3>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <img class="profile-user-img img-fluid img-circle"
                        src="<?php echo e(url('/')); ?>/public/Employee/<?php echo e($emp_profile_img ?? 'default.jpg'); ?>"
                        alt="User profile picture">
                </div>
                <h3 class="profile-username text-center text-capitalize"><?php echo e($employees->first_name ?? ''); ?>

                    <?php echo e($employees->last_name ?? ''); ?></h3>
                <p class="text-muted text-center text-capitalize"><?php echo e($employees->designation ?? ''); ?></p>
                <div class="row">
                    <div class="col-md-6 mt-4">
                        <div class="card-body box-profile">
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class=" text-capitalize" style="list-style:none;">
                                    <b>Name</b> <a class="float-right"><?php echo e($employees->first_name ?? ''); ?>

                                        <?php echo e($employees->last_name ?? ''); ?></a>
                                    <hr>
                                </li>
                                <li class=" text-capitalize" style="list-style:none;">
                                    <b>Designation</b> <a class="float-right"><?php echo e($employees->designation ?? ''); ?></a>
                                    <hr>
                                </li>
                                <li class=" text-capitalize" style="list-style:none;">
                                    <b>Birth Date</b> <a class="float-right"><?php echo e($employees->birth_date ?? ''); ?></a>
                                    <hr>
                                </li>
                                <li class=" text-capitalize" style="list-style:none;">
                                    <b>Nationality</b> <a class="float-right"><?php echo e($employees->nationality ?? ''); ?></a>
                                    <hr>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 mt-4">
                        <div class="card-body box-profile">
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class=" text-capitalize" style="list-style:none;">
                                    <b>Marital Status</b> <a
                                        class="float-right"><?php echo e($employees->marital_status ?? ''); ?></a>
                                    <hr>
                                </li>
                                <li class=" text-capitalize" style="list-style:none;">
                                    <b>VISA Issued From</b> <a
                                        class="float-right"><?php echo e($employees->visa_Issued_from ?? ''); ?></a>
                                    <hr>
                                </li>
                                <li class=" text-capitalize" style="list-style:none;">
                                    <b>Employee Type</b> <a class="float-right"><?php echo e($employees->employee_type ?? ''); ?></a>
                                    <hr>
                                </li>
                                <!-- <li class=" text-capitalize" style="list-style:none;">
                                <b>Nationality</b> <a class="float-right"><?php echo e($employees->nationality ?? ''); ?></a>
                                <hr>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="overflow:hidden;">
        <div class="col-md-12 mb-2">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Other Details
                    </div>
                </div>
                <div class="card-header d-flex p-0">
                    <div class="nav flex-column nav-pills col-lg-3 my-4" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <a class="nav-link active mx-4 mt-3" id="tab_1" data-toggle="pill" href="#v-pills-home"
                            role="tab" aria-controls="v-pills-home" aria-selected="true">
                            <i class="fas fa-passport  m-0 pr-2" style="font-size:18px;"></i>Passport Details</a>
                        <a class="nav-link  mx-4 " id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                            role="tab" aria-controls="v-pills-profile" aria-selected="false">
                            <i class="fas fa-home  m-0 pr-2" style="font-size:18px;"></i>Residency Details</a>
                        <a class="nav-link  mx-4" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages"
                            role="tab" aria-controls="v-pills-messages" aria-selected="false">
                            <i class="fas fa-address-book  m-0 pr-2" style="font-size:18px;"></i>Personal Contact</a>
                        <a class="nav-link  mx-4" id="v-pills-additional-contact-tab" data-toggle="pill" href="#v-pills-additional-contact"
                            role="tab" aria-controls="v-pills-additional-contact" aria-selected="false">
                            <i class="fas fa-address-book  m-0 pr-2" style="font-size:18px;"></i>Additional Contacts</a>
                        <a class="nav-link  mx-4" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings"
                            role="tab" aria-controls="v-pills-settings" aria-selected="false">
                            <i class="fas fa-address-book  m-0 pr-2" style="font-size:18px;"></i>Bank Details</a>
                        <a class="nav-link  mx-4" id="v-pills-mol-tab" data-toggle="pill" href="#v-pills-mol" role="tab"
                            aria-controls="v-pills-mol" aria-selected="false">
                            <i class="fas fa-building  m-0 pr-2" style="font-size:18px;"></i>MOL Record</a>
                        <a class="nav-link  mx-4" id="v-pills-health-tab" data-toggle="pill" href="#v-pills-health"
                            role="tab" aria-controls="v-pills-health" aria-selected="false">
                            <i class="fas fa-medkit  m-0 pr-2" style="font-size:18px;"></i>Health Info</a>
                        <a class="nav-link  mx-4" id="v-pills-status-tab" data-toggle="pill" href="#v-pills-status"
                            role="tab" aria-controls="v-pills-settings" aria-selected="false">
                            <i class="fas fa-check  m-0 pr-2" style="font-size:18px;"></i>Status</a>
                        <a class="nav-link  mx-4" id="v-pills-documents-tab" data-toggle="pill"
                            href="#v-pills-documents" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                            <i class="fas fa-file  m-0 pr-2" style="font-size:18px;"></i>Documents</a>
                    </div>
                    <div class="tab-content col-lg-9 my-4" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card-body">
                                        <strong>Passport No</strong>

                                        <p class="text-muted">
                                            <?php echo e($employees->passport_no ?? ''); ?>

                                        </p>

                                        <hr>

                                        <strong>Passport Issue Date</strong>

                                        <p class="text-muted"><?php echo e($employees->passport_issue_date ?? ''); ?></p>

                                        <hr>

                                        <strong>Passport Expiry Date</strong>

                                        <p class="text-muted">
                                            <?php echo e($employees->passport_expiry_date ?? ''); ?>

                                        </p>

                                        <hr>
                                        <strong>Passport Issued Place</strong>

                                        <p class="text-muted">
                                            <?php echo e($employees->passport_issue_place ?? ''); ?>

                                        </p>

                                        <hr>
                                        <strong>Nationality</strong>

                                        <p class="text-muted">
                                            <?php echo e($employees->nationality ?? ''); ?>

                                        </p>
                                        <hr>
                                        <strong>Permanent Address In Passport</strong>

                                        <p class="text-muted">
                                            <?php echo e($employees->permanent_add_in_passport ?? ''); ?>

                                        </p>
                                        <hr>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card-body">
                                        <strong>Father Name</strong>

                                        <p class="text-muted">
                                            <?php echo e($employees->father_name ?? ''); ?>

                                        </p>
                                        <hr>

                                        <strong>Mother Name</strong>

                                        <p class="text-muted">
                                            <?php echo e($employees->mother_name ?? ''); ?>

                                        </p>
                                        <hr>
                                        <strong>PP Personal No</strong>

                                        <p class="text-muted">
                                            <?php echo e($employees->pp_personal_no ?? ''); ?>

                                        </p>
                                        <hr>
                                        <strong>NIC Card No</strong>

                                        <p class="text-muted">
                                            <?php echo e($employees->nic_card_no ?? ''); ?>

                                        </p>
                                        <hr>
                                        <strong>NIC Expiry</strong>

                                        <p class="text-muted">
                                            <?php echo e($employees->nic_expiry ?? ''); ?>

                                        </p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card-body">
                                        <strong>Entry Permit No</strong>

                                        <p class="text-muted">
                                            <?php echo e($employees->entry_permit_no ?? ''); ?>

                                        </p>

                                        <hr>

                                        <strong> Entry Permit Date</strong>

                                        <p class="text-muted"><?php echo e($employees->entry_permit_date ?? ''); ?></p>

                                        <hr>

                                        <strong>Status Change Date</strong>

                                        <p class="text-muted">
                                        </p>

                                        <hr>
                                        <strong>UID No</strong>

                                        <p class="text-muted">
                                            <?php echo e($employees->uid_no ?? ''); ?>

                                        </p>

                                        <hr>
                                        <strong>File No</strong>

                                        <p class="text-muted">
                                            <?php echo e($employees->file_no ?? ''); ?>

                                        </p>
                                        <hr>
                                        <strong>Profession In Residence</strong>

                                        <p class="text-muted">
                                            <?php echo e($employees->profession_in_residence ?? ''); ?>

                                        </p>
                                        <hr>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card-body">
                                        <strong>Residence Issue Date</strong>

                                        <p class="text-muted">
                                            <?php echo e($employees->residence_issude_date ?? ''); ?>

                                        </p>
                                        <hr>

                                        <strong>Residence Expiry Date</strong>

                                        <p class="text-muted">
                                            <?php echo e($employees->residence_expiry_date ?? ''); ?>

                                        </p>
                                        <hr>
                                        <strong>Emirates Id No</strong>

                                        <p class="text-muted">
                                            <?php echo e($employees->emirate_id_no ?? ''); ?>

                                        </p>
                                        <hr>
                                        <strong>Emirates Id Expiry Date</strong>

                                        <p class="text-muted">
                                            <?php echo e($employees->emirate_id_expiry ?? ''); ?>

                                        </p>
                                        <hr>
                                        <strong>E Id Card No</strong>

                                        <p class="text-muted">
                                            <?php echo e($employees->e_id_card_no ?? ''); ?>

                                        </p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                            aria-labelledby="v-pills-messages-tab">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card-body">

                                        <strong>Contact</strong>

                                        <p class="text-muted"><?php echo e($employees->contact ?? ''); ?></p>

                                        <hr>

                                        <strong> Whatsapp Number</strong>

                                        <p class="text-muted">
                                            <?php echo e($employees->whatsapp_no ?? ''); ?>

                                        </p>
                                        <hr>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card-body">
                                        <strong> IMO No</strong>

                                        <p class="text-muted">
                                            <?php echo e($employees->imo_no ?? ''); ?>

                                        </p>

                                        <hr>
                                        <strong> Facebook</strong>

                                        <p class="text-muted">
                                            <?php echo e($employees->facebook ?? ''); ?>

                                        </p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-additional-contact" role="tabpanel"
                            aria-labelledby="v-pills-additional-contact-tab">
                            <div class="row">
                                <?php if(count($contacts) > 0): ?>
                                <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-6 col-md-6 col-sm-8">
                                    <div class="card ">
                                        <div class="card-footer text-capitalize">
                                            <table class="table table-striped table-hover table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>Name : </td>
                                                        <td> <?php echo e($contact->contact_name ?? ''); ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ralation : </td>
                                                        <td> <?php echo e($contact->contact_relation ?? ''); ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Number : </td>
                                                        <td> <?php echo e($contact->contact_number ?? ''); ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address : </td>
                                                        <td> <?php echo e($contact->contact_address ?? ''); ?> </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab">
                            <div class="row ">
                                <?php if(count($banks) > 0): ?>
                                <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-6 col-md-6 col-sm-10">
                                    <div class="card ">
                                        <div class="card-footer text-capitalize">
                                            <table class="table table-striped table-hover table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>Bank Name : </td>
                                                        <td> <?php echo e($bank->bank_name ?? ''); ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Branch : </td>
                                                        <td> <?php echo e($bank->branch_name ?? ''); ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Account Type : </td>
                                                        <td> <?php echo e($bank->account_type ?? ''); ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Account Name : </td>
                                                        <td> <?php echo e($bank->account_name ?? ''); ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Account Number : </td>
                                                        <td> <?php echo e($bank->account_number ?? ''); ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Iban : </td>
                                                        <td> <?php echo e($bank->iban ?? ''); ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Swift : </td>
                                                        <td> <?php echo e($bank->swift ?? ''); ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Card No : </td>
                                                        <td> <?php echo e($bank->card_no ?? ''); ?> </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                            <!-- <div class="row">
                                <div class="col-lg-6">
                                    <div class="card-body">

                                        <strong>Bank Name</strong>
                                        <p class="text-muted">
                                            <?php echo e($banks[0]->bank_name ?? ""); ?>

                                        </p>
                                        <hr>

                                        <strong> Branch</strong>
                                        <p class="text-muted"><?php echo e($banks[0]->branch_name ?? ""); ?></p>
                                        <hr>

                                        <strong> Account Type</strong>

                                        <p class="text-muted">
                                            <?php echo e($banks[0]->account_type ?? ""); ?>

                                        </p>
                                        <hr>

                                        <strong> Account Name</strong>
                                        <p class="text-muted">
                                            <?php echo e($banks[0]->account_name ?? ""); ?>

                                        </p>
                                        <hr>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card-body">

                                        <strong> Account No</strong>
                                        <p class="text-muted">
                                            <?php echo e($banks[0]->account_number ?? ""); ?>

                                        </p>
                                        <hr>

                                        <strong> IBAN</strong>

                                        <p class="text-muted">
                                            <?php echo e($banks[0]->iban ?? ""); ?>

                                        </p>
                                        <hr>

                                        <strong> Swift</strong>
                                        <p class="text-muted">
                                            <?php echo e($banks[0]->swift ?? ""); ?>

                                        </p>
                                        <hr>

                                        <strong> Credit/Debit Card No</strong>
                                        <p class="text-muted">
                                            <?php echo e($banks[0]->card_no ?? ""); ?>

                                        </p>
                                        <hr>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="tab-pane fade" id="v-pills-mol" role="tabpanel" aria-labelledby="v-pills-mol">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card-body">
                                        <strong>Work Permit No</strong>
                                        <p class="text-muted">
                                            <?php echo e($employees->work_permit_no ?? ''); ?>

                                        </p>
                                        <hr>

                                        <strong> Personal No</strong>
                                        <p class="text-muted"><?php echo e($banks[0]->account_name ?? ""); ?></p>
                                        <hr>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card-body">

                                        <strong> Work Permit Expiry</strong>
                                        <p class="text-muted">
                                            <?php echo e($employees->personal_no ?? ''); ?>

                                        </p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-health" role="tabpanel" aria-labelledby="v-pills-health">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card-body">
                                        <strong>Blood Group</strong>
                                        <p class="text-muted">
                                            <?php echo e($employees->blood_group ?? ''); ?>

                                        </p>
                                        <hr>

                                        <strong>Height</strong>

                                        <p class="text-muted">
                                            <?php echo e(($employees->height != '') ? str_replace("_"," ",$employees->height)  : ''); ?>

                                        </p>
                                        <hr>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card-body">
                                        <strong> Medical Issues</strong>
                                        <p class="text-muted">
                                            <?php echo e($employees->medical_issues ?? ''); ?>

                                        </p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-status" role="tabpanel" aria-labelledby="v-pills-status">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card-body">
                                        <strong> Resigned</strong>
                                        <p class="text-muted">
                                            <?php echo e($employees->status == 1? 'In Service' : 'Resigned'); ?>

                                        </p>
                                        <hr>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card-body">

                                        <strong>Active</strong>
                                        <p class="text-muted">
                                            <?php echo e($employees->status == 1? 'True' : 'False'); ?>

                                        </p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-documents" role="tabpanel"
                            aria-labelledby="v-pills-documents">
                            <div class="row">
                                <?php if(count($documents) > 0): ?>
                                <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    date_default_timezone_set('Asia/Calcutta');
                                    $datetime = new DateTime();
                                    $date_today = $datetime->format('Y-m-d');
                                    $date_now = strtotime($date_today.' 00:37:15'); // or your date as well
                                    $expire_date = strtotime($document->document_expiry.' 00:37:15');
                                    $datediff = $date_now - $expire_date;
                                    $date_diff = $datediff / 86400;
                                    // $date_diff = $datediff / (60 * 60 * 24);
                                     $check =  round($date_diff, 0);
                                ?>
                                <?php if($check == 0): ?>
                                <div class="col-lg-4 col-md-4 col-sm-8">
                                    <div class="card white text-center" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(255, 99, 71, 0.5);">
                                        <div class="card-header bg-danger text-white text-uppercase " style="height:40px;">
                                            <h5 class="card-text "><?php echo e($document->document_category ?? ''); ?></h5>
                                        </div>
                                        <div class="card-body text-uppercase">
                                            <p class="card-text text-danger my-1"> Expire today </p>
                                            <p class="card-text my-1"><?php echo e($document->document_expiry ?? ''); ?></p>
                                            <p class="card-text my-1"><?php echo e($document->document_name ?? ''); ?></p>
                                        </div>
                                        <div class="card-footer" style="height:40px;">
                                            <a class="btn btn-danger btn-sm mt-0" style="margin-top:-6px !important;"
                                                href="<?php echo e(url('/')); ?>/public/Employee/<?php echo e($document->attachment ?? ''); ?>"
                                                target="_blank"> <i class="fa fa-download" style="font-size:14px !important;" ></i> </a>
                                        </div>
                                    </div>
                                </div>
                                <?php elseif($check < 0): ?>
                                <div class="col-lg-4 col-md-4 col-sm-8">
                                    <div class="card text-center" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(255, 165, 5, 0.5);">
                                        <div class="card-header bg-warning text-white text-uppercase " style="height:40px;">
                                            <h5 class="card-text "><?php echo e($document->document_category ?? ''); ?></h5>
                                        </div>
                                        <div class="card-body text-uppercase">
                                        <p class="card-text text-warning my-1"> Expire in <?php echo e(str_replace('-',' ',round($date_diff, 0))); ?> days </p>
                                            <p class="card-text my-1"><?php echo e($document->document_expiry ?? ''); ?></p>
                                            <p class="card-text my-1"><?php echo e($document->document_name ?? ''); ?></p>
                                        </div>
                                        <div class="card-footer" style="height:40px;">
                                            <a class="btn btn-warning btn-sm mt-0" style="margin-top:-6px !important;"
                                                href="<?php echo e(url('/')); ?>/public/Employee/<?php echo e($document->attachment ?? ''); ?>"
                                                target="_blank"> <i class="fa fa-download" style="font-size:14px !important;" ></i> </a>
                                        </div>
                                    </div>
                                </div>
                                <?php else: ?>
                                <div class="col-lg-4 col-md-4 col-sm-8">
                                    <div class="card text-center" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(255, 99, 71, 0.5);">
                                        <div class="card-header bg-danger text-white text-uppercase " style="height:40px;">
                                            <h5 class="card-text "><?php echo e($document->document_category ?? ''); ?></h5>
                                        </div>
                                        <div class="card-body text-uppercase">
                                        <p class="card-text text-danger my-1"> Expired <?php echo e(round($date_diff, 0)); ?> ago </p>
                                            <p class="card-text my-1"><?php echo e($document->document_expiry ?? ''); ?></p>
                                            <p class="card-text my-1"><?php echo e($document->document_name ?? ''); ?></p>
                                        </div>
                                        <div class="card-footer" style="height:40px;">
                                            <a class="btn btn-danger btn-sm mt-0" style="margin-top:-6px !important;"
                                                href="<?php echo e(url('/')); ?>/public/Employee/<?php echo e($document->attachment ?? ''); ?>"
                                                target="_blank"> <i class="fa fa-download" style="font-size:14px !important;" ></i> </a>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row">
    <div class="col-md-12 mb-2">
      <div class="card">
        <div class="card-header d-flex p-0">
          <ul class="nav nav-pills mr-auto p-2">
            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">
                <i class="fas fa-user  m-0 pr-2" style="font-size:18px;"></i>Passport Details</a></li>
            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">
                <i class="fas fa-shopping-cart  m-0 pr-2" style="font-size:18px;"></i>Residency Details</a></li>
            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">
                <i class="fas fa-shopping-cart  m-0 pr-2" style="font-size:18px;"></i>Contact Details</a></li>
            <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">
                <i class="fas fa-address-book  m-0 pr-2" style="font-size:18px;"></i>Bank Details</a></li>
            <li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">
                <i class="fas fa-building  m-0 pr-2" style="font-size:18px;"></i>MOL Record</a></li>
            <li class="nav-item"><a class="nav-link" href="#tab_6" data-toggle="tab">
                <i class="fas fa-file  m-0 pr-2" style="font-size:18px;"></i>Health Info</a></li>
            <li class="nav-item"><a class="nav-link" href="#tab_7" data-toggle="tab">
                <i class="fas fa-file  m-0 pr-2" style="font-size:18px;"></i>Status</a></li>
            <li class="nav-item"><a class="nav-link" href="#tab_8" data-toggle="tab">
                <i class="fas fa-file  m-0 pr-2" style="font-size:18px;"></i>Documents</a></li>
          </ul>
        </div>
        <div class="card-body box-profile p-0">
          <div class="tab-content">

            <div class="tab-pane active " id="tab_1">

              <div class="card-body">
                <strong>Passport No</strong>

                <p class="text-muted">
                  <?php echo e($employees->passport_no ?? ''); ?>

                </p>

                <hr>

                <strong>Passport Issue Date</strong>

                <p class="text-muted"><?php echo e($employees->passport_issue_date ?? ''); ?></p>

                <hr>

                <strong>Passport Expiry Date</strong>

                <p class="text-muted">
                  <?php echo e($employees->passport_expiry_date ?? ''); ?>

                </p>

                <hr>
                <strong>Passport Issued Place</strong>

                <p class="text-muted">
                  <?php echo e($employees->passport_issue_place ?? ''); ?>

                </p>

                <hr>
                <strong>Nationality</strong>

                <p class="text-muted">
                  <?php echo e($employees->nationality ?? ''); ?>

                </p>
                <hr>
                <strong>Permanent Address In Passport</strong>

                <p class="text-muted">
                  <?php echo e($employees->permanent_add_in_passport ?? ''); ?>

                </p>
                <hr>
                <strong>Father Name</strong>

                <p class="text-muted">
                  <?php echo e($employees->father_name ?? ''); ?>

                </p>
                <hr>
                <strong>Mother Name</strong>

                <p class="text-muted">
                  <?php echo e($employees->mother_name ?? ''); ?>

                </p>
                <hr>
                <strong>PP Personal No</strong>

                <p class="text-muted">
                  <?php echo e($employees->pp_personal_no ?? ''); ?>

                </p>
                <hr>
                <strong>NIC Card No</strong>

                <p class="text-muted">
                  <?php echo e($employees->nic_card_no ?? ''); ?>

                </p>
                <hr>
                <strong>NIC Expiry</strong>

                <p class="text-muted">
                  <?php echo e($employees->nic_expiry ?? ''); ?>

                </p>
              </div>
            </div>
            <div class="tab-pane " id="tab_2">
              <div class="card-body">
                <strong>
                  Entry Permit No</strong>

                <p class="text-muted">
                  <?php echo e($employees->entry_permit_no ?? ''); ?>

                </p>
                <hr>

                <strong> Entry Permit Date</strong>
                <p class="text-muted"><?php echo e($employees->entry_permit_date ?? ''); ?></p>
                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Status Change Date</strong>
                <p class="text-muted"></p>
                <hr>

                <strong><i class="far fa-file-alt mr-1"></i>UID No</strong>
                <p class="text-muted"><?php echo e($employees->uid_no ?? ''); ?></p>
                <hr>
                <strong><i class="far fa-file-alt mr-1"></i>File No</strong>

                <p class="text-muted"><?php echo e($employees->file_no ?? ''); ?></p>
                <hr>
                <strong><i class="far fa-file-alt mr-1"></i>Profession In Residence</strong>

                <p class="text-muted"><?php echo e($employees->profession_in_residence ?? ''); ?></p>
                <hr>
                <strong><i class="far fa-file-alt mr-1"></i>Residence Issue Date</strong>

                <p class="text-muted"><?php echo e($employees->residence_issude_date ?? ''); ?></p>
                <hr>
                <strong><i class="far fa-file-alt mr-1"></i>Residence Expiry Date</strong>

                <p class="text-muted"><?php echo e($employees->residence_expiry_date ?? ''); ?></p>
                <hr>
                <strong><i class="far fa-file-alt mr-1"></i>Emirates Id No</strong>

                <p class="text-muted"><?php echo e($employees->emirate_id_no ?? ''); ?></p>
                <hr>
                <strong><i class="far fa-file-alt mr-1"></i>Emirates Id Expiry Date</strong>

                <p class="text-muted"><?php echo e($employees->emirate_id_expiry ?? ''); ?></p>
                <hr>
                <strong><i class="far fa-file-alt mr-1"></i>E Id Card No</strong>

                <p class="text-muted"><?php echo e($employees->e_id_card_no ?? ''); ?></p>
              </div>
            </div>

            <div class="tab-pane " id="tab_3">
              <div class="card-body">
                <strong>Email</strong>
                <p class="text-muted">
                  <?php echo e($employees->email ?? ''); ?>

                </p>
                <hr>
                <strong>Contact</strong>

                <p class="text-muted">
                  <?php echo e($employees->contact ?? ''); ?>

                </p>
                <hr>
                <strong> Whatsapp Number</strong>

                <p class="text-muted">
                  <?php echo e($employees->whatsapp_no ?? ''); ?>

                </p>
                <hr>
                <strong> IMO No</strong>

                <p class="text-muted">
                  <?php echo e($employees->imo_no ?? ''); ?>

                </p>
                <hr>
                <strong> Facebook</strong>

                <p class="text-muted">
                  <?php echo e($employees->facebook ?? ''); ?>

                </p>
                <hr>
                <strong> Permanent Contact Name</strong>

                <p class="text-muted">
                  <?php echo e($employees->permanent_contact_name ?? ''); ?>

                </p>
                <hr>
                <strong> Permanent Contact Number</strong>

                <p class="text-muted">
                  <?php echo e($employees->permanent_contact_no ?? ''); ?>

                </p>
                <hr>
                <strong> Permanent Contact Relation</strong>

                <p class="text-muted">
                  <?php echo e($employees->permanent_contact_relation ?? ''); ?>

                </p>
                <hr>
                <strong> UAE Emergency Contact Name</strong>

                <p class="text-muted">
                  <?php echo e($employees->uae_emergency_contact_name ?? ''); ?>

                </p>
                <hr>
                <strong> UAE Emergency Contact No.</strong>

                <p class="text-muted">
                  <?php echo e($employees->uae_emergency_contact_no ?? ''); ?>

                </p>
                <hr>
                <strong> Emergency Cont. Relation</strong>

                <p class="text-muted">
                  <?php echo e($employees->permanent_contact_relation ?? ''); ?>

                </p>
                <hr>
                <strong> Emergency Cont. Per. Address</strong>

                <p class="text-muted">
                  <?php echo e($employees->uae_emergency_contact_address ?? ''); ?>

                </p>
              </div>
            </div>

            <div class="tab-pane " id="tab_4">
              <div class="card-body">
                <strong>Bank Name</strong>

                <p class="text-muted">
                  <?php echo e($banks[0]->bank_name ?? ""); ?>

                </p>
                <hr>
                <strong> Branch</strong>

                <p class="text-muted">
                  <?php echo e($banks[0]->branch_name ?? ""); ?>

                </p>
                <hr>
                <strong> Account Type</strong>

                <p class="text-muted">
                  <?php echo e($banks[0]->account_type ?? ""); ?>

                </p>
                <hr>
                <strong> Account Name</strong>

                <p class="text-muted">
                  <?php echo e($banks[0]->account_name ?? ""); ?>

                </p>
                <hr>
                <strong> Account No</strong>

                <p class="text-muted">
                  <?php echo e($banks[0]->account_number ?? ""); ?>

                </p>
                <hr>
                <strong> IBAN</strong>

                <p class="text-muted">
                  <?php echo e($banks[0]->iban ?? ""); ?>

                </p>
                <hr>
                <strong>Swift</strong>

                <p class="text-muted">
                  <?php echo e($banks[0]->swift ?? ""); ?>

                </p>
                <hr>
                <strong>Credit/Debit Card No</strong>

                <p class="text-muted">
                  <?php echo e($banks[0]->card_no ?? ""); ?>

                </p>
              </div>
            </div>

            <div class="tab-pane " id="tab_5">
              <div class="card-body">

                <strong> Work Permit No</strong>
                <p class="text-muted">
                  <?php echo e($employees->work_permit_no ?? ''); ?>

                </p>
                <hr>

                <strong> Personal No</strong>
                <p class="text-muted">
                  <?php echo e($employees->personal_no ?? ''); ?>

                </p>
                <hr>

                <strong> Work Permit Expiry</strong>
                <p class="text-muted">
                  <?php echo e($employees->work_permit_expiry ?? ''); ?>

                </p>
              </div>
            </div>

            <div class="tab-pane " id="tab_6">
              <div class="card-body">

                <strong>Blood Group</strong>
                <p class="text-muted">
                  <?php echo e($employees->blood_group ?? ''); ?>

                </p>
                <hr>

                <strong>Height</strong>
                <p class="text-muted">
                  <?php echo e($employees->height ?? ''); ?>

                </p>
                <hr>

                <strong>Medical Issues</strong>
                <p class="text-muted">
                  <?php echo e($employees->medical_issues ?? ''); ?>

                </p>
              </div>
            </div>
            <div class="tab-pane " id="tab_7">
              <div class="card-body">

                <strong> Resigned</strong>
                <p class="text-muted">
                  <?php echo e($employees->status == 1? 'In Service' : 'Resigned'); ?>

                </p>
                <hr>

                <strong> Active</strong>
                <p class="text-muted">
                  <?php echo e($employees->status == 1? 'True' : 'False'); ?>

                </p>
              </div>
            </div>
            <div class="tab-pane " id="tab_8">
              <div class="card-body">

                <strong>Document category</strong>
                <p class="text-muted">
                  <?php echo e($documents[0]->document_category ?? ''); ?>

                </p>
                <hr>

                <strong>Document name</strong>
                <p class="text-muted">
                  <?php echo e($documents[0]->document_name ?? ''); ?>

                </p>
                <hr>

                <strong> Attachemnt</strong>
                <p class="text-muted">

                  <a href="<?php echo e(url('/')); ?>/public/Employee/<?php echo e($documents[0]->attachment ?? ''); ?>" target="_blank">
                    <?php echo e($documents[0]->attachment ?? ''); ?> </a>
                </p>
                <hr>

                <strong>Document expiry</strong>
                <p class="text-muted">
                  <?php echo e($documents[0]->document_expiry ?? ''); ?>

                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
</div>

<script src="<?php echo e(url('public/plugins/jquery/jquery.min.js')); ?>"></script>
<script type="text/javascript">
$(function() {

});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchisty\resources\views/EmployeeMaster/EmployeeDetails.blade.php ENDPATH**/ ?>