<?php
	require_once('inc/config.php');
	$page = null;
	require_once(ROOT_PATH.'inc/partials/header.php');
?>
	<div class="container page-content">
		<div class="row">
            <div class="col-sm-10 col-sm-offset-1 heading text-center">
                <h1 style="text-align:center;">Sorry, the webpage you were looking for has been moved, removed or doesn't exist.</h1>
				<p><a href="javascript:history.go(-1)">Click here</a> to go back to where you were, or head to our <a href="<?php echo BASE_URL; ?>">home page</a>.</p>
            </div>
		</div>
	<?php require_once('inc/partials/footer.php'); ?>
