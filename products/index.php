<?php
	$page = "Products";
	require_once('../inc/config.php');
	require_once(ROOT_PATH.'models/product.php');
	require_once(ROOT_PATH.'inc/partials/header.php');
	$product = new Product($db);

	$all_products = $product->getAll();
	$categories = $product->getCategories();
	$product_count = $product->count($all_products);
	$products_per_page = 16;

	// Pagination Algorithm
	if (!isset($_GET["pg"])) {
		$current_page = 1;
	} else {
		$current_page = $_GET["pg"];
	}
	// Calculate total number of pages
	$total_pages = ceil($product_count/$products_per_page);
	$current_page = intval($current_page);

	// Redirect user to last page if they manually enter a page number in the url greater than $total_pages
	if ($current_page > $total_pages) {
		header("Location: ./?pg=" . $total_pages);
	}
	// If less than 1st page, redirect to index
	if ($current_page < 1) {
		header("Location: ./");
	}

	// Calculate the subset of products for current page to display
	$first = (($current_page - 1) * $products_per_page);
	$last = $current_page * $products_per_page;
	// Adjust $last on last page to equal the product total
	if ($last > $product_count) {
		$last = $product_count;
	}
	$products = $product->product_subset($first, $last, $all_products);

	// Adjust product display when a category is selected
	if(isset($_GET['categories']) && $_GET['categories'] !== "All Products"){
		$selected_category = $_GET['categories'];
		$products = $product->category_product_subset($first, $last);
		$product_count = $product->count($products);
		$total_pages = ceil($product_count/$products_per_page);
	}

?>
<div class="container page-content">
    <div class="row">
		<?php
			// ADMIN: Flash Message
			require_once(ROOT_PATH.'inc/partials/flash-message.php');
		?>
        <div class="col-sm-10 col-sm-offset-1 heading">
            <h1>PRODUCTS</h1>
			<?php
				// Filter Products
				require_once(ROOT_PATH.'inc/partials/filter-products.php');
				// ADMIN: Add Product
				if (!empty($_SESSION['username'])){
					require_once(ROOT_PATH.'inc/partials/modalAddProduct.php');
				}
			?>
        </div>
    </div>
	<div class="row section products-content">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="row">
				<?php
					// Display Products
					$product->display($products);

					// Pagination
					require_once(ROOT_PATH.'inc/partials/pagination.php');
				 ?>
            </div>
        </div>
	</div>

    <?php require_once(ROOT_PATH.'inc/partials/footer.php'); ?>
