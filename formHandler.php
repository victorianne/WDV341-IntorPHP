<?php
//Model-Controller Area.  The PHP processing code goes in this area. 

	//Method 1.  This uses a loop to read each set of name-value pairs stored in the $_POST array
	$tableBody = "";		//use a variable to store the body of the table being built by the script
	
	foreach($_POST as $key => $value)		//This will loop through each name-value in the $_POST array
	{
		$tableBody .= "<tr>";				//formats beginning of the row
		$tableBody .= "<td>$key</td>";		//dsiplay the name of the name-value pair from the form
		$tableBody .= "<td>$value</td>";	//dispaly the value of the name-value pair from the form
		$tableBody .= "</tr>";				//End this row
	} 
	
	
	//Method 2.  This method pulls the individual name-value pairs from the $_POST using the name
	//as the key in an associative array.  
	
	$inFirstName = $_POST["firstName"];		//Get the value entered in the first name field
	$inLastName = $_POST["lastName"];		//Get the value entered in the last name field
	$inSchool = $_POST["school"];
	$inRadioGroup1 = $_POST["radioGroup1"];		//Get the value entered in the school field
	$inExpertise = $_POST["expertise"];	
	$inCity = $_POST["city"];	

// build the request url
$verify_url = 'https://www.google.com/recaptcha/api/siteverify';
$args = array('secret' => '6LeySRIUAAAAAM5d8huz1-SIW4OMjfgDx_pwfToe',
              'response' => $_POST['g-recaptcha-response'],
              'remoteip' => $_SERVER['REMOTE_ADDR']);
$request_url = $verify_url.'?'.http_build_query($args);
 
// a JSON object is returned
$response = file_get_contents($request_url);
 
// decode the information
$json = json_decode($response, true); // true decodes it to an array instead of a PHP object
 
// handle the response
if($recaptcha['success'] == 1) {
	// run code on successful reCAPTCHA
} else {
	// run code on unsuccessful reCAPTCHA
}
	

?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV 341 Intro PHP - Code Example</title>
</head>

<body>
<h1>WDV341 Intro PHP</h1>
<h2>Form Handler Result Page - Code Example</h2>
<p>This page displays the results of the Server side processing. </p>
<p>The PHP page has been formatted to use the Model-View-Controller (MVC) concepts. </p>
<h3>Display the values from the form using Method 1. Uses a loop to process through the $_POST array</h3>
<p>
	<table border='a'>
    <tr>
    	<th>Field Name</th>
        <th>Value of Field</th>
    </tr>
	<?php echo $tableBody;  ?>
	</table>
</p>
<h3>Display the values from the form using Method 2. Displays the individual values.</h3>
<p>School: <?php echo $inSchool; ?></p>
<p>First Name: <?php echo $inFirstName; ?></p>
<p>Last Name: <?php echo $inLastName; ?></p>
<p>Contact Method: <?php echo $inRadioGroup1; ?></p>
<p>Your Expertise: <?php echo $inExpertise; ?></p>
<p>Location: <?php echo $inCity; ?></p>


</body>
</html>
