<?php
$paiName = "";
$paiGender = "";
$paiDOB = "";
$paiAge = "";
$paiAllergies = "";
$paiHeight = "";
$paiWeight = "";
$paiBloodType = "";
$paiConditions = "";
$paiMeds = "";
$paiFamDoc = "";
$paiEmgName = "";
$paiEmgNum = "";
include "setupDatabaseConnection.php";
$database = setupConnection();
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
} else {
    $q = intval($_GET['q']);
    $sqlQ = "SELECT * FROM medical_records WHERE patientID = '" . $q . "'";
    $result = mysqli_query($database, $sqlQ);
    while ($row = mysqli_fetch_row($result)) {
        getPaientName();
        $paiGender = $row[2];
        $paiDOB = $row[3];
        $paiAge = $row[4];
        $paiAllergies = $row[5];
        $paiHeight = $row[6];
        $paiWeight = $row[7];
        $paiBloodType = $row[8];
        $paiConditions = $row[9];
        $paiMeds = $row[10];
        $paiFamDoc = $row[11];
        $paiEmgName = $row[12];
        $paiEmgNum = $row[13];
    }
    buildInfo();
}

function getPaientName(){
    $q = intval($_GET['q']);
    global $database;
    global $paiName;
    if ($database != null){
        $sqlQ = "SELECT patientName FROM patients WHERE patientID = ". $q ."";
        $result = mysqli_query($database, $sqlQ);
        while ($row = mysqli_fetch_row($result)) {
            $paiName = $row[0];
        }
    }

}
function buildInfo()
{
    global $paiName,$paiGender,$paiDOB,$paiAge,$paiAllergies,$paiHeight,$paiWeight;
    global $paiBloodType,$paiConditions,$paiMeds,$paiFamDoc,$paiEmgName,$paiEmgNum; 
?>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="paiName">Paitent Name</label>
            <input type="text" class="form-control" name="paiName" placeholder="John Wick" value = "<?php echo $paiName; ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="paiDOB">Date Of Birth</label>
            <input type="date" class="form-control" name="paiDOB" value = "<?php echo $paiDOB; ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="paiGender">Gender</label>
            <select name="paiGender" class="form-control">
                <option selected>Choose...</option>
                <option <?php if($paiGender == "M"){echo "Selected";} ?> value="M" >Male</option>
                <option <?php if($paiGender == "F"){echo "Selected";} ?> value="F">Female</option>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="paiAge">Age</label>
            <input type="number" class="form-control" name="paiAge" value = "<?php echo $paiAge; ?>">
        </div>
        <div class="form-group col-md-4">
            <label for="paiAll">Allergies</label>
            <input type="text" class="form-control" name="paiAll" placeholder="Peanuts, Treenuts, Fish" value = "<?php echo $paiAllergies; ?>">
        </div>
    </div>
   
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="paiHeight">Height</label>
            <input type="number" class="form-control" name="paiHeight" value = "<?php echo $paiHeight; ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="paiWeight">Width</label>
            <input type="number" class="form-control" name="paiWeight" value = "<?php echo $paiWeight; ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="paiBlood">Blood Type</label>
            <input type="text" class="form-control" name="paiBlood" value = "<?php echo $paiBloodType; ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="paiCond">Medical Conditions</label>
            <input type="text" class="form-control" name="paiCond" placeholder="Cancer, Liver Disease" value = "<?php echo $paiConditions; ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="paiMeds">Medications</label>
            <input type="text" class="form-control" name="paiMeds" placeholder="Pain Killers" value = "<?php echo $paiMeds; ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="paiFamiyDoc">Family Doctor</label>
            <input type="text" class="form-control" name="paiFamiyDoc" placeholder="Dr.Phil" value = "<?php echo $paiFamDoc; ?>">
        </div>
        <div class="form-group col-md-4">
            <label for="paiEmgC">Emergency Contact Name</label>
            <input type="text" class="form-control" name="paiEmgC" placeholder="Mr.Rogers" value = "<?php echo $paiEmgName; ?>">
        </div>
        <div class="form-group col-md-4">
            <label for="paiEmgNo">Emergency Contact Number</label>
            <input type="text" class="form-control" name="paiEmgNo" placeholder="9054166472" value = "<?php echo $paiEmgNum; ?>">
        </div>
    </div>
<?php
}
?>