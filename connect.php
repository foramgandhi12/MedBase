<?php
	
	$empID = $_POST['employeeID']
	$flname = $_POST['firstlastname'];
	$empSSN = $_POST['employeeSSN']
	$empPosition = $_POST['employeePosition']
	$empDpt = $_POST['employeeDepartment']
	$empAddress = $_POST['employeeAddress']
	$empPhone = $_POST['employeePhone']
	$empPass = $_POST['employeePassword']
	$roleID = $_POST['employeeRoleID']


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
    	$stmt = $conn->prepare("insert into employee table(employeeID, firstlastname, employeeSSN, employeePosition, employeeDepartment, employeeAddress, employeePhone, employeePass, employeeRoleID)
    		values(?,?,?,?,?,?,?,?,?");
    	$stmt->bind_param("isisisisi", $empID, $flname, $empSSN, $empPosition, $empDept, $empAddress, $empPhone, $empPass, $roleID);
    	$stmt->execute();
    	echo "Employee Added Successfully";
    	$stmt->close();
    	$conn->close();
    }

?>