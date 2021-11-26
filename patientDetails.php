<!DOCTYPE html>
<html>
    <head>
        <title>Patient Details</title>
        
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">

        <!-- Bootstrap css -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <?php include "employee.php"; ?> 
        <?php include "setupDatabaseConnection.php"; ?>
        <?php include "sidebar.php"; ?>
    </head>
    <body>
        <?php 

        $database = setupConnection();
        echo $imgLink = add_sidebar($empRoleID ,$empName);

        //PHP function to respond on button clicks
        if(array_key_exists('button1', $_POST)) {
            button1();
        }

        //Dynamically creating the table for assigned patients
        function generateTableForAssigned(){
            global $database, $empID;
            
            if(mysqli_connect_errno()){
                echo "Failed to connect to database";
                exit();
            }
            //querying the database
            $sql = "SELECT patients.patientName, patients.patientEmail, \n"
            . "patients.patientPhoneNumber,ward.ward_name,ward.ward_location, room.floorNumber, room.roomType, employee.employeeName, employee.employeeID\n"
            . "FROM (((ward INNER JOIN patients on ward.ward_id = patients.ward_ID)\n"
            . "      INNER JOIN room ON room.roomID = patients.roomID)\n"
            . "      INNER JOIN employee ON employee.employeeID = patients.doctorID) WHERE employee.employeeID=".$empID."";
            $result = mysqli_query($database, $sql);

            //loading in tabular data
            while($row = mysqli_fetch_row($result)){
                echo "<tr>";
                echo "<td>{$row[0]}</td>";
                echo "<td>{$row[1]}</td>";
                echo "<td>{$row[2]}</td>";
                echo "<td>{$row[3]}</td>";
                echo "<td>{$row[4]}</td>";
                echo "<td>{$row[5]}</td>";
                echo "<td>{$row[6]}</td>";
                echo "<td>{$row[7]}</td>";
                echo "</tr>";
            }
        }

        //Dynamically creating the table for all unassigned patients
        function generateTableForUnAssigned(){
            global $database, $empID;
            
            if(mysqli_connect_errno()){
                echo "Failed to connect to database";
                exit();
            }
            //querying the database
            $sql = "SELECT patients.patientName, patients.patientEmail, \n"
            . "patients.patientPhoneNumber,ward.ward_name,ward.ward_location, room.floorNumber, room.roomType, patients.doctorID\n"
            . "FROM ((ward INNER JOIN patients on ward.ward_id = patients.ward_ID)\n"
            . "      INNER JOIN room ON room.roomID = patients.roomID) WHERE patients.doctorID is NULL";
            $result = mysqli_query($database, $sql);

            //loading in the tabular data
            while($row = mysqli_fetch_row($result)){
                echo "<tr>";
                echo "<td>{$row[0]}</td>";
                echo "<td>{$row[1]}</td>";
                echo "<td>{$row[2]}</td>";
                echo "<td>{$row[3]}</td>";
                echo "<td>{$row[4]}</td>";
                echo "<td>{$row[5]}</td>";
                echo "<td>{$row[6]}</td>";
                echo "<td>";
                echo "<form method='post'>";
                echo "<input type='submit' name='button1' class='btn btn-danger' value='Assign To Me'".">";
                echo "</form>";
                echo"</td>";
                echo "</tr>";
            }
        }
        ?>
        <div class="content-wrapper">
        <h1>Assigned Patients</h1>
            <div class = "row mx-auto">
                <table class="table table-bordered table-striped text-center">
                    <?php
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th scope='col'>"."Patient Name"."</th>";
                    echo "<th scope='col'>"."Patient Email"."</th>";
                    echo "<th scope='col'>"."Patient Phone Number"."</th>";
                    echo "<th scope='col'>"."Reason For Visit"."</th>";
                    echo "<th scope='col'>"."Treatment"."</th>";
                    echo "<th scope='col'>"."Ward-ID"."</th>";
                    echo "<th scope='col'>"."Room-ID"."</th>";
                    echo "<th scope='col'>"."Doctor Name"."</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    generateTableForAssigned();
                    echo "</tbody>";
                    ?>
                </table>   
            </div>
        </div>
        <br>
        <div class="content-wrapper">
            <h1>Unassigned Patients</h1>
            <div class = "row mx-auto">
                <table class="table table-bordered table-striped text-center">
                    <?php
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th scope='col'>"."Patient Name"."</th>";
                    echo "<th scope='col'>"."Patient Email"."</th>";
                    echo "<th scope='col'>"."Patient Phone Number"."</th>";
                    echo "<th scope='col'>"."Reason For Visit"."</th>";
                    echo "<th scope='col'>"."Treatment"."</th>";
                    echo "<th scope='col'>"."Ward-ID"."</th>";
                    echo "<th scope='col'>"."Room-ID"."</th>";
                    echo "<th scope='col'>"."Assign Patient"."</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    generateTableForUnAssigned();
                    echo "</tbody>";
                    ?>
                </table>   
            </div>
        </div>
    </body>
</html>