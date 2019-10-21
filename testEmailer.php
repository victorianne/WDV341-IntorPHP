<?php
 
 	include 'Emailer.php';		//get the class file

 	$customerMail = new Emailer(); //instantiate a new object from Emailer Class
 									//Instantiation - Make a new object aka an "instance"
 	$customerMail->setRecipientAddress("vascholten@dmacc.edu");

 	$customerMail->getRecipientAddress();

 	$customerMail->setEmailSubject("This is the Email Subject");

 	$customerMail->getEmailSubject();

 	$customerMail->setEmailMessage("This is the Email Message.");

 	$customerMail->getEmailMessage();

 	$customerMail->setSenderAddress("contact@vascholten.com");

 	$customerMail->getSenderAddress();

 	$customerMail->sendEmail();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Test Emailer</title>


</head>
	<body>

		<h1>WDV341 Intro PHP</h1>
			<h2>Test Emailer Class</h2>

				<p>Recipient Address: <?php echo $customerMail->getRecipientAddress(); ?></p>

				<p>Email Subject: <?php echo $customerMail->getEmailSubject(); ?></p>

				<p>Email Message: <?php echo $customerMail->getEmailMessage();
				 ?></p>

				<p>Sender Address: <?php echo $customerMail->getSenderAddress(); ?></p>
	</body>
</html>