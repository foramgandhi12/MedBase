<!DOCTYPE html>
<html>
    <head>
        <title>Patient Regisration</title>
        
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
        <?php echo $imgLink = add_sidebar($empRoleID ,$empName) ?>

        <div class = "content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0" style="padding: 30px 0.5rem;" >Patient Registration:</h1>
                        </div>
                    </div>
                </div>
            </div>
            <section class = "content">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Add Patient</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="addPatient.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label>Patient Name</label> <br>
                                        <input type="text" class="form-control" id = "patientName" name = "patientName" placeholder="Patient Name">
                                    </div>
                                    <br>
                                    <div class="form group">
                                        <label>Address</label> <br>
                                        <input type="text" class="form-control" id = "address" name = "address" placeholder="Address">
                                    </div>
                                    <br>

                                    <div class="form group">
                                        <label>Email</label> <br>
                                        <input type="email" class="form-control" id = "email" name = "email" placeholder="Email">
                                    </div>
                                    <br>

                                    <div class="form group">
                                        <label>Phone Number</label> <br>
                                        <input type="number" class="form-control" id = "phoneNo" name = "phoneNo" placeholder="Phone Number">
                                    </div>
                                    <br>
                                    <div class="form group">
                                        <label>Reason for Visit</label> <br>
                                        <input type="text" class="form-control" id = "reasonForVisit" name = "reasonForVisit" placeholder="Reason for visit...">
                                    </div>
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <!-- The receptionist is not authorized to modify the treatment of the patient -->
                                    <div class="form group">
                                        <label>Treatment</label> <br>
                                        <input type="text" class="form-control" id = "treatment" name = "treatment" disabled placeholder="Treatment">
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label>Ward</label> <br>
                                        <select class="form-control select2" style="width: 100%;" id = "ward" name = "ward">
                                            <?php 
                                                $database = setupConnection();
                                                // Get all the ward names
                                                $wardNamesQuery = "SELECT ward_id, ward_name FROM ward";
                                                $wardNamesResult = mysqli_query($database, $wardNamesQuery);
                                                while($row = mysqli_fetch_array($wardNamesResult)){ ?>
                                                    <option value = '<?php echo $row[0] ?>'> <?php echo $row[1] ?> </option>
                                                <?php } ?>  
                                        </select>
                                    </div>
                                    <div class="form group">
                                        <label>Room</label> <br>
                                        <input type="number" class="form-control" id = "roomID" name = "roomID" placeholder="Room Number">
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label>Check in date</label> <br>
                                            <div class="input-group date">
                                                <input type="datetime-local" id = "checkInDateTime" name = "checkInDateTime" class="form-control datetimepicker-input"/>
                                            </div>
                                    </div>
                                    <br>

                                    <!-- TODO: make this dynamic the options should be generated from the database -->
                                    
                                    <div class="row">
                                        <div class = "col-lg-6">
                                            <div class="form-group">
                                                <label>Doctor</label> <br>
                                                <select class="form-control select2" style="width: 100%;" id = "doctor" name = "doctor">
                                                    <option selected value="0">None</option>
                                                    <?php 
                                                        // Get all the ward names
                                                        $doctorNamesQuery = "SELECT employeeID, employeeName FROM employee WHERE roleID = 1";
                                                        $doctorNamesResult = mysqli_query($database, $doctorNamesQuery);
                                                        while($row = mysqli_fetch_array($doctorNamesResult)){?>
                                                            <option value = '<?php echo $row[0] ?>'><?php echo $row[1] ?></option>

                                                        <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class = "col-lg-6">
                                            <div class="form-group">
                                                <label>Nurse</label> <br>
                                                <select class="form-control select2" style="width: 100%;" id = "nurse" name = "nurse">
                                                    <option selected value="0">None</option>
                                                    <?php 
                                                        // Get all the ward names
                                                        $nurseNamesQuery = "SELECT employeeID, employeeName FROM employee WHERE roleID = 2";
                                                        $nurseNamesResult = mysqli_query($database, $nurseNamesQuery);
                                                        while($row = mysqli_fetch_array($nurseNamesResult)){?>
                                                            <option value = '<?php echo $row[0] ?>'><?php echo $row[1] ?></option>

                                                        <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <input type="submit" class="btn btn-primary" name="addPatient" value="Submit" style="float: right; width: -webkit-fill-available">
                        </form>
                    </div>
                </div>
                <br>
            </section>                
        </div>
    </body>
</html>