@extends('layout')

@section('content')
<link rel="stylesheet" href="{{url('Croppie/croppie.css')}}" />
<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <!-- left column -->
      <div class="col-lg-12 col-md-12">
        <!-- general form elements -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <a href="{{route('Client')}}" style="font-size: 18px;"><i
                  class="fas fa-arrow-circle-left"></i> Back </a>
            </h3>
            <input type="button" value="Add a field" class="add btn btn-info float-right" id="add" />
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <div class="card-body">
            <form id="DocumentStore" enctype="multipart/form-data">
              @csrf
              <input type="hidden" id="client_id" name="client_id" value="{{$clients[0]->client_id}}">
              <div class="form-row justify-content-center mt-5" id="fieldRow">

                <div class="form-group col-md-6">
                  <label>Trade License Copy</label>
                  <input type="file" class="form-control  required" name="trade_license" id="trade_license"
                    accept=".jpg, .jpeg, .png, .pdf">
                </div>
                <div class="form-group col-md-6">
                  <label>TRN Certificate</label>
                  <input type="file" class="form-control  required" name="trn_certificate" id="trn_certificate"
                    accept=".jpg, .jpeg, .png, .pdf">
                </div>
                <div class="form-group col-md-6">
                  <label>Chamber Of Commerce Certificate</label>
                  <input type="file" class="form-control  required" name="chamber_of_commerce_certificate"
                    id="chamber_of_commerce_certificate" accept=".jpg, .jpeg, .png, .pdf">
                </div>
                <div class="form-group col-md-6">
                  <label>Credit Application</label>
                  <input type="file" class="form-control  required" name="credit_application" id="credit_application"
                    accept=".jpg, .jpeg, .png, .pdf">
                </div>
                <div class="form-group col-md-6">
                  <label>Power Of Attorney</label>
                  <input type="file" class="form-control  required" name="power_of_attorney" id="power_of_attorney"
                    accept=".jpg, .jpeg, .png, .pdf">
                </div>
                <div class="form-group col-md-6">
                </div>

                <div class="form-group mt-2">
                  <div class="form-group">
                    <span id="error_area" style="display: none;" class="m-auto"></span>
                  </div>
                </div>

              </div>
              <div class="form-row justify-content-center mt-2">
                <div class="form-group">
                  <button type="button" id="submitBtn" class="btn btn-primary m-auto">Submit
                  </button>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

</section>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="{{url('Croppie/croppie.js')}}"></script>

<script type="text/javascript">
$(document).ready(function() {

  $("#emp_designation").select2({
    theme: "classic",
    width: 'resolve'
  });

});
$('#submitBtn').click(function() {

  var fields = $("input[class*='required']");
  for (let i = 0; i <= fields.length; i++) {
    // console.log(fields);
    if ($(fields[i]).val() === '') {
      var currentElement = $(fields[i]).attr('id');
      // var currentElement = $(fields[i])[name*="tcol"];
      var value = currentElement.replaceAll('_', ' ');
      $("#error_area").removeClass().html('');
      $("#error_area").show().addClass('alert alert-danger').html('The ' + value + ' field is required');
      return false;
    } else {
      $("#error_area").hide().removeClass().html('');
    }
  }
  // console.log("reach");
  // return false;
  $('#submitBtn').prop('disabled', true);
  let form_data = document.getElementById("DocumentStore");
  let new_data = new FormData(form_data);
  $.ajax({

    type: "POST",
    url: "{{route('Client-Document-Store')}}",
    data: new_data,
    processData: false,
    contentType: false,
    error: function(jqXHR, textStatus, errorThrown) {
      $("#error_area").removeClass().show().html('');
      $("#error_area").addClass("alert alert-danger").html(errorThrown);
      $('#submitBtn').prop('disabled', false);
    },
    success: function(data) {
      $('#submitBtn').prop('disabled', false);
      console.log(data);
      // return false;
      if (data["success"] == true) {
        $('#error_area').removeClass().html('');
        $('#error_area').addClass('alert alert-success text-center').show().html(data[
          "message"]);
        setTimeout(function() {
          window.location.href = "{{route('Client')}}";
        }, 1000);
        // tables = $("#DataTable").dataTable();
        // tables.fnPageChange('first', 1);
      } else {
        $('#error_area').removeClass().html('');
        $('#error_area').addClass('alert alert-danger text-center').show().html(data[
          "message"][0]);
        return false;
      }
    }
  });
});
</script>
@endsection