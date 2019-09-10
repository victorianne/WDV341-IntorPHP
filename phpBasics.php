<!DOCTYPE html>
<html>
<head>
	<title>PHP Basics</title>
</head>
<body>

<h1>WDV341 Intro PHP</h1>
<h2>PHP Basics - Code Examples</h2>

<p>Create a variable called yourName.  Assign it a value of your name.</p>
<p>Display the assignment name in an h1 element on the page. Include the elements in your output.</p>
<?php
	$yourName = "Victoria Scholten";
?>
<h1><?php echo $yourName ?></h1>

<p>Use HTML to put an h2 element on the page. Use PHP to display your name inside the element using the variable.</p>

<?php echo "<h2>$yourName</h2>"; ?>

<p>Create the following variables:  number1, number2 and total.  Assign a value to them. </p>
<p>Display the value of each variable and the total variable when you add them together. </p>

<?php
	$number1 = "5";
?>

<?php
	$number2 = "7";
?> 

<p>number1: <?php echo $number1 ?></p>
<p>number2: <?php echo $number2 ?></p>
<p>Total: <?php echo $number2 + $number1 ?></p>

<p>Use PHP to create a Javascript array with the following values: PHP,HTML,Javascript.  Output this array using PHP.  Create a script that will display the values of this array on your page.  NOTE:  Remember PHP is building the array not running it.  </p>


<?php
$phpArray = array("PHP", "HTML", "JavaScript"); 
echo "Display the arrays:  " . $phpArray[0] . ", " . $phpArray[1] . " and " . $phpArray[2] . ".";
?>

</body>
</html>