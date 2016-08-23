<?php
    session_start();
    require_once('../inc/config.php');
    require_once(ROOT_PATH.'inc/database.php');
    require_once(ROOT_PATH.'models/service.php');
    $db = new Database();
    $service = new Service($db);
    $serviceName = htmlspecialchars(ucwords($_POST['serviceName']), ENT_QUOTES);
    if (empty($_SESSION['username'])){
        header("Location:" . BASE_URL . 'services');
        exit;
    }

    $service->create($serviceName);
    $_SESSION['flash-message'] = 'Successfully added ' . $serviceName . ' to service list.';
    header("Location:./");
    exit;
