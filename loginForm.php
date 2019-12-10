<?php
session_start();
$error = '';

$user = "";


if ($_SESSION['validUser'] == "yes") {
  $error = "Welcome Back! $user";
}
else{
  if (isset($_POST['submit'])) {
    //Define $user and $pass
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    include 'connect.php';

    $sql = "SELECT user, pass FROM userpass WHERE user = :user AND pass = :pass";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":user", $user); //ss using two strings
    $stmt->bindParam(":pass", $pass ); //ss using two strings
    $stmt->execute();
    $stmt->fetch();

    if ($stmt->rowCount() == 1) {
      $_SESSION['validUser'] = "yes";
      $error = "Welcome Back ! $user";
    }
    else {
      $_SESSION['validUser'] = "no";
      $error = "Username or Password is Invalid";
    }
 
  }


 else{
      
    }

  }
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


	<title>Login Form</title>
</head>
<body>
 <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One&display=swap" rel="stylesheet">
    <div class="jumbotron jumbotron-fluid">
     <?php
      if ($_SESSION['validUser'] == "yes") {

        ?>
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
                 <a class="nav-link" href="eventDisplay.php">Events</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="about.php">About</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="contact.php">Let's Chat</a>
              </li>
               <li class="nav-item">
                  <a class="nav-link" href="eventEdit.php">Update/Delete Event</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="addEvent.php">Add Event</a>
              </li>

               <li class="nav-item">
            <a class="nav-link" href="loginForm.php">Login</a>
        </li>
      </ul>
       
    </span>
   
    </div>
  </nav>
        <div id="profile">
        <b id="welcome">Welcome : <i><?php echo $user; ?></i></b>
        <b id="logout"><a href="logout.php">Log Out</a></b>
        </div>
        <?php
        }
        else
        {
        ?>
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.html">
        <img src="photos/logoBlack.gif" class="img-fluid" alt="Responsive image" width="100px" height="100px"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                 <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
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
          <div class="page_container">
            <div class="login-form">
               <form action="loginForm.php" method="post" name="loginForm">
                 <h2 class="text-center">Log in</h2>       
                  <div class="form-group">
                      <input type="text" id="user" name="user" placeholder="Username">
                  </div>
                  <div class="form-group">
                       <input type="password" id="pass" name="pass" placeholder="Password">
                  </div>
                  <div class="form-group">
                      <input name="submit" type="submit" value="Login">
                  <span><?php echo $error ?></span>
                  </div>       
            </form>
          </div><!--close login-form -->
        </div><!--close page container -->
    <?php
      }
    ?>
</body>
</html>