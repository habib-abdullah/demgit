<form id="UpdatePdfBookForm" enctype="multipart/form-data">
<input type="hidden" value="<?php echo e($Ebook->e_library_id); ?>" id="update_pdf_id" name="update_pdf_id" >
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Pdf Name:</label>
            <input type="text" class="form-control" value="<?php echo e($Ebook->e_library_title); ?>" id="pdf_book_name" name="pdf_book_name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Pdf File:</label>
            <input type="file" class="form-control" id="pdf_book_file" name="pdf_book_file">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Category:</label>
            <select class="form-control" id="pdf_book_category" name="pdf_book_category">
                <option disabled>Select Category</option>
                <?php foreach($categories as $category): ?>
                  <option value="<?php echo e($category->category_id); ?>"><?php echo e($category->category_name); ?></option>
                <?php endforeach; ?>
            </select>
            <button type="button" data-toggle="modal" data-target="#AddCategoryModal" data-whatever="@getbootstrap" class="btn btn-primary btn-sm mt-1 float-right">Add Category</button>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Author:</label>
            <select class="form-control " id="pdf_book_author" name="pdf_book_author">
              <option>Select Author</option>
              <?php foreach($authors as $author): ?>
                <option value="<?php echo e($author->author_id); ?>"><?php echo e($author->author_name); ?></option>
              <?php endforeach; ?>
            </select>
            <button type="button" data-toggle="modal" data-target="#AddAuthorModal" data-whatever="@getbootstrap" class="btn btn-primary btn-sm mt-1 float-right">Add Author</button>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Publisher:</label>
            <select class="form-control " id="pdf_book_publisher" name="pdf_book_publisher">
              <option>Select Publisher</option>
              <?php foreach($publishers as $publisher): ?>
                <option value="<?php echo e($publisher->publisher_id); ?>"><?php echo e($publisher->publisher_name); ?></option>
              <?php endforeach; ?>
            </select>
            <button type="button" data-toggle="modal" data-target="#AddPublisherModal" data-whatever="@getbootstrap" class="btn btn-primary btn-sm mt-1 float-right">Add Publisher</button>
          </div>
          <!-- <div class="form-group">
            <label for="recipient-name" class="col-form-label">Quantity:</label>
            <input type="text" class="form-control" value="<?php echo e($Ebook->e_library_description); ?>" id="pdf_book_quantity" name="pdf_book_quantity">
          </div> -->
          
          <br>
          <div class="form-row">
            <div class="col">
                <label for="recipient-name" class="col-form-label">Cover Image:</label>
                <?php if($Ebook->e_library_cover_img): ?>
                <img src="<?php echo e(asset('public/pdf_books/images/'.$Ebook->e_library_cover_img)); ?>" alt="" height="100" width="100">
                <?php else: ?>
                <img src="<?php echo e(asset('public/books/NoImageAvailable.png')); ?>" alt="" height="100" width="100">
                <?php endif; ?>
            </div>
            <div class="col-4">
                <label for="recipient-name" class="col-form-label">Select Cover Image:</label>
                <input type="file" class="form-control" id="pdf_book_image" name="pdf_book_image">
            </div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Description:</label>
            <input type="text" class="form-control" value="<?php echo e($Ebook->e_library_description); ?>" id="pdf_book_description" name="pdf_book_description">
          </div>
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        </form><?php /**PATH C:\xampp\htdocs\hcoi\resources\views/Library/EBookUpdate.blade.php ENDPATH**/ ?>