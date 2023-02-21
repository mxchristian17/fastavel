<?php

declare(strict_types=1);

namespace Controllers\UserController;

use Models\DbQuery\{DbQuery};
use Models\User\User;
use Routes\Routes\Route;

class UserController {
    public function __construct(?int $id) {
        $this->id = $id;
        $this->name = '';
        $this->surname = '';
        $this->darkMode = true;
        
    }

    static public function changeLightMode():? bool {

        global $global;
        if(isset($_SESSION['user']))
        {
            DbQuery::update('users_config',["DarkMode" => intval(!$_SESSION['user']['DarkMode'])], intval($_SESSION['user']['ID']));
            $global['darkMode'] = !$_SESSION['user']['DarkMode'];
        } else {
            $global['darkMode'] = !$_SESSION['user']['DarkMode'];
            $_SESSION['user']['DarkMode'] = !$_SESSION['user']['DarkMode'];
        }

        Route::goBack();
        return true;

    }

    /*public function setUser(int $id): bool {

        global $useUsers;

        if(!$useUsers) { $_SESSION["darkMode"] = true; return false; }
        $_SESSION["darkMode"] = boolval(DbQuery::hasOne("users", $id, "users_config")["DarkMode"]);
        return true;
    }

    public function getData(?int $id = null): ?array
    {
        global $useUsers;

        if($id === null || !$useUsers) return [];

        //return DbQuery::first("users","ID=1");
        //return DbQuery::hasOne("users", 1, "users_config");
        return [];

    }*/
}