<?php
$paiName = "";
$paiAddress = "";
$paiEmail = "";
$paiPhone = "";
$paiReason = "";
$paiCheckin = "";
$paiTreatment = "";
$paiWard = "";
$paiRoom = "";
$paiDoctor = "";
$paiNurse = "";
$paiDeceased = "";
include "setupDatabaseConnection.php";
$database = setupConnection();
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
} else {
    $q = intval($_GET['q']);
    $sqlQ = "SELECT * FROM patients WHERE patientID = '" . $q . "'";
    $result = mysqli_query($database, $sqlQ);
    while ($row = mysqli_fetch_row($result)) {
        $paiName = $row[1];
        $paiAddress = $row[2];
        $paiEmail = $row[3];
        $paiPhone = $row[4];
        $paiReason = $row[5];
        $paiTreatment = $row[6];
        $paiWard = $row[7];
        $paiRoom = $row[8];
        $paiCheckin = date('Y-m-d\TH:i', strtotime($row[9]));
        $paiDoctor = $row[10];
        $paiNurse = $row[11];
        $paiDeceased = $row[12];
    }
    buildInfo();
}

function getWard()
{
    global $database, $paiWard;
    $options = '';
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    } else {
        $sqlQ = "SELECT * FROM ward";
        $result = mysqli_query($database, $sqlQ);

        while ($row = mysqli_fetch_row($result)) {
            if ($row[0] == $paiWard) {
                $options .= "<option value = \"{$row[0]}\" selected>{$row[2]}</option>";
            } else {
                $options .= "<option value = \"{$row[0]}\">{$row[2]}</option>";
            }
        }
    }
    return $options;
}

function getRoom()
{
    global $database, $paiRoom;
    $options = '';
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    } else {
        $sqlQ = "SELECT * FROM room";
        $result = mysqli_query($database, $sqlQ);

        while ($row = mysqli_fetch_row($result)) {
            if ($row[0] == $paiRoom) {
                $options .= "<option value = \"{$row[0]}\" selected>{$row[1]}</option>";
            } else {
                $options .= "<option value = \"{$row[0]}\">{$row[1]}</option>";
            }
        }
    }
    return $options;
}
function getDoctor()
{
    global $database, $paiDoctor;
    $options = '';
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    } else {
        $sqlQ = "SELECT * FROM employee WHERE roleID = 1";
        $result = mysqli_query($database, $sqlQ);

        while ($row = mysqli_fetch_row($result)) {
            if ($row[0] == $paiDoctor) {
                $options .= "<option value = \"{$row[0]}\" selected>{$row[1]}</option>";
            } else {
                $options .= "<option value = \"{$row[0]}\">{$row[1]}</option>";
            }
        }
    }
    return $options;
}
function getNurse()
{
    global $database, $paiNurse;
    $options = '';
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    } else {
        $sqlQ = "SELECT * FROM employee WHERE roleID = 2";
        $result = mysqli_query($database, $sqlQ);

        while ($row = mysqli_fetch_row($result)) {
            if ($row[0] == $paiNurse) {
                $options .= "<option value = \"{$row[0]}\" selected>{$row[1]}</option>";
            } else {
                $options .= "<option value = \"{$row[0]}\">{$row[1]}</option>";
            }
        }
    }
    return $options;
}
function isDeceased()
{
    global $paiDeceased;
    $options = '';

    if ($paiDeceased == "1") {
        $options .= "<option value = \"{1}\" selected>Yes</option>";
        $options .= "<option value = \"{0}\">No</option>";
    } elseif ($paiDeceased == "0") {
        $options .= "<option value = \"{1}\" >Yes</option>";
        $options .= "<option value = \"{0}\" selected>No</option>";
    } else {
        $options .= "<option value = \"{1}\" >Yes</option>";
        $options .= "<option value = \"{0}\" >No</option>";
    }
    return $options;
}
function buildInfo()
{
    global $paiName, $paiAddress, $paiEmail, $paiPhone, $paiReason, $paiTreatment, $paiCheckin;
?>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="paiName">Paitent Name</label>
            <input type="text" class="form-control" name="paiName" placeholder="John Wick" value="<?php echo $paiName ?>">
        </div>
        <div class="form-group col-md-4">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" name="inputAddress" placeholder="1234 Main St" value="<?php echo $paiAddress ?>">
        </div>
        <div class="form-group col-md-4">
            <label for="paiEmail">Email</label>
            <input type="email" class="form-control" name="paiEmail" placeholder="johnwick@gmail.com" value="<?php echo $paiEmail ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="paiNum">Phone Number</label>
            <input type="text" class="form-control" name="paiNum" placeholder="647123456" value="<?php echo $paiPhone ?>">
        </div>
        <div class="form-group col-md-7">
            <label for="paiRea">Reason For Visit</label>
            <input type="text" class="form-control" name="paiRea" placeholder="idk something" value="<?php echo $paiReason ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="checkIn">Check In Date</label>
            <input type="datetime-local" name="checkIn" value = "<?php echo $paiCheckin; ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="paiTreat">Treatment</label>
            <input type="text" class="form-control" name="paiTreat" placeholder="ibuprofen" value="<?php echo $paiTreatment ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="wardNam">Ward</label>
            <select name="wardNam" class="form-control">
                <option>Choose...</option>
                <?php echo getWard(); ?>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="assignRoom">Assigned Room</label>
            <select name="assignRoom" class="form-control">
                <option>Choose...</option>
                <?php echo getRoom(); ?>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="assignDoc">Assigned Doctor</label>
            <select name="assignDoc" class="form-control">
                <option>Choose...</option>
                <?php echo getDoctor(); ?>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="assignNurse">Assigned Nurse</label>
            <select name="assignNurse" class="form-control">
                <option>Choose...</option>
                <?php echo getNurse(); ?>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="paiDec">Deceased</label>
            <select name="paiDec" class="form-control">
                <option selected>Choose...</option>
                <?php echo isDeceased(); ?>
            </select>
        </div>
    </div>
<?php
}
?>