<?php
include "setupDatabaseConnection.php";
// include "jsonVar.php";
global $filename;
// $paiID = intval($_POST['paiSelName']);
$database = setupConnection();
$paitentData = array();
if ($database != null) {
    // $sql = "SELECT * FROM patients WHERE patientID=".$paiID."";
    $sql = "SELECT * FROM patients WHERE patientID=1";
    $result = mysqli_query($database, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $paitentData += array(
            'name' => $row["patientName"],
            'address' => $row["patientAddress"],
            'email' => $row["patientEmail"],
            'reason' => $row["ReasonForVisit"],
            'date' => $row["CheckInDate"]
        );
    }

    // $sql1 = "SELECT * FROM medical_records WHERE patientID=".$paiID."";
    $sql1 = "SELECT * FROM medical_records WHERE patientID=1";
    $res = mysqli_query($database, $sql1);
    while ($row = mysqli_fetch_array($res)) {
        $paitentData += array(
            'gender' => $row["Gender"],
            'dob' => $row["DOB"],
            'age' => $row["Age"],
            'allergies' => $row["Allergies"],
            'height' => $row["Height"],
            'weight' => $row["Weight"],
            'blood' => $row["BloodType"],
            'conditions' => $row["Conditions"],
            'medication' => $row["Medications"],
            'familyDoctor' => $row["FamilyDoctor"],
            'emergencyContactName' => $row["EmergencyContactName"],
            'emergencyContactNo' => $row["EmergencyContactNo"]
        );
    }
}
$filename = $paitentData['name'] . ".json";
if (file_put_contents($filename, json_encode($paitentData))) {
?>
    <form action="generateMedPdf.php" method="POST">
        <button type="submit" name="jsonFile" value="<?php echo $filename ?>">Click To Download PDF</button>
    </form>
<?php
}
?>