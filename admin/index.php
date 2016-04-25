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
    <?php include("inc/header.php"); ?>
        <section id="update--list" ng-class="{'active':nwc.isUpdateListVisible}">
            <input id="update--filter" type="text" ng-model="filterList" />
            <i class="fa fa-search font--gray"></i>
            <div class="update--listItem" ng-repeat="item in nwc.work | filter:filterList" ng-click="nwc.getItemInfo($index)">
                <div class="row">
                    <div class="col-xs-3">
                        <img ng-show="{{item.image}}" ng-src="{{item.image}}" class="img-circle img-responsive img-thumbnail" />
                    </div>
                    <div class="col-xs-9">
                        <strong ng-bind="item.title"></strong>
                        <br>
                        <span class="pull-right" ng-bind="item.rating"></span> <span class="font--gray" ng-bind="item.genre"></span>
                    </div>
                </div>
            </div>
        </section>

          <div class="col-xs-12" id="entryBg" style="background: url({{nwc.currentEntryBackground}})">
              <div>
                  <br>
                  <!-- <strong ng-bind="nwc.mode" class="font--primary"></strong> -->
                  <h4 class="font--error pull-right" ng-show="nwc.currentEntry" ng-click="nwc.deleteItemInfo()"><i class="fa fa-times-circle"></i></h4>
                  <h4 class="font--light" ng-bind="nwc.currentEntry.title" ng-show="nwc.currentEntry.title"></h4>
                  <h4 class="font--light" ng-hide="nwc.currentEntry.title">Create New Entry</h4>
                  <br>
                  
              </div>
              <form name="entryForm">
                  <div class="form-group">
                    <input type="text" ng-model="nwc.formData.title" class="form-control" name="title" value="{{nwc.currentEntry.title}}" placeholder="Title" required />
                  </div>
                  <div class="form-group">
                    <input type="text" ng-model="nwc.formData.genre" class="form-control" name="tag" value="{{nwc.currentEntry.genre}}" placeholder="Genre" required />
                  </div>
                  <div class="form-group">
                    <input type="text" ng-model="nwc.formData.rating" class="form-control" name="link" value="{{nwc.currentEntry.rating}}" placeholder="Rating" />
                  </div>
                  <div class="form-group">
                      <input type="file" id="image" name="image" />
                  </div>
                  <div class="form-group">
                      <input type="text" ng-model="nwc.formData.description" class="form-control" name="thumb" value="{{nwc.currentEntry.description}}" placeholder="Description" required />
                  </div>
                  <div class="form-group">
                      <input type="text" ng-model="nwc.formData.morphs" class="form-control" name="thumb" value="{{nwc.currentEntry.morphs}}" placeholder="Morphs" required />
                  </div>
                  <div class="form-group">
                      <input type="text" ng-model="nwc.formData.instructions" class="form-control" name="thumb" value="{{nwc.currentEntry.instructions}}" placeholder="Instructions" required />
                  </div>
                  <div class="form-group">
                      <input type="text" ng-model="nwc.formData.ingredients" class="form-control" name="thumb" value="{{nwc.currentEntry.ingredients}}" placeholder="Ingredients: comma separated" required />
                  </div>
                  <div>
                      <button type="submit" id="update--button" class="btn pull-right" ng-click="nwc.postItemInfo()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button> 
                      <br><br><br><br><br><br><br><br><br>
                  </div>
              </form>
        </div>
    
        <section id="crud--buttons">
            <?php include("inc/nav.php"); ?>
        </section>
    <?php include($_SERVER['DOCUMENT_ROOT']."/aaTutorials/yumyums/inc/footer.php"); ?>
<?php else: ?>
    <h2>#fuckOff</h2>
<?php endif; ?>