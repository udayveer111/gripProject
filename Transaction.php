<?php

// Username is root
$user = 'root';
$password = '';

// Database name is gfg
$database = 'sparks';

// Server is localhost with
// port number 3308
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user,
				$password, $database);

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}
# get method to pass javaScript variable into php
$k = $_GET['amount'];     
$i = $_GET['tid'];
$i1 = $_GET['tid1'];
$t = " ";
if(is_numeric($k) and is_numeric($i) and is_numeric($i1) and $i != $i1){
// require 'viewAllCustomers.php';
$sql2 = "SELECT balance FROM transfer WHERE id=$i";
$sqle = "SELECT balance FROM transfer WHERE id=$i1";
if ($result = $mysqli -> query($sql2) and $result1 = $mysqli -> query($sqle)) {
    $row = $result -> fetch_row();
    $roww = $result1 -> fetch_row();
  $result -> free_result();
  $result1 -> free_result();
  }

// SQL query to select data from database

$sql1 = "UPDATE transfer SET balance=$row[0]-$k WHERE id=$i ";
$sql11 = "UPDATE transfer SET balance=$roww[0]+$k WHERE id=$i1 ";
if ($mysqli->query($sql1)===True and $mysqli->query($sql11)===True){
  header("location: viewAllCustomers.php");
  exit;
  
  }
else{
      
     $t = "Some Error is Occured!";
  }

}
else{
  $t = "Please, Enter valid INPUTS!";
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TransactionFailed</title>

  <style type="text/css">
     body{
      
      background-color:#EEE8AA;
      font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';	
     }
    h1{
      text-align:center;
      margin-top:250px;
      color:rgb(77, 175, 214);
    }
    #e{
      background-color:rgb(185, 185, 72);
      text-align:center;
      font-size:32px;
    }
    a:hover{
      color:tomato;
      text-decoration:none;
    }
    p{
      padding:4px;
    }
    </style>
</head>
<body>

   <h1>
      <?php echo $t; ?>
   </h1> 
   <div id="e">
     <a href="viewAllCustomers.php"><p>Back</p></a>
  </div>
  
</body>
</html>