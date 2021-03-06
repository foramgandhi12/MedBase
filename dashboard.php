<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <?php include "element.php"; ?> 
  <?php include "employee.php"; ?> 
  <?php include "setupDatabaseConnection.php"; ?>
  <?php include "sidebar.php"; ?>

  <script>
    document.getElementById('datePicker').value = new Date().toDateInputValue();
  </script>
  <style>
    #submit-form{
        background-color: #6a5eb5;
        border: none;
    }
    #submit-form:hover{
        background-color: #52498c;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Insert the sidebar -->
    <?php echo $imgLink = add_sidebar($empRoleID, $empName); ?>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0" style="padding: 30px 0.5rem;" >Welcome, <?php echo $empName?>!</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <!-- Widget div -->
                <div class="row" id="widget_row"></div>
            </div>
        </section>
        <br><br>            
        <div class = "row" style="margin-left: 0; margin-right: 0;">
            <div class="col-md-6" style="max-width: 50%; height: 10%;">
            <!-- Widget: user widget style 1 -->
                <div class="card card-widget widget-user shadow" style="margin-left: 8px">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info">
                        <h3 class="widget-user-username"><?php echo $empName ?></h3>
                        <h5 class="widget-user-desc"><?php echo $empPosition ?></h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2" src=<?php echo $imgLink ?> alt="User Avatar">
                    </div>
                    <div class="card-footer" style="height: 149px">
                        <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                            <h5 class="description-header"><?php echo $empAddress ?></h5>
                            <span class="description-text">ADDRESS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                            <?php 
                                $database = setupConnection();
                                //perform query 
                                $query = "SELECT departmentName FROM departments WHERE departmentID = '$empDepartment'";
                                $result = mysqli_query($database, $query);
                            ?>
                            <h5 class="description-header"><?php echo mysqli_fetch_row($result)[0] ?></h5>
                            <span class="description-text">DEPARTMENT</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                            <h5 class="description-header"><?php echo $empPhoneNo ?></h5>
                            <span class="description-text">PHONE NUMBER</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </div>
            <!--Widget for employee clock-in/clock-out-->
            <div class = "col md-6" style="max-width: 50%;">
                <!-- Input addon -->
                <div class="card card-info" style="margin-bottom: 15%; margin-right: 8px">
                    <div class="card-header"style="background-color: #6a5eb5;">
                        <h3 class="card-title">Time Card</h3>
                    </div>
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">#</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Employee Number">
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Hours Worked">
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="date" class="form-control" value="" id="datePicker">
                        </div>
                        <a href="#" id="submit-form" class="btn btn-primary">Submit</a>
                </div>
                <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</body>
</html>
