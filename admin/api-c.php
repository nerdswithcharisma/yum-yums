<?php
//This is the api save function for making new portfolio items to the db.

    // set up the connection variables
    include("connect.php");

    //get the json and decode
    $postData = file_get_contents("php://input");
    $decoded = json_decode($postData);

    echo $postData;
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
    $sql = "INSERT INTO yumyums.entries (title, genre, rating, image, description, morphs, instructions, ingredients) VALUES ('$title', '$genre', '$rating', '$image', '$description', '$morphs', '$instructions', '$ingredients')";
    
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
