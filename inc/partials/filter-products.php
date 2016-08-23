<form class="product-search" action="" method="get">
    <select class="form-control" name="categories">
        <option>All Products</option>
        <?php
            foreach ($categories as $category) {
                echo '<option '.($_GET['categories'] == $category["category"] ? 'selected' : '').'>' . $category["category"] . '</option>';
            }
         ?>
    </select>
    <button class="btn" type="submit">
        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
    </button>
</form>
