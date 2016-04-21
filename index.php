<?php include_once("inc/header.php"); ?>
<main id="appContainer">
    <section id="list--view">
        <div class="col-xs-12 bordered--bottom">
            <div class="row padding-vert-md">
                <div class="col-xs-3">
                    <img src="s/images/food-1.png" class="margin--auto img-circle img-thumbnail" />
                </div>
                <div class="col-xs-9 padding-vert-xs">
                    <span class="pull-right padding-vert-md font-21 font--review">
                        <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>
                    </span>
                    <strong class="font--dark font-18">Title</strong>
                    <br>
                    <span class="font--gray1">Breakfast</span>
                </div>
            </div>
        </div>
    </section>
    <section id="detail--view" class="hide">
        <header>
            heart, edit
            <br>
            Author?
            <br>
            Close/Collapse
            <br>
            Rating &amp; Reaction
        </header>
        <aside>
            Photo
            <br>
            Name
            <br>
            Meal
        </aside>
        <main>
            Description
            <br>
            Ingredients
        </main>
        <footer>
            Instructions
        </footer>
    </section>
</main>
<?php include_once("inc/footer.php"); ?>