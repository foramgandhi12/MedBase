<!DOCTYPE html>
<html>
<head>
	<title>Insert Employee Form</title>
	<style>
			table{
				font-family: Arial, Helvetica, sans-serif;
				border-collapse: collapse;
				width: 100%;
			}

			td, th{
				border: 1px solid #ddd;
				padding: 8px;
			}

			tr: nth-child(even){
				background-color: #f2f2f2;
			}
			
			tr: hover{
				background-color: #ddd;
			}

			th{
				padding-top: 12px;
				padding-bottom: 12px;
				text-align: left;
				background-color: #4c9baf;
				color: black;
			}
			body{
				font-family: Arial, Helvetica, sans-serif;
				font-size: 18px;
			}
			
	</style>
</head>

<body>
	<?php
		
		$employeeID = $_POST['employeeID'];
		$employeeName = $_POST['employeeName'];
		$employeeSSN = $_POST['employeeSSN'];
		$employeePosition = $_POST['employeePosition'];
		$employeeDepartment = $_POST['employeeDepartment'];
		$employeeAddress = $_POST['employeeAddress'];
		$employeePhone = $_POST['employeePhone'];
		$employeePassword = $_POST['employeePassword'];
		$roleID = $_POST['roleID'];

		//database connection
		// session_start(); 
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db = "medbase";
		
		// Create connection
		$database = mysqli_connect($servername, $username, $password, $db,3308);
		
		//check connection
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		else{
			$sql = "";
			if ($employeePassword == ""){
				$sql = "INSERT INTO employee(employeeID, employeeName, employeeSSN, employeePosition, employeeDepartment, \n"
				. "employeeAddress, employeePhoneNo, roleID) \n"
				. "VALUES ('" .$employeeID."', '".$employeeName."', '".$employeeSSN."', '".$employeePosition."', '".$employeeDepartment."', \n"
				. "'".$employeeAddress."', '".$employeePhone."','".$roleID."')";
			}
			else{
				$sql = "INSERT INTO employee(employeeID, employeeName, employeeSSN, employeePosition, employeeDepartment, \n"
				. "employeeAddress, employeePhoneNo,employeePassword, roleID) \n"
				. "VALUES ('" .$employeeID."', '".$employeeName."', '".$employeeSSN."', '".$employeePosition."', '".$employeeDepartment."', \n"
				. "'".$employeeAddress."', '".$employeePhone."', '".$employeePassword."', '".$roleID."')";
			}

			$result = mysqli_query($database,$sql);
			if($result){
				echo "<br>";
				echo "Employee Added Successfully";
				echo "<br>";

				$sqltwo = "SELECT * FROM employee";
				$result = mysqli_query($database, $sqltwo);
				echo "<br> <table> <tr> <th>ID</th> <th>Name</th> <th>SSN</th> <th>Position</th> 
				<th>Department</th> <th>Address</th> <th>Phone Number</th> <th>Password</th> <th>RoleID</th> </tr>";

				while ($row = mysqli_fetch_row($result)){
					echo "<tr> <td>".$row[0]."</td> <td>".$row[1]."</td> <td>".$row[2]."</td> 
					<td>".$row[3]."</td> <td>".$row[4]."</td> <td>".$row[5]."</td> <td>".$row[6]."</td> <td>".$row[7]."</td> 
					<td>".$row[8]."</td> </tr>";
				}
				echo "</table>";
			}
			mysqli_close($database);
		}

	?>

</body>
</html>