<!DOCTYPE html>
<html>

<head>
    <title>Assign Doctor</title>

    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <script src="https://kit.fontawesome.com/93ab85f812.js" crossorigin="anonymous"></script>
    <?php include "employee.php"; ?>
    <?php include "setupDatabaseConnection.php"; ?>
    <?php include "sidebar.php"; ?>
</head>
<?php
$database = setupConnection();

function generateAssignedTable()
{
    global $database, $empID;
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    } else {
        $sql = "SELECT employee.employeeID, employee.employeeName, assigneddoctors.id, assigneddoctors.doctorID, assigneddoctors.nurseID FROM \n"
            . "employee INNER JOIN assigneddoctors ON employee.employeeID = assigneddoctors.doctorID WHERE employee.roleID = 1 AND \n"
            . "assigneddoctors.nurseID =" . $empID . "";
        $result = mysqli_query($database, $sql);
        while ($row = mysqli_fetch_row($result)) {
            echo "<tr>";
            echo "<td>{$row[0]}</td>";
            echo "<td>{$row[1]}</td>";
            echo "<td><button class=\"btn btn-primary mb-2 w-50 mx-auto\" name = \"unAssigned\" value=\"{$row[2]}\">Unassigned</button></td>";
            echo "</tr>";
        }
    }
}
function generateUnAssignedTable()
{
    global $database, $empID;
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    } else {
        $sql = "SELECT employee.employeeID, employee.employeeName FROM \n"
            . "employee WHERE employee.roleID = 1 \n"
            . "AND employee.employeeID NOT IN (SELECT doctorID FROM assigneddoctors)";
        $result = mysqli_query($database, $sql);
        while ($row = mysqli_fetch_row($result)) {
            echo "<tr>";
            echo "<td>{$row[0]}</td>";
            echo "<td>{$row[1]}</td>";
            echo "<td><button type=\"submit\" class=\"btn btn-primary mb-2 w-50 mx-auto\" name = \"Assigned\" value=\"{$row[0]}\">Assigned</button></td>";
            echo "</tr>";
        }
    }
}

if (isset($_POST["Assigned"])) {
    insertAssignedDoctor($_POST["Assigned"]);
} else if (isset($_POST["unAssigned"])) {
    deleteAssignedDoctor($_POST["unAssigned"]);
}

function insertAssignedDoctor($docID)
{
    global $database, $empID;
    if ($database != null) {
        $sql = "SELECT COUNT(assigneddoctors.nurseID) FROM assigneddoctors WHERE assigneddoctors.nurseID =" . $empID . "";
        $result = mysqli_query($database, $sql);
        $count = mysqli_fetch_row($result)[0];
        if ($count < 4) {
            $sql2 = "INSERT INTO `assigneddoctors` (`id`, `nurseID`, `doctorID`) VALUES (NULL, '" . $empID . "', '" . $docID . "')";
            $res = mysqli_query($database, $sql2);
            if (!$res) {
                echo "<script>alert('Error in adding employee')</script>";
            }
        } else {
            echo "<script>alert('Already assigned to the max number of doctors which is 4')</script>";
        }
    }
}
function deleteAssignedDoctor($id){
    global $database, $empID;
    if ($database != null) {
        $sql = "DELETE FROM assigneddoctors WHERE assigneddoctors.id =".$id."";
        $res = mysqli_query($database, $sql);
        if (!$res){
            echo "<script>alert('Error in removing assigned employee')</script>";
        }
    }
}
?>

<body style="background-color: #f4f6f9;">
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <?php echo $imgLink = add_sidebar($empRoleID, $empName); ?>
    <div class="content-wrapper">
        <h1 class="card mx-auto w-50 d-flex flex-row align-items-center justify-content-center p-2">
            <i class="p-2 fas fa-hospital-user"></i> Select Doctor
        </h1>
        <br><br>
        <form action="" method="POST">
            <h2 class=" card card-header w-50 mx-auto bg-dark">Assigned Doctors</h2>
            <div class="card-body table-responsive p-0 w-50 mx-auto" style="height: 300px;">
                
                <table class="table table-head-fixed text-nowrap text-center">
                    <thead>
                        <tr>
                            <th>Doctor ID </th>
                            <th>Doctor Name</th>
                            <th>Assigned</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php generateAssignedTable();
                        ?>
                    </tbody>
                </table>
            </div>
            <h2 class=" card card-header w-50 mx-auto bg-dark">Unassigned Doctors</h2>
            <div class="card-body table-responsive p-0 w-50 mx-auto" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap text-center">
                    <thead>
                        <tr>
                            <th>Doctor ID </th>
                            <th>Doctor Name</th>
                            <th>Assigned</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php generateUnAssignedTable();
                        ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</body>

</html>