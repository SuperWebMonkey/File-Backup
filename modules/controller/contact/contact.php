<?php
	//source https://www.youtube.com/watch?v=Iv93yjdvkWI
	$name = $_Post['name'];
	$visitor_email = $_Post['email'];
	$message = $_POST['message'];
	
	$email_from = 'random@email.com';
	$email_subject = "New Form Submission";
	$email_body = "User name: $name. \n" .
				  "User Email: $visitor_email. \n" .
				  "User Message: $message. \n";
	
	$to = "random2@email.com";
	$headers = "From: $email_from \r\n";
	$headers .= "Reply-to: $visitor_email \r\n";
	mail($to, $email_subject, $email_body, $header);
	
	header("Location: contact.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>contact</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>
	<!--source: https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php -->
    <div class="contact-title">
        <h1>Say Hello</h2>
        <h2>We are always ready</h2>
	</div>
	<div class="contact-form">
        <form id="contact-form" action="contact.php" method="post">
            <input name="name" type="text" class="form-control" placeholder="Your name" required><br>
			<input name="email" type="email" class="form-control" placeholder="Your email" required><br>
			<textarea name="message" class="form-control" placeholder="Message" row="4" required
			</textarea><br>
			<input type="submit" class="form-control submit" value="SEND MESSAGE">	
		</form>
    </div>    
</body>
</html>
