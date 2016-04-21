//bootstrap the angular app
var nwcApp = angular.module('nwcApp', []).config(function($sceProvider) {
    $sceProvider.enabled(false);    // Completely disable SCE to support IE7.
}); 