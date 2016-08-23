<?php
session_start();
require_once('../inc/config.php');
require_once(ROOT_PATH.'inc/database.php');
require_once(ROOT_PATH.'models/product.php');

$db = new Database();
$product = new Product($db);
$function = 'add';

if (empty($_SESSION['username'])){
    header("Location:" . BASE_URL . 'products');
    exit;
}

$name = htmlspecialchars(ucwords($_POST['name']), ENT_QUOTES);
$price = htmlspecialchars($_POST['price'], ENT_QUOTES);
$category = htmlspecialchars($_POST['category'], ENT_QUOTES);
$image = htmlspecialchars('img/' . basename($_FILES["fileToUpload"]["name"]), ENT_QUOTES);

if ($category == 'Select') {
    $_SESSION['flash-message'] = "Invalid category choice.";
    header("Location:./");
    exit;
}
$product->upload($function, null, null, $name, $price, $image, $category);
exit;
