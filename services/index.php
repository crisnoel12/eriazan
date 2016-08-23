<?php
	$page = "Services";
	require_once('../inc/config.php');
	require_once(ROOT_PATH.'models/service.php');
	require_once(ROOT_PATH.'inc/partials/header.php');
	$service = new Service($db);
	$services = $service->getAll();
?>

<div class="container page-content">
    <div class="row">
		<?php
			// ADMIN: Flash Message
			require_once(ROOT_PATH.'inc/partials/flash-message.php');
		?>
        <div class="col-md-11 col-md-offset-1 heading">
            <h1>SERVICES</h1>
			<?php
				// ADMIN: Add Service
				if (!empty($_SESSION['username'])){
					require_once(ROOT_PATH.'inc/partials/modalAddService.html');
				}
			?>

        </div>
    </div>
	<div class="row section services-content">
		<div class="col-md-4 col-md-offset-1">
			<img src="../img/beauty-fashion.jpg" alt="Toner, Skin by kerdkanno at pixabay.com">
		</div>
		<div class="col-md-6">
			<p><b>Our skin clinic's objective</b> is to give our clients the latest, the most effective and the most affordable treatments based on what their particular skin needs. Our list of services include the following:</p>
            <ul class="services-list">
				<?php
					// Display Services
					$service->display($services);
				 ?>
            </ul>
		</div>
	</div>

    <?php require_once(ROOT_PATH.'inc/partials/footer.php'); ?>
