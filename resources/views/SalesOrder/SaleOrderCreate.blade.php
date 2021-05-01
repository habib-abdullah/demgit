@extends('layout')
@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12 mb-2">
      <div class="card shadow">
        <div class="card-body">
          <div class="col-lg-12 col-md-12">
            <h2>Add Sales Order</h2>
          </div>
          <hr>
          <div class="row no-gutters align-items-center col-lg-8 col-md-8 mx-auto">
            <form id="SalesOrderStoreForm">
              @csrf
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <lable>Order Date</lable>
                    <input type="date" class="form-control form-control-user required " id="sales_order_date"
                      name="sales_order_date" autocomplete=" off">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <lable>Sales Mode</lable>
                    <select class="form-control required" name="sales_mode" id="sales_mode">
                      <option selected="selected" disabled>Select</option>
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
                      @if(count($orders) > 0)
                      @foreach($orders as $order)
                      <option value="{{$order->client_id}}">
                        {{$order->company_name}}
                      </option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group ">
                    <lable>Booked By</lable>
                    <select class="form-control select2" name="sales_booked_by" id="sales_booked_by"
                      style="width: 100%;">
                      <option selected="selected" disabled>Select</option>
                      @if(count($orders) > 0)
                      @foreach($orders as $order)
                      <option value="{{$order->client_id}}">
                        {{$order->client_name}}
                      </option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <lable>Contact Person Name</lable>
                    <input type="text" class="form-control form-control-user required" id="sales_person_name"
                      name="sales_person_name" autocomplete="off" placeholder="Enter Contact Person Number">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <lable>Contact Person Number</lable>
                    <input type="number" class="form-control form-control-user required" id="sales_person_number"
                      name="sales_person_number" autocomplete="off" placeholder="Enter Contact Person Number">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <lable>Receiving Date</lable>
                    <input type="date" class="form-control form-control-user required" id="sales_receiving_date"
                      name="sales_receiving_date" autocomplete="off">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <lable>Delivery Date</lable>
                    <input type="date" class="form-control form-control-user required" id="sales_delivery_date"
                      name="sales_delivery_date" autocomplete="off">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <lable>LPO#</lable>
                    <input type="text" class="form-control form-control-user required" id="sales_lpo" name="sales_lpo"
                      autocomplete="off" placeholder="Enter LPO">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <lable>Focus SO#</lable>
                    <input type="text" class="form-control form-control-user required" id="sales_focus_so"
                      name="sales_focus_so" autocomplete="off" placeholder="Enter Focus SO">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <lable>Subject</lable>
                <input type="text" class="form-control form-control-user required" id="sales_order_subject"
                  name="sales_order_subject" autocomplete="off" placeholder="Enter subject">
              </div>
            </form>
            <div class="form-group text-center col-lg-12 col-md-12 my-4">
              <span id="show_error" style="display: none;" class="m-auto"></span>
            </div>
            <!-- Modal footer -->
            <div class="modal-body text-center">
              <span id="visitor_error_area" style="display: none;" class="m-auto"></span>
              <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
              <button type="button" id="btnSubmit" onclick="SalesOrderStore()" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
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

  if ($("#sales_mode option:selected").text() == 'Select') {
    $("#show_error").removeClass().html('');
    $("#show_error").show().addClass('alert alert-danger').html('The Sales Mode field is required.');
    return false;
  } else {
    $("#show_error").removeClass().html('').hide();
  }
  if ($("#sales_customer_by option:selected").text() == 'Select') {
    $("#show_error").removeClass().html('');
    $("#show_error").show().addClass('alert alert-danger').html('The customer field is required.');
    return false;
  } else {
    $("#show_error").removeClass().html('').hide();
  }
  if ($("#sales_booked_by option:selected").text() == 'Select') {
    $("#show_error").removeClass().html('');
    $("#show_error").show().addClass('alert alert-danger').html('The Booked By field is required.');
    return false;
  } else {
    $("#show_error").removeClass().html('').hide();
  }

  $("#btnSubmit").prop("disabled", true);
  $.ajax({
    type: "POST",
    url: "{{route('SalesOrder-Store')}}",
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
          window.location.href = "{{route('Sales-Order')}}";
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
</script>
@endsection