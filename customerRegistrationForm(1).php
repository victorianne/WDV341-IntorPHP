<?php 
  
  $firstName = ""; //set default values for variables
  $number = "";
  $email = "";
  //$registration = "";
  $postAttendee = "";
  $postPresenter = "";
  $postVolunteer = "";
  $postGuest = "";
  $postBadgeHolder01 = "";
  $postBadgeHolder02 = "";
  $postBadgeHolder03 = "";
  $mealFriday = "";
  $mealSaturday = "";
  $mealSunday = "";
  $specialMessage = "";
  $meals = "";
  $registration = "";
  $comment = "";

  if(isset($_POST["submit"]))
  {
    //the form has been submitted and needs to be processed.
  echo "<h2>PHP Submitted on the Server</h2>";

  //echo "$_POST";
  $firstName = $_POST['inName'];
  $number = $_POST['inNumber'];
  $email = $_POST['inEmail'];
  //$inMeal = $_POST["meals"]; 
  //$registration = $_POST['inRegistration'];
  //$postBadgeHolder01 = $_POST['inPostBadgeHolder01'];
  //$postBadgeHolder02 = $_POST['inPostBadgeHolder02'];
  //$postBadgeHolder03 = $_POST['inPostBadgeHolder03'];
  //$mealFriday = $_POST['inFriday'];
  //$mealSaturday = $_POST['inSaturday'];
  //$mealSunday = $_POST['inSunday'];
  //$attendee = $_POST['inAttendee'];
  //$presenter = $_POST['inPresenter'];
  //$volunteer = $_POST['inVolunteer'];
  //$guest = $_POST['inGuest'];
  //$specialMessage = $_POST['inSpecialMessage'];

  
  
  //echo "$firstName $number $email $registration $postBadgeHolder01 $postBadgeHolder02 $postBadgeHolder03 $mealFriday $mealSaturday $mealSunday $specialMessage";



   if (isset($_POST["radio"])) {
    $inBadgeHolder = $_POST["radio"];
    } else {
     echo "";
   }
    //VALIDATE THE FORM DATA ON THE SERVER
    //if(validData)
   // {
      //process data intoo database
    //}
   // else 
   // {
      //display error message
      //display original entry values
      //display form to user
   // }


        if ("chip" == $inBadgeHolder) {
            $postBadgeHolder01 = "checked='checked'";
          }
    
        else {
    
            if ("lanyard" == $inBadgeHolder) {
              $postBadgeHolder02 = "checked='checked'";
            }
    
            else {
    
              if ("magnet" == $inBadgeHolder) {
                $postBadgeHolder03 = "checked='checked'";
              }
    
            }
            
        }

  

  // I found the code for the self-posting checkboxes on here http://form.guide/php-form/php-form-checkbox.html



//https://www.daniweb.com/programming/web-development/threads/380050/how-to-retain-drop-down-values-after-submit

  
         if (isset($_POST["select"])) {         
    $registration = $_POST["select"];
    } else {
     echo "";
   }

        if ("attendee" == $registration) {
            $postAttendee = "selected='selected'";
          }
          if ("presenter" == $registration) {
            $postPresenter = "selected='selected'";
          }
    
        else {
    
            if ("volunteer" == $registration) {
              $postVolunteer = "selected='selected'";
            }
    
            else {
    
              if ("guest" == $registration) {
                $psotGuest = "selected='selected'";
              }
    
            }
            
        }

       
  }

     if (isset($_POST["checkbox"])) {         
    $meals = $_POST["checkbox"];
    } else {
     echo "";
   }

        if ("inFriday" == $meals) {
            $mealFriday = "checked='checked'";
          }
          if ("inSaturday" == $meals) {
            $mealSaturday = "checked='checked'";
          }
    
        else {
    
            if ("inSunday" == $meals) {
              $mealSunday = "checked='checked'";
            }
            
        }

       
   if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

   
 ?>

<script type="text/javascript">
     $("#reset").click(resetResults);

     $('input[name=radio]').attr('checked',false);


</script>

<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV341 Intro PHP - Self Posting Form</title>
<style>

#orderArea	{
	width:600px;
	border:thin solid black;
	margin: auto auto;
	padding-left: 20px;
}

#orderArea h3	{
	text-align:center;	
}
.error	{
	color:red;
	font-style:italic;	
}

</style>
</head>

<body>
<h1>WDV341 Intro PHP</h1>
<h2>Unit-5 and Unit-6 Self Posting - Form Validation Assignment


</h2>
<p>&nbsp;</p>


<div id="orderArea">
<form name="form3" method="post" action="">
  <h3>Customer Registration Form</h3>

      <p>
        <label for="inName">Name:</label>
        <input type="text" name="inName" id="inName" value="<?php echo $firstName; ?>">
      </p>
      <p>
        <label for="textfield2">Phone Number:</label>
        <input type="text" name="inNumber" id="inNumber" value="<?php echo $number; ?>">
      </p>
      <p>
        <label for="textfield3">Email Address: </label>
        <input type="text" name="inEmail" id="inEmail" value="<?php echo $email; ?>">
      </p>
      <p>
        <label>Registration: </label>
        <select> 
          <option type="select" name="select" value="">Choose Type</option>
          <option type="select" name="select" value="attendee" <?php echo $postAttendee; ?> >Attendee</option>
          <option type="select" name="select" value="presenter" <?php echo $postPresenter; ?> >Presenter</option>
          <option type="select" name="select" value="volunteer" <?php echo $postVolunteer; ?>>Volunteer</option>
          <option type="select" name="select" value="guest" <?php echo $postGuest ;?>>Guest</option>
        </select>
      </p>
      <p>Badge Holder:</p>
      <p>
        <input type="radio" name="radio" id="radio" value="chip" checked <?php echo $postBadgeHolder01; ?> >
        <label for="radio">Clip</label> <br>
        <input type="radio" name="radio" id="radio2" value="lanyard"<?php echo $postBadgeHolder02; ?> >
        <label for="radio2">Lanyard</label> <br>
        <input type="radio" name="radio" id="radio3" value="magnet"<?php echo $postBadgeHolder03; ?> >
        <label for="radio3">Magnet</label>
      </p>
      <p>Provided Meals (Select all that apply):</p>
        <input type="checkbox" name="checkbox" id="inFriday" value="inFriday"<?php echo $mealFriday; ?>>
        <label for="checkbox">Friday Dinner</label><br>
        <input type="checkbox" name="checkbox" id="inSaturday" value="inSaturday"<?php echo $mealSaturday; ?>>
        <label for="checkbox2">Saturday Lunch</label><br>
        <input type="checkbox" name="checkbox" id="inSunday" value="inSunday"<?php echo $mealSunday; ?>>
        <label for="checkbox3">Sunday Award Brunch</label>
      </p>
      <p>
        <label for="textarea">Special Requests/Requirements: (Limit 200 characters)<br>
        </label>
        <textarea name="comment" cols="40" rows="5" ><?php echo $comment; ?></textarea>
      </p>

</p>
   
  <p>
    <input type="submit" name="submit" id="button3" value="Submit">
    <input type="reset" name="reset" id="reset" value="Reset">
  </p>
</form>
</div>

</body>
</html>