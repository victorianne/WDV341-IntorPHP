<?php
session_start();
$error = '';

if ($_SESSION['validUser'] == "yes") {
	$error = "Welcome Back! $user";
}
else{
	if (isset($_POST['submit'])) {
		//Define $user and $pass
		$user = $_POST['user'];
		$pass = $_POST['pass'];

		include 'connect.php';

		$sql = "SELECT user ,pass FROM userpass WHERE user = '$user' AND pass = '$pass";

		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ss", $user, $pass); //ss using two strings
		$stmt->excute();
		$stmt->bind_result($user, $pass);
		$stmt->store_result();
		$stmt->fetch();

		if ($stmt->num_rows == 1) {
			$_SESSION['validUser'] = "yes";
			$error = "Welcome Back ! $user";
		}
		else {
			$_SESSION['validUser'] = "no";
			$error = "Username or Password is Invalid";
		}
		$stmt->close();
		$conn->close();
		else
		{
			
		}

}

?>
