nwcApp.controller('nwcCtrl', ['$scope', '$rootScope', '$timeout', '$window', 'nwcServices', function($scope, $rootScope, $timeout, $window, nwcServices){
    var self = this;    //define as self
    
    self.toggleRecipe = function(){
        self.showRecipePanel = !self.showRecipePanel;
    };
    
    self.toggleMenu = function(){
        self.showNav = !self.showNav;    
    };
}]);

jQuery(window).load(function(){
    jQuery('[data-toggle="tooltip"]').tooltip();
});