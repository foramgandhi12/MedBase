<?php 
include 'setupDatabaseConnection.php';
$database = setupConnection();

if ($database != null){
    // ID of patient to discharge (remove)
    $patientID = $_POST['discharge'];
    
    // Get room ID
    $getRoomIDQuery = "SELECT roomID FROM patients WHERE patientID = $patientID";
    $getRoomIDResult = mysqli_query($database, $getRoomIDQuery);
    $getRoomID = mysqli_fetch_array($getRoomIDResult)[0];

    // Increment num_beds for which the dischaged patient is staying in (make room avalible again)
    $incrementRoomIDQuery = "UPDATE room SET num_beds = num_beds + 1 WHERE roomID = '$getRoomID'";
    $getRoomIDResult = mysqli_query($database, $incrementRoomIDQuery);

    // Remove patient
    $removeQuery = "DELETE FROM patients WHERE patientID = $patientID";
    $removeResult = mysqli_query($database, $removeQuery);

    // After execution return back to the discharge patient page
    header("Location: dischargePatient.php");
}
?>