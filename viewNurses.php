<!DOCTYPE html>
<html>
    <head>
        <title>View Nurses</title>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">

        <?php include "employee.php"; ?> 
        <?php include "setupDatabaseConnection.php"; ?>
        <?php include "sidebar.php"; ?>
    </head>
    <body>
        <?php
        $database = setupConnection();
        echo $imgLink = add_sidebar($empRoleID, $empName);
        
        //Fetch information to display in the nurses table (nurseID, employeeName, employeePosition, employeeDepartment#, departmentName)
        ?>

        <div class="content-wrapper extra" style="margin-top: -25px; margin-bottom: -7px">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2" style="margin-bottom: 0!important">
                        <div class="col-sm-6">
                            <h1 class="m-0" style="padding: 30px 0.5rem; padding-bottom: 10px">View Nurses</h1>
                        </div>
                    </div>
                    <span style="padding: 30px 0.5rem;">The table below indicates information about the nurses assigned to you.</span>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">My Nurses table</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">ID</th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th style="width: 40px">Department #</th>
                                                <th>Department Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql = "SELECT patients.nurseID, employee.employeeName, employee.employeePosition, employee.employeeDepartment, departments.departmentName
                                                        FROM ((patients INNER JOIN employee ON patients.nurseID = employee.employeeID)
                                                        INNER JOIN employee ON employee.employeeDepartment = departments.departmentID) WHERE patients.doctorID = $empID";
                                                $result = mysqli_query($database, $sql);
                                                
                                                if ($result){
                                                    while($row = mysqli_fetch_row($result)){
                                                        echo "<td>$row[0]</td>";
                                                        echo "<td>$row[1]</td>";
                                                        echo "<td><div><div style='width: 55%'>$row[2]</div></div></td>";
                                                        echo "<td><span>$row[3]</span></td>";
                                                    }
                                                }
                                            ?>
                                            <tr>
                                                <td>1.</td>
                                                <td>Update software</td>
                                                <td>
                                                    <div class="progress progress-xs">
                                                        <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-danger">55%</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>                
    </body>
</html>