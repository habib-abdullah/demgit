<?php $__env->startSection('content'); ?>

<div class="card card-outline card-primary" >
    <div class="card-header bg-gradient-indigo" >
        <h3>Master Distributor Balance Report</h3>
        <!-- <span id="input_error" style="float:right; padding-right: 10px;"></span> -->
    </div>
    <div class="container" style="padding-top: 30px;padding-bottom: 30px;">
        <table class="table table-bordered" id="table">
            <thead class="table-primary">
                <tr>
                    <th>Member Name</th>
                    <th>Wallet Type</th>
                    <th>Balance</th>
                    <th style="width:30px">Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div class="modal fade" id="TransferModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Transfer Amount</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="TransferForm">
            <input type="hidden" id="member_id" name="member_id">
            <?php echo csrf_field(); ?>
            <!-- <div class="form-row"> -->
                <div class="form-group">
                    <label for="inputState">Transfer Type</label>
                    <select id="wallet_type" name="wallet_type" class="form-control">
                        <option selected>Select</option>
                        <option value="1">Main Wallet</option>
                        <option value="2">DMR Wallet</option>
                    </select>
                </div>
            <!-- </div> -->
            <div class="form-group">
                <label for="inputAddress2">Amount</label>
                <input type="text" class="form-control" id="main_amount" name="main_amount" placeholder="Enter Amount">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Remarks</label>
                <textarea id="remarks" name="remarks" class="form-control" rows="2"></textarea>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="TransferBalance()" class="btn btn-primary">Transfer</button>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready( function () {
        $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "<?php echo e(url('TransactionReport')); ?>",
            columns: [
                { data: 'member_name' },
                { data: 'voucher_type' },
                { data: 'TotalCredit' },
                { data: 'action' }
            ]
        });
    });

    function RemoveMaster(id){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var verifyOk = confirm('Sure to remove user: '+id);
        if(verifyOk == true){
            $.post("<?php echo e(url('RemoveMaster')); ?>",{id:id},function(data){
                console.log(data);   
                if(data.includes('deleted')){
                    location.reload();
                }   
            });
        }
    }
    function GetMasterId(id){
        $.get("<?php echo e(url('GetMasterId')); ?>",{master_id:id},function(data){
            // console.log(data);
            var json = JSON.parse(data);
		    $("#member_id").val(json["member_id"]);
        });
    }
    function TransferBalance(){
        var master_id = $("#master_id").val();
        $.post("<?php echo e(url('TransferBalance')); ?>",$("#TransferForm").serialize(),function(data){
            console.log(data);
        });
    }
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PerfectRecharge\resources\views/report.blade.php ENDPATH**/ ?>