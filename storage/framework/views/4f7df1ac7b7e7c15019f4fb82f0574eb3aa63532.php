<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12 mb-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                    <?php $backUrl = 'Sales-Inquiry-'.$inquiry[0]->inquiry_id.'-Estimation'; ?>
                        <a href="<?php echo e($backUrl); ?>" style="font-size: 18px;"><i
                                class="fas fa-arrow-circle-left"></i>
                            Back </a>
                    </h3>
                    <h3 class="h3 text-center text-bold text-uppercase"> Inquiry Item Information </h3>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body box-profile">
                            <p class="text-muted text-center"></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="" style="visibility:hidden;"></li>
                                <li class=" text-capitalize" style="list-style:none;">
                                    <b> Unit </b>
                                    <a class="float-right"><?php echo e($items[0]->uom_name); ?></a>
                                    <hr>
                                </li>
                                <li class=" text-capitalize" style="list-style:none;">
                                    <b> Quantity </b> <a class="float-right"><?php echo e($items[0]->item_quantity ?? 0); ?></a>
                                    <hr>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body box-profile">
                            <div class="text-center">
                            </div>
                            <p class="text-muted text-center"></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="" style="visibility:hidden;"></li>
                                <li class="" style="list-style:none;">
                                    <b>Item Description</b> <a class="float-right"><?php echo e($items[0]->item_description); ?></a>
                                    <hr>
                                </li>
                                <li class="" style="list-style:none;">
                                    <b>Note</b> <a
                                        class="float-right"><?php echo e($items[0]->item_note); ?></a>
                                    <hr>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 mb-2">
            <div class="card shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3>Item Estimation Details</h3>
                        </div>
                        <div class="col-lg-6">
                            <ul class="nav nav-tabs float-right" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true">Estimate Matrial</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                        aria-controls="profile" aria-selected="false">Estimate Work Hour</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="text-right">
                                <button type="button" data-toggle="modal" data-target="#MaterialStoreModal"
                                    class="btn btn-primary">Add Material</button>
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="table-responsive">
                                    <table id="MaterialTable" class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="d-none">UID</th>
                                                <th>Required Material</th>
                                                <th>Material Grade</th>
                                                <th>Est Mat Cost/Unit</th>
                                                <th>Unit</th>
                                                <th>Order Qty</th>
                                                <th>Est. Qty/Unit</th>
                                                <th>Total Est. Qty</th>
                                                <th>Total Mat. Cost</th>
                                                <th>Gross Total</th>
                                                <th>Vat</th>
                                                <th>Net Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="text-right">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#HourStoreModal">Add
                                    Time Estimate</button>
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="table-responsive">
                                    <table id="HourTable" class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="d-none">UID</th>
                                                <th>Description</th>
                                                <th>Total Estimated Qty</th>
                                                <th>Est.Req Work/Hour</th>
                                                <th>Per Hour Cost</th>
                                                <th>Total Working Hour</th>
                                                <th>Total Hour Cost</th>
                                                <th>Gross Total</th>
                                                <th>Vat</th>
                                                <th>Net Total </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="MaterialStoreModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Item Material Estimation Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Insert Form  -->
                <form id="MaterialStoreForm">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <input type="hidden" class="form-control" name="item_id" id="item_id" value="<?php echo e($item_id); ?>">
                        <input type="hidden" class="form-control" name="inquiry_id" id="inquiry_id">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Required Material</label>
                                <input type="text" class="form-control material_required" name="required_material"
                                    id="required_material" placeholder="Required Material">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Order Qty</label>
                                <input type="number" class="form-control material_required" name="order_quantity"
                                    id="quantity" value="<?php echo e($items[0]->item_quantity ?? 0); ?>" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Est. Qty/Unit</label>
                                <input type="number" class="form-control material_required"
                                    name="estimation_quantity_unit" id="estimation_quantity_unit"
                                    placeholder="Estimation Quantity Unit">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Unit</label>
                                <input type="text" class="form-control material_required" name="unit" id="unit"
                                    placeholder="Unit">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Total Estimated Qty</label>
                                <input type="text" class="form-control material_required"
                                    name="total_estimation_quantity" id="total_estimation_quantity"
                                    placeholder="Total Estimated Quantity" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Material Grade</label>
                                <input type="text" class="form-control material_required" name="material_grade"
                                    id="material_grade" placeholder="Material Grade">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Est. Mat Cost/unit</label>
                                <input type="text" class="form-control material_required" name="estimation_cost_unit"
                                    id="estimation_cost_unit" placeholder="Estimation Cost/Unit">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Total Material Cost</label>
                                <input type="text" class="form-control material_required" name="total_material_cost"
                                    id="total_material_cost" placeholder="Total Material Cost" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gross Total</label>
                                <input type="text" class="form-control material_required" name="gross_total"
                                    id="gross_total" placeholder="Gross Total" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Vat ( 5% )</label>
                                <input type="text" class="form-control material_required" name="vat_total"
                                    id="vat_total" placeholder="Vat" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Net Total</label>
                                <input type="text" class="form-control material_required" name="net_total"
                                    id="net_total" placeholder="Net Total" readonly="readonly">
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Insert Form  -->
            </div>
            <span id="material_show_error" style="display: none; text-align:center; margin:20px;" class="m-auto"></span>
            <div class="modal-footer">
                <button id="btnItemSubmit" type="button" class="btn btn-primary"
                    onclick="EstimationMaterialStore()">Submit</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="MaterialEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Item Material Estimation Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Insert Form  -->
                <form id="MaterialEditForm">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <input type="hidden" class="form-control" name="item_id" id="item_id" value="<?php echo e($item_id); ?>">
                        <input type="hidden" class="form-control" name="material_id" id="material_id">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Required Material</label>
                                <input type="text" class="form-control material_edit_required" name="required_material"
                                    id="edit_required_material" placeholder="Required Material">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Order Qty</label>
                                <input type="text" class="form-control material_edit_required" name="order_quantity"
                                    id="edit_quantity" placeholder="Order Quantity" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Est. Qty/Unit</label>
                                <input type="text" class="form-control material_edit_required"
                                    name="estimation_quantity_unit" id="edit_estimated_quantity_unit"
                                    placeholder="Estimation Quantity Unit">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Unit</label>
                                <input type="text" class="form-control material_edit_required" name="unit" id="edit_unit"
                                    placeholder="Unit">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Total Estimated Qty</label>
                                <input type="text" class="form-control material_edit_required"
                                    name="total_estimation_quantity" id="edit_total_estimated_quantity"
                                    placeholder="Total Estimated Quantity" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Material Grade</label>
                                <input type="text" class="form-control material_edit_required" name="material_grade"
                                    id="edit_material_grade" placeholder="Material Grade">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Est. Mat Cost/unit</label>
                                <input type="text" class="form-control material_edit_required" name="estimation_cost_unit"
                                    id="edit_estimated_material_cost_unit" placeholder="Estimation Cost/Unit">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Total Material Cost</label>
                                <input type="text" class="form-control material_edit_required" name="total_material_cost"
                                    id="edit_total_material_cost" placeholder="Total Material Cost" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gross Total</label>
                                <input type="text" class="form-control material_edit_required" name="gross_total"
                                    id="edit_gross_total" placeholder="Gross Total" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Vat ( 5% )</label>
                                <input type="text" class="form-control material_edit_required" name="vat_total"
                                    id="edit_vat_total" placeholder="Vat" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Net Total</label>
                                <input type="text" class="form-control material_edit_required" name="net_total"
                                    id="edit_net_total" placeholder="Net Total" readonly="readonly">
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Insert Form  -->
            </div>
            <span id="edit_material_show_error" style="display: none; text-align:center; margin:20px;" class="m-auto"></span>
            <div class="modal-footer">
                <button id="btnItemSubmit" type="button" class="btn btn-primary"
                    onclick="EstimationMaterialUpdate()">Update</button>
            </div>
        </div>
    </div>
</div>

<!-- Estimation Hour Modals -->
<div class="modal fade" id="HourStoreModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Item Work Hours Estimation Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Insert Form  -->
                <form id="HourStoreFrom">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <input type="hidden" class="form-control" name="item_id" id="item_id" value="<?php echo e($item_id); ?>">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control hour_required" name="hour_descriptions"
                                    id="hour_descriptions" placeholder="Description">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Order Qty</label>
                                <input type="text" class="form-control hour_required" name="order_quantity"
                                    id="order_quantity" placeholder="Order Quantity" value="<?php echo e($items[0]->item_quantity ?? 0); ?>" readonly="readonly">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Est. Req Work hrs/unit</label>
                                <input type="text" class="form-control hour_required" name="estimated_requir_work_hour"
                                    id="estimated_requir_work_hour" placeholder="Estiamation required work hour">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Per Hour Cost</label>
                                <input type="text" class="form-control hour_required" name="per_hour_cost"
                                    id="per_hour_cost" placeholder="Per Hour Cost">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Total Working Hour</label>
                                <input type="text" class="form-control hour_required" name="total_work_hour"
                                    id="total_work_hour" placeholder="Total wroking hour" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Total Hours Cost</label>
                                <input type="text" class="form-control hour_required" name="total_hour_cost"
                                    id="total_hour_cost" placeholder="Total hour cost" readonly="readonly">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gross Total</label>
                                <input type="text" class="form-control hour_required" name="gross_total"
                                    id="hour_gross_total" placeholder="Goss total" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Vat</label>
                                <input type="text" class="form-control hour_required" name="vat_total" id="hour_vat_total"
                                    placeholder="Hour vat" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Net Total</label>
                                <input type="text" class="form-control hour_required" name="net_total" id="hour_net_total"
                                    placeholder="Net total" readonly="readonly">
                            </div>
                        </div>

                    </div>
                </form>
                <!-- Insert Form  -->
            </div>
            <span id="hour_show_error" style="display: none; text-align:center; margin:20px;" class="m-auto"></span>
            <div class="modal-footer">
                <button id="btnSubmit" type="button" class="btn btn-primary"
                    onclick="EstimationHourStore()">Submit</button>
            </div>
        </div>
    </div>
</div>


<!-- Estimation Edit/Update Modal -->
<div class="modal fade" id="HourEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Item Work Hours Estimation Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Insert Form  -->
                <form id="HourEditFrom">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <input type="hidden" class="form-control" name="item_id" id="item_id" value="<?php echo e($item_id); ?>">
                        <input type="text" class="form-control" name="hour_id" id="hour_id">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control hour_edit_required" name="hour_descriptions"
                                    id="edit_hour_descriptions" placeholder="Description">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Order Qty</label>
                                <input type="text" class="form-control hour_edit_required" name="order_quantity"
                                    id="edit_order_quantity" placeholder="Order Quantity" readonly="readonly">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Est. Req Work hrs/unit</label>
                                <input type="text" class="form-control hour_edit_required"
                                    name="estimated_requir_work_hour" id="edit_estimated_requir_work_hour"
                                    placeholder="Estiamation required work hour">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Per Hour Cost</label>
                                <input type="text" class="form-control hour_edit_required" name="per_hour_cost"
                                    id="edit_per_hour_cost" placeholder="Per Hour Cost">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Total Working Hour</label>
                                <input type="text" class="form-control hour_edit_required" name="total_work_hour"
                                    id="edit_total_work_hour" placeholder="Total wroking hour" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Total Hours Cost</label>
                                <input type="text" class="form-control hour_edit_required" name="total_hour_cost"
                                    id="edit_total_hour_cost" placeholder="Total hour cost" readonly="readonly">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gross Total</label>
                                <input type="text" class="form-control hour_edit_required" name="gross_total"
                                    id="edit_hour_gross_total" placeholder="Goss total" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Vat</label>
                                <input type="text" class="form-control hour_edit_required" name="vat_total"
                                    id="edit_hour_vat_total" placeholder="Hour vat" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Net Total</label>
                                <input type="text" class="form-control hour_edit_required" name="net_total"
                                    id="edit_hour_net_total" placeholder="Net total" readonly="readonly">
                            </div>
                        </div>

                    </div>
                </form>
                <!-- Insert Form  -->
            </div>
            <span id="edit_hour_show_error" style="display: none; text-align:center; margin:20px;"
                class="m-auto"></span>
            <div class="modal-footer">
                <button id="eidt_btnSubmit" type="button" class="btn btn-primary"
                    onclick="EstimationHourUpdate()">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- Estimation Edit/Update Modal -->
<!-- Estimation Hour Modals -->
<script src="<?php echo e(url('public/plugins/jquery/jquery.min.js')); ?>"></script>

<script>
// material operations
var base_url = "<?php echo e(url('/')); ?>";
$(document).ready(function() {

    var MaterialTable = $("#MaterialTable").DataTable({
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
            url: "<?php echo e(Route('Estimation-Material-Show')); ?>",
            data: {
                item_id: "<?php echo e($item_id); ?>",
                type: "material",
            },
        },
        columns: [{
                data: 'estimate_id',
                'searchable': false,
                'orderable': false,
                'className': 'd-none',
            },
            {
                data: 'material_required',
                'searchable': true,
                'orderable': true,
            },
            {
                data: 'material_grade',
                'searchable': true,
                'orderable': false,
            },
            {
                data: 'material_est_cost_unit',
                'searchable': true,
                'orderable': false,
            },
            {
                data: 'material_unit',
                'searchable': true,
                'orderable': false,
            },
            {
                data: 'material_order_quantity',
                'searchable': true,
                'orderable': false,
            },
            {
                data: 'material_qty_unit',
                'searchable': true,
                'orderable': false,
            },
            {
                data: 'material_total_est_qty',
                'searchable': true,
                'orderable': false,
            },
            {
                data: 'total_material_cost',
                'searchable': true,
                'orderable': false,
            },
            {
                data: 'gross_total',
                'searchable': true,
                'orderable': false,
            },
            {
                data: 'vat_total',
                'searchable': true,
                'orderable': false,
            },
            {
                data: 'net_total',
                'searchable': true,
                'orderable': false,
            },
            {
                data: 'action',
                'searchable': true,
                'orderable': false,
                'className': 'text-center',
            },
        ],
    });

    // vat calculation for insert
    // let item_price = 24950;
    // let vat_total = item_price * (5 / 100);
    // let net_total = item_price + (item_price * (5 / 100));
    // console.log("vat_total "+vat_total.toFixed(2));
    // console.log("net_total "+net_total.toFixed(2));

    // vat calculation for insert item material details
    $("#estimation_quantity_unit").keyup(function(){
        if($(this).val() != '' && $(this).val() > 0){
            let total_estimated_qty = "<?php echo e($items[0]->item_quantity ?? 0); ?>" * $("#estimation_quantity_unit").val();
            // console.log("qty "+total_estimated_qty);
            $("#total_estimation_quantity").val(total_estimated_qty.toFixed(2));
        }
    });
    $("#estimation_cost_unit").keyup(function(){
        if($(this).val() != '' && $(this).val() > 0){
            let total_material_cost = $(this).val() * $("#total_estimation_quantity").val();
            let vat_total = total_material_cost * (5 / 100);
            let net_total = total_material_cost + vat_total;
            // console.log("qty "+total_material_cost);
            $("#total_material_cost").val(total_material_cost.toFixed(2));
            $("#gross_total").val(total_material_cost.toFixed(2));
            $("#vat_total").val(vat_total.toFixed(2));
            $("#net_total").val(net_total.toFixed(2));
        }
    });

});

// Estimation Hour Store
function EstimationMaterialStore() {
    var fields = $("input[class*='material_required']");
    for (let i = 0; i <= fields.length; i++) {
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('name');
            var value = currentElement.replaceAll('_', ' ');
            $("#material_show_error").removeClass().html('');
            $("#material_show_error").show().addClass('alert alert-danger').html('The ' + value + ' field is required.');

            return false;
        } else {
            $("#material_show_error").hide().removeClass().html('');
        }
    }
    $("#btnSubmit").prop("disabled", true);
    $.ajax({

        type: "POST",
        url: "<?php echo e(route('Estimation-Material-Store')); ?>",
        data: $("#MaterialStoreForm").serialize(),
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btnSubmit").prop("disabled", false);
            $("#material_show_error").removeClass().html('').show();
            $("#material_show_error").addClass("alert alert-danger").html(errorThrown);
            return false;
        },
        success: function(data) {
            $("#btnSubmit").prop("disabled", false);
            console.log(data);
            // return false;
            if (data["success"] == true) {
                $("#material_show_error").removeClass().html('').show();
                $("#material_show_error").addClass("alert alert-success").html(data['message']);
                setTimeout(() => {
                    $("#material_show_error").removeClass().html('').hide();
                    $("#MaterialStoreModal").modal('hide');
                    $('#MaterialStoreForm')[0].reset();
                    tables = $("#MaterialTable").dataTable();
                    tables.fnPageChange('first', 1);
                }, 1500);
            } else {
                if (data['validation'] == false) {
                    $("#material_show_error").removeClass().html('').show();
                    $("#material_show_error").addClass("alert alert-danger").html(data['message'][0]);
                    return false;
                }
                $("#material_show_error").removeClass().html('').show();
                $("#material_show_error").addClass("alert alert-danger").html(data['message']);
                return false;
            }
        }
    });
}

function EstimationMaterialEdit(estimate_id) {

    var url_edit = base_url + "/Admin/Estimation-Material-" + estimate_id + "-Edit";
    $.get(url_edit, function(data) {
        $("#material_id").val(data[0]['estimate_id']);
        $("#edit_required_material").val(data[0]['material_required']);
        $("#edit_quantity").val(data[0]['material_order_quantity']);
        $("#edit_estimated_quantity_unit").val(data[0]['material_qty_unit']);
        $("#edit_unit").val(data[0]['material_unit']);
        $("#edit_total_estimated_quantity").val(data[0]['material_total_est_qty']); //
        $("#edit_material_grade").val(data[0]['material_grade']);
        $("#edit_estimated_material_cost_unit").val(data[0]['material_est_cost_unit']); //
        $("#edit_total_material_cost").val(data[0]['total_material_cost']);
        $("#edit_gross_total").val(data[0]['gross_total']);
        $("#edit_vat_total").val(data[0]['vat_total']);
        $("#edit_net_total").val(data[0]['net_total']);

        $("#MaterialEditModal").modal('show');
    });
}

$(function(){
    // vat calculation for update item material details
    $("#edit_estimated_quantity_unit").keyup(function(){
        if($(this).val() != '' && $(this).val() > 0){
            let total_estimated_qty = $("#edit_quantity").val() * $(this).val();
            // console.log("qty "+total_estimated_qty);
            $("#edit_total_estimated_quantity").val(total_estimated_qty.toFixed(2));
        }
    });
    $("#edit_estimated_material_cost_unit").keyup(function(){
        if($(this).val() != '' && $(this).val() > 0){
            let total_material_cost = $(this).val() * $("#edit_total_estimated_quantity").val();
            let vat_total = total_material_cost * (5 / 100);
            let net_total = total_material_cost + vat_total;
            // console.log("qty "+total_material_cost);
            $("#edit_total_material_cost").val(total_material_cost.toFixed(2));
            $("#edit_gross_total").val(total_material_cost.toFixed(2));
            $("#edit_vat_total").val(vat_total.toFixed(2));
            $("#edit_net_total").val(net_total.toFixed(2));
        }
    });
});

// Estimation Material Update
function EstimationMaterialUpdate() {
    var fields = $("input[class*='material_edit_required']");
    for (let i = 0; i <= fields.length; i++) {
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('name');
            var value = currentElement.replaceAll('_', ' ');
            $("#edit_material_show_error").removeClass().html('');
            $("#edit_material_show_error").show().addClass('alert alert-danger').html('The ' + value +
                ' field is required.');

            return false;
        } else {
            $("#edit_material_show_error").hide().removeClass().html('');
        }
    }
    $("#eidt_btnSubmit").prop("disabled", true);
    $.ajax({

        type: "POST",
        url: "<?php echo e(route('Estimation-Material-Update')); ?>",
        data: $("#MaterialEditForm").serialize(),
        error: function(jqXHR, textStatus, errorThrown) {
            $("#eidt_btnSubmit").prop("disabled", false);
            $("#edit_material_show_error").removeClass().html('').show();
            $("#edit_material_show_error").addClass("alert alert-danger").html(errorThrown);
            return false;
        },
        success: function(data) {
            console.log(data)
            $("#eidt_btnSubmit").prop("disabled", false);
            if (data["success"] == true) {
                $("#edit_material_show_error").removeClass().html('').show();
                $("#edit_material_show_error").addClass("alert alert-success").html(data[
                    'message']);
                setTimeout(() => {
                    $("#edit_material_show_error").removeClass().html('').hide();
                    $("#MaterialEditModal").modal('hide');
                    $('#MaterialEditForm')[0].reset();
                    tables = $("#MaterialTable").dataTable();
                    tables.fnPageChange('first', 1);
                }, 1500);
            } else {
                if (data['validation'] == false) {
                    $("#edit_material_show_error").removeClass().html('').show();
                    $("#edit_material_show_error").addClass("alert alert-danger").html(data['message'][0]);
                    return false;
                }
                $("#edit_material_show_error").removeClass().html('').show();
                $("#edit_material_show_error").addClass("alert alert-danger").html(data['message']);
                return false;
            }
        }
    });
}


// Material Remove
function EstimationMaterialRemove(estimate_id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.get("<?php echo e(route('Estimation-Material-Remove')); ?>", {
                estimate_id: estimate_id
            }, function(data) {
                // console.log(data);
                // return false;
                if (data['success'] == true) {
                    swal("Poof! Estimation MaterialTable  has been deleted!", {
                        icon: "success",
                    });
                    //toastr.success('Employee Bank Detail Removed Successfully..')
                    let DepartmentDataTable = $("#MaterialTable").dataTable();
                    DepartmentDataTable.fnPageChange('first', 1);
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

// hour operations  \\
$(document).ready(function() {

    var HourTable = $("#HourTable").DataTable({
        "autoWidth": true,
        "responsive": true,
        dom: 'lBfrtip',
        buttons: [{
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
            url: "<?php echo e(Route('Estimation-Hour-Show')); ?>",
            data: {
                item_id: "<?php echo e($item_id); ?>",
                type: "hour",
            },
        },
        columns: [{
                data: 'estimate_id',
                'searchable': false,
                'orderable': false,
                'className': 'd-none',
            },
            {
                data: 'description',
                'searchable': true,
                'orderable': true,
            },
            {
                data: 'order_quantity',
                'searchable': true,
                'orderable': false,
            },
            {
                data: 'required_work_hour',
                'searchable': true,
                'orderable': false,
            },
            {
                data: 'per_hour_cost',
                'searchable': true,
                'orderable': false,
            },
            {
                data: 'total_work_hour',
                'searchable': true,
                'orderable': false,
            },
            {
                data: 'total_hour_cost',
                'searchable': true,
                'orderable': false,
            },
            {
                data: 'gross_total',
                'searchable': true,
                'orderable': false,
            },
            {
                data: 'vat_total',
                'searchable': true,
                'orderable': false,
            },
            // {
            //     data: 'vat_total',
            //     'searchable': true,
            //     'orderable': false,
            // },
            {
                data: 'net_total',
                'searchable': true,
                'orderable': false,
            },
            {
                data: 'action',
                'searchable': true,
                'orderable': false,
                'className': 'text-center',
            },
        ],
    });

    // vat calculation for insert item hour details
    $("#estimated_requir_work_hour").keyup(function(){
        if($(this).val() != '' && $(this).val() > 0){
            let total_estimated_qty = "<?php echo e($items[0]->item_quantity ?? 0); ?>" * $("#estimated_requir_work_hour").val();
            // console.log("qty "+total_estimated_qty);
            $("#total_work_hour").val(total_estimated_qty.toFixed(2));
        }
    });
    $("#per_hour_cost").keyup(function(){
        if($(this).val() != '' && $(this).val() > 0){
            let total_hour_cost = $(this).val() * $("#total_work_hour").val();
            let vat_total = total_hour_cost * (5 / 100);
            let net_total = total_hour_cost + vat_total;
            // console.log("qty "+total_hour_cost);
            $("#total_hour_cost").val(total_hour_cost.toFixed(2));
            $("#hour_gross_total").val(total_hour_cost.toFixed(2));
            $("#hour_vat_total").val(vat_total.toFixed(2));
            $("#hour_net_total").val(net_total.toFixed(2));
        }
    });

});

// Estimation Hour Store
function EstimationHourStore() {
    var fields = $("input[class*='hour_required']");
    for (let i = 0; i <= fields.length; i++) {
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('name');
            var value = currentElement.replaceAll('_', ' ');
            $("#hour_show_error").removeClass().html('');
            $("#hour_show_error").show().addClass('alert alert-danger').html('The ' + value + ' field is required.');

            return false;
        } else {
            $("#hour_show_error").hide().removeClass().html('');
        }
    }
    $("#btnSubmit").prop("disabled", true);
    $.ajax({

        type: "POST",
        url: "<?php echo e(route('Estimation-Hour-Store')); ?>",
        data: $("#HourStoreFrom").serialize(),
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btnSubmit").prop("disabled", false);
            $("#hour_show_error").removeClass().html('').show();
            $("#hour_show_error").addClass("alert alert-danger").html(errorThrown);
            return false;
        },
        success: function(data) {
            $("#btnSubmit").prop("disabled", false);
            if (data["success"] == true) {
                $("#hour_show_error").removeClass().html('').show();
                $("#hour_show_error").addClass("alert alert-success").html(data['message']);
                setTimeout(() => {
                    $("#hour_show_error").removeClass().html('').hide();
                    $("#HourStoreModal").modal('hide');
                    $('#HourStoreFrom')[0].reset();
                    tables = $("#HourTable").dataTable();
                    tables.fnPageChange('first', 1);
                }, 1500);
            } else {
                if (data['validation'] == false) {
                    $("#hour_show_error").removeClass().html('').show();
                    $("#hour_show_error").addClass("alert alert-danger").html(data['message'][0]);
                    return false;
                }
                $("#hour_show_error").removeClass().html('').show();
                $("#hour_show_error").addClass("alert alert-danger").html(data['message']);
                return false;
            }
        }
    });
}

// Estimation Hour Edit 
function EstimationHourEdit(estimate_id) {
    var url_edit = base_url + "/Admin/Estimation-Hour-" + estimate_id + "-Edit";
    $.get(url_edit, function(data) {

        $("#hour_id").val(data[0]['estimate_id']);
        $("#edit_hour_descriptions").val(data[0]['description']);
        $("#edit_order_quantity").val(data[0]['order_quantity']);
        $("#edit_per_hour_cost").val(data[0]['per_hour_cost']);
        $("#edit_estimated_requir_work_hour").val(data[0]['required_work_hour']);
        $("#edit_total_work_hour").val(data[0]['total_work_hour']);
        $("#edit_total_hour_cost").val(data[0]['total_hour_cost']);
        $("#edit_hour_gross_total").val(data[0]['gross_total']);
        $("#edit_hour_vat_total").val(data[0]['vat_total']);
        $("#edit_hour_net_total").val(data[0]['net_total']);

        $("#HourEditModal").modal('show');
    });
}

$(function(){
    // vat calculation for update item hour details
    $("#edit_estimated_requir_work_hour").keyup(function(){
        if($(this).val() != '' && $(this).val() > 0){
            let total_estimated_qty = "<?php echo e($items[0]->item_quantity ?? 0); ?>" * $("#edit_estimated_requir_work_hour").val();
            // console.log("qty "+total_estimated_qty);
            $("#edit_total_work_hour").val(total_estimated_qty.toFixed(2));
        }
    });
    $("#edit_per_hour_cost").keyup(function(){
        if($(this).val() != '' && $(this).val() > 0){
            let total_hour_cost = $(this).val() * $("#edit_total_work_hour").val();
            let vat_total = total_hour_cost * (5 / 100);
            let net_total = total_hour_cost + vat_total;
            // console.log("qty "+total_hour_cost);
            $("#edit_total_hour_cost").val(total_hour_cost.toFixed(2));
            $("#edit_hour_gross_total").val(total_hour_cost.toFixed(2));
            $("#edit_hour_vat_total").val(vat_total.toFixed(2));
            $("#edit_hour_net_total").val(net_total.toFixed(2));
        }
    });
});

// Estimation Hour Update Function
function EstimationHourUpdate() {
    var fields = $("input[class*='hour_edit_required']");
    for (let i = 0; i <= fields.length; i++) {
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('name');
            var value = currentElement.replaceAll('_', ' ');
            $("#edit_hour_show_error").removeClass().html('');
            $("#edit_hour_show_error").show().addClass('alert alert-danger').html('The ' + value +
                ' field is required.');

            return false;
        } else {
            $("#edit_hour_show_error").hide().removeClass().html('');
        }
    }
    $("#eidt_btnSubmit").prop("disabled", true);
    $.ajax({

        type: "POST",
        url: "<?php echo e(route('Estimation-Hour-Update')); ?>",
        data: $("#HourEditFrom").serialize(),
        error: function(jqXHR, textStatus, errorThrown) {
            $("#eidt_btnSubmit").prop("disabled", false);
            $("#edit_hour_show_error").removeClass().html('').show();
            $("#edit_hour_show_error").addClass("alert alert-danger").html(errorThrown);
            return false;
        },
        success: function(data) {
            // console.log(data);
            // return false;
            $("#eidt_btnSubmit").prop("disabled", false);
            if (data["success"] == true) {
                $("#edit_hour_show_error").removeClass().html('').show();
                $("#edit_hour_show_error").addClass("alert alert-success").html(data[
                    'message']);
                setTimeout(() => {
                    $("#edit_hour_show_error").removeClass().html('').hide();
                    $("#HourEditModal").modal('hide');
                    $('#HourStoreFrom')[0].reset();
                    tables = $("#HourTable").dataTable();
                    tables.fnPageChange('first', 1);
                }, 1500);
            } else {
                if (data['validation'] == false) {
                    $("#edit_hour_show_error").removeClass().html('').show();
                    $("#edit_hour_show_error").addClass("alert alert-danger").html(data['message'][0]);
                    return false;
                }
                $("#edit_hour_show_error").removeClass().html('').show();
                $("#edit_hour_show_error").addClass("alert alert-danger").html(data['message']);
                return false;
            }
        }
    });
}


function EstimationHourRemove(estimate_id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.get("<?php echo e(route('Estimation-Hour-Remove')); ?>", {
                estimate_id: estimate_id
            }, function(data) {
                // console.log(data);
                // return false;
                if (data['success'] == true) {
                    swal("Poof! Estimation Hour  has been deleted!", {
                        icon: "success",
                    });
                    //toastr.success('Employee Bank Detail Removed Successfully..')
                    let DepartmentDataTable = $("#HourTable").dataTable();
                    DepartmentDataTable.fnPageChange('first', 1);
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
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchishty\resources\views/SalesInquiry/Estimation/EstimationSetup.blade.php ENDPATH**/ ?>