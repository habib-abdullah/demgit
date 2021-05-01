<?php $__env->startSection('content'); ?>

<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<section class="content mt-3">
    <div class="container-fluid">
        <!-- general form elements -->
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Manage Library</h3>
                <span id="input_error" style="float:right; padding-right: 10px;"></span>
            </div>
            <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddBookModal" data-whatever="@getbootstrap">Add Book</button>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
           
        </div>
    </div>
</section>

<div class="container" style="padding-top: 30px;padding-bottom: 30px;">
        
    <table class="table table-bordered" id="table">
        <thead>
            <tr>
                <th style="width:30px">UID</th>
                <th>Book Name</th>
                <th>Category</th>
                <th>Author</th>
                <th>Publisher</th>
                <th>Quantity</th>
                <th>Cover Image</th>
                <th style="width:80px">Action</th>
            </tr>
        </thead>
    </table>
</div>

<!-- Insert Book Modal -->
<div class="modal fade" id="AddBookModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="BookForm" enctype="multipart/form-data">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Book Name:</label>
            <input type="text" class="form-control" id="book_name" name="book_name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Category:</label>
            <select class="form-control" id="book_category" name="book_category">
            <option selected disabled>Select Category</option>
                <?php foreach($categories as $category): ?>
                <option value="<?php echo e($category->category_id); ?>"><?php echo e($category->category_name); ?></option>
                <?php endforeach; ?>
            </select>
            <button type="button" data-toggle="modal" data-target="#AddCategoryModal" data-whatever="@getbootstrap" class="btn btn-primary btn-sm mt-1 float-right">Add Category</button>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Author:</label>
            <select class="form-control " id="book_author" name="book_author">
              <option selected disabled>Select Author</option>
                <?php foreach($authors as $author): ?>    
                <option value="<?php echo e($author->author_id); ?>"><?php echo e($author->author_name); ?></option>
                <?php endforeach; ?>
            </select>
            <button type="button" data-toggle="modal" data-target="#AddAuthorModal" data-whatever="@getbootstrap" class="btn btn-primary btn-sm mt-1 float-right">Add Author</button>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Publisher:</label>
            <select class="form-control " id="book_publisher" name="book_publisher">
              <option selected disabled>Select Publisher</option>
                <?php foreach($publishers as $publisher): ?>    
                  <option value="<?php echo e($publisher->publisher_id); ?>"><?php echo e($publisher->publisher_name); ?></option>
                <?php endforeach; ?>
            </select>
            <button type="button" data-toggle="modal" data-target="#AddPublisherModal" data-whatever="@getbootstrap" class="btn btn-primary btn-sm mt-1 float-right">Add Publisher</button>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Quantity:</label>
            <input type="text" class="form-control" id="book_quantity" name="book_quantity">
          </div>
          
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Cover Image:</label>
            <input type="file" class="form-control" id="book_image" name="book_image">
          </div>
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="saveBook()" class="btn btn-primary">Insert</button>
      </div>
    </div>
  </div>
</div>
<!-- ./Insert Book Modal -->

<!-- Update Book Details Modal -->
<div class="modal fade" id="EditBookModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="LoadUpdatePreviousDetails">

        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="UpdateBook()" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
<!-- ./Update Book Details Modal -->

<!-- Insert Category Modal -->
<div class="modal fade" id="AddCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="CategoryForm">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Category Name:</label>
            <input type="text" class="form-control" id="category_name" name="category_name">
          </div>
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="AddCategory()" class="btn btn-primary">Insert</button>
      </div>
    </div>
  </div>
</div>
<!-- ./Insert Category Modal -->

<!-- Insert Author Modal -->
<div class="modal fade" id="AddAuthorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Author</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="AuthorForm">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Author Name:</label>
            <input type="text" class="form-control" id="author_name" name="author_name">
          </div>
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="AddAuthor()" class="btn btn-primary">Insert</button>
      </div>
    </div>
  </div>
</div>
<!-- ./Insert Author Modal -->
<!-- Insert Publisher Modal -->
<div class="modal fade" id="AddPublisherModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Publisher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="PublisherForm">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Publisher Name:</label>
            <input type="text" class="form-control" id="publisher_name" name="publisher_name">
          </div>
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="AddPublisher()" class="btn btn-primary">Insert</button>
      </div>
    </div>
  </div>
</div>
<!-- ./Insert Publisher Modal -->

<script>
$(function(){
    $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '<?php echo e(url('getBooksReport')); ?>',
        columns: [
                { data: 'book_id' },
                { data: 'book_title' },
                { data: 'category_name' },
                { data: 'author_name' },
                { data: 'publisher_name' },
                { data: 'book_quantity' },
                { 
                  data: 'book_image_path',
                  render:function(data){
                    var img = '<img src="http://localhost/hcoi/public/books/'+data+'" width="70" height="70" >';
                    return img;
                  }
                },
                
                { data: 'action' },
              ]
    });
});

function saveBook(){
  var book_name = $("#book_name").val();
  var book_category = $('#book_category option:selected');
  var book_author = $('#book_author option:selected');
  var book_publisher = $('#book_publisher option:selected');
  var book_quantity = $("#book_quantity").val();
  var book_image = $("#book_image").val();

  if(book_name == "" || $('#book_category option:selected').length == 0 || $('#book_author option:selected').length == 0 ||
  $('#book_publisher option:selected').length == 0 || book_quantity == "" || book_image == ""){
    $("form#BookForm input[type=text],input[type=file]").css("border-color","red");
    alert('Please Fill All Fields');
    return false;
  }

  // var formData = $('#BookForm').serialize()+ "&picture="+book_image;
  var BookForm = document.getElementById('BookForm');
	var formData = new FormData(BookForm);
  $.ajax({
    type: "post",
    url: "<?php echo e(url('insertBook')); ?>",
    data: formData,
    processData: false,
    contentType: false,
    success: function(data){
      console.log(data);
      if(data.includes('Inserted')){
        window.location.href = "<?php echo e(url('Library/BooksReport')); ?>";
      }
    }
  });

}
var base_url = "<?php echo e(url('/')); ?>";

function GetBookUpdateInfo(id){
  $.get("<?php echo e(url('GetBookUpdateInfo')); ?>/"+id+"",function(data){
    // console.log(data);
    $("#LoadUpdatePreviousDetails").html(data);
  });
}
function UpdateBook(){
  var book_id = $("#update_book_id").val();

  var UpdateForm = document.getElementById('UpdateBookForm');
	var formData = new FormData(UpdateForm);

  $.ajax({
    type: "POST",
    url:  "<?php echo e(url('UpdateBook')); ?>",
    data:  formData,
    contentType: false,
    processData: false,
    success: function(data){
      console.log(data);
      if(data.includes('Updated')){
        window.location.href = "<?php echo e(url('Library/BooksReport')); ?>";
      }
    }
  });
}
function RemoveBook(id){
  $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
	});
  var verifyOk = confirm('Sure to remove book: '+id);
  if(verifyOk == true){
    $.post("<?php echo e(url('RemoveBook')); ?>",{id:id},function(data) {
      console.log(data);
      if(data.includes('successfully')){
        window.location.href = "<?php echo e(url('Library/BooksReport')); ?>";
      }
    });
  }else{
			alert('Remove Cancel');
	}
}

// Insert Category Into Database
function AddCategory(){
  $.post("<?php echo e(url('AddCategory')); ?>",$("#CategoryForm").serialize(),function(data){
    console.log(data);
    if(data.includes('Inserted ')){
      $("#AddCategoryModal").modal('hide');
      $("#category_name").val('');
      
    }
  });
}
// Insert Author Into Database
function AddAuthor(){
  var author = $("#author_name").val();
  $.post("<?php echo e(url('AddAuthor')); ?>",$("#AuthorForm").serialize(),function(data){
    console.log(data);
    if(data.includes('Inserted ')){
      $("#AddAuthorModal").modal('hide');
      $("#author_name").val('');
    }
  });  
}
// Insert Publisher Into Database
function AddPublisher(){
  var publisher = $("#publisher_name").val();
  $.post("<?php echo e(url('AddPublisher')); ?>",$("#PublisherForm").serialize(),function(data){
    console.log(data);
    if(data.includes('Inserted ')){
      $("#AddPublisherModal").modal('hide');
      $("#publisher_name").val('');
    }
  });  
}

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hcoi\resources\views/Library/BooksReport.blade.php ENDPATH**/ ?>