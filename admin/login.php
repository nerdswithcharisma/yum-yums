<?php include("inc/header.php"); ?>
    <section id="page--login">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 text-center">
                <br class="visible-xs visible-sm"><br class="visible-xs visible-sm"><br class="visible-xs visible-sm"><br class="visible-xs visible-sm"><br class="visible-xs visible-sm"><br class="visible-xs visible-sm"><br class="visible-xs visible-sm"><br class="visible-xs visible-sm"><br class="visible-xs visible-sm">
                <h2 id="cms--header" class="font--light">D.I.S.</h2>
                <br class="visible-xs visible-sm"><br class="visible-xs visible-sm">
                <span id="cms--tagline" class="font--gray">
                    Enter your login information.
                    <br>
                    Don't have any? Sorry, we're not open yet.
                </span>
                <br><br><br><br><br class="visible-xs visible-sm"><br class="visible-xs visible-sm"><br class="visible-xs visible-sm"><br class="visible-xs visible-sm">
                <form action="inc/checkLogin.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control font--light" id="username" name="username" value="" maxlength="20" placeholder="user name" />
                        <br><br><br class="visible-xs visible-sm"><br class="visible-xs visible-sm"><br class="visible-xs visible-sm">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control font--light" id="password" name="password" value="" maxlength="20" placeholder="password" />
                    </div>
                    <div>
                        <input type="submit" value="Login" id="login--btn" />
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php include("inc/footer.php"); ?>