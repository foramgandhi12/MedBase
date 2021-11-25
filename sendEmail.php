<?php
include "setupDatabaseConnection.php";

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['subbtn'])){
    
    $email = $_POST['inputEmail'];
    $surgery_type = $_POST['inputSurgery'];
    $operation_procedure = $_POST['inputProcedure'];
    $prescription = $_POST['inputPrescription'];
    $postCare = $_POST['inputCare'];

    // message
    $msg = "<html>
                <body>
                    <br>
                    Thank you for choosing our hospital! The following information has been conveyed to you by your surgeon regarding post-surgery care.<br><br>
                    Surgery Type: <b>$surgery_type</b><br>
                    Operation Procedure: <b>$operation_procedure</b><br>
                    Prescription(s): <b>$prescription</b><br>
                    Post-Surgery Care: <b>$postCare</b><br><br><br>
                    Take Care!<br>
                    <b>MedBase</b>
                <body>
            <html>";
    
    $message = wordwrap($msg, 150);

    //formats html in the email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: medbase@gmail.com';
    $subject = $_POST['inputSubject'];

    if (isset($_POST['checkCopy'])) {
        // sends email to both patient and employee
        mail($email, $subject, $message, $headers);
    }
    else {
        // sends email to only patient
        mail($email, $subject, $message, $headers);
    }
}
?>