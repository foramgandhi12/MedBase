<!DOCTYPE html>
<html>
    <head>
        <title>Schedule</title>
        
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="public/css/schedule.css">
        <script src="public/js/schedule.js"></script>
        
        <?php include "employee.php"; ?> 
        <?php include "setupDatabaseConnection.php"; ?>
        <?php include "sidebar.php"; ?>
    </head>
    <body>
        <?php echo $imgLink = add_sidebar($empRoleID ,$empName) ?>

        <div class = "content-wrapper">
            <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23ffffff&ctz=America%2FToronto&src=bXM3ZnRyc2k0cGdrNGYxdTI5bTdocWl2azRAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&src=Y2xhc3Nyb29tMTExNzI0MTY0ODA5ODQxNDY0NTg4QGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&color=%23F6BF26&color=%234a148c" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe>
        </div>
    </body>
</html>