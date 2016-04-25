<?php
//This is the api update function for updating portfolio items in the db.

    // set up the connection variables
    include("connect.php");

    //get the json and decode
    $postData = file_get_contents("php://input");
    $decoded = json_decode($postData);

    //store the json vars, add each here
    $title = $decoded->title;
    $genre = $decoded->genre;
    $rating = $decoded->rating;
    $image = $decoded->image;
    $description = $decoded->description;
    $morphs = $decoded->morphs;
    $instructions = $decoded->instructions; 
    $ingredients = $decoded->ingredients;
    
    //insert into db
    $sql = "UPDATE yumyums.entries SET 
            title ='".$title."', 
            genre ='". $genre ."', 
            rating ='". $rating ."', 
            image ='". $image ."', 
            description ='". $description ."', 
            morphs ='". $morphs ."', 
            instructions ='". $instructions ."',
            ingredients ='". $ingredients ."'
            WHERE title='".$title."'";
    
    if ($conn->query($sql) === TRUE) {
        //if successful, this is the response
        $output = array(
            'success' => true,
            'title' => $title,
            'genre' => $genre,
            'rating' => $rating,
            'image' => $image,
            'description' => $description,
            'morphs' => $morphs,
            'instructions' => $instructions,
            'ingredients' => $ingredients
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
