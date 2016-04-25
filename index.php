<?php include_once("inc/header.php"); ?>
<main id="appContainer">
    <section id="list--view">
        <div class="col-xs-12 bordered--bottom" ng-click="nwc.toggleRecipe($index)" ng-repeat="item in nwc.listView | filter:nwc.searchText">
            <div class="row padding-vert-md">
                <div class="col-xs-3">
                    <img ng-src="{{item.image}}" class="margin--auto img-circle img-thumbnail" />
                </div>
                <div class="col-xs-9 padding-vert-xs">
                    <span class="pull-right padding-vert-md font-21 font--review" data-rating="{{item.rating}}">
                        <i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>
                    </span>
                    <strong class="font--dark font-18" ng-bind="item.title"></strong>
                    <br>
                    <span class="font--gray1" ng-bind="item.genre"></span>
                </div>
            </div>
        </div>
    </section>
    <section id="detail--view" class="bg--light z9999 animate--all" ng-class="{'active':nwc.showRecipePanel}">
        <header class="container padding-vert-lg bordered--bottom">
            <div class="row">
                <div class="col-xs-9">
                    <h6 class="font--dark font-40 lh-1">
                        <span ng-bind="nwc.mainItem.title"></span>
                        <br>
                        <span class="font-21 font--gray1" ng-bind="nwc.mainItem.genre"></span>
                    </h6> 
                </div>
                <div class="col-xs-3 text-right" ng-click="nwc.toggleRecipe()">
                    <i class="fa fa-angle-down font--gray1 font-40" aria-hidden="true"></i>
                </div>
            </div>
        </header>
        <aside>
            <img ng-src="{{nwc.mainItem.image}}" class="img-responsive" />
        </aside>
        <main>
            <div class="padding-md bordered--bottom">
                <div class="container">
                    <i class="fa fa-plus font-21 bg--borderDefault padding-sm img-circle font--light pull-right" aria-hidden="true" data-toggle="tooltip" data-placement="left" title="Edit"></i>
                    <i class="fa font-21 padding-sm img-circle font--light" ng-class="{'fa-rebel bg--success':nwc.mainItem.rating > 6, 'fa-exclamation bg--cta':nwc.mainItem.rating <= 6 && nwc.mainItem.rating > 3, 'fa-empire bg--danger':nwc.mainItem.rating <= 3}" data-html="true" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Red:Not Good<br>Yellow:Eh<br>Green:Great"></i>
                    &nbsp;&nbsp;&nbsp;
                    <i class="fa font-21 padding-sm img-circle font--light" ng-class="{'fa-minus-circle bg--danger':nwc.mainItem.rating <= 5, 'fa-check bg--success':nwc.mainItem.rating > 5}" aria-hidden="true" data-toggle="tooltip" data-placement="right" data-html="true" title="Red:Morphs...Don't Eat!<br>Green:Should be ok"></i>
                </div>
            </div>
            <div class="padding-md bordered--bottom bg--gray0">
                <div class="container">
                    <strong class="font--dark">Description</strong>
                </div>
            </div>
            <div class="padding-md bordered--bottom">
                <div class="container">        
                    <p ng-bind="nwc.mainItem.description"></p>
                </div>
            </div>
            <div class="padding-md bordered--bottom bg--gray0">
                <div class="container">
                    <strong class="font--dark">Ingredients</strong>
                </div>
            </div>
            <div class="padding-md bordered--bottom bordered--gray0" ng-repeat="(key, value) in nwc.ingredientArray">
                <div class="container">
                    <!--<strong class="bg--primary1 font--light padding-sm img-circle" ng-bind="key"></strong> -->
                    <strong class="font--dark" ng-bind="value"></strong>
                </div>
            </div>
        </main>
        <footer class="bordered--top">
            <div class="padding-md bordered--bottom bg--gray0">
                <div class="container">
                    <strong class="font--dark">Instructions</strong>
                </div>
            </div>
            <div class="padding-md bordered--bottom">
                <div class="container">        
                    <p ng-bind="nwc.mainItem.instructions"></p>
                </div>
            </div>
        </footer>
    </section>
</main>
<?php include_once("inc/footer.php"); ?>