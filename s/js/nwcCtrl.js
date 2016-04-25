nwcApp.controller('nwcCtrl', ['$scope', '$rootScope', '$timeout', '$window', 'nwcServices', function($scope, $rootScope, $timeout, $window, nwcServices){
    var self = this;    //define as self
/*    
    self.listView = [{
        "title":"Hash & Eggs",
        "genre":"Breakfast",
        "rating":5,
        "image":"http:\/\/orzly.com\/media\/catalog\/product\/cache\/1\/image\/9df78eab33525d08d6e5fb8d27136e95\/i\/p\/iphone-6-flexislim-smoke-white_3.jpg",
        "description": "Now, when you do this without getting punched in the chest, you'll have more fun. Bad news. Andy Griffith turned us down. He didn't like his trailer. Did you enjoy your meal, Mom? You drank it fast enough. I'm afraid I just blue myself. What's Spanish for I know you speak English?",
        "morphs":0,
        "instructions": "Now, when you do this without getting punched in the chest, you'll have more fun. Bad news. Andy Griffith turned us down. He didn't like his trailer. Did you enjoy your meal, Mom? You drank it fast enough. I'm afraid I just blue myself. What's Spanish for I know you speak English?",
        "ingredients": [{
            "name":"spices",
            "amount":"1 c"
        },
        {
            "name":"oil",
            "amount":"1 t"
        }]
    },
    {
        "title":"Anything else",
        "genre":"Lunch",
        "rating":3.5,
        "image":"http:\/\/orzly.com\/media\/catalog\/product\/cache\/1\/image\/9df78eab33525d08d6e5fb8d27136e95\/i\/p\/iphone-6-flexislim-smoke-white_3.jpg",
        "description": "Now, when you do this without getting punched in the chest, you'll have more fun. Bad news. Andy Griffith turned us down. He didn't like his trailer. Did you enjoy your meal, Mom? You drank it fast enough. I'm afraid I just blue myself. What's Spanish for I know you speak English?",
        "morphs":0,
        "instructions": "Now, when you do this without getting punched in the chest, you'll have more fun. Bad news. Andy Griffith turned us down. He didn't like his trailer. Did you enjoy your meal, Mom? You drank it fast enough. I'm afraid I just blue myself. What's Spanish for I know you speak English?",
        "ingredients": [{
            "name":"spices",
            "amount":"1 c"
        },
        {
            "name":"oil",
            "amount":"1 t"
        }]
    }];
*/    
    
    $timeout(function(){
        nwcServices.renderReviewIcons();
        self.doneLoading = true;
    },10);
    
    self.toggleRecipe = function(index){
        self.showRecipePanel = !self.showRecipePanel;
        self.mainItem = self.listView[index];
    };
    
    self.toggleMenu = function(){
        self.showNav = !self.showNav;    
    };
    
    nwcServices.getJSON('admin/api-r.php', function(data){ //get the data to start
        self.listView = data;
    });
    
    self.loadItem = function(index){
        self.currentEntry = self.entries[index];
        self.currentEntryNumber = index;
    };
    
    self.closeItem = function(){
        self.currentEntry = null;    
    };
    
    self.getItemInfo = function(index){
        self.mode = 'u';    //set the mode to update the existing entry
        self.isUpdateListVisible = false;   //hide the list view
        self.currentEntry = self.entries[index];   //update the current entry
        self.currentEntry.percentage = parseInt( ( parseInt(self.currentEntry.likes/self.currentEntry.sucks) * 10) );
        
        if( self.currentEntry.percentage === 0 ){
            self.currentEntry.percentage = 100;    
        }
        
        self.formData = self.entries[index];   //update the form data, need both to submit the form
        self.currentEntryBackground = self.currentEntry.image; 
        self.currentEntryNumber = index;
    };
    
    self.postItemInfo = function(title, likes, sucks, votes){
        votes = parseInt(votes) + 1;
        likes = parseInt(likes) + 1; 
        
        var postData = { "title": title, "likes": likes, "sucks": sucks, "votes": votes }
        
        nwcServices.postJSON('admin/api-rating-u.php', postData, function(data){
            nwcServices.getJSON('admin/api-r.php', function(data){ //update the json list
                self.listView = data;
                self.getItemInfo(self.currentEntryNumber);
            });
        });
    };
}]);

jQuery(window).load(function(){
    jQuery('[data-toggle="tooltip"]').tooltip();
});