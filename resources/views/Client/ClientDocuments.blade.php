@extends('layout')

@section('content')
<link rel="stylesheet" href="{{url('Croppie/croppie.css')}}" />
<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-lg-12 col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <a href="{{route('Client')}}" style="font-size: 18px;"><i class="fas fa-arrow-circle-left"></i>Back</a>
            </h3>
            <input type="button" value="Add a field" class="add btn btn-info float-right" id="add" />
          </div>
          <div class="card-body">
            <form id="ClientDocumentStore" enctype="multipart/form-data">
              @csrf
              <div class="form-row justify-content-center mt-2" id="fieldRow">
                <div class="form-group col-md-4">
                  <label>Client Name</label>
                  <input type="hidden" class="form-control " name="client_id" id="client_id"
                    value="{{$clients[0]->client_id ?? ''}}">
                  <input type="text" class="form-control " name="client_name" id="client_name" disabled
                    value="{{$clients[0]->client_name ?? ''}}">
                </div>
                <div class="form-group col-md-4">
                  <label>Document Name</label>
                  <input type="text" class="form-control required" name="document_name[]" id="document_name"
                    placeholder="Document Name">
                </div>
                <div class="form-group col-md-4">
                  <label>Document File</label>
                  <input type="file" class="form-control required" name="document_file[]" id="document_file"
                    placeholder="Document Name">
                </div>

              </div>
              <div class="form-row justify-content-center mt-2">
                <div class="form-group">
                  <span id="error_area" style="display: none;" class="m-auto"></span>
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
  var wrapper = $("#ClientDocumentStore");

  $("#add").click(function() {
    var maxField = 10; //Input fields increment limitation
    var x = 1; //Initial field counter is 1

    var singlRow =
      ' <div class="form-row justify-content-center mt-2 rowNumber' + x +
      '" style="border-top:1px solid rgba(0, 0, 0, 0.1);">';
    singlRow +=
      '<div class="form-group col-md-4"><label>Document Name</label><input type="text" class="form-control  required" id="document_name" name="document_name[]" id=""placeholder="Document Name"></div>';
    singlRow +=
      '<div class="form-group col-md-4"><label>Document File</label><input type="file" class="form-control  required" id="document_file" name="document_file[]" id=""placeholder="Document File"></div>';
    singlRow +=
      '<div class="form-group col-md-1"><label>Remove</label><button type="button" class="remove_button form-control btn btn-xs btn-warning text-bold" > - </button></div>';
    singlRow += '</div>';
    // $("#ClientDocumentStore").append(singlRow);
    $(singlRow).insertAfter('#fieldRow');
  });

  $(wrapper).on('click', '.remove_button', function(e) {
    e.preventDefault();
    $(this).closest('.form-row').remove(); //Remove field html
    // x--; //Decrement field counter
  });

  $("#emp_designation").select2({
    theme: "classic",
    width: 'resolve'
  });

});
$('#submitBtn').click(function() {

  // $("#error_area").hide().removeClass().html('');
  var fields = $("input[class*='required']");
  // console.log(fields.val());
  for (let i = 0; i <= fields.length; i++) {
    // console.log(fields);
    if ($(fields[i]).val() === '') {
      var currentElement = $(fields[i]).attr('id');
      var value = currentElement.replaceAll('_', ' ');
      $("#error_area").removeClass().html('');
      $("#error_area").show().addClass('alert alert-danger').html('The ' + value + ' field is required.');
      console.log('console: The ' + value + ' field is required.');
      return false;
    } else {
      $("#error_area").hide().removeClass().html('');
    }
  }
  // console.log('reached');
  // return false

  //   var employee_id = $("#employee_id option:selected").text();
    // if (fields == '') {
    //   $("#error_area").removeClass().html('');
    //   $("#error_area").show().addClass('alert alert-danger').html('Please select employee');
    //   return false;
    // } else {
    //   $("#error_area").hide().removeClass().html('');
    // }

  let form_data = document.getElementById("ClientDocumentStore");
  let new_data = new FormData(form_data);
  $.ajax({

    type: "POST",
    url: "{{route('Client-Document-Store')}}",
    data: new_data,
    processData: false,
    contentType: false,
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(jqXHR + " / ");
      console.log(textStatus);
      $("#error_area").show().removeClass().html('');
      $("#error_area").addClass("alert alert-danger").html(errorThrown);
      return false;
    },
    success: function(data) {
      console.log(data);
      // console.log(data["message"][0]);
      // return false;
      if (data["success"] == true) {
        $('#error_area').removeClass().html('');
        $('#error_area').addClass('alert alert-success text-center').show().html(data[
          "message"]);
        setTimeout(function() {
          window.location.href = "{{route('Client')}}";
        }, 1500);
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