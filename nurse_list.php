<!DOCTYPE html>
<html>
<head>
    <title>Nurse List</title>
</head>
<body>
    <?php
        include "setupDatabaseConnection.php";
        $database = setupConnection();
        if(mysqli_connect_errno()){
            echo "Failed to connect to MySQL: ".mysqli_connect_error();
            exit();
        }
        else{
            $sqlQ = "SELECT * FROM employee WHERE roleID = 2";
            $result = mysqli_query($database, $sqlQ);
            while ($row = mysqli_fetch_row($result)){
                echo "<br> id: ". $row[0]. " - Name: ". $row[1]. "<br>";
            }
        }
        mysqli_close($database);
    ?>


</body>
</html>