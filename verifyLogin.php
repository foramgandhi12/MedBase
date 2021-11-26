<?php
include 'setupDataBaseConnection.php';
$database = setupConnection();
//retrieve the values from the form
   
//check if the form is submitted
if ($database != null){
    if (isset($_POST['submit'])){
        //retrieve all values submitted within form
        $username_form = mysqli_real_escape_string($database, $_POST["name"]);
        $password_form = mysqli_real_escape_string($database, $_POST["password"]);
        $position_form = mysqli_real_escape_string($database, $_POST["position"]);

        //perform query 
        $query = "SELECT * FROM employee WHERE employeeName = '$username_form' AND employeePassword = '$password_form' AND roleID = '$position_form'";
        $result = mysqli_query($database, $query);
        
        //check to see if login was valid
        if(mysqli_num_rows($result) == 0){
            $msg = "Invalid login! Please re-enter your credentials.";
            echo '<script type="text/javascript">alert("' . $msg . '")</script>';
            header("Location: Login.html");
        }
        else{
            ob_start();
            session_start();
            $emp_info = $_REQUEST['emp_info'];
            $_SESSION['emp_info'] = mysqli_fetch_row($result);
            if ($position_form == '1'){
                header("Location: doctorDashboard.php");
            }
            else if ($position_form == '2'){

            }
            else if ($position_form == '3'){
                header("Location: receptionistDashboard.php");
            }
        }
    } else if (isset($_POST['admin'])){
        echo "admin login";
        // if($username_form = "Admin" && $password_form="Admin"){
        //     header("Location: Admin.php");
        //     exit();
        // }
    }
}
?>