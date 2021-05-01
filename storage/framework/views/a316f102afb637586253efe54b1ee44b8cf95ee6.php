<?php $__env->startSection('content'); ?>
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->

<section class="content mt-3">
    <div class="container-fluid">
        <!-- general form elements -->
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Books Manage</h3>
                <span id="input_error" style="float:right; padding-right: 10px;"></span>
            </div>
            <div class="card-body">
            <a href="<?php echo e(url('Library/BorrowedBooks')); ?>" class="float-right btn">See Borrowed Books</a>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
           
        </div>
    </div>
</section>

<div class="container">
	<div class="row">


	<div class="col-lg-5 col-md-6  mt-5">
			<h3>Issue Book</h3>
			<form id="IssueBookForm">
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
				<input type="hidden" name="admin_id" id="admin_id" value="<?php echo e(ucfirst(Auth()->user()->id)); ?>">
				<table class="table table-borderless" style="border:1px solid grey;">
					<tbody>
						<tr>
							<td><label for="" class="pt-2">Candidate Id</label></td>
							<td><input type="text" id="candidate_id" name="candidate_id" class="form-control"></td>
						</tr>
						<tr>
							<td><label for="" class="pt-2">Book Id</label></td>
							<td><input type="text" id="book_id" name="book_id"  class="form-control"></td>
						</tr>
						<tr>
							<td><label for="" class="pt-2">Issue Date</label></td>
							<td><input type="date" id="issue_date" name="issue_date"  class="form-control"></td>
						</tr>
						<!-- <tr>
							<td><label for="" class="pt-2">Return Date</label></td>
							<td><input type="date" id="return_date" name="return_date"  class="form-control"></td>
						</tr> -->
						<tr>
							<td></td>
							<td><button type="button" onclick="IssueBook()" class="btn btn-success float-right">Issue</button></td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>

		<div class="col-lg-5 col-md-6 mt-5">
			<h3>Return Book</h3>
			<form id="ReturnBookForm">
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
				<input type="hidden" name="admin_id" id="admin_id" value="<?php echo e(ucfirst(Auth()->user()->id)); ?>">
				<table class="table table-borderless" style="border:1px solid grey;">
					<tbody>
						<tr>
							<td><label for="" class="pt-2">Candidate Id</label></td>
							<td><input type="text" id="candidate_id" name="candidate_id" class="form-control"></td>
						</tr>
						<tr>
							<td><label for="" class="pt-2">Book Id</label></td>
							<td><input type="text" id="book_id" name="book_id"  class="form-control"></td>
						</tr>
						<!-- <tr>
							<td><label for="" class="pt-2">Issue Date</label></td>
							<td><input type="date" id="issue_date" name="issue_date"  class="form-control"></td>
						</tr> -->
						<tr>
							<td><label for="" class="pt-2">Return Date</label></td>
							<td><input type="date" id="return_date" name="return_date"  class="form-control"></td>
						</tr>
						<tr>
							<td></td>
							<td><button type="button" onclick="ReturnBook()" class="btn btn-success float-right">Return</button></td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
		
		
	</div>
</div>



<script>

$(function(){

});

function IssueBook(){
	// alert('borrow');
	var candidate_id = $("#candidate_id").val();
	var book_id = $("#book_id").val();
	var issue_date = $("#issue_date").val();
	var return_date = $("#return_date").val();

	if(candidate_id == '' || book_id == ''){
		alert('Please Select All Fields');
		return false;
	}

	$.post("<?php echo e(url('IssueBook')); ?>",$("#IssueBookForm").serialize(),function(data){
		console.log(data);
		if(data.includes('Issued')){
			location.reload();
		}
	});
}
function ReturnBook(){
	// alert('return');
// 	var candidate_id = $("#candidate_id").val();
// 	var book_id = $("#book_id").val();
// 	var issue_date = $("#issue_date").val();
// 	var return_date = $("#return_date").val();

// 	if(candidate_id == '' || book_id == ''){
// 		alert('Please Select All Fields');
// 		return false;
// 	}

	$.post("<?php echo e(url('ReturnBook')); ?>",$("#ReturnBookForm").serialize(),function(data){
		console.log(data);
		if(data.includes('Returned')){
			location.reload();
		}
	
	});
}

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hcoi\resources\views/Library/BooksTransaction.blade.php ENDPATH**/ ?>