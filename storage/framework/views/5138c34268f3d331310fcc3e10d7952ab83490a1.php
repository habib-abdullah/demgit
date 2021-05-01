<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12 mb-2">
      <div class="card shadow">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="h5 mb-0 font-weight-bold text-gray-800">PreSales Inquiry</div>
            </div>
            <div class="col-auto">
              <a href="<?php echo e(Route('SalesInquiry-Create')); ?>" class="btn btn-primary">Add
                Inquiry</a>
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
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="table-responsive">
              <table id="Table" class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th class="d-none">UID</th>
                    <th>Inquiry Date & time</th>
                    <th>Inquiry No</th>
                    <th>Inquiry Subject</th>
                    <th>InquiryPerson</th>
                    <th>Inquiry Response Deadline</th>
                    <th>Status</th>
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

<div class="modal fade" id="SalesInquiryFileUploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content modal-md">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inquiry Documents</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="SalesInquiryFileStoreForm" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <div class="form-row justify-content-center mt-1">
            <div class="form-group col-md-12 d-none">
              <label>Inquiry Id</label>
              <input type="text" class="form-control " name="inquiry_id" id="inquiry_id">
            </div>
            <div class="form-group col-md-12">
              <label>Attachment</label>
              <input type="file" class="form-control " name="inquiry_attachment[]" multiple id="inquiry_attachment">
            </div>
          </div>
          <!-- <div class="form-row justify-content-left">
            <div class="form-group col-md-12">
              <span id="filename"></span>
            </div>
          </div> -->
        </form>
      </div>
      <div class="modal-body">
        <table class="table table-striped table-hover">
          <tbody id="AttachmentBody">

          </tbody>
        </table>
      </div>
      <div class="modal-body text-center">
        <span id="show_error" style="display: none; text-align:center; margin:20px;" class="m-auto">
        </span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="btnSubmit" type="button" class="btn btn-primary" onclick="SalesInquiryFileStore()">Upload</button>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo e(url('public/plugins/jquery/jquery.min.js')); ?>"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo e(url('public/dist/js/demo.js')); ?>"></script>

<script>
$(document).ready(function() {
  var table = $("#Table").DataTable({
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
      url: "<?php echo e(Route('SalesInquiry-Show')); ?>"
    },
    columns: [{
        data: 'inquiry_id',
        'searchable': false,
        'orderable': false,
        'className': 'd-none',
      },
      {
        data: 'inquiry_date',
        // render: function(data){
        //   return data.replace("T", " ");
        // },
        'searchable': true,
        'orderable': true,
      },
      {
        data: 'inquiry_no',
        'searchable': true,
        'orderable': false,
      },
      {
        data: 'inquiry_subject',
        'searchable': true,
        'orderable': false,
      },
      {
        data: 'inquiry_person',
        'searchable': true,
        'orderable': false,
      },
      {
        data: 'inquiry_response_date',
        'searchable': true,
        'orderable': false,
      },
      {
        data: 'status',
        render: function(data) {
          if (data === 1) {
            return 'Pending';
          } else if (data === 2) {
            return 'Draft';
          } else {
            return 'Completed';
          }
        },
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
    // "order": [[ 0, "desc" ]]
  });

  $('input[type="file"]').change(function(e) {
    var Size = e.target.files[0].size;
    var fSExt = new Array('Bytes', 'KB', 'MB', 'GB'),
      i = 0;
    while (Size > 900) {
      Size /= 1024;
      i++;
    }
    var exactSize = (Math.round(Size * 100) / 100) + ' ' + fSExt[i];
    let ginty = 1;
    for (var i = 0; i < this.files.length; i++) {
      var fileName = this.files[i].name;
      $('#filename').append('<div class="name">' + ginty + " - " + fileName + '</div>');
      ginty++;
    }
  });

});

function SalesInquiryFileModal(inquiry_id) {
  // alert(inquiry_id);
  $("#AttachmentBody").html('').removeClass();
  // console.log("data");
  $.get("<?php echo e(route('SalesInquiry-File-Show')); ?>", {
    inquiry_id: inquiry_id
  }, function(data) {
    // console.log(data);
    if (data.length > 0) {
      // console.log("greater");
      let ginty = 1;
      for (rows of data) {
        // console.log(rows.attachment_id+" | "+rows.attachment_file);
        $("#AttachmentBody").append(
          '<tr class="removeRow"><td style="max-width:400px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><a target="_blank" download href="<?php echo e(url("/")); ?>/public/Sales/' +
          rows.attachment_file + '">' + rows.attachment_file +
          '</a></td><td><button type="button" class="btn btn-danger btn-circle FileRemove" id="' +
          rows.attachment_id + '" value="' +
          rows.attachment_id + '"><i class="fa fa-trash"></i></button></td></tr>');
      }
    } else {
      console.log("no data available");
    }
    $("#inquiry_id").val(inquiry_id);
    $("#SalesInquiryFileUploadModal").modal('show');
  });
  return false;
}

function SalesInquiryFileStore() {
  let myForm = document.getElementById('SalesInquiryFileStoreForm');
  let formData = new FormData(myForm);
  $("#btnSubmit").prop("disabled", true);
  $.ajax({

    type: "POST",
    url: "<?php echo e(route('SalesInquiry-File-Store')); ?>",
    data: formData,
    contentType: false,
    processData: false,
    error: function(jqXHR, textStatus, errorThrown) {
      $("#btnSubmit").prop("disabled", false);
      $("#show_error").removeClass().html('').show();
      $("#show_error").addClass("alert alert-danger").html(errorThrown);
      return false;
    },
    success: function(data) {
      $("#btnSubmit").prop("disabled", false);
      console.log(data);
      // return false;
      if (data["success"] == true) {
        $("#show_error").removeClass().html('').show();
        $("#show_error").addClass("alert alert-success").html(data['message']);
        setTimeout(() => {
          $("#SalesInquiryFileUploadModal").modal('hide');
          $("#show_error").removeClass().html('').hide();
          $("#filename").removeClass().html('').hide();
          // window.location.href = "<?php echo e(route('Sales-Inquiry')); ?>";
        }, 1500);
      } else {
        if (data['validation'] == false) {
          $("#show_error").removeClass().html('').show();
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

function Remove(inquiry_id) {
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      $.get("<?php echo e(route('SalesInquiry-Remove')); ?>", {
        inquiry_id: inquiry_id
      }, function(data) {
        console.log(data);
        // return false;
        if (data['success'] == true) {
          swal("Poof! Sales Inquiry has been removed successfuly...", {
            icon: "success",
          });
          //toastr.success('Employee Bank Detail Removed Successfully..')
          tables = $("#Table").dataTable();
          tables.fnPageChange('first', 1);
        }
      });
    } else {
      swal("Your record is safe!");
    }
  });
}

$(document).ready(function() {
  
  $(document).on('click', '.FileRemove', function() {

    if($("#inquiry_attachment").val == ""){
      $("#show_error").removeClass().html('').show();
      $("#show_error").addClass("alert alert-danger").html("Attachmet field is required");
      return false;
    }else{
      $("#show_error").removeClass().html('').hide();
    }
  
    // alert($(this).attr('id'));
    let attachment_id = $(this).attr('id');
    var $table_row = $(this).closest('td');
    // console.log(attachment_id);
    // $(this).closest('tr').hide('slow', function(){ $(this).remove(); });
    // return false;
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.get("<?php echo e(route('SalesInquiry-File-Remove')); ?>", {
          attachment_id: attachment_id
        }, function(data) {
          // console.log(data);
          // return false;
          if (data['success'] == true) {
            swal("Poof! Inquiry Document has been removed successfuly...", {
              icon: "success",
            });
            setTimeout(() => {
              $table_row.closest('tr').hide('slow', function(){ $(this).remove(); });
            }, 1500);
            //toastr.success('Employee Bank Detail Removed Successfully..')
            // tables = $("#Table").dataTable();
            // tables.fnPageChange('first', 1);
          } else {
            swal("Oops something went wrong!, please check", {
              icon: "error",
            });
          }
        });
      } else {
        swal("Your file is safe!");
      }
    });
  });

});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchishty\resources\views/SalesInquiry/SalesInquiry.blade.php ENDPATH**/ ?>