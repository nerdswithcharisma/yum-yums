<?php
session_start();    //begin our session

$_SESSION['user_id'] = 'justTesting';   //remove before pushing

//check if the users is already logged in
if(isset( $_SESSION['user_id'] )){
    $message = '<h2>Duh</h2><p>You\'re already logged in...<a href="http://nerdswithcharisma.com/portfolio/cms.php">Just go in already</a></p>';
}

if(!isset( $_POST['username'], $_POST['password'])){    //if both inputs weren't submitted
    $message = '<h2>Oops</h2><p>I think you forgot something.</p>';
}elseif (ctype_alnum($_POST['username']) != true){
    $message = "<h2>HEY!</h2><p>What are you trying to pull?!</p>";    //check the username has only alpha numeric characters
}elseif (ctype_alnum($_POST['password']) != true){
        $message = "<h2>Whoah</h2><p>Seriously, you gotta stop!</p>";   //check the password has only alpha numeric characters
}else{
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    /*** connect to database ***/
    include($_SERVER['DOCUMENT_ROOT']."/portfolio/connect.php");
    

    try{
        $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //set the error mode to excptions

        //debugging stuff
        //echo $username;
        //echo $password;
        
        //check the db for those credentials
        $stmt = $dbh->prepare("SELECT name, password FROM dausauce_application.users WHERE name = :username AND password = :password");

        //bind the parameters
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR, 40);

        //execute the prepared statement
        $stmt->execute();

        //check for a result
        $user_id = $stmt->fetchColumn();

        //no login found
        if($user_id == false){
                $message = '<h2>Don\'t Think So</h2><img src="http://nerdswithcharisma.com/images/loginFailed.gif" />';
        }else{
                //set the session user_id variable
                $_SESSION['user_id'] = $user_id;

                //tell the user we are logged in ***/
                $message = '<h2>Hey You Got It</h2><a href="http://nerdswithcharisma.com/portfolio/cms.php">Just go in already</a>';
        }
    }
    catch(Exception $e){
        $message = '<h2>Well shit...</h2>';
        //echo $e;  //error connecting to the db
    }
}
?>

<?php include($_SERVER['DOCUMENT_ROOT']."/portfolio/inc/header.php"); ?>
    <div class="col-xs-12 text-center">
        <?php echo $message; ?>
    </div>
<?php include($_SERVER['DOCUMENT_ROOT']."/portfolio/inc/footer.php"); ?>