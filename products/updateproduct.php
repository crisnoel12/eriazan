<?php
session_start();
require_once('../inc/config.php');
require_once(ROOT_PATH.'inc/database.php');
require_once(ROOT_PATH.'models/product.php');
$db = new Database();
$products = new Product($db);
$function = 'update';

$id = $_GET['id'];

if (empty($_SESSION['username'])){
    header("Location:" . BASE_URL . 'products');
    exit;
}

$product = $products->get($id);

$name = htmlspecialchars(ucwords($_POST['name']), ENT_QUOTES);
$price = htmlspecialchars($_POST['price'], ENT_QUOTES);
$category = htmlspecialchars($_POST['category'], ENT_QUOTES);
$image = htmlspecialchars('img/'. basename($_FILES["fileToUpload"]["name"]), ENT_QUOTES);
if ($image === 'img/') {
    $image = $product["image"];
}

$products->upload($function, $product, $id, $name, $price, $image, $category);
