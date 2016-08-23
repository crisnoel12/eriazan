<?php
// PHPmailer email send
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$name = htmlspecialchars(trim(ucwords($_POST["name"])), ENT_QUOTES);
	$email = htmlspecialchars(trim($_POST["email"]), ENT_QUOTES);
	$subject = htmlspecialchars(trim(ucwords($_POST["subject"])), ENT_QUOTES);
	$message = htmlspecialchars(trim($_POST["message"]), ENT_QUOTES);

	if($name == "" OR $email == "" OR $subject == "" OR $message == ""){
		echo "Please fill all required fields.";
		exit;
	}

	foreach($_POST as $value){
		if(stripos($value,'Content-Type:') !== False){
			echo "There was a problem with the information you entered.";
			exit;
		}
	}

	if ($_POST["address"] != ""){
		echo "Your form submission has an error.";
		exit;
	}

	require '../inc/phpmailer/PHPMailerAutoload.php';
	$mail = new PHPMailer();

	if(!$mail->ValidateAddress($email)){
		echo "You must specify a valid email address.";
	}
	$email_body = "";
	$email_body = $email_body . "Name: " . $name . "<br>";
	$email_body = $email_body . "Email: " . $email . "<br>";
	$email_body = $email_body . "Message: " . $message;
	//$mail->SMTPDebug = 3;                               // Enable verbose debug output
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'youremail@email.com';                 // SMTP username
	$mail->Password = 'yourpassword';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to
	$mail->SetFrom($email, $name);
    $address = "youremail@email.com";
    $mail->AddAddress($address, "Eriazan Skin Clinic");
    $mail->addReplyTo($email, $name);
    $mail->Subject    = $subject. " | Eriazan Skin Clinic Contact Us";
    $mail->MsgHTML($email_body);

    if(!$mail->Send()) {
      echo "There was a problem sending the email: " . $mail->ErrorInfo;
      exit;
    }

	header("Location: index.php?status=thanks");
	exit;
}
?>
<?php
	$page = "Contact";
	require_once('../inc/config.php');
	require_once('../inc/partials/header.php');
?>

<div class="container page-content">
    <div class="row">
        <div class="col-sm-11 col-sm-offset-1 heading">
            <h1>CONTACT US</h1>
			<?php if (isset($_GET["status"]) AND $_GET["status"] == "thanks"){?>
				<p>Thanks for the email, we'll reply to you as soon as possible.</p>
				<?php header("refresh:3; url=./"); ?>
			<?php } else { ?>
        </div>
    </div>

	<!-- Contact Form -->
	<div class="row section">
		<div class="col-sm-6 col-sm-offset-1">
            <form class="contact-form" action="" method="post">
                <input class="form-control input-lg" type="text" name="name" id="name" required="" placeholder="Name">
                <input class="form-control input-lg" type="text" name="email" id="email" required="" placeholder="Email">
                <input class="form-control input-lg" type="text" name="subject" id="subject" required="" placeholder="Subject">
                <textarea class="form-control input-lg" rows="4" name="message" id="message" required="" placeholder="Message"></textarea>
                <input type="text" class="form-control input-lg" placeholder="(2+1) x 10 =" id="captcha" required="" pattern="30" data-validation-required-message="Please prove you're a human." aria-invalid="false">
                <input class="send-btn" type="submit" value="Send">
            </form>
		</div>

		<!-- Contact Details -->
		<div class="col-sm-4">
            <table class="contact-details">
                <tr>
                    <th>
                        <span class="glyphicon glyphicon-earphone"></span>
                        <label>Phone Number</label>
                    </th>
                </tr>
                <tr>
                    <td>+63(916)223-4018</td>
                </tr>
                <tr>
                    <th>
                        <span class="glyphicon glyphicon-envelope"></span>
                        <label>Email</label>
                    </th>
                </tr>
                <tr>
                    <td>eriazanskinclinic@gmail.com</td>
                </tr>
                <tr>
                    <th>
                        <span class="glyphicon glyphicon-home"></span>
                        <label>Location</label>
                    </th>
                </tr>
                <tr>
                    <td>4118 Brgy. Pasong Langka, Silang, Cavite, Philippines</td>
                </tr>
            </table>

			<!-- Map -->
            <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
			<div id='gmap_canvas'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style><script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(14.2183093,120.97285360000001),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(14.2183093,120.97285360000001)});infowindow = new google.maps.InfoWindow({content:'<strong>Next To Angelfields</strong><br>Silang, Cavite, Ph<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
		</div>
	</div>
	<?php } ?>
    <?php require_once(ROOT_PATH.'inc/partials/footer.php'); ?>
