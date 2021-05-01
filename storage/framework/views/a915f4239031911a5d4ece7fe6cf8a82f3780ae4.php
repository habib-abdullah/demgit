<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row">
    <div class="col-md-12 mb-2">
      <div class="card card card-primary card-outline">
        <!-- <div class="card-header">
          <h3 class="h3 profile-username text-bold"> Personal Info</h3>
        </div> -->
        <div class="card-header p-0">
          <h3 class="card-title p-3">
            <a href="<?php echo e(route('Employe-Master-Show')); ?>" style="font-size: 18px;"><i class="fas fa-arrow-circle-left"></i>
              Back </a>
          </h3>
          <div class=" float-right">
            <h3 class="card-title p-3">
              Employee profile
            </h3>
          </div>
        </div>
        <div class="text-center mt-4">
          <img class="profile-user-img img-fluid img-circle" src="<?php echo e(url('public/img/profile.jpg')); ?>"
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
                  <b>Marital Status</b> <a class="float-right"><?php echo e($employees->marital_status ?? ''); ?></a>
                  <hr>
                </li>
                <li class=" text-capitalize" style="list-style:none;">
                  <b>VISA Issued From</b> <a class="float-right"><?php echo e($employees->visa_Issued_from ?? ''); ?></a>
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
        <div class="card-header d-flex p-0">
          <div class="nav flex-column nav-pills col-lg-3 my-4" id="v-pills-tab" role="tablist"
            aria-orientation="vertical">
            <a class="nav-link active mx-4 mt-3" id="tab_1" data-toggle="pill" href="#v-pills-home" role="tab"
              aria-controls="v-pills-home" aria-selected="true">
              <i class="fas fa-user  m-0 pr-2" style="font-size:18px;"></i>Passport Details</a>
            <a class="nav-link  mx-4 " id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
              aria-controls="v-pills-profile" aria-selected="false">
              <i class="fas fa-shopping-cart  m-0 pr-2" style="font-size:18px;"></i>Residency Details</a>
            <a class="nav-link  mx-4" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab"
              aria-controls="v-pills-messages" aria-selected="false">
              <i class="fas fa-shopping-cart  m-0 pr-2" style="font-size:18px;"></i>Contact Details</a>
            <a class="nav-link  mx-4" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab"
              aria-controls="v-pills-settings" aria-selected="false">
              <i class="fas fa-address-book  m-0 pr-2" style="font-size:18px;"></i>Bank Details</a>
            <a class="nav-link  mx-4" id="v-pills-mol-tab" data-toggle="pill" href="#v-pills-mol" role="tab"
              aria-controls="v-pills-mol" aria-selected="false">
              <i class="fas fa-building  m-0 pr-2" style="font-size:18px;"></i>MOL Record</a>
            <a class="nav-link  mx-4" id="v-pills-health-tab" data-toggle="pill" href="#v-pills-health" role="tab"
              aria-controls="v-pills-health" aria-selected="false">
              <i class="fas fa-file  m-0 pr-2" style="font-size:18px;"></i>Health Info</a>
            <a class="nav-link  mx-4" id="v-pills-status-tab" data-toggle="pill" href="#v-pills-status" role="tab"
              aria-controls="v-pills-settings" aria-selected="false">
              <i class="fas fa-file  m-0 pr-2" style="font-size:18px;"></i>Status</a>
            <a class="nav-link  mx-4" id="v-pills-documents-tab" data-toggle="pill" href="#v-pills-documents" role="tab"
              aria-controls="v-pills-settings" aria-selected="false">
              <i class="fas fa-file  m-0 pr-2" style="font-size:18px;"></i>Documents</a>
          </div>
          <div class="tab-content col-lg-9 my-4" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home">
              <div class="row">
                <div class="col-lg-6">
                  <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i>Passport No</strong>

                    <p class="text-muted">
                      <?php echo e($employees->passport_no ?? ''); ?>

                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i>Passport Issue Date</strong>

                    <p class="text-muted"><?php echo e($employees->passport_issue_date ?? ''); ?></p>

                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i>Passport Expiry Date</strong>

                    <p class="text-muted">
                      <?php echo e($employees->passport_expiry_date ?? ''); ?>

                    </p>

                    <hr>
                    <strong><i class="fas fa-pencil-alt mr-1"></i>Passport Issued Place</strong>

                    <p class="text-muted">
                      <?php echo e($employees->passport_issue_place ?? ''); ?>

                    </p>

                    <hr>
                    <strong><i class="fas fa-pencil-alt mr-1"></i>Nationality</strong>

                    <p class="text-muted">
                      <?php echo e($employees->nationality ?? ''); ?>

                    </p>
                    <hr>
                    <strong><i class="fas fa-pencil-alt mr-1"></i>Permanent Address In Passport</strong>

                    <p class="text-muted">
                      <?php echo e($employees->permanent_add_in_passport ?? ''); ?>

                    </p>
                    <hr>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="card-body">
                    <strong><i class="fas fa-pencil-alt mr-1"></i>Father Name</strong>

                    <p class="text-muted">
                      <?php echo e($employees->father_name ?? ''); ?>

                    </p>
                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i>Mother Name</strong>

                    <p class="text-muted">
                      <?php echo e($employees->mother_name ?? ''); ?>

                    </p>
                    <hr>
                    <strong><i class="fas fa-pencil-alt mr-1"></i>PP Personal No</strong>

                    <p class="text-muted">
                      <?php echo e($employees->pp_personal_no ?? ''); ?>

                    </p>
                    <hr>
                    <strong><i class="fas fa-pencil-alt mr-1"></i>NIC Card No</strong>

                    <p class="text-muted">
                      <?php echo e($employees->nic_card_no ?? ''); ?>

                    </p>
                    <hr>
                    <strong><i class="fas fa-pencil-alt mr-1"></i>NIC Expiry</strong>

                    <p class="text-muted">
                      <?php echo e($employees->nic_expiry ?? ''); ?>

                    </p>
                    <hr>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
              <div class="row">
                <div class="col-lg-6">
                  <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i>Entry Permit No</strong>

                    <p class="text-muted">
                      <?php echo e($employees->entry_permit_no ?? ''); ?>

                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Entry Permit Date</strong>

                    <p class="text-muted"><?php echo e($employees->entry_permit_date ?? ''); ?></p>

                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i>Status Change Date</strong>

                    <p class="text-muted">
                    </p>

                    <hr>
                    <strong><i class="fas fa-pencil-alt mr-1"></i>UID No</strong>

                    <p class="text-muted">
                      <?php echo e($employees->uid_no ?? ''); ?>

                    </p>

                    <hr>
                    <strong><i class="fas fa-pencil-alt mr-1"></i>File No</strong>

                    <p class="text-muted">
                      <?php echo e($employees->file_no ?? ''); ?>

                    </p>
                    <hr>
                    <strong><i class="fas fa-pencil-alt mr-1"></i>Profession In Residence</strong>

                    <p class="text-muted">
                      <?php echo e($employees->profession_in_residence ?? ''); ?>

                    </p>
                    <hr>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="card-body">
                    <strong><i class="fas fa-pencil-alt mr-1"></i>Residence Issue Date</strong>

                    <p class="text-muted">
                      <?php echo e($employees->residence_issude_date ?? ''); ?>

                    </p>
                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i>Residence Expiry Date</strong>

                    <p class="text-muted">
                      <?php echo e($employees->residence_expiry_date ?? ''); ?>

                    </p>
                    <hr>
                    <strong><i class="fas fa-pencil-alt mr-1"></i>Emirates Id No</strong>

                    <p class="text-muted">
                      <?php echo e($employees->emirate_id_no ?? ''); ?>

                    </p>
                    <hr>
                    <strong><i class="fas fa-pencil-alt mr-1"></i>Emirates Id Expiry Date</strong>

                    <p class="text-muted">
                      <?php echo e($employees->emirate_id_expiry ?? ''); ?>

                    </p>
                    <hr>
                    <strong><i class="fas fa-pencil-alt mr-1"></i>E Id Card No</strong>

                    <p class="text-muted">
                      <?php echo e($employees->e_id_card_no ?? ''); ?>

                    </p>
                    <hr>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
              <div class="row">
                <div class="col-lg-6">
                  <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i>Email</strong>

                    <p class="text-muted">
                      <?php echo e($employees->email ?? ''); ?>

                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i>Contact</strong>

                    <p class="text-muted"><?php echo e($employees->contact ?? ''); ?></p>

                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i> Whatsapp Number</strong>

                    <p class="text-muted">
                      <?php echo e($employees->whatsapp_no ?? ''); ?>

                    </p>
                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i> IMO No</strong>

                    <p class="text-muted">
                      <?php echo e($employees->imo_no ?? ''); ?>

                    </p>

                    <hr>
                    <strong><i class="fas fa-pencil-alt mr-1"></i> Facebook</strong>

                    <p class="text-muted">
                      <?php echo e($employees->facebook ?? ''); ?>

                    </p>
                    <hr>
                    <strong><i class="fas fa-pencil-alt mr-1"></i> Permanent Contact Name</strong>

                    <p class="text-muted">
                      <?php echo e($employees->permanent_contact_name ?? ''); ?>

                    </p>
                    <hr>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="card-body">
                    <strong><i class="fas fa-pencil-alt mr-1"></i> Permanent Contact Number</strong>

                    <p class="text-muted">
                      <?php echo e($employees->permanent_contact_no ?? ''); ?>

                    </p>
                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i> Permanent Contact Relation</strong>

                    <p class="text-muted">
                      <?php echo e($employees->permanent_contact_relation ?? ''); ?>

                    </p>
                    <hr>
                    <strong><i class="fas fa-pencil-alt mr-1"></i> UAE Emergency Contact Name</strong>

                    <p class="text-muted">
                      <?php echo e($employees->uae_emergency_contact_name ?? ''); ?>

                    </p>
                    <hr>
                    <strong><i class="fas fa-pencil-alt mr-1"></i>UAE Emergency Contact No</strong>

                    <p class="text-muted">
                      <?php echo e($employees->uae_emergency_contact_no ?? ''); ?>

                    </p>
                    <hr>
                    <strong><i class="fas fa-pencil-alt mr-1"></i>Emergency Cont. Relation</strong>

                    <p class="text-muted">
                      <?php echo e($employees->permanent_contact_relation ?? ''); ?>

                    </p>
                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i> Emergency Cont. Per. Address</strong>
                    <p class="text-muted">
                      <?php echo e($employees->uae_emergency_contact_address ?? ''); ?>

                    </p>
                    <hr>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
              <div class="row">
                <div class="col-lg-6">
                  <div class="card-body">

                    <strong><i class="fas fa-book mr-1"></i>Bank Name</strong>
                    <p class="text-muted">
                      <?php echo e($banks[0]->bank_name ?? ""); ?>

                    </p>
                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Branch</strong>
                    <p class="text-muted"><?php echo e($banks[0]->branch_name ?? ""); ?></p>
                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i> Account Type</strong>

                    <p class="text-muted">
                      <?php echo e($banks[0]->account_type ?? ""); ?>

                    </p>
                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i> Account Name</strong>
                    <p class="text-muted">
                      <?php echo e($banks[0]->account_name ?? ""); ?>

                    </p>
                    <hr>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="card-body">

                    <strong><i class="fas fa-pencil-alt mr-1"></i> Account No</strong>
                    <p class="text-muted">
                      <?php echo e($banks[0]->account_number ?? ""); ?>

                    </p>
                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i> IBAN</strong>

                    <p class="text-muted">
                      <?php echo e($banks[0]->iban ?? ""); ?>

                    </p>
                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i> Swift</strong>
                    <p class="text-muted">
                      <?php echo e($banks[0]->swift ?? ""); ?>

                    </p>
                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i> Credit/Debit Card No</strong>
                    <p class="text-muted">
                      <?php echo e($banks[0]->card_no ?? ""); ?>

                    </p>
                    <hr>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="v-pills-mol" role="tabpanel" aria-labelledby="v-pills-mol">
              <div class="row">
                <div class="col-lg-6">
                  <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i>Work Permit No</strong>
                    <p class="text-muted">
                      <?php echo e($employees->work_permit_no ?? ''); ?>

                    </p>
                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Personal No</strong>
                    <p class="text-muted"><?php echo e($banks[0]->account_name ?? ""); ?></p>
                    <hr>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="card-body">

                    <strong><i class="fas fa-pencil-alt mr-1"></i> Work Permit Expiry</strong>
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
                    <strong><i class="fas fa-book mr-1"></i>Blood Group</strong>
                    <p class="text-muted">
                      <?php echo e($employees->blood_group ?? ''); ?>

                    </p>
                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i>Height</strong>

                    <p class="text-muted">
                      <?php echo e(($employees->height != '') ? str_replace("_"," ",$employees->height)  : ''); ?>

                    </p>
                    <hr>

                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="card-body">
                    <strong><i class="fas fa-pencil-alt mr-1"></i> Medical Issues</strong>
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
                    <strong><i class="fas fa-book mr-1"></i> Resigned</strong>
                    <p class="text-muted">
                      <?php echo e($employees->status == 1? 'In Service' : 'Resigned'); ?>

                    </p>
                    <hr>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="card-body">

                    <strong><i class="fas fa-pencil-alt mr-1"></i>Active</strong>
                    <p class="text-muted">
                      <?php echo e($employees->status == 1? 'True' : 'False'); ?>

                    </p>
                    <hr>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="v-pills-documents" role="tabpanel" aria-labelledby="v-pills-documents">
              <div class="row">
                <div class="col-lg-6">
                  <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i> Document category</strong>
                    <p class="text-muted">
                      <?php echo e($documents[0]->document_category ?? ''); ?>

                    </p>
                    <hr>

                    <strong><i class="fas fa-book mr-1"></i>Document name</strong>
                    <p class="text-muted">
                      <?php echo e($documents[0]->document_name ?? ''); ?>

                    </p>
                    <hr>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="card-body">

                    <strong><i class="fas fa-pencil-alt mr-1"></i>Attachemnt</strong>
                    <p class="text-muted">
                      <a href="<?php echo e(url('/')); ?>/public/Employee/<?php echo e($documents[0]->attachment ?? ''); ?>" target="_blank">
                        <?php echo e($documents[0]->attachment ?? ''); ?> </a>
                    </p>
                    <hr>
                    <strong><i class="fas fa-pencil-alt mr-1"></i>Document expiry</strong>
                    <p class="text-muted">
                      <?php echo e($documents[0]->document_expiry ?? ''); ?>

                    </p>
                    <hr>
                  </div>
                </div>
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
                <strong><i class="fas fa-book mr-1"></i>Passport No</strong>

                <p class="text-muted">
                  <?php echo e($employees->passport_no ?? ''); ?>

                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i>Passport Issue Date</strong>

                <p class="text-muted"><?php echo e($employees->passport_issue_date ?? ''); ?></p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i>Passport Expiry Date</strong>

                <p class="text-muted">
                  <?php echo e($employees->passport_expiry_date ?? ''); ?>

                </p>

                <hr>
                <strong><i class="fas fa-pencil-alt mr-1"></i>Passport Issued Place</strong>

                <p class="text-muted">
                  <?php echo e($employees->passport_issue_place ?? ''); ?>

                </p>

                <hr>
                <strong><i class="fas fa-pencil-alt mr-1"></i>Nationality</strong>

                <p class="text-muted">
                  <?php echo e($employees->nationality ?? ''); ?>

                </p>
                <hr>
                <strong><i class="fas fa-pencil-alt mr-1"></i>Permanent Address In Passport</strong>

                <p class="text-muted">
                  <?php echo e($employees->permanent_add_in_passport ?? ''); ?>

                </p>
                <hr>
                <strong><i class="fas fa-pencil-alt mr-1"></i>Father Name</strong>

                <p class="text-muted">
                  <?php echo e($employees->father_name ?? ''); ?>

                </p>
                <hr>
                <strong><i class="fas fa-pencil-alt mr-1"></i>Mother Name</strong>

                <p class="text-muted">
                  <?php echo e($employees->mother_name ?? ''); ?>

                </p>
                <hr>
                <strong><i class="fas fa-pencil-alt mr-1"></i>PP Personal No</strong>

                <p class="text-muted">
                  <?php echo e($employees->pp_personal_no ?? ''); ?>

                </p>
                <hr>
                <strong><i class="fas fa-pencil-alt mr-1"></i>NIC Card No</strong>

                <p class="text-muted">
                  <?php echo e($employees->nic_card_no ?? ''); ?>

                </p>
                <hr>
                <strong><i class="fas fa-pencil-alt mr-1"></i>NIC Expiry</strong>

                <p class="text-muted">
                  <?php echo e($employees->nic_expiry ?? ''); ?>

                </p>
              </div>
            </div>
            <div class="tab-pane " id="tab_2">
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i>
                  Entry Permit No</strong>

                <p class="text-muted">
                  <?php echo e($employees->entry_permit_no ?? ''); ?>

                </p>
                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Entry Permit Date</strong>
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
                <strong><i class="fas fa-book mr-1"></i>Email</strong>
                <p class="text-muted">
                  <?php echo e($employees->email ?? ''); ?>

                </p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i>Contact</strong>

                <p class="text-muted">
                  <?php echo e($employees->contact ?? ''); ?>

                </p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i> Whatsapp Number</strong>

                <p class="text-muted">
                  <?php echo e($employees->whatsapp_no ?? ''); ?>

                </p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i> IMO No</strong>

                <p class="text-muted">
                  <?php echo e($employees->imo_no ?? ''); ?>

                </p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i> Facebook</strong>

                <p class="text-muted">
                  <?php echo e($employees->facebook ?? ''); ?>

                </p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i> Permanent Contact Name</strong>

                <p class="text-muted">
                  <?php echo e($employees->permanent_contact_name ?? ''); ?>

                </p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i> Permanent Contact Number</strong>

                <p class="text-muted">
                  <?php echo e($employees->permanent_contact_no ?? ''); ?>

                </p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i> Permanent Contact Relation</strong>

                <p class="text-muted">
                  <?php echo e($employees->permanent_contact_relation ?? ''); ?>

                </p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i> UAE Emergency Contact Name</strong>

                <p class="text-muted">
                  <?php echo e($employees->uae_emergency_contact_name ?? ''); ?>

                </p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i> UAE Emergency Contact No.</strong>

                <p class="text-muted">
                  <?php echo e($employees->uae_emergency_contact_no ?? ''); ?>

                </p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i> Emergency Cont. Relation</strong>

                <p class="text-muted">
                  <?php echo e($employees->permanent_contact_relation ?? ''); ?>

                </p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i> Emergency Cont. Per. Address</strong>

                <p class="text-muted">
                  <?php echo e($employees->uae_emergency_contact_address ?? ''); ?>

                </p>
              </div>
            </div>

            <div class="tab-pane " id="tab_4">
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i>Bank Name</strong>

                <p class="text-muted">
                  <?php echo e($banks[0]->bank_name ?? ""); ?>

                </p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i> Branch</strong>

                <p class="text-muted">
                  <?php echo e($banks[0]->branch_name ?? ""); ?>

                </p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i> Account Type</strong>

                <p class="text-muted">
                  <?php echo e($banks[0]->account_type ?? ""); ?>

                </p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i> Account Name</strong>

                <p class="text-muted">
                  <?php echo e($banks[0]->account_name ?? ""); ?>

                </p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i> Account No</strong>

                <p class="text-muted">
                  <?php echo e($banks[0]->account_number ?? ""); ?>

                </p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i> IBAN</strong>

                <p class="text-muted">
                  <?php echo e($banks[0]->iban ?? ""); ?>

                </p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i>Swift</strong>

                <p class="text-muted">
                  <?php echo e($banks[0]->swift ?? ""); ?>

                </p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i>Credit/Debit Card No</strong>

                <p class="text-muted">
                  <?php echo e($banks[0]->card_no ?? ""); ?>

                </p>
              </div>
            </div>

            <div class="tab-pane " id="tab_5">
              <div class="card-body">

                <strong><i class="fas fa-book mr-1"></i> Work Permit No</strong>
                <p class="text-muted">
                  <?php echo e($employees->work_permit_no ?? ''); ?>

                </p>
                <hr>

                <strong><i class="fas fa-book mr-1"></i> Personal No</strong>
                <p class="text-muted">
                  <?php echo e($employees->personal_no ?? ''); ?>

                </p>
                <hr>

                <strong><i class="fas fa-book mr-1"></i> Work Permit Expiry</strong>
                <p class="text-muted">
                  <?php echo e($employees->work_permit_expiry ?? ''); ?>

                </p>
              </div>
            </div>

            <div class="tab-pane " id="tab_6">
              <div class="card-body">

                <strong><i class="fas fa-book mr-1"></i>Blood Group</strong>
                <p class="text-muted">
                  <?php echo e($employees->blood_group ?? ''); ?>

                </p>
                <hr>

                <strong><i class="fas fa-book mr-1"></i>Height</strong>
                <p class="text-muted">
                  <?php echo e($employees->height ?? ''); ?>

                </p>
                <hr>

                <strong><i class="fas fa-book mr-1"></i>Medical Issues</strong>
                <p class="text-muted">
                  <?php echo e($employees->medical_issues ?? ''); ?>

                </p>
              </div>
            </div>
            <div class="tab-pane " id="tab_7">
              <div class="card-body">

                <strong><i class="fas fa-book mr-1"></i> Resigned</strong>
                <p class="text-muted">
                  <?php echo e($employees->status == 1? 'In Service' : 'Resigned'); ?>

                </p>
                <hr>

                <strong><i class="fas fa-book mr-1"></i> Active</strong>
                <p class="text-muted">
                  <?php echo e($employees->status == 1? 'True' : 'False'); ?>

                </p>
              </div>
            </div>
            <div class="tab-pane " id="tab_8">
              <div class="card-body">

                <strong><i class="fas fa-book mr-1"></i>Document category</strong>
                <p class="text-muted">
                  <?php echo e($documents[0]->document_category ?? ''); ?>

                </p>
                <hr>

                <strong><i class="fas fa-book mr-1"></i>Document name</strong>
                <p class="text-muted">
                  <?php echo e($documents[0]->document_name ?? ''); ?>

                </p>
                <hr>

                <strong><i class="fas fa-book mr-1"></i> Attachemnt</strong>
                <p class="text-muted">

                  <a href="<?php echo e(url('/')); ?>/public/Employee/<?php echo e($documents[0]->attachment ?? ''); ?>" target="_blank">
                    <?php echo e($documents[0]->attachment ?? ''); ?> </a>
                </p>
                <hr>

                <strong><i class="fas fa-book mr-1"></i>Document expiry</strong>
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchisty-main\resources\views/EmployeeMaster/EmployeeDetails.blade.php ENDPATH**/ ?>