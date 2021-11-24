<?php
$paiName = "Patient Name: ".$_POST['paiName'];
$paiGender = "";
if ($_POST['paiGender'] == "M"){
    $paiGender = "Gender: Male";
}else{
    $paiGender = "Gender: Female";
}

$paiDOB = "Date Of Birth: ".$_POST['paiDOB'];
$paiAge = "Age: ".$_POST['paiAge'];
$paiAllergies = "Allergies: ".$_POST['paiAll'];
$paiHeight = "Height: ".$_POST['paiHeight'];
$paiWeight = "Weight: ".$_POST['paiWeight'];
$paiBloodType = "Blood Type: ".$_POST['paiBlood'];
$paiConditions = "Medical Conditions: ".$_POST['paiCond'];
$paiMeds = "Medications: ".$_POST['paiMeds'];
$paiFamDoc = "Family Doctor: ".$_POST['paiFamiyDoc'];
$paiEmgName = "Emergency Contact Name: ".$_POST['paiEmgC'];
$paiEmgNum = "Emergency Contact Number: ".$_POST['paiEmgNo'];

ob_end_clean();
require('public/fpdf/fpdf.php');
  
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 30);
$pdf->Image('public/img/MedBase.png',0,0,60);
$text = "MedBase Medical Records";

$pdf->Cell(0,50,$text,0,1,'C');
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(0,0,$paiName,0,1);  
$pdf->Cell(0,20,$paiGender,0,1);
$pdf->Cell(0,0,$paiDOB,0,1);
$pdf->Cell(0,20,$paiAge,0,1);
$pdf->Cell(0,0,$paiAllergies,0,1);
$pdf->Cell(0,20,$paiHeight,0,1);
$pdf->Cell(0,0,$paiWeight,0,1);
$pdf->Cell(0,20,$paiBloodType,0,1);
$pdf->Cell(0,0,$paiConditions,0,1);
$pdf->Cell(0,20,$paiMeds,0,1);
$pdf->Cell(0,0,$paiFamDoc,0,1);
$pdf->Cell(0,20,$paiEmgName,0,1);
$pdf->Cell(0,0,$paiEmgNum,0,1);

$pdf->Output('I',"{$_POST['paiName']} Medical Records.pdf");
?>