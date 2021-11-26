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
        ?>

        <!--Main Section-->
        <div class="content-wrapper extra" style="margin-top: -25px; margin-bottom: -7px">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2" style="margin-bottom: 0!important">
                        <div class="col-sm-6">
                            <h1 class="m-0" style="padding: 30px 0.5rem; padding-bottom: 10px">View Nurses</h1>
                        </div>
                    </div>
                    <span style="padding: 30px 0.5rem;">The table below indicates information about the nurses assigned to you.</span>
                   
                    <div class="card" style="margin: 30px 0.5rem;">
                        <div class="card-header" style="background-color: #79aeebe0">
                            <h3 class="card-title">My Nurses Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Department #</th>
                                        <th>Department Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        // Fetch data from database tables to place into nurse table
                                        $sql = "SELECT patients.nurseID, employee.employeeName, employee.employeePosition, employee.employeeDepartment, departments.departmentName
                                                FROM ((departments INNER JOIN employee ON departments.departmentID = employee.employeeDepartment)
                                                INNER JOIN patients ON patients.nurseID = employee.employeeID) WHERE patients.doctorID = $empID";
                                        $result = mysqli_query($database, $sql);
                                        
                                        if ($result){
                                            while($row = mysqli_fetch_row($result)){
                                                echo "<tr>";
                                                echo "<td>$row[0]</td>";
                                                echo "<td>$row[1]</td>";
                                                echo "<td><div><div style='width: 55%'>$row[2]</div></div></td>";
                                                echo "<td><span>$row[3]</span></td>";
                                                echo "<td>$row[4]</td>";
                                                echo "</tr>";
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>                
    </body>
</html>