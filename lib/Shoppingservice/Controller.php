<?php


namespace Shoppingservice;


use Data\DataManager;

class Controller extends BaseObject
{
    const ACTION_LOGIN = 'login';
    const ACTION_LOGOUT = 'logout';
    const ACTION_DELARTICLE = 'delArticle';
    const ACTION_DELSLIST = 'delSlist';
    const ACTION_ADDLIST = 'addList';
    const ACTION_EDIT_ARTICLE = 'editArticle';
    const ACTION_ADDARTICLE = 'addArticle';

    const PAGE = 'page';
    const ACTION = 'action';
    const USER = 'user';

    const USER_NAME = 'user';
    const USER_PASSWORD = 'password';

    const SLIST_FILTER = 'slistFilter';
    const ACTION_TAKESLIST = 'takeSList';
    const ACTION_DONE = 'done';

    private static $instance = false;

    public function invokePostAction() : ?bool
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            throw new \Exception('Controller can only handle POST requests.');
            return null;
        } elseif (!isset($_REQUEST[self::ACTION])) {
            throw new \Exception(self::ACTION . 'not specified.');
            return null;
        }

        $action = $_REQUEST[self::ACTION];

        switch ($action) {
            case self::ACTION_LOGIN:

                if (!AuthenticationManager::authenticate($_REQUEST[self::USER_NAME], $_REQUEST[self::USER_PASSWORD])){
                    return false;
                }
                if($_SESSION['isVolunteer'] == 0){
                    AuthenticationManager::signOut();
                    return false;
                }
                DataManager::createLog($_REQUEST[self::USER_NAME] . " attempted login as volunteer");
                Util::redirect();
                break;

            case self::ACTION_LOGOUT:
                DataManager::createLog("User logged out");
                AuthenticationManager::signOut();
                Util::redirect();
                break;

            case self::ACTION_DELARTICLE:
                DataManager::createLog("Set article with id " . $_REQUEST['aid'] . "to deleted");
                DataManager::setArticleDeleted($_REQUEST['aid']);
                Util::redirect();
                break;

            case self::ACTION_DELSLIST:
                DataManager::createLog("Set list with id " . $_REQUEST['lid'] . "to deleted");
                DataManager::setListDeleted($_REQUEST['lid']);
                Util::redirect();
                break;

            case self::ACTION_ADDLIST:
                DataManager::createLog("Added a list");
                DataManager::addList();
                Util::redirect("index.php?view=manageLists&slistFilter=my");
                break;

            case self::ACTION_EDIT_ARTICLE:
                DataManager::editArticle();
                DataManager::createLog("Edited Article " . $_REQUEST['aid']);
                Util::redirect($_POST[Controller::PAGE]);
                break;

            case self::ACTION_ADDARTICLE:
                DataManager::createLog("Added an article");
                DataManager::addArticle();
                Util::redirect($_POST[Controller::PAGE]);
                break;

            case self::ACTION_TAKESLIST:
                DataManager::createLog("Took care of list " . $_REQUEST['lid']);
                DataManager::takeList();
                Util::redirect($_POST[Controller::PAGE]);
                break;

            case self::ACTION_DONE:
                DataManager::createLog("Set list to done: " . $_REQUEST['lid']);
                DataManager::setDone();
                Util::redirect($_POST[Controller::PAGE]);
                break;

            default:
                print("slipped into default at invoking post action.");
                break;
        }
        return false;
    }

    public static function getInstance() : Controller {
        if (!self::$instance) {
            self::$instance = new Controller();
        }
        return self::$instance;
    }
}