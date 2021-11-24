<?php
	
	$employeeID = $_POST['employeeID'];
	$employeeName = $_POST['employeeName'];
	$employeeSSN = $_POST['employeeSSN'];
	$employeePosition = $_POST['employeePosition'];
	$employeeDepartment = $_POST['employeeDepartment'];
	$employeeAddress = $_POST['employeeAddress'];
	$employeePhone = $_POST['employeePhone'];
	$employeePass = $_POST['employeePassword'];
	$roleID = $_POST['roleID'];


	//database connection
    // session_start(); 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "medbase";
    
    // Create connection
    $database = mysqli_connect($servername, $username, $password, $db);
    
    //check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        return null;
    }
    else{
    	$stmt = $conn->prepare("insert into employee table(employeeID, employeeName, employeeSSN, employeePosition, employeeDepartment, employeeAddress, employeePhone, employeePass, roleID)
    		values(?,?,?,?,?,?,?,?,?");
    	$stmt->bind_param("isisisisi", $employeeID, $employeeName, $employeeSSN, $employeePosition, $employeeDepartment, $employeeAddress, 
    		$employeePhone, $employeePass, $roleID);
    	$stmt->execute();
    	echo "Employee Added Successfully";
    	$stmt->close();
    	$conn->close();
    }

?>
