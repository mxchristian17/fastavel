<?php

declare(strict_types=1);

namespace Controllers\UserController;

use Models\DbQuery\{DbQuery};
use Models\User\User;

class UserController {
    public function __construct(?int $id) {
        $this->id = $id;
        $this->name = '';
        $this->surname = '';
        
    }

    public function changeLightMode() {

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