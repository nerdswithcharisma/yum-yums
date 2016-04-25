<?php
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $serverMsg =  "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        $serverMsg =  "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        $serverMsg =  "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $serverMsg =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $serverMsg =  "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $serverMsg = 'http://' . $_SERVER['SERVER_NAME'] . dirname(__file__) . '/uploads/' . basename($_FILES["image"]["name"]);
        } else {
            $serverMsg = "Sorry, there was an error uploading your file.";
        }
    }
    ?>

<?php include("header.php"); ?>


<br><br>
<h1 class="text-center font--dark"> Click the link to copy to clipboard</h1>
<br>
<div class="container text-center padding-xl bordered--xs bg--gray0" onclick="copyToClipboard('<?php echo $serverMsg ?>')">
    <?php echo $serverMsg ?>
</div>    
<script>
    function copyToClipboard(text) {
        var prompter = window.prompt("Copy to clipboard: Ctrl+C, Enter", text);

        if (prompter != null) {
            
        }
}
</script>