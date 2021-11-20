<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$db = "med_base";

// Create connection
$database = new mysqli_connect($servername, $username, $password, $db);

//check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
retrive the values from the form
else {    
    //check if the form is submitted
    if (isset($_POST["submit"])){
        //retrieve all values submitted within form
        $username_form = mysqli_real_escape_string($database, $_POST["name"]);
        $password_form = mysqli_real_escape_string($database, $_POST["password"]);
        $position_form = mysqli_real_escape_string($database, $_POST["position"]);

        //perform query
        $query = "SELECT * FROM employee WHERE employeeName = $username_form AND employeePassword = $password_form AND roleID = $position_form";
        $result = mysqli_query($database, $query);
        //check to see if login was valid
        if(!$result){
            header("Location: Login.html");
            $msg = "Invalid login! Please re-enter your credentials.";
            echo '<script type="text/javascript">alert("' . $msg . '")</script>';
        }
        else{
            header("Location: dashboard.php");
        }
    }
}
?>