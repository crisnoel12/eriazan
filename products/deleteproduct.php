<?php
    session_start();
    require_once('../inc/config.php');
    require_once(ROOT_PATH.'inc/database.php');
    require_once(ROOT_PATH.'models/product.php');
    $db = new Database();
    $products = new Product($db);
    $id = $_GET['id'];

    if (empty($_SESSION['username'])){
		header("Location:" . BASE_URL . 'products');
		exit;
	}
    $product = $products->get($id);
    $products->delete($id);
    unlink(ROOT_PATH.$product["image"]);
    $_SESSION['flash-message'] = 'Deleted product "'. $product['name'] . '"';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
