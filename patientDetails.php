<!DOCTYPE html>
<html>
<script>
    function showUser(str) {
        // if (str == "") {
        //     document.getElementById("paitentInfo").innerHTML = "";
        //     return;
        // } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("paitentInfo").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getPaitentDetails.php?q=" + str, true);
        xmlhttp.send();
        //}
    }
</script>

<head>
    <title>Patient Details</title>

    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <script src="https://kit.fontawesome.com/93ab85f812.js" crossorigin="anonymous"></script>
    <?php include "employee.php"; ?>
    <?php include "setupDatabaseConnection.php"; ?>
    <?php include "sidebar.php"; ?>
</head>
<?php
setupConnection();
function getPaitents()
{
    global $database;
    $options = '';
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    } else {
        $sqlQ = "SELECT * FROM patients";
        $result = mysqli_query($database, $sqlQ);

        while ($row = mysqli_fetch_row($result)) {
            $options .= "<option value = \"{$row[0]}\">{$row[1]}</option>";
        }
    }
    return $options;
}
?>

<body style="background-color: #f4f6f9;">
    <script>
        showUser();
    </script>
    <?php echo $imgLink = add_sidebar($empRoleID, $empName); ?>
    <div class="content-wrapper">
        <h1 class="card mx-auto w-25 d-flex flex-row align-items-center justify-content-center p-2"><i class="p-2 fas fa-hospital-user"></i> Paitent Details</h1>
        <br><br>

        <form class="w-75 mx-auto card p-5">
            <h2 class="mx-auto">Paitent Details</h2>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="paiSelName">Select Paitent</label>
                    <select name="paiSelName" class="form-control" onchange="showUser(this.value)">
                        <option value="">Choose...</option>
                        <?php echo getPaitents(); ?>
                    </select>
                </div>
            </div>
            <!-- Start -- patient info will be loaded here -->
            <div id="paitentInfo"></div>
            <!-- end -->
            <button class="btn btn-primary mb-2 w-50 mx-auto" disabled>Update Paitent Details</button>

        </form>
    </div>
</body>

</html>