<!DOCTYPE html>
<html>
    <head>
        <title>View Nurses</title>
        
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
        
        <?php include "employee.php"; ?> 
        <?php include "setupDatabaseConnection.php"; ?>
        <?php include "sidebar.php"; ?>
    </head>
    <body>
        <?php echo $imgLink = add_sidebar($empRoleID ,$empName) ?>

        <div class = "content-wrapper">
            test
        </div>
    </body>
</html>