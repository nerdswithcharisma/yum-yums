<!DOCTYPE html>
<!--[if lt IE 7]><html lang="en-US" prefix="og: http://ogp.me/ns#" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html lang="en-US" prefix="og: http://ogp.me/ns#" class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html lang="en-US" prefix="og: http://ogp.me/ns#" class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html lang="en-US" prefix="og: http://ogp.me/ns#" class="no-js"><!--<![endif]-->

    <head>
        <title>NWC App Boilerplate</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">

        <!-- css -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="s/css/nwc.min.css">

        <!-- SEO Stuff -->
        <meta name="description" content="Gonna need a bigger boat." />
        <meta name="keywords" content="Nerds with Charisma, NWC, Brian Dausman, Andrew Bieganski" />
        
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <![endif]-->
    </head>
    <body ng-app="nwcApp" ng-controller="nwcCtrl">
        <header id="header" class="bg--primary padding-vert-lg font--light font-28">
            <div class="container">
                <div class="row">
                    <div class="col-xs-2">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </div>
                    <div class="col-xs-8 text-center">
                        <img src="s/images/logo--header-xs.png" alt="Yum Yums Logo" class="marign--auto" />
                    </div>
                    <div class="col-xs-2 text-right">
                        <!-- Right -->
                    </div>
                </div>
            </div>
        </header>
        <aside id="search" class="bg--gray0 bordered--bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xs-11">
                        <input type="text" class="col-xs-12 bg--gray0 bordered--none padding-vert-sm" />
                    </div>
                    <div class="col-xs-1 padding-vert-xs text-center">
                        <button class="btn-link"><i class="fa fa-search font--gray1" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </aside>