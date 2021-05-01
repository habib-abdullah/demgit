<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12 mb-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="<?php echo e(route('Client')); ?>" style="font-size: 18px;"><i class="fas fa-arrow-circle-left"></i>
                            Back </a>
                    </h3>
                    <h3 class="h3 text-center text-bold text-uppercase"> <?php echo e($clients[0]->company_name); ?></h3>
                    <h3 class="h5 text-center text-capitalize"> <?php echo e($clients[0]->company_address); ?></h3>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <!-- <img class="profile-user-img img-fluid img-circle" src=""
                                alt="User profile picture"> -->
                            </div>

                            <!-- <h3 class="h3 text-center text-bold text-uppercase"> hello</h3> -->

                            <p class="text-muted text-center"></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <!-- <li class=" text-center text-capitalize"  style="list-style:none; font-size: 18px; font-weight: 600;">
                                hello
                                <hr>
                                </li> -->
                                <li class="" style="visibility:hidden;"></li>
                                <li class=" text-capitalize" style="list-style:none;">
                                    <b> Mobile </b>
                                    <!-- <i class="fas fa-mobile-alt  m-0 p-0" style="font-size:46px;"></i> -->
                                    <a class="float-right"><?php echo e($clients[0]->company_mobile); ?></a>
                                    <hr>
                                </li>
                                <li class=" text-capitalize" style="list-style:none;">
                                    <b> Fax </b> <a class="float-right"><?php echo e($clients[0]->company_fax); ?></a>
                                    <!-- <i class="fa fa-fax  m-0 p-0" style="font-size:40px;"></i> -->
                                    <hr>
                                </li>
                                <li class=" text-capitalize" style="list-style:none;">
                                    <b> Email </b> <a class="float-right"><?php echo e($clients[0]->company_email); ?></a>
                                    <!-- <i class="fa fa-envelope  m-0 p-0" style="font-size:46px;"></i> -->
                                    <hr>
                                </li>
                                <li class=" text-capitalize" style="list-style:none;">
                                    <b> Website </b> <a class="float-right"><?php echo e($clients[0]->company_website); ?></a>
                                    <!-- <i class="fa fa-globe m-0 p-0" style="font-size:46px;"></i> -->
                                    <hr>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <!-- <img class="profile-user-img img-fluid img-circle" src="<?php echo e(url('./public/')); ?>"
              alt="User profile picture"> -->
                            </div>

                            <!-- <h3 class="profile-username text-center text-bold"> Personal Info</h3> -->

                            <p class="text-muted text-center"></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="" style="visibility:hidden;"></li>

                                <li class=" " style="list-style:none;">
                                    <b>Total Orders</b> <a class="float-right"> 0 </a>
                                    <hr>
                                </li>
                                <li class="" style="list-style:none;">
                                    <b>Client Type</b> <a class="float-right"><?php echo e($clients[0]->client_type); ?></a>
                                    <hr>
                                </li>
                                <li class="" style="list-style:none;">
                                    <b>Sales Amount</b> <a class="float-right"> 0 </a>
                                    <hr>
                                </li>
                                <li class="" style="list-style:none;">
                                    <b>Current Status</b> <a
                                        class="float-right"><?php echo e($clients[0]->status == 1 ? 'Active' : "Inactive"); ?></a>
                                    <hr>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-2">
            <div class="card">
                <div class="card-header d-flex p-0">
                    <ul class="nav nav-pills mr-auto p-2">
                        <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">
                                <i class="fas fa-user  m-0 pr-2" style="font-size:18px;"></i>Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">
                                <i class="fas fa-shopping-cart  m-0 pr-2" style="font-size:18px;"></i>Sales</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">
                                <i class="fas fa-shopping-cart  m-0 pr-2" style="font-size:18px;"></i>Purchase</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">
                                <i class="fas fa-address-book  m-0 pr-2" style="font-size:18px;"></i>Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">
                                <i class="fas fa-building  m-0 pr-2" style="font-size:18px;"></i>Banks</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_6" data-toggle="tab">
                                <i class="fas fa-file  m-0 pr-2" style="font-size:18px;"></i>Business Document</a></li>
                    </ul>
                </div>
                <div class="card-body box-profile p-0">
                    <div class="tab-content">
                        <!-- profile  -->
                        <div class="tab-pane active " id="tab_1">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <!-- <thead>
                                    <tr>
                                    <th>Order ID</th>
                                    <th>Item</th>
                                    <th>Status</th>
                                    <th>Popularity</th>
                                    </tr>
                                    </thead> -->
                                    <tbody>
                                        <tr>
                                            <td class="text-bold">
                                                <p href="javascript:void(0)">Client Name</p>
                                            </td>
                                            <td class="text-capitalize"> : <?php echo e($clients[0]->client_name ?? ""); ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold">
                                                <p href="javascript:void(0)">Company Name</p>
                                            </td>
                                            <td class="text-capitalize"> : <?php echo e($clients[0]->company_name ?? ""); ?></td>

                                        </tr>
                                        <tr>
                                            <td class="text-bold">
                                                <p href="javascript:void(0)">Code</p>
                                            </td>
                                            <td class="text-capitalize"> : <?php echo e($clients[0]->client_code ?? ""); ?></td>

                                        </tr>
                                        <tr>
                                            <td class="text-bold">
                                                <p href="javascript:void(0)">Phone</p>
                                            </td>
                                            <td class="text-capitalize"> : <?php echo e($clients[0]->company_phone ?? ""); ?></td>

                                        </tr>
                                        <tr>
                                            <td class="text-bold">
                                                <p href="javascript:void(0)">Mobile</p>
                                            </td>
                                            <td class="text-capitalize"> : <?php echo e($clients[0]->company_mobile ?? ""); ?></td>

                                        </tr>
                                        <tr>
                                            <td class="text-bold">
                                                <p href="javascript:void(0)">Address</p>
                                            </td>
                                            <td class="text-capitalize"> : <?php echo e($clients[0]->company_address ?? ""); ?></td>

                                        </tr>
                                        <tr>
                                            <td class="text-bold">
                                                <p href="javascript:void(0)">Trade License Register Authority</p>
                                            </td>
                                            <td class="text-capitalize"> :
                                                <?php echo e($clients[0]->trade_license_register_authority ?? ""); ?></td>

                                        </tr>
                                        <tr>
                                            <td class="text-bold">
                                                <p href="javascript:void(0)">Trade License Number</p>
                                            </td>
                                            <td class="text-capitalize"> : <?php echo e($clients[0]->trade_license_number ?? ""); ?>

                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="text-bold">
                                                <p href="javascript:void(0)">TRN Number</p>
                                            </td>
                                            <td class="text-capitalize"> : <?php echo e($clients[0]->trn_number ?? ""); ?></td>

                                        </tr>
                                        <tr>
                                            <td class="text-bold">
                                                <p href="javascript:void(0)">Trade License Issue Date</p>
                                            </td>
                                            <td class="text-capitalize"> :
                                                <?php echo e($clients[0]->trade_license_issue_date ?? ""); ?></td>

                                        </tr>
                                        <tr>
                                            <td class="text-bold">
                                                <p href="javascript:void(0)">Trade License Expiry Date</p>
                                            </td>
                                            <td class="text-capitalize"> :
                                                <?php echo e($clients[0]->trade_license_expiry_date ?? ""); ?></td>

                                        </tr>
                                        <tr>
                                            <td class="text-bold">
                                                <p href="javascript:void(0)">Credit Duration</p>
                                            </td>
                                            <td class="text-capitalize">: <?php echo e($clients[0]->credit_duration ?? ""); ?></td>

                                        </tr>
                                        <tr>
                                            <td class="text-bold">
                                                <p href="javascript:void(0)">Balance Limit</p>
                                            </td>
                                            <td class="text-capitalize"> : <?php echo e($clients[0]->balance_limit ?? ""); ?></td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Sales -->
                        <div class="tab-pane " id="tab_2">
                            <div class="col-lg-11">
                                <div class="table-responsive mb-5">
                                    <div class="table-responsive">
                                        <table id="SalesDataTable" class="table table-bordered" width="100%"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Sr No</th>
                                                    <th>Subject</th>
                                                    <th>Contact Details</th>
                                                    <th>Delivery Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Purchase datatable -->
                        <div class="tab-pane " id="tab_3">
                            <h3 class="text-center my-5">Coming Soon</h3>
                            <!-- <div class="table-responsive">
                            <div class="table-responsive">
                            <table id="DataTable" class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Sr No</th>
                                    <th>Subject</th>
                                    <th>Contact Details</th>
                                    <th>Delivery Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            </table>
                            </div>
                        </div> -->
                        </div>
                        <!-- COntact datatable -->
                        <div class="tab-pane " id="tab_4">
                            <div class="col-lg-11">
                                <div class="table-responsive">
                                    <button class="btn btn-primary m-2 px-3" data-toggle="modal"
                                        data-target="#addContactModal">Add
                                        Contact</button>
                                    <div class="table-responsive">
                                        <table id="ContactDataTable" class="table table-bordered" width="100%"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Designation</th>
                                                    <th>Name</th>
                                                    <th>Alias</th>
                                                    <th>Mobile</th>
                                                    <th>Phone</th>
                                                    <th>Ext</th>
                                                    <th>Email</th>
                                                    <th>Department</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Banks datatable -->
                        <div class="tab-pane " id="tab_5">
                            <div class="col-lg-11">
                                <div class="table-responsive">
                                    <button class="btn btn-primary m-2 px-3" data-toggle="modal"
                                        data-target="#addBankModal">Add
                                        Bank</button>
                                    <div class="table-responsive">
                                        <table id="BankDataTable" class="table table-bordered" width="100%"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Bank Name</th>
                                                    <th>Branch</th>
                                                    <th>Account Name</th>
                                                    <th>Account Number</th>
                                                    <th>Swift Code</th>
                                                    <th>Iban</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- busines documents -->
                        <div class="tab-pane " id="tab_6">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <!-- <thead>
                                    <tr>
                                    <th>Order ID</th>
                                    <th>Item</th>
                                    <th>Status</th>
                                    <th>Popularity</th>
                                    </tr>
                                    </thead> -->
                                    <tbody>
                                        <?php if(count($documents) > 0): ?>
                                        <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-bold">
                                                <p href="javascript:void(0)"><?php echo e($document->document_name); ?> </p>
                                            </td>
                                            <!-- <td class="">
                                                :
                                            </td> -->
                                            <td> : <a target="_blank"
                                                    href="<?php echo e(url('/public/Client/ClientDocuments/')); ?>/<?php echo e($document->document_file); ?>"><?php echo e($document->document_file); ?></a>
                                            </td>
                                            <td><Button type="button" id="" class="btnRemove btn btn-danger"
                                                    value="<?php echo e($document->document_id); ?>"><i
                                                        class="fas fa-trash"></i></Button></td>

                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                        <tr>
                                            <td class="text-bold">
                                                <p class="">There is no data yet</p>
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.table-responsive -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- add client contact modal -->
<div class="modal fade" id="addContactModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-primary">
            <div class="modal-header">
                <h4 class="modal-title">Add Contact</h4>
            </div>
            <div class="modal-body">
                <form id="ContactStoreForm">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" value="<?php echo e($clients[0]->client_id); ?>" id="client_id" name="client_id">
                    <div class="form-group">
                        <!-- <span class="" style="color:red; font-size: 22px; font-weight: bolder;"> * </span> -->
                        <label>Designation</label>
                        <input type="text" class="form-control form-control-user border-primary required"
                            placeholder="Enter contact designation" id="contact_designation" name="contact_designation"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <!-- <span class="" style="color:red; font-size: 22px; font-weight: bolder;"> * </span> -->
                        <label>Title</label>
                        <select class="form-control" name="title" id="title">
                            <option selected value="Mr">Mr</option>
                            <option value="Miss">Miss</option>
                            <option value="Mrs">Mrs</option>
                            <option value="Engr">Engr</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <!-- <span class="" style="color:red; font-size: 22px; font-weight: bolder;"> * </span> -->
                        <label>Name</label>
                        <input type="text" class="form-control form-control-user border-primary required"
                            placeholder="Enter contact name" id="contact_name" name="contact_name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <!-- <span class="" style="color:red; font-size: 22px; font-weight: bolder;"> * </span> -->
                        <label>Alias</label>
                        <input type="text" class="form-control form-control-user border-primary required"
                            placeholder="Enter contact alias" id="contact_alias" name="contact_alias"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <!-- <span class="" style="color:red; font-size: 22px; font-weight: bolder;"> * </span> -->
                        <label>Mobile</label>
                        <input type="text" class="form-control form-control-user border-primary required"
                            placeholder="Enter contact mobile" id="contact_mobile" name="contact_mobile"
                            autocomplete="off"
                            onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                    </div>
                    <div class="form-group">
                        <!-- <span class="" style="color:red; font-size: 22px; font-weight: bolder;"> * </span> -->
                        <label>Phone</label>
                        <input type="text" class="form-control form-control-user border-primary required"
                            placeholder="Enter contact phone" id="contact_phone" name="contact_phone" autocomplete="off"
                            onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                    </div>
                    <div class="form-group">
                        <!-- <span class="" style="color:red; font-size: 22px; font-weight: bolder;"> * </span> -->
                        <label>Ext</label>
                        <input type="text" class="form-control form-control-user border-primary required"
                            placeholder="Enter contact ext" id="contact_ext" name="contact_ext" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <!-- <span class="" style="color:red; font-size: 22px; font-weight: bolder;"> * </span> -->
                        <label>Email</label>
                        <input type="email" class="form-control form-control-user border-primary required"
                            placeholder="Enter contact email" id="contact_email" name="contact_email"
                            autocomplete="off">
                    </div>

                    <div class="form-group">
                        <!-- <span class="" style="color:red; font-size: 22px; font-weight: bolder;"> * </span> -->
                        <label>Department</label>
                        <input type="text" class="form-control form-control-user border-primary required"
                            placeholder="Enter contact department" id="contact_department" name="contact_department"
                            autocomplete="off">
                    </div>
                </form>
            </div>
            <div class="modal-footer ">
                <div class="form-row mt-3 mx-auto">
                    <div class="form-group text-center">
                        <span id="show_error" style="display: none;" class="m-auto"></span>
                    </div>
                </div>
            </div>
            <div>
                <div class="modal-footer">
                    <span id="error_area" style="display: none;" class="m-auto"></span>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="btnSubmit" onclick="ContactStore()"
                        class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- add client edit contact modal -->
<div class="modal fade" id="editContactModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-primary">
            <div class="modal-header">
                <h4 class="modal-title">Edit Contact</h4>
            </div>
            <div class="modal-body">
                <form id="ContactEditForm">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="contacts_id" name="contacts_id">
                    <div class="form-group">
                        <!-- <span class="" style="color:red; font-size: 22px; font-weight: bolder;"> * </span> -->
                        <label>Designation</label>
                        <input type="text" class="form-control form-control-user border-primary contact_input"
                            placeholder="Enter contact designation" id="contacts_designation"
                            name="contacts_designation" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <!-- <span class="" style="color:red; font-size: 22px; font-weight: bolder;"> * </span> -->
                        <label>Title</label>
                        <select class="form-control" name="titles" id="titles">
                            <option value="Mr">Mr</option>
                            <option value="Miss">Miss</option>
                            <option value="Mrs">Mrs</option>
                            <option value="Engr">Engr</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <!-- <span class="" style="color:red; font-size: 22px; font-weight: bolder;"> * </span> -->
                        <label>Name</label>
                        <input type="text" class="form-control form-control-user border-primary contact_input"
                            placeholder="Enter contact name" id="contacts_name" name="contacts_name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <!-- <span class="" style="color:red; font-size: 22px; font-weight: bolder;"> * </span> -->
                        <label>Alias</label>
                        <input type="text" class="form-control form-control-user border-primary contact_input"
                            placeholder="Enter contact alias" id="contacts_alias" name="contacts_alias"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <!-- <span class="" style="color:red; font-size: 22px; font-weight: bolder;"> * </span> -->
                        <label>Mobile</label>
                        <input type="text" class="form-control form-control-user border-primary contact_input"
                            placeholder="Enter contact mobile" id="contacts_mobile" name="contacts_mobile"
                            autocomplete="off"
                            onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                    </div>
                    <div class="form-group">
                        <!-- <span class="" style="color:red; font-size: 22px; font-weight: bolder;"> * </span> -->
                        <label>Phone</label>
                        <input type="text" class="form-control form-control-user border-primary contact_input"
                            placeholder="Enter contact phone" id="contacts_phone" name="contacts_phone"
                            autocomplete="off"
                            onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                    </div>
                    <div class="form-group">
                        <!-- <span class="" style="color:red; font-size: 22px; font-weight: bolder;"> * </span> -->
                        <label>Ext</label>
                        <input type="text" class="form-control form-control-user border-primary contact_input"
                            placeholder="Enter contact ext" id="contacts_ext" name="contacts_ext" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <!-- <span class="" style="color:red; font-size: 22px; font-weight: bolder;"> * </span> -->
                        <label>Email</label>
                        <input type="email" class="form-control form-control-user border-primary contact_input"
                            placeholder="Enter contact email" id="contacts_email" name="contacts_email"
                            autocomplete="off">
                    </div>

                    <div class="form-group">
                        <!-- <span class="" style="color:red; font-size: 22px; font-weight: bolder;"> * </span> -->
                        <label>Department</label>
                        <input type="text" class="form-control form-control-user border-primary contact_input"
                            placeholder="Enter contact department" id="contacts_department" name="contacts_department"
                            autocomplete="off">
                    </div>
                </form>
            </div>
            <div class="modal-footer ">
                <div class="form-row mt-3 mx-auto">
                    <div class="form-group text-center">
                        <span id="contact_edit_show_error" style="display: none;" class="m-auto"></span>
                    </div>
                </div>
            </div>
            <div>
                <div class="modal-footer">
                    <span id="error_area" style="display: none;" class="m-auto"></span>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="btnUpdate" onclick="ContactUpdate()"
                        class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- add client bank modal -->
<div class="modal fade" id="addBankModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-primary">
            <div class="modal-header">
                <h4 class="modal-title">Add Bank</h4>
            </div>
            <div class="modal-body">
                <form id="BankStoreForm">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" value="<?php echo e($clients[0]->client_id); ?>" id="client_id" name="client_id">
                    <div class="form-group">
                        <label>Bank Name</label>
                        <input type="text" class="form-control form-control-user border-primary bank_mandatory"
                            placeholder="Enter bank name" id="bank_name" name="bank_name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Account Name</label>
                        <input type="text" class="form-control form-control-user border-primary bank_mandatory"
                            placeholder="Enter account ame" id="account_name" name="account_name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Account Number</label>
                        <input type="text" class="form-control form-control-user border-primary bank_mandatory"
                            placeholder="Enter account number" id="account_number" name="account_number"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Branch</label>
                        <input type="text" class="form-control form-control-user border-primary bank_mandatory"
                            placeholder="Enter bank branch" id="bank_branch" name="bank_branch">
                    </div>
                    <div class="form-group">
                        <label>Swift</label>
                        <input type="text" class="form-control form-control-user border-primary bank_mandatory"
                            placeholder="Enter swift code" id="bank_swift" name="bank_swift">
                    </div>
                    <div class="form-group">
                        <label>IBAN</label>
                        <input type="text" class="form-control form-control-user border-primary bank_mandatory"
                            placeholder="Enter iban " id="bank_iban" name="bank_iban" autocomplete="off">
                    </div>
                </form>
            </div>
            <div class="modal-footer ">
                <div class="form-row mt-3 mx-auto">
                    <div class="form-group text-center">
                        <span id="bank_error_area" style="display: none;" class="m-auto"></span>
                    </div>
                </div>
            </div>
            <div>
                <div class="modal-footer">
                    <span id="" style="display: none;" class="m-auto"></span>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="btnSubmitBank" onclick="BankStore()"
                        class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- add client edit bank modal -->
<div class="modal fade" id="editBankModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-primary">
            <div class="modal-header">
                <h4 class="modal-title">Edit Bank</h4>
            </div>
            <div class="modal-body">
                <form id="BankEditForm">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="banks_id" name="banks_id">
                    <div class="form-group">
                        <label>Bank Name</label>
                        <input type="text" class="form-control form-control-user border-primary bank_edit_input"
                            placeholder="Enter bank name" id="banks_name" name="banks_name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Account Name</label>
                        <input type="text" class="form-control form-control-user border-primary bank_edit_input"
                            placeholder="Enter account ame" id="accounts_name" name="accounts_name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Account Number</label>
                        <input type="text" class="form-control form-control-user border-primary bank_edit_input"
                            placeholder="Enter account number" id="accounts_number" name="accounts_number"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Branch</label>
                        <input type="text" class="form-control form-control-user border-primary bank_edit_input"
                            placeholder="Enter bank branch" id="banks_branch" name="banks_branch">
                    </div>
                    <div class="form-group">
                        <label>Swift</label>
                        <input type="text" class="form-control form-control-user border-primary bank_edit_input"
                            placeholder="Enter swift code" id="banks_swift" name="banks_swift">
                    </div>
                    <div class="form-group">
                        <label>IBAN</label>
                        <input type="text" class="form-control form-control-user border-primary bank_edit_input"
                            placeholder="Enter iban " id="banks_iban" name="banks_iban" autocomplete="off">
                    </div>
                </form>
            </div>
            <div class="modal-footer ">
                <div class="form-row mt-3 mx-auto">
                    <div class="form-group text-center">
                        <span id="bank_edit_show_error" style="display: none;" class="m-auto"></span>
                    </div>
                </div>
            </div>
            <div>
                <div class="modal-footer">
                    <span id="" style="display: none;" class="m-auto"></span>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="btnBankUpdate" onclick="BankUpdate()"
                        class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <input type="text" name="document_id"> -->

<script src="<?php echo e(url('public/plugins/jquery/jquery.min.js')); ?>"></script>
<script type="text/javascript">
var tables = '';
$(function() {

    var tables = $("#ContactDataTable").DataTable({
        "autoWidth": true,
        "responsive": true,
        dom: 'lBfrtip',
        buttons: [
            // 'excel', 'print'
            // { "extend": 'pageLength', "className": 'btn btn-default btn-sm px-4' },
            {
                "extend": 'excel',
                "text": 'Export',
                "className": 'btn btn-default btn-sm px-4 mx-1'
            },
            {
                "extend": 'print',
                "text": 'Print',
                "className": 'btn btn-default btn-sm px-4 mx-1'
            }
        ],
        "processing": true,
        "serverSide": true,
        ajax: {
            url: "<?php echo e(route('Client-Contact-Show')); ?>",
            data: {
                client_id: "<?=$clients[0]->client_id?>"
            }
        },
        columns: [
            // {
            //   data: 'client_id',
            //   'searchable': false,
            //   'orderable': true,
            //   'class': 'text-center'
            // },
            {
                data: 'contact_designation',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'contact_name',
                'searchable': true,
                'orderable': true,
                'class': 'text-center'
            },
            {
                data: 'contact_alias',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'contact_mobile',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'contact_phone',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'contact_ext',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'contact_email',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },

            {
                data: 'contact_department',
                'searchable': true,
                'orderable': true,
                'class': 'text-center'
            },
            {
                data: 'action',
                'searchable': false,
                'orderable': false,
                'class': 'text-center'
            }
        ]
    });

    var tables = $("#BankDataTable").DataTable({
        "autoWidth": true,
        "responsive": true,
        dom: 'lBfrtip',
        buttons: [
            // 'excel', 'print'
            // { "extend": 'pageLength', "className": 'btn btn-default btn-sm px-4' },
            {
                "extend": 'excel',
                "text": 'Export',
                "className": 'btn btn-default btn-sm px-4 mx-1'
            },
            {
                "extend": 'print',
                "text": 'Print',
                "className": 'btn btn-default btn-sm px-4 mx-1'
            }
        ],
        "processing": true,
        "serverSide": true,
        ajax: {
            url: "<?php echo e(route('Client-Bank-Show')); ?>",
            data: {
                client_id: "<?=$clients[0]->client_id?>"
            }
        },
        columns: [{
                data: 'bank_name',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'account_name',
                'searchable': true,
                'orderable': true,
                'class': 'text-center'
            },
            {
                data: 'account_number',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'bank_branch',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'bank_swift',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'bank_iban',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },

            {
                data: 'action',
                'searchable': false,
                'orderable': false,
                'class': 'text-center'
            }
        ]
    });

});

function ContactStore() {
    var fields = $("input[class*='required']");
    // console.log(fields.val());
    for (let i = 0; i <= fields.length; i++) {
        // console.log(fields);
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('id');
            var value = currentElement.replaceAll('_', ' ');
            $("#show_error").removeClass().html('');
            $("#show_error").show().addClass('alert alert-danger').html('The ' + value + ' field is required.');
            return false;
        } else {
            $("#show_error").hide().removeClass().html('');
        }
    }

    $("#btnSubmit").prop("disabled", true);
    $.ajax({
        type: "POST",
        url: "<?php echo e(route('Client-Contact-Store')); ?>",
        data: $("#ContactStoreForm").serialize(),
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btnSubmit").prop("disabled", false);
            $("#show_error").removeClass().html('').show();
            $("#show_error").addClass("alert alert-danger").html(errorThrown);
            return false;
        },
        success: function(data) {
            $("#btnSubmit").prop("disabled", false);
            // console.log(data);
            // return false;
            if (data["success"] == true) {
                $("#show_error").removeClass().html('').show();
                $("#show_error").addClass("alert alert-success").html(data['message']);
                setTimeout(() => {
                    $("#addContactModal").modal('hide');
                    $("#ContactStoreForm")[0].reset();
                    tables = $("#ContactDataTable").dataTable();
                    tables.fnPageChange('first', 1);
                }, 2000);
            } else {
                $("#show_error").removeClass().html('').show();
                $("#show_error").addClass("alert alert-danger").html(data['message'][0]);
                return false;
            }
        }
    });
}

var base_url = "<?php echo e(url('/')); ?>";

function ClientContactEdit(contact_id) {
    var url_book = base_url + "/Admin/Client-Contact-" + contact_id + "-Edit";
    // console.log("# "+url_book);return false;
    $.get(url_book, function(data) {
        // console.log(data[0]);
        // return false;

        $("#contacts_id").val(data[0]['contact_id']);
        $("#contacts_designation").val(data[0]['contact_designation']);
        $("#contacts_name").val(data[0]['contact_name']);
        $("#contacts_alias").val(data[0]['contact_alias']);
        $("#contacts_mobile").val(data[0]['contact_mobile']);
        $("#contacts_phone").val(data[0]['contact_phone']);
        $("#contacts_ext").val(data[0]['contact_ext']);
        $("#contacts_email").val(data[0]['contact_email']);
        $("#contacts_department").val(data[0]['contact_department']);

        $("#editContactModal").modal('show');
    });
}

function ContactUpdate() {
    var fields = $("input[class*='contact_input']");
    // console.log(fields.val());
    for (let i = 0; i <= fields.length; i++) {
        // console.log(fields);
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('name');
            var value = currentElement.replaceAll('_', ' ');
            $("#contact_edit_show_error").removeClass().html('');
            $("#contact_edit_show_error").show().addClass('alert alert-danger').html('The ' + value +
                ' field is required.');
            return false;
        } else {
            $("#contact_edit_show_error").hide().removeClass().html('');
        }
    }

    $("#btnUpdate").prop("disabled", true);
    $.ajax({
        type: "POST",
        url: "<?php echo e(route('Client-Contact-Update')); ?>",
        data: $("#ContactEditForm").serialize(),
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btnUpdate").prop("disabled", false);
            $("#contact_edit_show_error").removeClass().html('').show();
            $("#contact_edit_show_error").addClass("alert alert-danger").html(errorThrown);
            return false;
        },
        success: function(data) {
            $("#btnUpdate").prop("disabled", false);
            // console.log(data);
            // return false;
            if (data["success"] == true) {
                $("#contact_edit_show_error").removeClass().html('').show();
                $("#contact_edit_show_error").addClass("alert alert-success").html(data['message']);
                setTimeout(() => {
                    $("#editContactModal").modal('hide');
                    $("#ContactEditForm")[0].reset();
                    $("#contact_edit_show_error").removeClass().html('').hide();
                    tables = $("#ContactDataTable").dataTable();
                    tables.fnPageChange('first', 1);
                }, 2000);
            } else {
                $("#contact_edit_show_error").removeClass().html('').show();
                $("#contact_edit_show_error").addClass("alert alert-danger").html(data['message'][0]);
                return false;
            }
        }
    });
}

function ClientContactRemove(contact_id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.get("<?php echo e(route('Client-Contact-Remove')); ?>", {
                contact_id: contact_id
            }, function(data) {
                // console.log(data);
                // return false;
                if (data['success'] == true) {
                    swal("Poof! Contact has been deleted!", {
                        icon: "success",
                    });
                    //toastr.success('Employee Bank Detail Removed Successfully..')
                    let ContactDataTable = $("#ContactDataTable").dataTable();
                    ContactDataTable.fnPageChange('first', 1);
                } else {
                    swal("Oops something went wrong, please check!", {
                        icon: "error",
                    });
                }
            });
        } else {
            swal("Your file is safe!");
        }
    });
}

function BankStore() {
    var fields = $("input[class*='bank_mandatory']");
    // console.log(fields.val());
    for (let i = 0; i <= fields.length; i++) {
        // console.log(fields);
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('id');
            var value = currentElement.replaceAll('_', ' ');
            $("#bank_error_area").removeClass().html('');
            $("#bank_error_area").show().addClass('alert alert-danger').html('The ' + value + ' field is required.');
            return false;
        } else {
            $("#bank_error_area").hide().removeClass().html('');
        }
    }

    $("#btnSubmitBank").prop("disabled", true);
    $.ajax({
        type: "POST",
        url: "<?php echo e(route('Client-Bank-Store')); ?>",
        data: $("#BankStoreForm").serialize(),
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btnSubmitBank").prop("disabled", false);
            $("#bank_error_area").removeClass().html('').show();
            $("#bank_error_area").addClass("alert alert-danger").html(errorThrown);
            return false;
        },
        success: function(data) {
            $("#btnSubmitBank").prop("disabled", false);
            // console.log(data);
            // return false;
            if (data["success"] == true) {
                $("#bank_error_area").removeClass().html('').show();
                $("#bank_error_area").addClass("alert alert-success").html(data['message']);
                setTimeout(() => {
                    $("#addBankModal").modal('hide');
                    $("#BankStoreForm")[0].reset();
                    tables = $("#BankDataTable").dataTable();
                    tables.fnPageChange('first', 1);
                }, 2000);
            } else {
                $("#bank_error_area").removeClass().html('').show();
                $("#bank_error_area").addClass("alert alert-danger").html(data['message'][0]);
                return false;
            }
        }
    });
}

function ClientBankEdit(bank_id) {
    var url_book = base_url + "/Admin/Client-Bank-" + bank_id + "-Edit";
    // console.log("# "+url_book);return false;
    $.get(url_book, function(data) {
        // console.log(data[0]);
        // return false;

        $("#banks_id").val(data[0]['bank_id']);
        $("#clients_id").val(data[0]['client_id']);
        $("#banks_name").val(data[0]['bank_name']);
        $("#accounts_name").val(data[0]['account_name']);
        $("#accounts_number").val(data[0]['account_number']);
        $("#banks_branch").val(data[0]['bank_branch']);
        $("#banks_swift").val(data[0]['bank_swift']);
        $("#banks_iban").val(data[0]['bank_iban']);

        $("#editBankModal").modal('show');
    });
}

function BankUpdate() {
    // alert();
    // return false;
    var fields = $("input[class*='bank_edit_input']");
    // console.log(fields.val());
    for (let i = 0; i <= fields.length; i++) {
        // console.log(fields);
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('name');
            var value = currentElement.replaceAll('_', ' ');
            $("#bank_edit_show_error").removeClass().html('');
            $("#bank_edit_show_error").show().addClass('alert alert-danger').html('The ' + value +
                ' field is required.');
            return false;
        } else {
            $("#bank_edit_show_error").hide().removeClass().html('');
        }
    }

    // console.log('reached');
    // return false;

    $("#btnBankUpdate").prop("disabled", true);
    $.ajax({
        type: "POST",
        url: "<?php echo e(route('Client-Bank-Update')); ?>",
        data: $("#BankEditForm").serialize(),
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btnBankUpdate").prop("disabled", false);
            $("#bank_edit_show_error").removeClass().html('').show();
            $("#bank_edit_show_error").addClass("alert alert-danger").html(errorThrown);
            return false;
        },
        success: function(data) {
            $("#btnBankUpdate").prop("disabled", false);
            // console.log(data);
            // return false;
            if (data["success"] == true) {
                $("#bank_edit_show_error").removeClass().html('').show();
                $("#bank_edit_show_error").addClass("alert alert-success").html(data['message']);
                setTimeout(() => {
                    $("#editBankModal").modal('hide');
                    $("#BankEditForm")[0].reset();
                    $("#bank_edit_show_error").removeClass().html('').hide();
                    tables = $("#BankDataTable").dataTable();
                    tables.fnPageChange('first', 1);
                }, 2000);
            } else {
                $("#bank_edit_show_error").removeClass().html('').show();
                $("#bank_edit_show_error").addClass("alert alert-danger").html(data['message'][0]);
                return false;
            }
        }
    });
}

function ClientBankRemove(bank_id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.get("<?php echo e(route('Client-Bank-Remove')); ?>", {
                bank_id: bank_id
            }, function(data) {
                // console.log(data);
                // return false;
                if (data['success'] == true) {
                    swal("Poof! Bank has been deleted!", {
                        icon: "success",
                    });
                    //toastr.success('Employee Bank Detail Removed Successfully..')
                    let BankDataTable = $("#BankDataTable").dataTable();
                    BankDataTable.fnPageChange('first', 1);
                } else {
                    swal("Oops something went wrong, please check!", {
                        icon: "error",
                    });
                }
            });
        } else {
            swal("Your record is safe!");
        }
    });
}

$(".btnRemove").on('click', function() {
    let check = $(this).attr('id');
    let element = $(this);
    //   console.log($(this).val());
    //   $(this).closest('tr').remove();
    //   return false;
    // $(this).closest('tr').remove();
    // return false;

    var url_edit = base_url + "/Admin/ClientDocument-" + $(this).val() + "-Remove";
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.get(url_edit, {
                document_id: $(this).val()
            }, function(data) {
                console.log(data)
                // return false;
                if (data['success'] == true) {
                    swal("Poof! Document has been deleted successfully!", {
                        icon: "success",
                    });
                    setTimeout(() => {
                        element.closest('tr').remove();
                    }, 1000);
                    //toastr.success('Employee Bank Detail Removed Successfully..')
                } else {
                    swal("Oops something went wrong, please check!", {
                        icon: "error",
                    });
                }
            });
        } else {
            swal("Your record is safe!");
        }
    });
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchishty\resources\views/Client/ClientProfile.blade.php ENDPATH**/ ?>