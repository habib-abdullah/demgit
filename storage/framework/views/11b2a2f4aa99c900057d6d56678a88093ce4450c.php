<div class="row">
    <div class="col-lg-6">
        <h3 style="text-align:center;">Upload Documents</h3>
        
        
        
        
        
        
        
        
        <form id="document_form" class="form-inline" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">
            <div class="form-group mx-sm-3 mb-2">
                <input type="hidden" name="candidate_id" id="candidate_id" value="<?php echo e($row->candidate_id); ?>">
                <input type="text" name="document_name" id="document_name" class="form-control" placeholder="Document Name">
                <input type="file" name="document_file" id="document_file" accept="application/pdf" class="form-control ml-2">
                <button type="button" id="submit_btn" onclick="submitDocument()" class="btn btn-primary ml-2">Upload</button>
            </div>
            
            <!-- <a target="_blank"  href="<?php echo e(url('/FormPrint')); ?>/<?php echo e($row->candidate_id); ?>">Print Form</a> -->
        </form>
        
    </div>
    
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
//Add Documents
function submitDocument(){
    var document_name = $("#document_name").val();
    var document_file = $("#document_file").val();
    var candidate_uid = $("#candidate_uid").val();
    // console.log(candidate_uid+' Name: '+document_name+' File: '+document_file);
    if(document_name == "" || document_file == ""){
        alert('Please Enter Name And File');
        return false;
    }
    var document_form = document.getElementById('document_form');
    var formData = new FormData(document_form);
    //console.log(formData);
    $.ajax({
        url : '<?php echo e(url('submitDocument')); ?>',
        type : 'POST',
        data : formData,
        contentType : false,
        processData : false,
        success : function(data){
            console.log(data);
            // alert(data);
            if(data.includes('Uploaded')){
                location.reload();
            }
        }
    });
 }
//Remove Document
function removeDoc(id){
    var verifyOk = confirm('Sure to remove document');
    if(verifyOk == true){
        $.get('<?php echo e(url('removeDocument')); ?>',{id:id},function(data){
            console.log(data);
            if(data.includes('Removed')){
                location.reload();
            }
        });
    }
}
</script><?php /**PATH C:\xampp\htdocs\hcoi\resources\views/Admission/upload.blade.php ENDPATH**/ ?>