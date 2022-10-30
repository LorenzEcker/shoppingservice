<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Shoppingservice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="assets/main.css" rel="stylesheet">

</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/shoppingservice">Shoppingservice</a>
        </div>


        <div class="navbar-collapse collapse" id="bs-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <form method="post" action="
                        <?php

                    use Shoppingservice\AuthenticationManager;
                    use Shoppingservice\Controller;
                    use Shoppingservice\Util;

                    if(AuthenticationManager::isAuthenticated()):
                            print Util::action(Controller::ACTION_LOGOUT,
                            array('page' => 'index.php?view=logout'));
                        else:
                            print 'index.php?view=login';
                        endif;
                    ?>">
                        <div class="center-block">
                            <input class="btn-lg btn-primary" role="button" type="submit" value="<?php if(AuthenticationManager::isAuthenticated()): print "Logout"; else: print "Login"; endif;?>"/>
                        </div>
                    </form></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>