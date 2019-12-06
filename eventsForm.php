<?php

//include 'formClass.php';
 
 //$validateTool = new FormValidation(); //instantiate a new object

		$eventName = "";
		$eventDescription = "";
		$eventPresenter = "";
		$eventDate = "";
		$eventTime = "";
		$events_name = "";
		$events_description = "";
		$event_presenter = "";
		$events_date = "";
		$events_time = "";
		$eventNameErrMsg = "";
		$descriptionErrMsg = "";
		$presenterErrMsg = "";

		$validForm = false;

if(isset($_POST["submit"]))
	{	

		$eventName = $_POST['eventName'];
		$eventDescription = $_POST['eventDescription'];
		$eventPresenter = $_POST['eventPresenter'];
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

	function validatePresenter($inputValue)
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
	validatePresenter($eventPresenter);


require_once("dbConnect.php");

if($validForm)
{
	$message = "All good";

	try {

	
	//$eventDate = date("Y-m-d");
	//$eventTime = date("h:i:00");
		$todaysDate = date("Y-m-d");
	

		$sql = "INSERT INTO events (events_id, events_name, events_description, event_presenter, events_date, events_time)
		VALUE (NULL, :eName, :eDescription, :ePresenter, :eDate, :eTime);";

		//echo $sql;

		$statement = $conn->prepare($sql);

		$statement->bindParam(':eName', $eventName);
		$statement->bindParam(':eDescription', $eventDescription);
		$statement->bindParam(':ePresenter', $eventPresenter);
		$statement->bindParam(':eDate', $eventDate);
		$statement->bindParam(':eTime', $eventTime);

		$statement->execute();

		$message = "The Event you have create was submitted successfully. Thank you for you submission!";
	} //end of try
	catch(PDOExepction $e)
	{
		$message = "There has been a problem. Please try again later.";

		error_log($e->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
		//error_log(var_dump(debug_backtrace()));
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
	<title></title>
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


<form id="eventsForm" name="eventsForm" method="post" action="eventsForm.php">
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
        <label for="eventPresenter">Event Presenter: </label>
        <input type="text" name="eventPresenter" id="eventPresenter" value="<?php echo $eventPresenter;  ?>">
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
    <input type="submit" name="submit" id="button3" value="Submit">
    <input type="reset" name="reset" id="reset" value="Reset">
  </p>

   <?php
			}//end else
        ?> 

</form>
 

</body>
</html>