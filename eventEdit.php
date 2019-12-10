<?php
session_start();
	include 'connect.php';			//connects to the database

	$stmt = $conn->prepare("SELECT event_id, event_name, event_description, event_date, event_time, event_location FROM final_event");
	$stmt->execute();
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/events.css"> 


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Events</title>
</head>
<body>
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
    <table class="table">
  <tbody>
    <tr>
      <tr>
		<td>Name</td>
		<td>Description</td>
		<td>Location</td>
		<td>Date</td>
		<td>Time</td>
    <?php
    if ($_SESSION['validUser'] == "yes") {
    ?>
		<td>UPDATE</td>
		<td>DELETE</td>
    <?php
  }
  ?>
  </tbody>
  <?php 
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo "<tr>";
			echo "<td>" . $row['event_name'] . "</td>";	
			echo "<td>" . $row['event_description'] . "</td>";
			echo "<td>" . $row['event_location'] . "</td>";
			echo "<td>" . $row['event_date'] . "</td>";	
			echo "<td>" . $row['event_time'] . "</td>";
      if ($_SESSION['validUser'] == "yes") {
			echo "<td><a href='updateEvent.php?recID=" . $row['event_id'] . "'>Update</a></td>"; 
			echo "<td><a href='deleteEvent.php?recID=" . $row['event_id'] . "'>Delete</a></td>"; 
      }		
		echo "</tr>";
	}
?>
</table>


</div>

</div><!--close page container-->
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>