<!DOCTYPE html>
<html>
<head>
    <title>Receptionists List</title>
    <style>
        table{
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th{
            border: 1px solid #ddd;
            padding: 8px;
        }

        tr: nth-child(even){
            background-color: #f2f2f2;
        }
        
        tr: hover{
            background-color: #ddd;
        }

        th{
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4c9baf;
            color: black;
        }
        body{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
        }
        
    </style>
</head>
<body>
    <div>
        <h1 style = "text-align: center;">List of Receptionists</h1>
    </div>

    <?php
        include "setupDatabaseConnection.php";
        $database = setupConnection();
        if(mysqli_connect_errno()){
            echo "Failed to connect to MySQL: ".mysqli_connect_error();
            exit();
        }
        else{
            $sqlQ = "SELECT * FROM employee 
            LEFT JOIN departments
            ON employee.employeeDepartment = departments.departmentID
            WHERE roleID = 3
            UNION
            SELECT * FROM employee
            RIGHT JOIN departments
            ON employee.employeeDepartment = departments.departmentID
            WHERE roleID = 3";
            $result = mysqli_query($database, $sqlQ);

            echo "<table> <tr> <th>ID</th> <th>Name</th> <th>SSN</th> <th>Position</th> 
            <th>Department</th> <th>Department Name</th> <th>Address</th> <th>Phone Number</th> <th>Password</th>  </tr>";

            while ($row = mysqli_fetch_row($result)){
                echo "<tr> <td>".$row[0]."</td> <td>".$row[1]."</td> <td>".$row[2]."</td> 
                <td>".$row[3]."</td> <td>".$row[4]."</td> <td>".$row[10]."</td> <td>".$row[5]."</td> <td>".$row[6]."</td> 
                <td>".$row[7]."</td> </tr>";
            }
            echo "</table>";
        }
        mysqli_close($database); 
    ?>


</body>
</html>