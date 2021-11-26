<!DOCTYPE html>
<html>
    <head>
        <title>Bed Manager</title>

        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
        
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

        <!-- jQuery -->
        <script src="node_modules/admin-lte/plugins/jquery/jquery.min.js"></script>
        <!-- AdminLTE App -->
        <script src="node_modules/admin-lte/dist/js/adminlte.min.js"></script>

        <?php include "employee.php"; ?> 
        <?php include "setupDatabaseConnection.php"; ?>
        <?php include "sidebar.php"; ?>
    </head>
    <body>
        <?php echo add_sidebar($empRoleID, $empName); ?>
        <div class = "content-wrapper">
            <section class = "content">
                <div class = "container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Bed Manager</h3>
                            </div>
                                <div class="card-body p-0">
                                    <table class="table table-hover">
                                        <tbody>
                                            <?php
                                                $database = setupConnection();

                                                $getWardsQuery = "SELECT ward_id, ward_name FROM ward";
                                                $getWardResults = mysqli_query($database, $getWardsQuery);
                                                while($wards = mysqli_fetch_array($getWardResults)){
                                                    $getRoomsQuery = "SELECT roomType, num_beds FROM room WHERE wardID = '$wards[0]'";
                                                    $getRoomsResults = mysqli_query($database, $getRoomsQuery); ?>
                                                    
                                                    <tr data-widget="expandable-table" aria-expanded="true">
                                                        <td>
                                                            <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                            <?php echo $wards[1]; ?>
                                                        </td>
                                                    </tr>
                                                    <tr class="expandable-body">
                                                        <td>
                                                            <div class="p-0">
                                                                <table class="table table-hover">
                                                                    <tbody>
                                                                        <?php while($rooms = mysqli_fetch_array($getRoomsResults)) { 
                                                                            if (isset($rooms)) {?>                                                                                
                                                                                <tr data-widget="expandable-table">
                                                                                    <td><?php echo $rooms[0] ?></td>
                                                                                    <td><?php echo $rooms[1] ?></td>
                                                                                </tr>
                                                                        <?php }} ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
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