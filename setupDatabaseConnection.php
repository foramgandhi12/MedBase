<?php 
function setupConnection(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "medbase";
    
    // Create connection
    $database = mysqli_connect($servername, $username, $password, $db);
    
    //check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        return null;
    }
    return $database;
}
?>
