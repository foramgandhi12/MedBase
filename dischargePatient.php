<!DOCTYPE html>
<html>
    <head>
        <title>Discharge Regisration</title>
        
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
        
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

        <?php include "employee.php"; ?> 
        <?php include "setupDatabaseConnection.php"; ?>
        <?php include "sidebar.php"; ?>
    </head>

    <body>
        <?php echo $imgLink = add_sidebar($empRoleID ,$empName); ?>
        
        <div class = "content-wrapper">
            <section class = "content">
                <div class = "container-fluid">
                    <div class = "row">
                        <div class = "col-12">
                            <div class = "card">
                            <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Patient ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Reason for Visit</th>
                                    <th>Treatment</th>
                                    <th>Ward</th>
                                    <th>Room ID</th>
                                    <th>Check In Date</th>
                                    <th>Doctor</th>
                                    <th>Nurse</th>
                                    <th>Deceased</th>
                                    <th>Discharge</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $database = setupConnection();

                                    // print all the patients in the table
                                    $patientsQuery = "SELECT * FROM patients";
                                    $patientsResults = mysqli_query($database, $patientsQuery);
                                    while ($row = mysqli_fetch_array($patientsResults)){ ?>
                                        <tr>
                                            <!-- Patient ID -->
                                            <td><?php echo $row[0]; ?></td>
                                            <!-- Name -->
                                            <td><?php echo $row[1]; ?></td>
                                            <!-- Address -->
                                            <td><?php echo $row[2]; ?></td>
                                            <!-- Email  -->
                                            <td><?php echo $row[3]; ?></td>
                                            <!-- Phone Number  -->
                                            <td><?php echo $row[4]; ?></td>
                                            <!-- Reason for Visit  -->
                                            <td><?php echo $row[5]; ?></td>
                                            <!-- Treatment  -->
                                            <td><?php echo $row[6]; ?></td>
                                            <!-- Ward  -->
                                            <?php 
                                                // Get ward name associated with ward ID
                                                $wardID = $row[7];
                                                $wardQuery = "SELECT ward_name FROM ward WHERE ward_id = '$wardID'";
                                                $wardResult = mysqli_query($database, $wardQuery);
                                                $ward = mysqli_fetch_row($wardResult)[0];
                                            ?>
                                            <td><?php echo $ward; ?></td>
                                            <!-- Room ID  -->
                                            <td><?php echo $row[8]; ?></td>
                                            <!-- Check in Date  -->
                                            <td><?php echo $row[9]; ?></td>
                                            <!-- Doctor  -->
                                            <?php 
                                                $doctorID = $row[10];
                                                $doctorQuery = "SELECT employeeName FROM employee WHERE employeeID = '$doctorID'";
                                                $doctorResult = mysqli_query($database, $doctorQuery);
                                                $doctor = mysqli_fetch_row($doctorResult)[0];
                                            ?>
                                            <td><?php echo $doctor; ?></td>
                                            <!-- Nurse  -->
                                            <?php 
                                                $nurseID = $row[11];
                                                $nurseQuery = "SELECT employeeName FROM employee WHERE employeeID = '$nurseID'";
                                                $nurseResult = mysqli_query($database, $nurseQuery);
                                                $nurse = mysqli_fetch_row($nurseResult)[0];
                                            ?>
                                            <td><?php echo $nurse; ?></td>
                                            <!-- Deceased  -->
                                            <td>
                                                <input type="checkbox" <?php if($row[12] == '1'){ echo 'checked'; } ?> disabled>
                                            </td>
                                            <td>
                                                <form action = "removePatient.php" method = "POST">
                                                    <input class="btn btn-primary" type = "submit" value = "Discharge">
                                                    <input hidden type="hidden" name = "discharge" value = "<?php echo $row[0]; ?>">
                                                </form>
                                            </td>
                                        </tr>
                                    <?php } ?>
                            </tbody>
                        </table>
                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>