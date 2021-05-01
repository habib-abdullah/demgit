<?php $__env->startSection('content'); ?>

<div class="card card-primary" >
    <div class="card-header bg-gradient-info" >
        <h3>Master Balance Transfer Report</h3>
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
<!-- Master Revert Modal -->
<div class="modal fade" id="MasterRevertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enter Amount</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="MainRevertForm">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="sender_id" name="sender_id" value="<?php echo e(Session::get('user_id')); ?>">
                    <input type="hidden" id="member_id" name="member_id">
                    <div class="form-group">
                        <label for="inputState">Revert Type</label>
                        <select id="voucher_type" name="voucher_type" class="form-control">
                            <option selected>Select</option>
                            <option value="main">Main Wallet</option>
                            <option value="dmr">DMR Wallet</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="inputState">Revert Amount</label>
                            <input type="number" id="wallet_amount" name="wallet_amount" class="form-control" placeholder="Main Wallet">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="inputState">Remarks</label>
                            <input type="text" id="remarks" name="remarks" class="form-control" placeholder="Remarks">
                        </div>
                    </div>
                </form>
            </div>
            <div id="response"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button onclick="MasterRevertBalance()" class="btn btn-primary">Revert</button>
            </div>
        </div>
    </div>
</div>
<!-- ./Master Revert Modal -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready( function () {
        $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "<?php echo e(url('GetMasterTransactions')); ?>",
            columns: [
                { data: 'member_name' },
                { data: 'voucher_type' },
                { data: 'TotalBalance' },
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
    function GetMasterRevertId(id){
        $.get("<?php echo e(url('GetMasterRevertId')); ?>",{master_id:id},function(data){
            $("#member_id").val(data);
            if(data.includes('Insufficient Balance')){
                aler('Insufficient Balance');
            }
        });
    }
    function MasterRevertBalance(){
        var id = $("#member_id").val();
        $.get("<?php echo e(url('MasterRevertBalance')); ?>",$("#MainRevertForm").serialize(),function(data){
            console.log(data);
            if(data.includes('Amount Revert Successfully')){
                window.location.href = "<?php echo e(url('Dashboard')); ?>";
            }
        });
    }
    // function GetMasterId(id){
    //     $.get("<?php echo e(url('GetMasterId')); ?>",{master_id:id},function(data){
    //         // console.log(data);
    //         var json = JSON.parse(data);
	// 	    $("#member_id").val(json["member_id"]);
    //     });
    // }
    // function TransferBalance(){
    //     var master_id = $("#master_id").val();
    //     $.post("<?php echo e(url('TransferBalance')); ?>",$("#TransferForm").serialize(),function(data){
    //         console.log(data);
    //     });
    // }
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PerfectRecharge\resources\views/MemberTransaction/MasterTransactionReport.blade.php ENDPATH**/ ?>