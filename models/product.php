<?php
require_once('../inc/config.php');

class Product{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create($columns, $values)
    {
        $this->db->create('products', $columns , $values);
    }

    public function get($id)
    {
        $product = $this->db->selectWhere('products', 'id', $id);
        return $product;
    }

    public function getAll()
    {
        $products = $this->db->select('products', null);
        return $products;
    }

    public function getCategories()
    {
        $categories = $this->db->selectDistinct('products', 'category', null);
        return $categories;
    }

    public function update($id, $name, $price, $image, $category)
	{
		$this->db->update('products', array("name"=>$name, "price"=>$price, "category"=>$category, "image"=>$image), $id);
	}

    public function delete($id)
    {
        $this->db->delete('products', 'id', $id);
    }

    public function count($rows)
    {
        $count = $this->db->count($rows);
        return $count;
    }

    public function product_subset($first, $last, $all_products){
    	$subset = array();

    	$position = 0;

    	foreach($all_products as $product){
    		$position += 1;
    		if($position >= $first && $position <= $last){
    			$subset[] = $product;
    		}
    	}
    	return $subset;
    }

    public function category_product_subset($first, $last){
        if(isset($_GET['categories'])){
            $category = $_GET['categories'];
        }
        $products = $this->db->selectAllWhere('products', 'category', $category);

        $position = 0;

    	foreach($products as $product){
    		$position += 1;
    		if($position >= $first && $position <= $last){
    			$subset[] = $product;
    		}
    	}
    	return $subset;
    }

    public function display($products)
    {
        foreach ($products as $product) {
            echo "<div class='col-md-3 col-sm-6 product'>";
                echo '<img src="../' . $product["image"] . '"/>';
                echo '<div class="prod-info">';
                    echo "<p><b>" . $product['name'] . "</b>
                        <span class='price'>&#8369;" . $product['price'] . "</span>
                        </p>";
                    // ADMIN: Edit/Delete Products
                    if (!empty($_SESSION['username'])){
                        echo '<a href="editproduct.php?id='.$product["id"].'">Edit</a> / <a class="delete" href="deleteproduct.php?id='.$product["id"].'">Delete</a>';
                    }
                echo "</div>";
            echo "</div>";
        }
    }

    // Create and Update method, depending on $function(add/update)
    public function upload($function, $product = null, $id, $name, $price, $image, $category){
    	$uploadOk = true;
    	$target_dir = "../img/";
    	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    	// Check if image file is a actual image or fake image
    	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    	if($check !== false) {
    	    $uploadOk = true;
    	    // Check if file already exists
    	    if (file_exists($target_file)) {
    	        $_SESSION['flash-message'] = "Sorry, file already exists.";
    	        $uploadOk = false;
    	    }
    	    // Check file size
    	    if ($_FILES["fileToUpload"]["size"] > 200000) {
    	        $_SESSION['flash-message'] = "Sorry, your file is too large.";
    	        $uploadOk = false;
    	    }
    	    // Check file format
    	    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    	        $_SESSION['flash-message'] = "Sorry, only JPG, JPEG & PNG files are allowed.";
    	        $uploadOk = false;
    	    }
    	} else {
    	    $_SESSION['flash-message'] = "File is not an image.";
    	    $uploadOk = false;
    	}
    	if (!$uploadOk && !empty($check)) {
    		if ($function === 'add') {
    		    $_SESSION['flash-message'] = $_SESSION['flash-message'] . ' Product not uploaded, please try again.';
    		    header('Location:./');
    			exit;
    		}
    		if ($function === 'update') {
    		    $_SESSION['flash-message'] = $_SESSION['flash-message'] . ' Product not updated, please try again.';
    		    header('Location:./editproduct.php?id='. $product['id']);
    			exit;
    		}
    	} else {
    		if ($function === 'add') {
    			$columns = implode(', ', ['name', 'price', 'category', 'image']);
    			$values = implode("', '", [$name, $price, $category, $image]);
    			$this->create($columns , $values);
    		}
    		if ($function === 'update') {
    			if ($image !== $product['image']){
    		        unlink('../' . $product['image']);
    		    }
    		    $this->update($id, $name, $price, $image, $category);
    		}

    	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    	        //Resize image to 800 x 600
    	        if($imageFileType == "png"){
    	            $src = imagecreatefrompng($target_file);
    	        }else{
    	            $src = imagecreatefromjpeg($target_file);
    	        }
    	        list($width, $height) = getimagesize($target_file);
    	        $newWidth = 800;
    	        $newHeight = 600;
    	        $tmp = imagecreatetruecolor($newWidth, $newHeight);
    	        imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    	        if($imageFileType == "png"){
    	            imagepng($tmp, $target_file, 9);
    	        }else{
    	            imagejpeg($tmp, $target_file, 100);
    	        }
    	        imagedestroy($src);
    	        imagedestroy($tmp);
    	    }
    		if ($function === 'add') {
    			$_SESSION['flash-message'] = 'Product "'.$name.'" uploaded';
    			header('Location: ' . $_SERVER['HTTP_REFERER']);
    		    exit;
    		}
    		if ($function === 'update') {
    			$_SESSION['flash-message'] = 'Product updated succesfully.';
    		    header('Location:./editproduct.php?id='. $product['id']);
    			exit;
    		}
    	}
    }
}
