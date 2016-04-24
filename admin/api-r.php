<?php
// set up the connection variables
    $hostname = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "yumyums";

    // connect to the database
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

    // a query get all the records from the users table
    $sql = 'SELECT * FROM entries';

    // use prepared statements, even if not strictly required is good practice
    $stmt = $dbh->prepare( $sql );

    // execute the query
    $stmt->execute();

    // fetch the results into an array
    $result = $stmt->fetchAll( PDO::FETCH_ASSOC );

    // convert to json
    $json = json_encode( $result );

    // echo the json string
    echo $json;
?>