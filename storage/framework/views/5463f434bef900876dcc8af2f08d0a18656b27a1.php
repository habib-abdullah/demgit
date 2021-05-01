<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <!-- Page Heading -->





  <div class="row">
    <div class="col-md-12 mb-2">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <a href="<?php echo e(route('Visitor-Log')); ?>" style="font-size: 18px;"><i class="fas fa-arrow-circle-left"></i> Back
            </a>
          </h3>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card-body box-profile">
              <div class="text-center">
              </div>
              <p class="text-muted text-center"></p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="" style="visibility:hidden;"></li>
                <li class=" text-capitalize" style="list-style:none;">
                  <b> Visit Time </b>
                  <a class="float-right"><?php echo e($visitors[0]->visit_time ?? ''); ?></a>
                  <hr>
                </li>
                <li class=" text-capitalize" style="list-style:none;">
                  <b> Customer </b> <a class="float-right"><?php echo e($visitors[0]->company_name ?? ''); ?></a>
                  <hr>
                </li>
                <li class=" text-capitalize" style="list-style:none;">
                  <b> Visitor Name </b> <a class="float-right"><?php echo e($visitors[0]->visitor_name ?? ''); ?></a>
                  <hr>
                </li>
                <li class=" text-capitalize" style="list-style:none;">
                  <b> Mobile </b> <a class="float-right"><?php echo e($visitors[0]->visitor_mobile ?? ''); ?></a>
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

                <li class=" " style="list-style:none;">
                  <b>Channel</b> <a class="float-right"> <?php echo e($visitors[0]->visitor_type ?? ''); ?> </a>
                  <hr>
                </li>
                <li class="" style="list-style:none;">
                  <b>Attended By</b> <a class="float-right"><?php echo e($visitors[0]->first_name ?? ''); ?></a>
                  <hr>
                </li>
                <li class="" style="list-style:none;">
                  <b>Purpose</b> <a class="float-right"> <?php echo e($visitors[0]->visitor_purpose ?? ''); ?> </a>
                  <hr>
                </li>
                <li class="" style="list-style:none;">
                  <b>Note</b> <a class="float-right"><?php echo e($visitors[0]->visitor_note ?? ''); ?></a>
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
        <div class="card-header d-flex p-0 ">
          <ul class="nav nav-pills mr-auto p-2 mx-auto">
            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">
                <i class="fas fa-user  m-0 pr-2" style="font-size:18px;"></i>Log Activity</a></li>
            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">
                <i class="fas fa-file  m-0 pr-2" style="font-size:18px;"></i>Attachments</a></li>
          </ul>
        </div>
        <div class="card-body box-profile p-0">
          <div class="tab-content">
            <!-- Log Activity  -->
            <div class="tab-pane active " id="tab_1">
              <div class="row justify-content-center my-2">
                <div class="col-md-10">
                  <form id="LogActivityStoreForm">
                    <textarea class="form-control" id="summary-ckeditor" name="summary-ckeditor"></textarea>
                  </form>
                </div>
              </div>
              <div class="row justify-content-center my-4">
                <div class="col-md-2">
                  <button type="button" class="btn btn-success px-4">Add Additional Info</button>
                </div>
              </div>
            </div>
            <!-- Attachments -->
            <div class="tab-pane " id="tab_2">
              <div class="row justify-content-center mb-4">
                <div class="col-md-10">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <tbody>
                        <?php if(count($attachements) > 0): ?>
                        <?php $__currentLoopData = $attachements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td class="text-bold">
                            <p href="javascript:void(0)" id="initial"><?php echo e($document->attachment_id); ?></p>
                          </td>
                          <td class="">
                            :
                          </td>
                          <td> <a target="_blank"
                              href="<?php echo e(url('/public/Client/ClientLog/')); ?>/<?php echo e($document->attachment_file); ?>"><?php echo e($document->attachment_file); ?></a>
                          </td>
                          <td class="">
                            <button type="button" onclick="LogAttachmentRemove('<?php echo e($document->attachment_id); ?>')"
                              class="btn btn-danger"><i class="fas fa-trash"></i></button>
                          </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        <tr  >
                          <td class="h4 text-bold text-center py-5" >
                            <p class="">There is no attachments</p>
                          </td>
                        </tr>
                        <?php endif; ?>
                      </tbody>
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
</div>

<script src="<?php echo e(url('public/plugins/jquery/jquery.min.js')); ?>"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script type="text/javascript">
var tables = '';
CKEDITOR.replace('summary-ckeditor');
$(function() {


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

function LogAttachmentRemove(attachment_id) {
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this file!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      $.get("<?php echo e(route('Visitor-Log-Attachemnt-Remove')); ?>", {
        attachment_id: attachment_id
      }, function(data) {
        console.log(data);
        // return false;
        if (data['success'] == true) {
          swal("Poof! Attachment has been deleted!", {
            icon: "success",
          });
          location.reload();
          //toastr.success('Employee Bank Detail Removed Successfully..')
          // let ContactDataTable = $("#ContactDataTable").dataTable();
          // ContactDataTable.fnPageChange('first', 1);
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchisty\resources\views/Visitor/VisitorView.blade.php ENDPATH**/ ?>