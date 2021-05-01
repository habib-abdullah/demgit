<form id="UpdateBookForm" enctype="multipart/form-data">
<input type="hidden"  value="<?php echo e($book->book_id); ?>" id="update_book_id" name="update_book_id">
    <div class="form-group">
    <label for="recipient-name" class="col-form-label">Book Name:</label>
    <input type="text" class="form-control" value="<?php echo e($book->book_title); ?>" id="update_book_name" name="update_book_name">
    </div>
    <div class="form-group">
    <label for="recipient-name" class="col-form-label">Category:</label>
    <select class="form-control" id="update_book_category" name="update_book_category">

        <option selected disabled>Select Category</option>
        <?php foreach($categories as $category): ?>    
            <option value="<?php echo e($category->category_id); ?>"><?php echo e($category->category_name); ?></option>
        <?php endforeach; ?>
    </select>
    <button type="button" data-toggle="modal" data-target="#AddCategoryModal" data-whatever="@getbootstrap" class="btn btn-primary btn-sm mt-1 float-right">Add Category</button>
    </div>
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">Author:</label>
        <select class="form-control " id="update_book_author" name="update_book_author">
            <option selected disabled>Select Author</option>
            <?php foreach($authors as $author): ?>    
                <option value="<?php echo e($author->author_id); ?>"><?php echo e($author->author_name); ?></option>
            <?php endforeach; ?>
        </select>
        <button type="button" data-toggle="modal" data-target="#AddAuthorModal" data-whatever="@getbootstrap" class="btn btn-primary btn-sm mt-1 float-right">Add Author</button>
    </div>
    <div class="form-group">
    <label for="recipient-name" class="col-form-label">Publisher:</label>
    <select class="form-control " id="update_book_publisher" name="update_book_publisher">
        <option selected disabled>Select Publisher</option>
        <?php foreach($publishers as $publisher): ?>    
            <option value="<?php echo e($publisher->publisher_id); ?>"><?php echo e($publisher->publisher_name); ?></option>
        <?php endforeach; ?>
    </select>
    <button type="button" data-toggle="modal" data-target="#AddPublisherModal" data-whatever="@getbootstrap" class="btn btn-primary btn-sm mt-1 float-right">Add Publisher</button>
    </div>
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">Quantity:</label>
        <input type="text" class="form-control" value="<?php echo e($book->book_quantity); ?>"  id="update_book_quantity" name="update_book_quantity">
    </div>
    
    <div class="form-row">
        <div class="col">
            <label for="recipient-name" class="col-form-label">Cover Image:</label>
            <?php if($book->book_image_path): ?>
            <img src="<?php echo e(asset('public/books/'.$book->book_image_path)); ?>" alt="" height="100" width="100">
            <?php else: ?>
            <img src="<?php echo e(asset('public/books/NoImageAvailable.png')); ?>" alt="" height="100" width="100">
            <?php endif; ?>
        </div>
        <div class="col-5">
            <label for="recipient-name" class="col-form-label">Select Cover Image:</label>
            <input type="file" class="form-control" id="update_book_image" name="update_book_image">
        </div>
    </div>
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
</form><?php /**PATH C:\xampp\htdocs\hcoi\resources\views/Library/BookUpdate.blade.php ENDPATH**/ ?>