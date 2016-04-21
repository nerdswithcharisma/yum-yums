nwcApp.factory('nwcServices', function($http, $rootScope){
    return{
        getJSON : function(url, callback){
            $http({ 
                method: 'GET', 
                url: url,
                cache: false,
                headers : { 'Content-Type': 'application/x-www-form-urlencoded', 'x-outlet-rest' : 'get', 'Cache-Control' : 'no-cache' }
            }).success(callback)
            .error(callback);
        },
        postJSON : function(url, data, callback){
            $http({ 
                method: 'POST', 
                url: url,
                data: data,
                headers : { 'Content-Type': 'application/json'}
            }).success(callback)
            .error(callback);    
        },
        inputError : function(message, el){
            var position = jQuery(el).offset();
            var iTop = position.top - 12;
            var iLeft = position.left;
            
            jQuery('body').append(    
                '<div class="input--error bg--danger font--light padding-xs font-10 lh-xs" style="z-index: 9999; position: absolute; top: ' + iTop +'px; left: '+ iLeft + 'px;" ><strong>' + message + '</strong></div>'
            );
            
            jQuery(document).mouseup(function (e){
                var container = $(".input--error");

                if (!container.is(e.target) // if the target of the click isn't the container...
                    && container.has(e.target).length === 0) // ... nor a descendant of the container
                {
                    container.remove();
                }
            });
        },
        displayErrorMessage : function(message){
            jQuery('#error').remove();
            jQuery('body').append('<div id="error" class="alert alert-error">' + message + '</div>');
        },
        mqImages: function(){
            //NOTE: need to add a class of mqImage to each, AND a data-src attribute
            function mqSwitch(){
                switch(mq){
                    case ( 'xs' ):
                        jQuery('.mqImage').each(function(){ jQuery(this).attr('src', jQuery(this).attr('data-xs') ); });  
                        break;
                    case ( 'sm' ):
                        jQuery('.mqImage').each(function(){ jQuery(this).attr('src', jQuery(this).attr('data-sm') ); });  
                        break;
                    case ( 'md' ):
                        jQuery('.mqImage').each(function(){ jQuery(this).attr('src', jQuery(this).attr('data-md') ); });  
                        break;
                    case ( 'lg' ):
                        jQuery('.mqImage').each(function(){ jQuery(this).attr('src', jQuery(this).attr('data-lg') ); });  
                        break;
                    case ( 'xl' ):
                        jQuery('.mqImage').each(function(){ jQuery(this).attr('src', jQuery(this).attr('data-lg') ); });  
                        break;
                }
            }
            
            mqSwitch();
            
            jQuery(window).resize(function(){
                mqSwitch(); //perform again on window resize 
            });
            //jQuery('.mqImage').removeClass('mqImage');
        },
        hideLoadingMask : function($rootScope){
            $rootScope.loadingMask = false;    
        },
        getHASH : function(){
            var URLhash = document.location.href.split('#');
            return URLhash[1];
        },
        geocode : function(location, callback){
            $http({ 
                method: 'POST', 
                url: 'http://maps.googleapis.com/maps/api/geocode/json?address=' + location + '&sensor=true', 
                headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
            }).success(callback)
            .error(callback);    
        },
        cut : function(word, n){
            word = word.substring(0, n) + "...";
            return word;
        },
        stripIt : function(word){
    	   word = word.replace(/<(?:.|\n)*?>/gm, '');
            return word;
        },
    }
});