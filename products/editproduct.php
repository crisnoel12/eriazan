<?php
	require_once('../inc/config.php');
	require_once(ROOT_PATH.'inc/database.php');
	require_once(ROOT_PATH.'models/product.php');
	$db = new Database();
	$products = new Product($db);
    $id = intval($_GET['id']);
    $product = $products->get($id);
    $categories = $products->getCategories();

    $page = null;
    include(ROOT_PATH.'inc/partials/header.php');

	if (empty($_SESSION['username'])){
		header("Location:" . BASE_URL . 'products');
		exit;
	}
    ?>
    <div class="container page-content">
        <div class="row">
			<?php
			if (isset($_SESSION['flash-message'])) {
				echo '<p class="flash-message bg-primary">
					'. $_SESSION['flash-message'] .'
					<button id="flash-message-close" type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</p>';
					unset($_SESSION['flash-message']);
			}
			?>
            <div class="col-sm-10 col-sm-offset-1 heading">
                <h1>EDIT PRODUCT</h1>
            </div>
            <div class="col-sm-3 col-sm-offset-1">
                <?php
                    echo '<img width="250px" src="../' . $product["image"] . '"/>';
                 ?>
            </div>
            <div class="col-sm-6">
				<?php
                	echo '<form class="" action="updateproduct.php?id='. $product['id'] .'" method="post" enctype="multipart/form-data">';
                    echo '<label for="name">Name</label>';
                    echo '<input class="form-control input-lg" type="text" name="name" value="'.$product["name"].'" required>';
                    echo '<label for="price">Price</label>';
                    echo '<input class="form-control input-lg" type="number" name="price" value="'.$product["price"].'" size="6" required>';
                    echo '<label for="category">Category</label>';
                    echo '<select class="form-control input-lg mySelect" class="" name="category" required>';
                        echo '<option>Select</option>';
                        foreach ($categories as $category) {
                            echo '<option '.($product['category'] == $category["category"] ? 'selected' : '').'>' . $category["category"] . '</option>';
                        }
                    echo '</select>';
                    echo '<label for="fileToUpload">Image</label>';
                    echo '<input class="form-control input-lg" type="file" name="fileToUpload" id="fileToUpload">';
                    echo '<br><button id="encode" name="encode" type="submit" class="btn btn-primary pull-right">Save Changes</button>'
                    ?>
                </form>
            </div>
        </div>

    <?php require_once(ROOT_PATH.'inc/partials/footer.php'); ?>
