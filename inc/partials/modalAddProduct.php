<button id="addProductToggle" class="btn btn-default" href="#" data-toggle="modal" data-target="#addProductModal">Add a Product</button>
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Product</h4>
      </div>
      <div class="modal-body">
            <form class="" action="addproduct.php" method="post" enctype="multipart/form-data">
                <label for="name">Name</label>
                <input class="form-control input-lg" type="text" name="name" required>
                <label for="price">Price</label>
                <input class="form-control input-lg" type="number" name="price" value=".00" size="6" required>
                <label for="category">Category</label>
                <select class="form-control input-lg mySelect" class="" name="category" required>
                    <option>Select</option>
                    <?php
                        foreach ($categories as $category) {
                            echo '<option '.($_GET['categories'] == $category["category"] ? 'selected' : '').'>' . $category["category"] . '</option>';
                        }
                     ?>
                </select>
                <label for="fileToUpload">Image</label>
                <input class="form-control input-lg" type="file" name="fileToUpload" id="fileToUpload" required>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button id="encode" type="submit" class="btn btn-primary">Add Product</button>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>
