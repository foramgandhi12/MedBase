<!DOCTYPE html>
<html>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<head>
    <title>Reserve Room</title>

    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <script src="https://kit.fontawesome.com/93ab85f812.js" crossorigin="anonymous"></script>
    <?php include "employee.php"; ?>
    <?php include "setupDatabaseConnection.php"; ?>
    <?php include "sidebar.php"; ?>
</head>
<?php
$database = setupConnection();
function getInfo($sqlQ)
{
    global $database;
    $options = '';
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    } else {
        $result = mysqli_query($database, $sqlQ);

        while ($row = mysqli_fetch_row($result)) {
            $options .= "<option value = \"{$row[0]}\">{$row[1]}</option>";
        }
    }
    return $options;
}
?>

<body style="background-color: #f4f6f9;">
    <script>
        //showUser();
    </script>
    <?php echo $imgLink = add_sidebar($empRoleID, $empName); ?>
    <div class="content-wrapper">
        <h1 class="card mx-auto w-50 d-flex flex-row align-items-center justify-content-center p-2">
            <i class="p-2 fas fa-hospital-user"></i> Reserve Room
        </h1>
        <br><br>
        <form class="w-75 mx-auto card p-5" action="" method="POST">
            <!-- <h2 class="mx-auto">Book Patient Surgery</h2> -->
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="selRoom">Select Room</label>
                    <select name="selRoom" class="form-control" required>
                        <option value="">Choose...</option>
                        <?php echo getInfo("SELECT room.roomID, room.roomType FROM room"); ?>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="selDoc">Select Doctor</label>
                    <select name="selDoc" class="form-control" required>
                        <option value="">Choose...</option>
                        <?php echo getInfo("SELECT employee.employeeID, employee.employeeName FROM employee WHERE roleID=1") ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="selNurse">Select Nurse (If applicable)</label>
                    <select name="selNurse" class="form-control">
                        <option value="">Choose...</option>
                        <?php echo getInfo("SELECT employee.employeeID, employee.employeeName FROM employee WHERE roleID=2") ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="resDate">Date To Reserve Room</label>
                    <input type="date" name="resDate" class="form-control"/>
                </div>

            </div>
            <div class="form-group col-md-8">
                <label for="resDes">Description</label>
                <input type="text" class="form-control" name="resDes" style="height:35px;" />
            </div>
            <br>
            <button class="btn btn-primary mb-2 w-50 mx-auto" name="confirm">Confirm Reservation</button>
        </form>
    </div>
</body>

</html>

<?php
    if(isset($_POST['confirm'])){
        insertReservation();
    }
    function insertReservation(){
        global $database;
        if ($database != null){
            $room = $_POST['selRoom'];
            $docID = $_POST['selDoc'];
            $nurseID = $_POST['selNurse'];
            $date = $_POST['resDate'];
            $des = $_POST['resDes'];
            $sql = "INSERT INTO reserveroom(reservationID, roomID, doctorID, nurseID, reservationDate, reservationDes) VALUES(NULL, '$room', '$docID', '$nurseID', '$date', '$des')";
            $res = mysqli_query($database,$sql);
            if($res){
                echo "<script>alert('Reservation Confirmed')</script>";
            }


        }
    }
?>