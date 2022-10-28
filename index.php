<?php

require_once ('inc/bootstrap.inc.php');

$default_view = 'welcome';
$view = $default_view;

if(isset($_REQUEST['view'])) {
    if(!\Shoppingservice\AuthenticationManager::isAuthenticated()){
        if(file_exists(__DIR__ . '/views/' . $_REQUEST['view'] . '.php')){
            $view = $_REQUEST['view'];
        }
    }else{
        if(\Shoppingservice\AuthenticationManager::isVolunteer()){
            if(file_exists(__DIR__ . '/views/volunteer/' . $_REQUEST['view'] . '.php')) {
                $view = 'volunteer/' . $_REQUEST['view'];
            }
        }else{
            if(file_exists(__DIR__ . '/views/seeker/' . $_REQUEST['view'] . '.php')){
                $view = 'seeker/' . $_REQUEST['view'];
            }
        }
    }
}

$postAction = $_REQUEST[Shoppingservice\Controller::ACTION] ?? null;
if ($postAction != null) {
    Shoppingservice\Controller::getInstance()->invokePostAction();
}

require_once ('views/' . $view . '.php');

