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
              <a href="{{url('Admin/EmployeMaster')}}" style="font-size: 18px;"><i
                  class="fas fa-arrow-circle-left mr-2"></i>Back</a>
            </h3>
            <a href="{{route('Employee-Document-Category')}}" class="btn btn-primary float-right ml-2">Add Document Category</a>
            <!-- <div class="card-title float-right mt-1">Add Document</div> -->
            <!-- <input type="button" value="Add a field" class="add btn btn-info float-right" id="add" /> -->
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <div class="card-body">
            <form id="DocumentStore" enctype="multipart/form-data">
              @csrf
              <div class="form-row justify-content-center mt-2" id="fieldRow">
                <div class="form-group col-md-4">
                  <label>employee</label>
                  <select name="employee_id" id="employee_id"
                    class="form-control Designation_err requiredSelection select2 " style="">
                    <option selected disabled>Select</option>
                    @if(count($employees) > 0)
                    @foreach($employees as $employee)
                    @if(isset($employee_id))
                    @if($employee_id == $employee->employee_id)
                    <option selected value="{{$employee->employee_id}}">{{$employee->first_name}}
                      {{$employee->last_name}}
                    </option>
                    @else
                    <option value="{{$employee->employee_id}}">{{$employee->first_name}}
                      {{$employee->last_name}}
                    </option>
                    @endif
                    @else
                    <option value="{{$employee->employee_id}}">{{$employee->first_name}}
                      {{$employee->last_name}}
                    </option>
                    @endif
                    @endforeach
                    @endif
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label>Category</label>
                  <select name="document_category[]" id="document_category"
                    class="form-control Designation_err requiredSelection">
                    <option selected disabled>Select</option>
                    @if(count($categories) > 0)
                    @foreach($categories as $category)
                    <option value="{{$category->category_name}}">{{$category->category_name}}
                    </option>
                    @endforeach
                    @endif
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label>Name</label>
                  <input type="text" class="form-control nationality_err required" name="document_name[]"
                    id="document_name" placeholder="Document Name">
                </div>
                <div class="form-group col-md-4">
                  <label>File</label>
                  <input type="file" class="form-control nationality_err required" name="attachment[]" id="attachment">
                </div>
                <div class="form-group col-md-4">
                  <label>Expiry Date</label>
                  <input type="date" class="form-control nationality_err required" name="document_expiry[]"
                    id="document_expiry" placeholder="Document Expiry Date">
                </div>
                <div class="form-group col-md-4">
                </div>

                <div class="form-row justify-content-center mt-2">
                  <div class="form-group">
                    <span id="error_area" style="display: none;" class="m-auto"></span>
                  </div>
                </div>
                <!-- <div class="form-row justify-content-center mt-2">
                  <div class="form-group">
                    <button type="button" id="submitBtn" class="btn btn-primary m-auto">Submit
                    </button>
                  </div>
                </div> -->
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
  <br><br>
  <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header">
        <div class="card-title">All Documents</div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="DataTable" class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <!-- <th>UID</th> -->
                <!-- <th>Documents</th> -->
                <th>Document Category</th>
                <th>Document Name</th>
                <th>File</th>
                <th>Expiry</th>
                <th>Action</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>

</section>


<script src="{{url('public/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript">
var base_url = "{{url('/')}}";
var dataTables = "";
$(function() {
  var emp_id = "{{$employee->employee_id}}";
  console.log(emp_id);
  $.get("{{route('Employee-Documents-Show')}}",{
        employee_id: "{{$employee_id}}"
        
      }, function(data){
        
        console.log(data);
      });

  var tables = $("#DataTable").DataTable({
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
    processing: true,
    serverSide: true,
    ajax: {
      url: "{{route('Employee-Documents-Show')}}",
      data: {
        employee_id: "{{$employee_id}}"
      }
    },
    columns: [
      // {
      //   data: 'document_id',
      //   'searchable': false,
      //   'orderable': true,
      //   'class': 'text-center'
      // },
      {
        data: 'document_category',
        'searchable': true,
        'orderable': false,
        'class': 'text-center'
      },
      {
        data: 'document_name',
        'searchable': true,
        'orderable': true,
        'class': 'text-center'
      },
      // {
      //   data: 'documents',
      //   'searchable': true,
      //   'orderable': true,
      //   'class': 'text-center'
      // },
      
      {
        data: 'attachment',
        render: function(data) {
          var file = '<a  href="'+base_url +'/public/Employee/' + data +
            '" target="_blank" style="width:70px;height:auto;"> Download </a>';
            return file;
        },
        'searchable': false,
        'orderable': false,
        'class': 'text-center'
      },
      {
        data: 'document_expiry',
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
});
</script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="{{url('Croppie/croppie.js')}}"></script>

<script type="text/javascript">
$(document).ready(function() {
  var wrapper = $("#DocumentStore");

  $("#add").click(function() {
    var maxField = 10; //Input fields increment limitation
    var x = 1; //Initial field counter is 1


    var singlRow =
      '<hr> <div class="form-row justify-content-center mt-2 rowNumber' + x +
      '"><div class="form-group col-md-4"><label>Category</label><select name="document_category[]" id="document_category" class="form-control Designation_err requiredSelection "><option selected disabled>Select</option>';
    singlRow += '<?php if(count($categories) > 0){ foreach($categories as $category){ ?>';
    singlRow +=
      '<option value="{{$category->category_name}}">{{$category->category_name}}</option>';
    singlRow += '<?php } } ?>';
    singlRow +=
      '</select></div><div class="form-group col-md-4"><label>Name</label><input type="text" class="form-control nationality_err required" name="document_name[]" id="document_name"placeholder="Document Name"></div><div class="form-group col-md-1"><label>Remove</label><button type="button" class="remove_button form-control btn btn-xs btn-warning text-bold" > - </button></div><div class="form-group col-md-3"></div><div class="form-group col-md-4"><label>File</label><input type="file" class="form-control nationality_err required" name="attachment[]" id="attachment"></div><div class="form-group col-md-4"><label>Expiry Date</label><input type="date" class="form-control nationality_err required" name="document_expiry[]" id="document_expiry"placeholder="Document Expiry Date"></div><div class="form-group col-md-4"></div></div>';
    // removeButton = '<button type="button" class="remove btn btn-xs btn-warning" > - </button>';
    // singlRow += removeButton;

    // $("#DocumentStore").append(singlRow);
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
  $("#employee_id").select2({
    theme: "classic",
    width: 'resolve'
  });
  $("#document_category").select2({
    theme: "classic",
    width: 'resolve'
  });

  $image_crop = $('#image-preview').croppie({
    enableExif: true,
    viewport: {
      width: 100,
      height: 100,
      type: 'circle'
    },
    boundary: {
      width: 200,
      height: 200
    }
  });

  $('#upload_image').change(function(event) {
    var reader = new FileReader();

    reader.onload = function(event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function() {
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
  });

});
$('#submitBtn').click(function() {

  var employee_id = $("#employee_id option:selected").text();
  if (employee_id == 'Select') {
    $("#error_area").removeClass().html('');
    $("#error_area").show().addClass('alert alert-danger').html('Please select employee');
    return false;
  } else {
    $("#error_area").hide().removeClass().html('');
  }
  var fields = $('#document_category').find(":selected").text();
  if (fields == 'Select') {
    $("#error_area").removeClass().html('');
    $("#error_area").show().addClass('alert alert-danger').html('Please select category');
    return false;
  } else {
    $("#error_area").hide().removeClass().html('');
  }
  // console.log(fields);
  // return false;

  var fields = $("input[class*='required']");
  for (let i = 0; i <= fields.length; i++) {
    // console.log(fields);
    if ($(fields[i]).val() === '') {
      var currentElement = $(fields[i]).attr('id');
      // var currentElement = $(fields[i])[name*="tcol"];
      var value = currentElement.replaceAll('_', ' ');
      $("#error_area").removeClass().html('');
      $("#error_area").show().addClass('alert alert-danger').html('Please enter ' + value + '.');
      return false;
    } else {
      $("#error_area").hide().removeClass().html('');
    }
  }
  // console.log(fields);
  // return false;

  let form_data = document.getElementById("DocumentStore");
  let new_data = new FormData(form_data);
  $.ajax({

    type: "POST",
    url: "{{route('Employee-Document-Store')}}",
    data: new_data,
    processData: false,
    contentType: false,
    success: function(data) {
      console.log(data);
      // return false;
      if (data["success"] == true) {
        $('#error_area').removeClass().html('');
        $('#error_area').addClass('alert alert-success text-center').show().html(data[
          "message"]);
        setTimeout(function() {
          location.reload();
        }, 1000);
        // tables = $("#DataTable").dataTable();
        // tables.fnPageChange('first', 1);
      } else {
        $('#error_area').removeClass().html('');
        $('#error_area').addClass('alert alert-danger text-center').show().html(data[
          "message"]);
        return false;
      }
    }
  });
});

function DocumentRemove(document_id) {
  // alert(document_id);
  // return false;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this file!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      $.get("{{route('Employee-Document-Remove')}}", {
        document_id: document_id
      }, function(data) {
        console.log(data);
        if (data['success'] == true) {
          swal("Poof! Document Detail has been deleted!", {
            icon: "success",
          });
          //toastr.success('Document Bank Detail Removed Successfully..')
          tables = $("#DataTable").dataTable();
          tables.fnPageChange('first', 1);
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
</script>
@endsection