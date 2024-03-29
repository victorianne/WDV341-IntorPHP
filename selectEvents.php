<?php
	require_once('dbConnect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<body>
<h1>Event Catalog</h1>
<h2>Listing of Current Events </h2>

<p>
 <?php
 //I found this example on here https://www.dummies.com/programming/sql/how-to-use-html5-tables-for-sql-output/
  

  $sql = "SELECT * FROM events";
  //first pass just gets the column names
  echo "<table> ";
  $result = $conn->query($sql);
  //return only the first row (we only need field names)
  $row = $result->fetch(PDO::FETCH_ASSOC);
  echo " <tr> ";
  foreach ($row as $field => $value){
   echo " <th>$field</th> ";
  } // end foreach
  echo " </tr> ";
  //second query gets the data
  $data = $conn->query($sql);
  $data->setFetchMode(PDO::FETCH_ASSOC);
  foreach($data as $row){
   echo " <tr> ";
   foreach ($row as $name=>$value){
   echo " <td>$value</td> ";
   } // end field loop
   echo " </tr> ";
  } // end record loop
  echo "</table> ";
  

 ?>
 </p>
</body>
</html>