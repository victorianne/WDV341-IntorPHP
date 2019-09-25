
<?php  

$snackName = "Goldfish";

$testNumber = 1234567890;

$money = 123456;


function printSnack()
{
	global $snackName;	//tells the function to use the global scope version of this variable
	echo $snackName;	
}


function characterCount($inString)
{
	return 	strlen($inString);	//Provides the number of characters in the input string
}

function todaysDate()
{
	$mydate=getdate(date("U"));
	return date('m \/ d \/ Y');	//Should format the output as Monday January 1, 2016
}

function dateFunction()
{
	$mydate=getdate(date("U"));
	return date('d \/ m \/ Y');	//Should format the output as Monday January 1, 2016
}

function formatNumber()
{
	global $testNumber;
	echo number_format($testNumber);
}

function formatCurrency()
{
	global $money;
	setlocale(LC_MONETARY,"en_US");
	echo money_format("%n", $money);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Functions</title>
</head>
<body>
<h1>WDV341 Intro PHP</h1>
	<h2>Create a PHP page that will process and display the following pieces of information.  Use a combination of custom PHP functions and functions from the PHP API as needed. </h2>

		<h3>Your page should do the following:</h3>

			<p>1. Create a function that will accept a date input and format it into mm/dd/yyyy format.</p>

			<p>Today is: <?php echo todaysDate(); ?></p>


			<p>2. Create a function that will accept a date input and format it into dd/mm/yyyy format to use when working with international dates.</p>

			<p>Today is: <?php echo dateFunction(); ?></p>


			<p>3. Create a function that will accept a string input.  It will do the following things to the string:</p>

				<p><?php printSnack() ?></p>

				<p>a. Display the number of characters in the string</p>

					<p><?php echo characterCount($snackName); ?></p>

				<p>b. Trim any leading or trailing whitespace</p>

					<?php echo trim($snackName); ?>

				<p>c. Display the string as all lowercase characters</p>

				<?php
					echo strtolower($snackName);
				?>

				<p>d. Will display whether or not the string contains "DMACC" either upper or lowercase</p>

				<?php echo substr_replace($snackName,"DMACC",0);?>
				
			<p>4. Create a function that will accept a number and display it as a formatted number.   Use 1234567890 for your testing.</p>

				<p><?php formatNumber(); ?></p>

			<p>5. Create a function that will accept a number and display it as US currency.  Use 123456 for your testing.</p>

			<p><?php formatCurrency(); ?></p>





</body>
</html>