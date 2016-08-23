<?php
    $page = null;
    require_once('../inc/config.php');
    require_once(ROOT_PATH.'inc/partials/header.php');
    $hash = 'myhashedpassw0rd';

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = sha1($hash . $_POST['password']);
        $user = $db->selectWhere('users', 'username', $username);
        if($user > 0){
            if ($user['password'] === $password) {
                $_SESSION['username'] = $username;
                header("Location:../");
            } else {
                $_SESSION['flash-message'] = 'Password is incorrect, please try again.';
            }
        } else {
            $_SESSION['flash-message'] = 'User does not exist.';
        }
    }
?>
<div class="container page-content">
    <div class="row">
        <?php
			// ADMIN: Flash Message
			require_once(ROOT_PATH.'inc/partials/flash-message.php');
		?>
        <div class="col-sm-6 col-sm-offset-3 heading">
            <h1>Login</h1>
            <form class="" action="" method="post">
                <br>
                <label for="name">Username</label>
                <input class="form-control input-lg" type="text" name="username" required>
                <br>
                <br>
                <label for="price">Password</label>
                <input class="form-control input-lg" type="password" name="password" required>
                <br>
                <br>
                <button name="login" type="submit" class="btn btn-primary pull-right">LOGIN</button>
            </form>
        </div>
    </div>
    <?php require_once(ROOT_PATH.'inc/partials/footer.php'); ?>
