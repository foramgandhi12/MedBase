<!DOCTYPE html>
<html>
<script>
    function showUser(str) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("paitentInfo").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getPaitentDetails.php?q=" + str, true);
        xmlhttp.send();
    }
</script>

<head>
    <title>Patient Details</title>

    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <script src="https://kit.fontawesome.com/93ab85f812.js" crossorigin="anonymous"></script>
    <?php include "employee.php"; ?>
    <?php include "setupDatabaseConnection.php"; ?>
    <?php include "sidebar.php"; ?>
</head>
<?php
$database = setupConnection();
function getPaitents()
{
    global $database;
    $options = '';
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    } else {
        $sqlQ = "SELECT * FROM patients";
        $result = mysqli_query($database, $sqlQ);

        while ($row = mysqli_fetch_row($result)) {
            $options .= "<option value = \"{$row[0]}\">{$row[1]}</option>";
        }
    }
    return $options;
}
function generateTable(){
    global $database;
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    } else {
        $sql = "SELECT patients.patientName, patients.patientEmail, \n"
        . "patients.patientPhoneNumber,ward.ward_name,ward.ward_location, room.floorNumber, room.roomType\n"
        . "FROM ((ward INNER JOIN patients on ward.ward_id = patients.ward_ID)\n"
        . "      INNER JOIN room ON room.roomID = patients.roomID)";
        $result = mysqli_query($database, $sql);
        while ($row = mysqli_fetch_row($result)) {
            echo "<tr>";
            echo "<td>{$row[0]}</td>";
            echo "<td>{$row[1]}</td>";
            echo "<td>{$row[2]}</td>";
            echo "<td>{$row[3]}</td>";
            echo "<td>{$row[4]}</td>";
            echo "<td>{$row[5]}</td>";
            echo "<td>{$row[6]}</td>";
            echo "</tr>";
        }
    }
}
?>

<body style="background-color: #f4f6f9;">
    <script>
        showUser();
    </script>
    <?php echo $imgLink = add_sidebar($empRoleID, $empName); ?>
    <div class="content-wrapper">
        <h1 class="card mx-auto w-25 d-flex flex-row align-items-center justify-content-center p-2"><i class="p-2 fas fa-hospital-user"></i> Patient Details</h1>
        <br><br>
        <div class="card-body table-responsive p-0 w-75 mx-auto" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>Paitent Name</th>
                        <th>Paitent Email</th>
                        <th>Paitent Phone Number</th>
                        <th>Ward Name</th>
                        <th>Ward Location</th>
                        <th>Floor Number</th>
                        <th>Room Type</th>
                    </tr>
                </thead>
                <tbody>
                   <?php generateTable(); ?>
                </tbody>
            </table>
        </div>
        <br><br>
        <form class="w-75 mx-auto card p-5">
            <h2 class="mx-auto">Patient Details</h2>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="paiSelName">Select Paitent</label>
                    <select name="paiSelName" class="form-control" onchange="showUser(this.value)">
                        <option value="">Choose...</option>
                        <?php echo getPaitents(); ?>
                    </select>
                </div>
            </div>
            <!-- Start -- patient info will be loaded here -->
            <div id="paitentInfo"></div>
            <!-- end -->
        </form>
    </div>
</body>

</html>