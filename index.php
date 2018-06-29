<?php
	include "conn.php";
	
	$name = "";
	$id = "";
	$email = "";
	$day = "";

	$sql1 = "SELECT count(id) AS total FROM tuesday";
			$result1 = mysqli_query($conn, $sql1);
			$values1 = mysqli_fetch_assoc($result1);
			$tu = $values1['total'];     

	$sql2 = "SELECT count(id) AS total FROM friday";
			$result2 = mysqli_query($conn, $sql2);
			$values2 = mysqli_fetch_assoc($result2);
			$fri = $values2['total'];

	$sql3 = "SELECT count(id) AS total FROM monday";
			$result3 = mysqli_query($conn, $sql3);
			$values3 = mysqli_fetch_assoc($result3);
			$mon = $values3['total'];

	$sql4 = "SELECT count(id) AS total FROM wednesday";
			$result4 = mysqli_query($conn, $sql4);
			$values4 = mysqli_fetch_assoc($result4);
			$wed = $values4['total']; 

	$total1 = 20 - $tu;
	
	$total2 = 25 - $fri;
	
	$total3 = 15 - $mon;
	
	$total4 = 25 - $wed;
	
	$day = (isset($_POST['day']) ? $_POST['day'] : '');
	
	$name = (isset($_POST['fname']) ? $_POST['fname'] : '');
	$id = (isset($_POST['fid']) ? $_POST['fid'] : '');
	$email = (isset($_POST['email']) ? $_POST['email'] : '');

	
	if (isset($_POST['submit'])) {
		if($day == "friday"){
			if ($total2 > 0) {
				$query = mysqli_query($conn, "SELECT * FROM friday WHERE id_no='$id'");
				if (mysqli_num_rows($query) > 0) {
					$message = "The member is allready exist";
					echo "<script type='text/javascript'>alert('$message');</script>";
					
				} else {
					$sql = "INSERT INTO friday (name, id_no, email) VALUES ('$name', '$id', '$email')";
					mysqli_query($conn, $sql);
					
					$sql2 = "SELECT count(id) AS total FROM friday";
					$result2 = mysqli_query($conn, $sql2);
					$values2 = mysqli_fetch_assoc($result2);
					$fri = $values2['total'];
					$message = "Entry Successful";
					echo "<script type='text/javascript'>alert('$message');</script>";
					
				}
			} else {
				$message = "Tuesday seats are reaches to its limite";
				echo "<script type='text/javascript'>alert('$message');</script>";
				
			}
		} else if ($day == "monday") {
			if ($total3 > 0) {
				$query = mysqli_query($conn, "SELECT * FROM monday WHERE id_no='$id'");
				if (mysqli_num_rows($query) > 0) {
					$message = "The member is allready exist";
					echo "<script type='text/javascript'>alert('$message');</script>";
				} else {
					$sql = "INSERT INTO monday (name, id_no, email) VALUES ('$name', '$id', '$email')";
					mysqli_query($conn, $sql);
					
					$sql3 = "SELECT count(id) AS total FROM monday";
					$result3 = mysqli_query($conn, $sql3);
					$values3 = mysqli_fetch_assoc($result3);
					$mon = $values3['total'];
					$message = "Entry Successful";
					echo "<script type='text/javascript'>alert('$message');</script>";
				}
			} else {
				$message = "Monday seats are reaches to its limite";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
		} else if ($day == "tuesday") {
			if ($total1 > 0) {
				$query = mysqli_query($conn, "SELECT * FROM tuesday WHERE id_no='$id'");
				if (mysqli_num_rows($query) > 0) {
			       	$message = "The member is allready exist";
					echo "<script type='text/javascript'>alert('$message');</script>";
					
				} else {
					$sql = "INSERT INTO tuesday (name, id_no, email) VALUES ('$name', '$id', '$email')";
					mysqli_query($conn, $sql);
					
					$sql1 = "SELECT count(id) AS total FROM tuesday";
					$result1 = mysqli_query($conn, $sql1);
					$values1 = mysqli_fetch_assoc($result1);
					$tu = $values1['total'];
					$message = "Entry Successful";
					echo "<script type='text/javascript'>alert('$message');</script>";
					    
				}
			} else {
				$message = "Tuesday seats are reaches to its limite";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
		} else if ($day == "wednesday") {
			if ($total4 > 0) {
				$query = mysqli_query($conn, "SELECT * FROM wednesday WHERE id_no='$id'");
				if (mysqli_num_rows($query) > 0) {
					$message = "The member is allready exist";
					echo "<script type='text/javascript'>alert('$message');</script>";
					break;
				} else {
					$sql = "INSERT INTO wednesday (name, id_no, email) VALUES ('$name', '$id', '$email')";
					mysqli_query($conn, $sql);
					
					$sql4 = "SELECT count(id) AS total FROM wednesday";
					$result4 = mysqli_query($conn, $sql4);
					$values4 = mysqli_fetch_assoc($result4);
					$wed = $values4['total'];  
					$message = "Entry Successful";
					echo "<script type='text/javascript'>alert('$message');</script>";
				}
			} else {
				$message = "Wednesday seats are reaches to its limite";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
		}
	}
	
	header("refresh:1; url:index.php;");
 ?>


<!DOCTYPE html>
<html>
	<head>
		<title>German Language Registration</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  	<link rel="stylesheet" href="app/components/directives/navBar/navBar.scss"/>
	  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="layout.css">
	</head>
	<body>
		
		<div class="container fl">
			<h3>Registration Form</h3>
		</div>
		<div class="container br">
			<h4>Welcome to the Regstration of German Language</h4>
			<p class="w">*Please Do Not Forget To Fill Up All The Requeird Data Bellow*</p><br><br>
			
			<div class="row n">
			    <div class="col-lg-6">
			     	<p>Name:	</p>
			    </div>
			    <div class="col-lg-6">
			    	<form action="" method="POST">
			    	<input type="text" class="form-control" name="fname">
			    
			    </div>
			</div><br><br>
			<div class="row id">
			    <div class="col-lg-6">
			     	<p>ID:	</p>
			    </div>
			    <div class="col-lg-6">
			    	<input type="text" class="form-control" name="fid">
			    </div>
			</div><br><br>
			<div class="row e">
			    <div class="col-lg-6">
			     	<p>Email:	</p>
			    </div>
			    <div class="col-lg-6">
			    	<input type="text" class="form-control" name="email">
			    </div>
			</div><br><br>
			<div class="row ddown">
			    <div class="col-lg-6">
			     	<p>Please Select Class Schedule:	</p>
			    </div>
			    <div class="col-lg-6">
			    	<select class="form-control" name="day">
			    		<option disabled selected hidden>Choose One...</option>
			        	<option value="tuesday"> Tuesday..............................................................
			        		<?php  
			        			$total = 20 - $tu;
			        			echo "$total is remaining"
			        		?>
			        	</option>
			        	<option value="friday">Friday....................................................................
			        		<?php 
			        			$total = 25 - $fri;
			        			echo "$total is remaining"
			        		?>
			        	</option>
			        	<option value="monday">Monday.................................................................
			        		<?php  
			        			$total = 15 - $mon;
			        			echo "$total is remaining"
			        		?>
			        	</option>
			        	<option value="wednesday">Wednesday..........................................................
			        		<?php
			        			$total = 25 - $wed;
			        			echo "$total is remaining"
			        		?>	
			        	</option>
			      	</select>
			    </div>
			</div><br><br><br>
			<input type="submit" name="submit" class=" btn btn-success">
			</form>
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  	
	</body>
</html>