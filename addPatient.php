<?php 
include 'setupDatabaseConnection.php';
$database = setupConnection();

if ($database != null){
    $query = "SELECT COUNT(*) FROM patients";
    $result= mysqli_query($database, $query);
    $index = intval(mysqli_fetch_row($result)[0]) + 1;

    // print_r($_POST);
    // form fields
    $patientName = $_POST['patientName'];
    $patientAddress = $_POST['address'];
    $patientEmail = $_POST['email'];
    $patientPhoneNumber = $_POST['phoneNo'];
    $patientReasonForVisit = $_POST['reasonForVisit'];
    $patientWard = $_POST['ward'];
    $patientRoomId = $_POST['roomID'];
    $patientCheckInDateTime = $_POST['checkInDateTime'];
    $patientDoctor = $_POST['doctor'];
    $patientNurse = $_POST['nurse'];
    echo "<script>console.log('$patientCheckInDateTime');</script>";


    // $insertPatientQuery = "INSERT INTO patients (patientID, patientName, patientAddress, patientEmail, patientPhoneNumber, ReasonForVisit, 
    // ward_id, roomID, CheckInDate, doctorID, nurseIDm is_deceased) VALUES ('$index', '$patientName', '$patientAddress', '$patientEmail', 
    // '$patientPhoneNumber', '$patientReasonForVisit', '$patientWard', '$patientRoomId', '$patientCheckInDateTime', '$patientDoctor', '$patientNurse', '0')";
    // $insertPatientResult = mysqli_query($database, $insertPatientQuery);
}
?>