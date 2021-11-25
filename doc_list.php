<!DOCTYPE html>
<html>
<head>
    <Title>Doctor List</Title>
</head>

<body>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "medbase";
    
    // Create connection
    $database = mysqli_connect($servername, $username, $password, $db,3308);
    
    //check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        return null;
    }
    return $database;
    
    $sql = "SELECT * FROM employee";
    $result = $database->query($sql);
    
    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Name</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["employeeID"]. "</td><td>" . $row["employeeName"]. "</td><td> " . $row["employeeSSN"]. "</td><td> " .$row[employeePosition]. "</td><td>" .$row[employeeDepartment]. "</td><td>" .$row[employeeAddress]." </td><td>".$row[employeePhoneNo]."</td><td>".$row[employeePassword]."</td><td>".$row[roleID]."</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    
    $conn->close();
?>

</body>



</html>