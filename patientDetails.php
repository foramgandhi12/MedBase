<!DOCTYPE html>
<html>
    <head>
        <title>Patient Details</title>
        
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">

        <!-- Bootstrap css -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Modale links -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        
        <?php include "employee.php"; ?> 
        <?php include "setupDatabaseConnection.php"; ?>
        <?php include "sidebar.php"; ?>
    </head>
    <body>
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
        <?php 

        $database = setupConnection();
        echo $imgLink = add_sidebar($empRoleID ,$empName);

        ?>
        <?php
        function AssignPatient($pid){
            global $database, $empID;
            if($database!=null){
                $sql = "UPDATE patients SET doctorID = $empID WHERE patientID = $pid";
                $res = mysqli_query($database, $sql);
                if(!$res){
                    echo "<script>alert('Error in assigning patient')</script>";
                }
            }
        }

        //Dynamically creating the table for assigned patients
        function generateTableForAssigned(){
            global $database, $empID;
            
            if(mysqli_connect_errno()){
                echo "Failed to connect to database";
                exit();
            }
            //querying the database
            $sql = "SELECT patients.patientName, patients.patientEmail, 
            patients.patientPhoneNumber,patients.ReasonForVisit,patients.treatment, ward.ward_name, ward.ward_location, room.floorNumber, employee.employeeName, employee.employeeID
            FROM (((ward INNER JOIN patients on ward.ward_id = patients.ward_ID)
            INNER JOIN room ON room.roomID = patients.roomID)
            INNER JOIN employee ON employee.employeeID = patients.doctorID) WHERE employee.employeeID=$empID";
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
                echo "<td>{$row[8]}</td>";
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
            $sql = "SELECT patients.patientName, patients.patientEmail,
            patients.patientPhoneNumber,patients.ReasonForVisit,patients.treatment,ward.ward_name,ward.ward_location, room.floorNumber, patients.doctorID, patients.patientID
            FROM ((ward INNER JOIN patients on ward.ward_id = patients.ward_ID)
            INNER JOIN room ON room.roomID = patients.roomID) WHERE patients.doctorID is NULL";
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
                echo "<td>{$row[7]}</td>";
                echo "<td>";
                echo "<button type=\"submit\" class=\"btn btn-primary\" name = \"AddTreatment\" value=\"{$row[9]}\">Assign To Me</button>";
                echo "</td>";
                echo "</tr>";
            }
        }
        if (isset($_POST["AddTreatment"])) {
            AssignPatient($_POST["AddTreatment"]);
        }
        ?>
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
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
                                echo "<th scope='col'>"."Ward Name"."</th>";
                                echo "<th scope='col'>"."Ward Location"."</th>";
                                echo "<th scope='col'>"."Floor Number"."</th>";
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
                </div>
            </div>
        </section>
        <br>
        <form method="post" action="">
            <div class="content-wrapper">
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
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
                                    echo "<th scope='col'>"."Ward Name"."</th>";
                                    echo "<th scope='col'>"."Ward Location"."</th>";
                                    echo "<th scope='col'>"."Floor Number"."</th>";
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
                    </div>
                </div>
            </section>
        </form>
    </body>
</html>