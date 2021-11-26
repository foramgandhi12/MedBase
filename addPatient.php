<?php 
include 'setupDatabaseConnection.php';
$database = setupConnection();

if ($database != null){
    $query = "SELECT COUNT(*) FROM patients";
    $result= mysqli_query($database, $query);
    $index = intval(mysqli_fetch_row($result)[0]) + 1;

    // form fields
    $patientName = $_POST['patientName'];
    $patientAddress = $_POST['address'];
    $patientEmail = $_POST['email'];
    $patientPhoneNumber = $_POST['phoneNo'];
    $patientReasonForVisit = $_POST['reasonForVisit'];
    $patientWard = $_POST['ward'];
    $patientRoomId = $_POST['roomID'];
    $patientCheckInDateTime = str_replace("T", " ", $_POST['checkInDateTime']).":00";
    $patientDoctor = $_POST['doctor'];
    $patientNurse = $_POST['nurse'];

    // Script to insert patient with form fields
    $insertPatientQuery = "INSERT INTO patients(patientID, patientName, patientAddress, patientEmail, patientPhoneNumber, ReasonForVisit, ward_ID, roomID, CheckInDate, doctorID, nurseID, is_deceased) VALUES ('$index', '$patientName', '$patientAddress', '$patientEmail', '$patientPhoneNumber', '$patientReasonForVisit', '$patientWard', '$patientRoomId', '$patientCheckInDateTime', '$patientDoctor', '$patientNurse', '0')"; 
    // Run query
    $insertPatientResult = mysqli_query($database, $insertPatientQuery);
    // After execution return back to the patient registration page
    header("Location: patientRegistration.php");
}
?>