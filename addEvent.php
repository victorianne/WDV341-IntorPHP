<?php

//include 'formClass.php';
 
 //$validateTool = new FormValidation(); //instantiate a new object

		$eventName = "";
		$eventDescription = "";
		$eventLocation = "";
		$eventDate = "";
		$eventTime = "";
		$event_name = "";
		$event_description = "";
		$event_location = "";
		$event_date = "";
		$event_time = "";
		$eventNameErrMsg = "";
		$descriptionErrMsg = "";
		$presenterErrMsg = "";

		$validForm = false;

if(isset($_POST["submit"]))
	{	

		$eventName = $_POST['eventName'];
		$eventDescription = $_POST['eventDescription'];
		$eventLocation = $_POST['eventLocation'];
		$eventDate = $_POST['eventDate'];
		$eventTime = $_POST['eventTime'];

	
	function validateDescription($inputValue)
	{
				global $validForm, $descriptionErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
				$descriptionErrMsg = "";
				
				if($inputValue == "")
				{
					$validForm = false;
					$descriptionErrMsg = "Name cannot be spaces";
				}
			}//end validateRequiredField()

	function validateEventName($inputValue)
	{
				global $validForm, $eventNameErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
				$eventNameErrMsg = "";
				
				if($inputValue == "")
				{
					$validForm = false;
					$eventNameErrMsg = "Name cannot be spaces";
				}
			}//end validateRequiredField()

	function validateLocation($inputValue)
	{
				global $validForm, $presenterErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
				$presenterErrMsg = "";
				
				if($inputValue == "")
				{
					$validForm = false;
					$presenterErrMsg = "Name cannot be spaces";
				}
			}//end validateRequiredField()


	$validForm = true;

	validateEventName($eventName);
	validateDescription($eventDescription);
	validateLocation($eventLocation);


require_once("connect.php");

if($validForm)
{
	$message = "All good";

	try {																																												

	
	//$eventDate = date("Y-m-d");
	//$eventTime = date("h:i:00");
		$todaysDate = date("Y-m-d");
	

		$sql = "INSERT INTO final_event (event_id, event_name, event_description, event_location, event_date, event_time)
		VALUE (NULL, :eName, :eDescription, :eLocation, :eDate, :eTime);";

		//echo $sql;

		$statement = $conn->prepare($sql);

		$statement->bindParam(':eName', $eventName);
		$statement->bindParam(':eDescription', $eventDescription);
		$statement->bindParam(':eLocation', $eventLocation);
		$statement->bindParam(':eDate', $eventDate);
		$statement->bindParam(':eTime', $eventTime);

		$statement->execute();

		$message = "The Event you have create was submitted successfully. Thank you for you submission!";
	} //end of try
	catch(PDOExepction $e)
	{
		$message = "There has been a problem. Please try again later.";

		error_log($e->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
	}

} //end of if statement
else
{
	$message = "Something went wrong";
}

}; //end of submit
?>

<!DOCTYPE html>
<html>
<head>
	  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/events.css"> 


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

	<title>Add Event</title>
</head>
<script>
		$(function() {
			$('#eventDate').datepicker({dateFormat: "yy-mm-dd"});	//set datepicker format to yyyy-mm-dd to match database expected format
		} );
		
		$(function() {
			$('#eventTime').timepicker({ 'timeFormat': 'h:i A' });	//set datepicker format to yyyy-mm-dd to match database expected format
		} );
			
		
	</script>
<style>

.error	{
	color:red;
	font-style:italic;	
}

</style>
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
                  <a class="nav-link" href="contact.php">Let's Chat</a>
              </li>
               <li class="nav-item">
            <a class="nav-link" href="loginForm.php">Login</a>
        </li>
      </ul>
       
    </span>
   
    </div>
   
    </nav>
<div class="container">
<form id="addEvent" name="addEvent" method="post" action="addEvent.php">
  <h3>Events Insert Form</h3>
  	<?php
            //If the form was submitted and valid and properly put into database display the INSERT result message
			if($validForm)
			{
        ?>
      <h2><?php echo $message ?></h2>
      	<?php
			}
			else	//display form
			{
        ?>

      <p>
        <label for="eventName">Event Name:</label>
        <input type="text" name="eventName" id="eventName" value="<?php echo $eventName; ?>">
        <span class="error">* <?php echo $eventNameErrMsg;?></span>
      </p>
      <p>
        <label for="eventDescription">Event Description:</label>
        <input type="text" name="eventDescription" id="eventDescription" value="<?php echo $eventDescription;  ?>">
        <span class="error">* <?php echo $descriptionErrMsg;?></span>
      </p>
      <p>
        <label for="eventPresenter">Event Location: </label>
        <input type="text" name="eventLocation" id="eventLocation" value="<?php echo $eventLocation;  ?>">
        <span class="error">* <?php echo $presenterErrMsg;?></span>
      </p>
       <p>
        <label for="eventDate">Event Date:</label>
        <input type="text" name="eventDate" id="eventDate" required value="<?php echo $eventDate;  ?>">
        <span>(YYYY-MM-DD)</span>
      </p>
      <p>
        <label for="eventTime">Event Time:</label>
        <input type="text" name="eventTime" id="eventTime" required value="<?php echo $eventTime;  ?>">
      </p>


  <p>
    <input type="submit" name="submit" id="button3" value="Add Event">
    <input type="reset" name="reset" id="reset" value="Reset">
  </p>

   <?php
			}//end else
        ?> 

</form>
</div>

<footer>
	<p>Copyright &copy; <script> var d = new Date(); document.write (d.getFullYear());</script> All Rights Reserved</p>
</footer>
</div>

 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>