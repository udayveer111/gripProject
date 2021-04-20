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

// SQL query to select data from database
$sql = "SELECT * FROM transfer";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Customers Details</title>

	<script type="text/javascript" src="jquery.min.js"></script>

	<!-- CSS FOR STYLING THE PAGE url("images/3.jpg");-->
	<style>
		body{
			
			background-color:rgb(22, 22, 22);
		}
		table {
			margin: 0 auto;
			font-size: large;
			border: 2px solid black;
		}
		input,button{
			width: 150px;
			height: 30px;
			border-top: azure;
			border-left: azure;
		}

		h3{
			color: skyblue;
			font-size: large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';	
		}

		h1 {
			text-align: center;
			color: skyblue;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
		}

		td {
			background-color: #E4F5D4;
			border: 1px solid black;
		}
		th{
			color:skyblue;
		}

		th,
		td {
			font-weight: bold;
			border: 1px solid black;
			padding: 10px;
			text-align: center;
			
		}

		td {
			font-weight: lighter;
		}
		#home{
			color:skyblue;
			
			font-size:large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';	
		}
		#home:hover{
			color:green;
		}
		.tt{
			float:right;
			margin-right:2%;
		}
		.bbtn{
			
			height:25px;
			background-color:green;
			color:azure;
			border-top:azure;
			border-left:azure;
			border-right:azure;
		}
	</style>
</head>

<body>
	<section>
	<div id="nav">
	     <a href="BankingSystem.html" id="home"><b>HOME</b></a>
		<div class="tt">
			<h3>TransferFrom :</h3>
		 <form name="form" method="get" action="Transaction.php">
               <input id="inpt" placeholder="Enter Sender_ID" name="tid" required>
		            <!--<input id="inpt1" placeholder="Email-Address">  -->
		     <input id="inpt1" placeholder="Enter Amount" name="amount" required> 
			<h3>TransferTo :</h3>
			<input id="inpt2" placeholder="Enter Recepient_ID" name="tid1" required>
		    <button id="btn" class="bbtn" style="width:50px; height:31px" name="btnn">GO</button>
		 </form>
	    </div>
	</div>
		<h1>All_Customers</h1>
		<!-- TABLE CONSTRUCTION-->
		<table>
			<tr>
				<th>TransactionID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Amount</th>
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS-->
			<?php // LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<!--FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN-->
				<td><?php echo $rows['id'];?></td>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['email'];?></td>
				<td><?php echo $rows['balance'];?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</section>

	<script type="text/javascript">
	 
	/* function isEmail(email){
		var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		return regex.test(email);
	 }*/
      
	 var url = "Transaction.php";

      $("#btn").click(function(){
		var empty = "";
		var empty1 = "";
		var empty2 = "";
		var res = "";
		   
		if ($("#inpt").val() == ""){
		    empty += "\n SenderID is Missing! \n";
		   }
		if ($("#inpt1").val() == ""){
		    empty1 += "\n Amount is Missing! \n";
		   }
		if ($("#inpt2").val() == ""){
		    empty2 += "\n RecipientID is Missing! \n";
		   }
		if (empty != "" || empty1 != "" || empty2 != ""){
			if (empty != "" && empty1 == "")
			{
				if (empty2 == ""){
					alert(empty);
				}
				else{
					res += empty + empty2;
				alert(res);
				}
			}
			if (empty == "" && empty1 != "")
			{
				if (empty2 == ""){
					alert(empty1);
				}
				else{
					res += empty1 + empty2;
				alert(res);
				}
			}
			else{
				res += empty + empty1 + empty2;
				alert(res);
			}
		}
		else{
			var n = document.getElementById("inpt").value;
			var m = document.getElementById("inpt1").value;
			var p = document.getElementById("inpt2").value;
    
			if (isNaN(n) || isNaN(m) || isNaN(p) || n === p){
				

			}
			else {
			     
				//window.location.href="Transaction.php";
				alert("Transaction Successful!");
			     
			}
		}

	 });

	</script> -->

</body>

</html>

