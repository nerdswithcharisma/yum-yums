<?php
//This is the api delete function for removing portfolio items in the db.

    // set up the connection variables
    include("connect.php");

    //get the json and decode
    $postData = file_get_contents("php://input");
    $decoded = json_decode($postData);
    $title = $decoded->title;
    
    //insert into db
    $sql = "DELETE FROM yumyums.entries WHERE title='".$title."'";
    
    if ($conn->query($sql) === TRUE) {
        //if successful, this is the response
        $output = array(
            'title' => $title,
            'success' => true,
            'message' => 'Entry '. $title .' deleted successfully'
        );
        //return to console
        echo json_encode($output);
    } else {
        //error
        $output = array(
            'success' => false,
            'sql' => $sql, 
            'conn' => $conn->error
        );
        //return to console
        echo json_encode($output);
    }

    /* close connection */
    $conn->close();
?>
