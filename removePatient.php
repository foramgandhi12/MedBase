<?php 
include 'setupDatabaseConnection.php';
$database = setupConnection();

if ($database != null){
    // ID of patient to discharge (remove)
    $patientID = $_POST['discharge'];

    $removeQuery = "DELETE FROM patients WHERE patientID = $patientID";
    $removeResult = mysqli_query($database, $removeQuery);
    header("Location: dischargePatient.php");
}
?>