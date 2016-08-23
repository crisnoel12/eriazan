<?php
	require_once(ROOT_PATH.'inc/database.php');
	$db = new Database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php if(!empty($page)){ if($page !== "Home"){ echo $page."&thinsp;&vert;&thinsp;"; }}?>Eriazan Skin Clinic</title>

	<?php include(ROOT_PATH.'inc/partials/meta-data.php'); ?>

	<link rel="icon" type="image/ico" href="<?php echo BASE_URL; ?>favicon.ico">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.0.0/normalize.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700|Arimo:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>css/app.css">
</head>
<body>
    <?php
		session_start();
		if (isset($_SESSION['username'])) {
			$user = $db->selectWhere('users', 'username', $_SESSION['username']);
			$usertype = $user['usertype'];
		}
	?>
    <?php include(ROOT_PATH.'inc/partials/nav.php'); ?>
