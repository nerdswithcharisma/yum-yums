nwcApp.controller('cmsCtrl', ['$scope', '$rootScope', '$timeout', '$window', 'nwcServices', function($scope, $rootScope, $timeout, $window, nwcServices){
    var self = this;    //define as self
    self.formData = {};   //hold our form data
    
    self.currentEntryBackground = 'https://static.pexels.com/photos/4164/landscape-mountains-nature-mountain-large.jpeg';
    
    nwcServices.getJSON('api-r.php', function(data){ //get the data to start
        self.work = data;
    });
    
    self.mode = 'c';    //set the mode to start as create
    
    self.setMode = function(mode){  // nav to set the mode for crud
        self.mode = mode;
        
        if(mode === 'c'){
            self.isUpdateListVisible = false;
            self.currentEntry = null; 
            self.formData = {};
        }else if( mode === 'u'){
            self.isUpdateListVisible = !self.isUpdateListVisible;
        }
    };
    
    self.getItemInfo = function(index){
        self.mode = 'u';    //set the mode to update the existing entry
        self.isUpdateListVisible = false;   //hide the list view
        self.currentEntry = self.work[index];   //update the current entry
        self.formData = self.work[index];   //update the form data, need both to submit the form
        self.currentEntryBackground = self.currentEntry.image;
    };
    
    self.postItemInfo = function(){        
        if( $scope.entryForm.$valid && $scope.entryForm.$dirty){    //if the form is dirty and is all filled out
            var postData = self.formData;
        
            nwcServices.postJSON('api-' + self.mode + '.php', postData, function(data){
                self.loading = true;
                nwcServices.getJSON('api-r.php', function(data){ //update the json list
                    self.work = data;
                    self.mode = 'u';
                    self.isUpdateListVisible = true;
                    self.loading = false;
                });
            }); 
        }
    };
    
    self.deleteItemInfo = function(){
        var d = confirm('Are you sure you want to delete this entry?');
        if( d === true){
            var postData = { "title": self.currentEntry.title }
            
            nwcServices.postJSON('api-d.php', postData, function(data){
                self.currentEntry = null; 
                self.loading = true;
                nwcServices.getJSON('api-r.php', function(data){ //update the json list
                    self.work = data;
                    self.mode = 'u';
                    self.isUpdateListVisible = true;
                    self.loading = false;
                });
            });    
        }
    };
    
    /*
    self.uploadImage = function(){
        window.open("inc/file-upload-landing.php");    
    };
    */
}]);