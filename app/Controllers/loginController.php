<?php

declare(strict_types=1);

namespace Controllers\LoginController;

use Models\DbQuery\{DbQuery};
use Views\{View};

class LoginController {
    static public function showLogin($id) {
        View::show('login', 'loginLayout');
    }

    static public function login() {
        $data = $_POST;
        if(
            $data['_token'] !== $_SESSION['_token'] OR
            !is_string($data['email']) OR
            !is_string($data['password'])
        ) View::show('404', 'errorLayout');

        if(self::validateEmail($data['email'])) $userData = DbQuery::first('users', "mail = '".$data['email']."'");
        //var_dump($userData);
        $_SESSION['userId'] = $userData['ID'];
        $_SESSION['darkMode'] = $userData['darkMode'];
        View::show('home', 'layout');
        return;
    }

    static private function validateEmail (string $email): bool {
        return true;
    }

}