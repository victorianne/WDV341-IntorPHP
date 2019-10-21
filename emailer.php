<?php

	class Emailer {

		//The class will store information required to send a PHP email.
		// It will build an email and use the PHP mail().

		//Properties of the class

		private $emailMessage;			//body of email

		private $emailSubject;

		private $recipientAddress;

		private $senderAddress;


		function __construct()
		{
			//constructor function
		}


		//Setter Function akka mutators

		function setEmailMessage($inMessage){
			$this->emailMessage = $inMessage;
		}


	

		function setEmailSubject($inSubject){
			$this->emailSubject = $inSubject;
		}


	

		function setRecipientAddress($inAddress){
			$this->recipientAddress = $inAddress;
		}


	

		function setSenderAddress($inFromAddress){
			$this->senderAddress = $inFromAddress;
		}


	

		function getEmailMessage()
		{
			return $this->emailMessage;
		}

		function getEmailSubject()
		{
			return $this->emailSubject;
		}

		function getRecipientAddress()
		{
			return $this->recipientAddress;
		}

		function getSenderAddress()
		{
			return $this->senderAddress;
		}

		//Processing Function

		function sendEmail()
		{
			$fromAddress = "From:" . $this->getSenderAddress();

			mail($this->getRecipientAddress(), 
				$this->getEmailSubject(),
				$this->getEmailMessage(),
				$fromAddress
			);
		}

}


?>