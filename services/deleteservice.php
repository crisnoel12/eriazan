<?php
    session_start();
    require_once('../inc/config.php');
    require_once(ROOT_PATH.'inc/database.php');
    require_once(ROOT_PATH.'models/service.php');
    $db = new Database();
    $services = new Service($db);
    $id = intval($_GET['id']);

    if (empty($_SESSION['username'])){
        header("Location:" . BASE_URL . 'services');
        exit;
    }

    $service = $services->get($id);
    $services->delete($id);
    $_SESSION['flash-message'] = 'Deleted service ' . $service["name"];
    header("Location:./");
    exit;
