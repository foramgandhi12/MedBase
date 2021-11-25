<?php 
function setupConnection(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "med_base";
    
    // Create connection
    $database = mysqli_connect($servername, $username, $password, $db, 3308);
    
    //check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        return null;
    }
    return $database;
}
?>