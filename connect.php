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
    	// echo "connection successful";
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
    		echo "Employee Added Successfully";
    	}
		// echo $result;
    	//$database->close();
    }

?>