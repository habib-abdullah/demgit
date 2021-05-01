<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12 mb-2">
      <div class="card shadow">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="h5 mb-0 font-weight-bold text-gray-800">Sales Order </div>
            </div>
            <div class="col-auto">
              <a href="<?php echo e(Route('Sale-Order')); ?>" class="btn btn-primary">Add
                Order</a>

              <!-- <div class="modal fade" id="SalesOrderStoreModal">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content border-primary">
                   
                    <div class="modal-header">
                      <h4 class="modal-title">Add Sales Order</h4>
                    </div>
                
                    <div class="modal-body">
                      <form id="SalesOrderStoreForm">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <lable>Order Date</lable>
                              <input type="date" class="form-control form-control-user border-primary required "
                                id="sales_order_date" name="sales_order_date" autocomplete=" off">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <lable>Sales Mode</lable>
                              <select class="form-control border-primary required" name="sales_mode" id="sales_mode">
          
                                <option value="Cash">Cash</option>
                                <option value="Credit">Credit</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group ">
                              <lable>Customer</lable>
                              <select class="form-control select2" name="sales_customer_by" id="sales_customer_by"
                                style="width: 100%;">
                                <option selected="selected" disabled>Select</option>
                                <?php if(count($orders) > 0): ?>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($order->client_id); ?>">
                                  <?php echo e($order->company_name); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group ">
                              <lable>Booked By</lable>
                              <select class="form-control select2" name="sales_booked_by" id="sales_booked_by"
                                style="width: 100%;">
                                <option selected="selected" disabled>Select</option>
                                <?php if(count($orders) > 0): ?>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($order->client_id); ?>">
                                  <?php echo e($order->client_name); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <lable>Contact Person Name</lable>
                              <input type="text" class="form-control form-control-user border-primary required"
                                id="sales_person_name" name="sales_person_name" autocomplete="off"
                                placeholder="Enter Contact Person Number">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <lable>Contact Person Number</lable>
                              <input type="number" class="form-control form-control-user border-primary required"
                                id="sales_person_number" name="sales_person_number" autocomplete="off"
                                placeholder="Enter Contact Person Number">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <lable>Receiving Date</lable>
                              <input type="date" class="form-control form-control-user border-primary required"
                                id="sales_receiving_date" name="sales_receiving_date" autocomplete="off">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <lable>Delivery Date</lable>
                              <input type="date" class="form-control form-control-user border-primary required"
                                id="sales_delivery_date" name="sales_delivery_date" autocomplete="off">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <lable>LPO#</lable>
                              <input type="text" class="form-control form-control-user border-primary required"
                                id="sales_lpo" name="sales_lpo" autocomplete="off" placeholder="Enter LPO">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <lable>Focus SO#</lable>
                              <input type="text" class="form-control form-control-user border-primary required"
                                id="sales_focus_so" name="sales_focus_so" autocomplete="off"
                                placeholder="Enter Focus SO">
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <lable>Subject</lable>
                          <input type="text" class="form-control form-control-user border-primary required"
                            id="sales_order_subject" name="sales_order_subject" autocomplete="off"
                            placeholder="Enter subject">
                        </div>
                      </form>
                    </div>
                    <div class="form-group text-center">
                      <span id="show_error" style="display: none;" class="m-auto"></span>
                    </div>
                  
                    <div class="modal-footer">
                      <span id="visitor_error_area" style="display: none;" class="m-auto"></span>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" id="btnSubmit" onclick="SalesOrderStore()"
                        class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="card shadow mb-4">

    <div class="card-body">
      <div class="table-responsive">
        <table id="DataTable" class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Date</th>
              <th>Focus SO#</th>
              <th>Subject</th>
              <th>Customer</th>
              <th>Booked By</th>
              <th>Delivery Date</th>
              <th>Current Status</th>
              <th>Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="SalesOrderEditModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-primary">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Sales Order</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body" id="SaleOrderBody">


      </div>
      <div class="form-group text-center">
        <span id="ordert_edit_show_error" style="display: none;" class="m-auto"></span>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <span id="visitor_error_area" style="display: none;" class="m-auto"></span>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btnUpdate" onclick="SalesOrderUpdate()" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="SalesOrderViewModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-primary">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Sales Order</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <ul class="list-group">
          <li class=" list-group-item  text-capitalize" style="list-style:none;">
            <b> Order Datetime </b>
            <a class="float-right" id="order_date_view"></a>
          </li>
          <li class=" list-group-item  text-capitalize" style="list-style:none;">
            <b> Sales Mode </b>
            <a class="float-right" id="order_salesmode_view"></a>
          </li>
          <li class=" list-group-item  text-capitalize" style="list-style:none;">
            <b> Customer </b>
            <a class="float-right" id="order_customer_view"></a>
          </li>
          <li class=" list-group-item  text-capitalize" style="list-style:none;">
            <b> Booked By </b>
            <a class="float-right" id="order_book_by_view"></a>
          </li>
          <li class=" list-group-item  text-capitalize" style="list-style:none;">
            <b> Receiving Date </b>
            <a class="float-right" id="order_rec_date_view"></a>
          </li>
          <li class=" list-group-item  text-capitalize" style="list-style:none;">
            <b> Delivery Date </b>
            <a class="float-right" id="order_del_date_view"></a>
          </li>
          <li class=" list-group-item  text-capitalize" style="list-style:none;">
            <b> Focus SO# </b>
            <a class="float-right" id="order_so_view"></a>
          </li>
          <li class=" list-group-item  text-capitalize" style="list-style:none;">
            <b> LPO# </b>
            <a class="float-right" id="order_lpo_view"></a>
          </li>
          <li class=" list-group-item  text-capitalize" style="list-style:none;">
            <b> Subject </b>
            <a class="float-right" id="order_subject_view"></a>
          </li>
          <li class=" list-group-item  text-capitalize" style="list-style:none;">
            <b> Current Status </b>
            <a class="float-right" id="order_status_view"></a>
          </li>
        </ul>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo e(url('public/plugins/jquery/jquery.min.js')); ?>"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script type="text/javascript">
var base_url = "<?php echo e(url('/')); ?>";
$(function() {

  var tables = $("#DataTable").DataTable({
    // lengthMenu: [
    //     [ 25, 50, 100, -1 ],
    //     [ '25 rows', '50 rows', '100 rows', 'Show all' ]
    // ],
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
      url: "<?php echo e(route('SalesOrder-Show')); ?>"
    },
    columns: [{
        data: 'sales_order_date',
        'searchable': false,
        'orderable': false,
        'class': 'text-center'
      },
      {
        data: 'sales_focus_so',
        'searchable': true,
        'orderable': false,
        'class': 'text-center'
      },
      {
        data: 'sales_order_subject',
        'searchable': true,
        'orderable': false,
        'class': 'text-center'
      },
      {
        data: 'company_name',
        'searchable': true,
        'orderable': false,
        'class': 'text-center'
      },
      {
        data: 'client_name',
        'searchable': true,
        'orderable': false,
        'class': 'text-center'
      },
      {
        data: 'sales_delivery_date',
        'searchable': true,
        'orderable': false,
        'class': 'text-center'
      },
      {
        data: 'status',
        render: function(data) {
          if (data == 1) {
            return 'Pending';
          }
          if (data == 2) {
            return 'In Progress';
          } else {
            return 'Completed';
          }
        },
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
  $(".select2").select2({
    theme: "classic",
    // width: 'resolve'
  });
  $(".select3").select2({
    theme: "classic",
    // width: 'resolve'
  });
  $(".select4").select2({
    theme: "classic",
    // width: 'resolve'
  });

});

function SalesOrderStore() {
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
    url: "<?php echo e(route('SalesOrder-Store')); ?>",
    data: $("#SalesOrderStoreForm").serialize(),
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
          $("#SalesOrderStoreModal").modal('hide');
          $("#show_error").removeClass().html('').hide();
          $("#SalesOrderStoreForm")[0].reset();
          tables = $("#DataTable").dataTable();
          tables.fnPageChange('first', 1);
        }, 2000);
      } else {
        if (data['validation'] == false) {
          $("#show_error").removeClass().show().html('');
          $("#show_error").addClass("alert alert-danger").html(data['message'][0]);
          return false;
        }
        $("#show_error").removeClass().html('').show();
        $("#show_error").addClass("alert alert-danger").html(data['message']);
        return false;
      }
    }
  });
}

function SalesOrderView(sales_order_id) {
  var url_edit = base_url + "/Admin/SalesOrder-" + sales_order_id + "-View";
  $.get(url_edit, function(data) {

    $("#order_date_view").text(data[0]['sales_order_date']);
    $("#order_salesmode_view").text(data[0]['sales_mode']);
    $("#order_customer_view").text(data[0]['company_name']);
    $("#order_book_by_view").text(data[0]['client_name']);
    $("#order_rec_date_view").text(data[0]['sales_receiving_date']);
    $("#order_del_date_view").text(data[0]['sales_delivery_date']);
    $("#order_lpo_view").text(data[0]['sales_lpo']);
    $("#order_so_view").text(data[0]['sales_focus_so']);
    $("#order_subject_view").text(data[0]['sales_order_subject']);
    $("#order_status_view").text(data[0]['status']);

    $("#SalesOrderViewModal").modal('show');
  });
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchishty\resources\views/SalesOrder/SalesOrder.blade.php ENDPATH**/ ?>