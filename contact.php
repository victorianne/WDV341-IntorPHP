<?php 

	include '../emailer.php';


	$firstname = "";
	$lastname = "";
	$email = "";
	$session = "";
	$message = "";
	$firstnameErrMsg = "";
	$lastnameErrMsg = "";
	$emailErrMsg = "";
	$optionErrMsg = "";

	$validForm = false;
	

	if(isset($_POST["submit"]))
	{
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$session = $_POST['session'];

	function validateFirstName($inputValue)
	{
				global $validForm, $firstnameErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
				$firstnameErrMsg = "";
				
				if($inputValue == "")
				{
					$validForm = false;
					$firstnameErrMsg = "Name cannot be spaces";
				}
			}//end validateRequiredField()

	function validateLastName($inputValue)
	{
				global $validForm, $lastnameErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
				$lastnameErrMsg = "";
				
				if($inputValue == "")
				{
					$validForm = false;
					$lastnameErrMsg = "Name cannot be spaces";
				}
			}//end validateRequiredField()

	function validateEmailField($inputValue)
	{
	global $validForm, $emailErrMsg;

	$emailErrMsg = "";

	if (!filter_var($inputValue, FILTER_VALIDATE_EMAIL) === true)
	{
		$validForm = false;
		$emailErrMsg = "Email is invalid";	
	}
	}

	



 function validateOptionList($inputValue)
{
	global $validForm, $optionErrMsg;

	$optionErrMsg = "";

	if (trim($inputValue)=="")
	{
		$validForm = false;
		$optionErrMsg = "Option List is required";
	}
	

}//end of validateOptionList





			validateFirstName($firstname);
			validateLastName($lastname);
			validateEmailField($email);
			validateOptionList($session);

   


    function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
} 

   if (empty($_POST["message"])) {
    $message = "";
  } else {
    $message = test_input($_POST["message"]);
  }

 
	

	}

 ?>

<!DOCTYPE html>
<html>
<style>

.error	{
	color:red;
	font-style:italic;	
}

</style>
<head>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/events.css"> 


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Let's Chat</title>
</head>
  <script>
		function clearForm() {
			//alert("inside clearForm()");
			$('.error').html("");					//Clear all span elements that have a class of 'errMsg'. 		
			$('input:text').removeAttr('value');	//REMOVE the value attribute supplied by PHP Validations
			$('textarea').html("");					//Clear the textarea innerHTML
		}
	</script>

<body>
	<link href="https://fonts.googleapis.com/css?family=Julius+Sans+One&display=swap" rel="stylesheet">
	<div class="page_container">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.html">
        <img src="photos/logoBlack.gif" class="img-fluid" alt="Responsive image" width="100px" height="100px"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                 <a class="nav-link" href="index.html">Home<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                 <a class="nav-link" href="eventEdit.php">Events</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="about.php">About</a>
              </li>
               <li class="nav-item">
                  <a class="nav-link" href="contact.php">Lets Chat</a>
              </li>
               <li class="nav-item">
            <a class="nav-link" href="loginForm.php">Login</a>
        </li>
      </ul>
       
    </span>
   
    </div>
   
    </nav>
	<h1>Lets Chat</h1>
	<div id="formcontainer">
	<form id="contact" name="contact" method="post" action=""">
	<legend>Contact Me!</legend>
	<p style="font-style:italic;">Send me a message. I would love to hear from you!</p>
	
	<fieldset1>
		<div>
			<label for="firstname">First Name</label>
			<input id="firstname" name="firstname" type="text" value="<?php echo $firstname; ?>">
			<span class="error">* <?php echo $firstnameErrMsg;?></span>
		</div><!--close first name label-->
		
		<div>
			<label for="lastname">Last Name</label>
			<input id="lastname" name="lastname" type="text" value="<?php echo $lastname ?>">
			<span class="error">* <?php echo $lastnameErrMsg;?></span>
		</div><!--close last name label-->
		
		<div>
			<label for="email">Email Address</label>
			<input id="email" name="email" type="text" class="Emailer" placeholder="name@anywhere.com" value="<?php echo $email ?>">
			<span class="error">* <?php echo $emailErrMsg;?></span>
		</div><!--close email label-->
	
		<div>
			<label for="session">Topic</label>
			<select id="session" name="session">
				<option value="" <?php if($session==""){echo "selected='selected'";}?>>Select</option>
				<option value="senior"<?php if($session=="senior"){echo "selected='selected'";}?>>Senior Session</option>
				<option value="wedding" <?php if($session=="wedding"){echo "selected='selected'";}?>>Wedding Session</option>
				<option value="engagement" <?php if($session=="engagement"){echo "selected='selected'";}?>>Engagement Session</option>
				<option value="family" <?php if($session=="family"){echo "selected='selected'";}?>>Family Session</option>
				<option value="other" <?php if($session=="other"){echo "selected='selected'";}?>>Other</option>
			</select>
			<span class="error">* <?php echo $optionErrMsg;?></span>
		</div><!--close topic pull down-->
	
	</fieldset1>
	
	<fieldset2>
		<div>
			<label for="message">Message</label>
			<textarea id="message" name="message" rows="5" cols="45" value="message" required><?php echo $message ?></textarea>
		</div><!--close message label-->
		
		<div>
			<input type="submit" id="button" name="submit" value="Submit">
			<input type="reset" id="button" name="button" onclick="clearForm()" value="Reset">
		</div>
	</fieldset2>
</form>
	
	
	
	</div><!-- close form container-->
			
		<footer>
	<p>Copyright &copy; <script> var d = new Date(); document.write (d.getFullYear());</script> All Rights Reserved</p>
</footer>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>