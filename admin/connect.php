<?php
//This is the connection info to the db.
//Do not commit this to git or share anywhere

    // set up the connection variables
    $db_name  = 'yumyums';
    $servername = 'localhost';
    $username = 'root';
    $password = 'root';

    
    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
