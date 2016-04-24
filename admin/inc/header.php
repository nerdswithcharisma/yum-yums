<!DOCTYPE html>
<!--[if lt IE 7]><html lang="en-US" prefix="og: http://ogp.me/ns#" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html lang="en-US" prefix="og: http://ogp.me/ns#" class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html lang="en-US" prefix="og: http://ogp.me/ns#" class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html lang="en-US" prefix="og: http://ogp.me/ns#" class="no-js"><!--<![endif]-->
<head>
    <title>NWC CMS</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    
    <!-- css -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    
    <style>
        html>*{
            font-family: 'Lato', sans-serif;    
        }
        
        #page--login{
            background: #171516;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        
        #page--login input{
            border: none;
            border-radius: 0;
            border-bottom: 1px solid #252525;
            background: transparent;
            font-size: 3em;
            height: inherit;
            line-height: 2em;
        }
        
        #entryBg{
            box-shadow: inset 0 0 0 500px rgba(0,0,0,0.6);    
        }
        
        .form-control{
            border: none;
            border-radius: 0;
            border-bottom: 1px solid #7B7979;
            background: transparent;
            font-size: 1em;
            padding: 15px 4px;
            margin-bottom: 5px;
            height: inherit;
            line-height: 1em;
            color: #fff;
        }
        
        #page--login input:focus{
            border-color: #a825ea;
        }
        
        #cms--header{ 
            font-size: 10em;
        }
        #cms--tagline{ font-size: 2.3em; }
        
        input#login--btn, #crud--buttons{
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            line-height: 3em;
            color: #fff;
            background-color: #d92ca2;
            background: linear-gradient(135deg, #d92ca2 0%,#a825ea 100%);
        }
        
        #crud--buttons{
            z-index: 999;    
        }
        
        #update--button{
            background: linear-gradient(135deg, #d92ca2 0%,#a825ea 100%);
            border-radius: 300px;
            color: #fff;
            padding: 9px 45px;
        }
        
        #update--list{
            transition: all 0.3s;
            position: fixed;
            bottom: -1500px;
            left: 0;
            width: 100%;
            height: 100%;
            background: #fff;
            z-index: 999;
            overflow: scroll;
        }
        
        #update--list.active{
            bottom: 0;    
        }
        
        #update--list i{
            position: fixed;    
            top: 9px;
            right: 9px;
        }
        
        #update--filter{
            width: 100%;
            border: none;
            border-bottom: 1px solid #d7d7d7;    
            line-height: 2.3em;
            padding: 2px 10px;
        }
        
        .update--listItem{
            padding: 14px;
            border-bottom: 1px solid #f1f1f1;
        }
        
        textarea:focus,
        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="datetime"]:focus,
        input[type="datetime-local"]:focus,
        input[type="date"]:focus,
        input[type="month"]:focus,
        input[type="time"]:focus,
        input[type="week"]:focus,
        input[type="number"]:focus,
        input[type="email"]:focus,
        input[type="url"]:focus,
        input[type="search"]:focus,
        input[type="tel"]:focus,
        input[type="color"]:focus,
        .uneditable-input:focus {   
          box-shadow: none;
          outline: 0 none;
        }
        
        .font--light{ color: #f6f6f6; }
        .font--gray{ color: #898989; }
        .font--primary{ color: #a825ea; }
        .font--error{ color: #F73F69; }
    </style>
    
    <!-- js -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script src="../s/js/app.min.js"></script>
    <script src="../s/js/cmsCtrl.js"></script>
</head>

<body id="cms" ng-app="nwcApp" ng-controller="cmsCtrl as nwc">