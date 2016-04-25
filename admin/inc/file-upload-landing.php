<?php

/*** begin the session ***/
session_start();

if(!isset($_SESSION['user_id'])){   //if the sesion is not set
    $message = '<h2>Error, not properly logged in</h2>';    //show an error message
}else{
    try{
        include("connect.php"); // connect to database

        /*** select the users name from the database ***/
        $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the insert ***/
        $stmt = $dbh->prepare("SELECT phpro_username FROM phpro_users WHERE phpro_user_id = :phpro_user_id");

        /*** bind the parameters ***/
        $stmt->bindParam(':phpro_user_id', $_SESSION['user_id'], PDO::PARAM_INT);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** check for a result ***/
        $phpro_username = $stmt->fetchColumn();

        /*** if we have no something is wrong ***/
        if($phpro_username == false){
            $message = 'Access Error';
        }else{ 
            $message = 'Welcome '.$phpro_username;
        }
    }
    catch(Exception $e){
        /*** if we are here, something is wrong in the database ***/
        $message = 'We are unable to process your request. Please try again later"';
    }
}

?>


<?php if( isset( $_SESSION['user_id'] ) ): ?>
    <?php include("header.php"); ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <br>
                <form action="accept-file.php" method="post" enctype="multipart/form-data">
                    <br><br>
                    <div>
                        <i class="fa fa-cloud-upload bordered--xs padding-md font--primary1 font-60 img-circle" aria-hidden="true"></i>
                    </div>
                    <h1 class="font--dark padding-vert-sm font-40">Upload Your Image</h1>      
                    <br>
                    <input type="file" name="image" id="image" class="margin--auto bordered--xs padding-md">
                    <br>
                    <input type="submit" value="Upload Image" name="submit" class="btn btn--primary font-28">
                </form>
            </div>
        </div>
    </div>
    <?php include("footer.php"); ?>
<?php else: ?>
    <h2>#fuckOff</h2>
<?php endif; ?>