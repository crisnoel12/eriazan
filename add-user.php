<?php
    $page = null;
    require_once('inc/config.php');
    require_once(ROOT_PATH.'inc/partials/header.php');
    $hash = 'myhashedpassw0rd';
    if (empty($_SESSION['username']) || $usertype === 'guest') {
        header("Location:" . BASE_URL);
    }
    if (isset($_POST['encode'])) {
        $username = $_POST['username'];
        $password = sha1($hash . $_POST['password']);
        $usertype = $_POST['usertype'];

        if (strlen($_POST['password']) < 6 || strlen($_POST['password']) > 25) {
            $_SESSION['flash-message'] = 'Password must be between 6 and 25 characters';
        } else {
            $columns = implode(', ', ['username', 'password', 'usertype']);
            $values = implode("', '", [$username, $password, $usertype]);

            $db->create('users', $columns, $values);
            $_SESSION['flash-message'] = 'User '.  $username .' created successfully.';
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
            <h1>Add User</h1>
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
                <label for="price">Usertype</label>
                <select class="form-control input-lg mySelect" name="usertype" required>
                    <option>Select</option>
                    <option>Admin</option>
                    <option>Guest</option>
                </select>
                <br>
                <br>
                <button id="encode" name="encode" type="submit" class="btn btn-primary pull-right">Save User</button>
            </form>
        </div>
    </div>
    <?php require_once(ROOT_PATH.'inc/partials/footer.php'); ?>
