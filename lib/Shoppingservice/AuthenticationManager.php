<?php


namespace Shoppingservice;

use Data\DataManager;

class AuthenticationManager extends BaseObject
{
    public static function authenticate(string $userName, string $password) : bool {
        $user = DataManager::getUserByUserName($userName);
        if ($user != null &&
            $user->getPasswordHash() == hash('sha1', $password)
        ) {
            $_SESSION['user'] = $user->getUserId();
            $_SESSION['isVolunteer'] = $user->getIsVolunteer();
            Util::redirect();
            return true;
        }
        self::signOut();
        return false;
    }

    public static function signOut() {
        unset($_SESSION['user']);
        unset($_SESSION['isVolunteer']);
    }

    public static function isAuthenticated() : bool {
        return isset($_SESSION['user']);
    }

    public static function isVolunteer() : bool {
        if($_SESSION['isVolunteer'] == 1){
            return true;
        }else{
            return false;
        }
    }

    public static function getAuthenticatedUser() : ?bool{
        return self::isAuthenticated() ? $_SESSION['user'] : null;
    }
}