<?php
	session_start();
	require_once('inc/config.php');
	require_once(ROOT_PATH.'inc/database.php');
    unset($_SESSION['username']);
    $_SESSION['flash-message'] = 'You have logged out.';
    header('location:'. BASE_URL . 'esc-login');
?>
