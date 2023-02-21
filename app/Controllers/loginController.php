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
        $inputData = $_POST;
        if(
            $inputData['_token'] !== $_SESSION['_token'] OR
            !is_string($inputData['email']) OR
            !is_string($inputData['password'])
        ) View::show('404', 'errorLayout');

        if(self::validateEmail($inputData['email'])) $userId = DbQuery::firstId('users', "mail = '".$inputData['email']."'");

        if($userId === null) View::show('login', 'loginLayout', [true]);
        
        $userData = DbQuery::joinOne('users', $userId, 'users_config');
        
        if($userData['Password'] !== $inputData['password']) View::show('login', 'loginLayout', [true]);
        
        $_SESSION['userId'] = $userData['ID'];
        $_SESSION['darkMode'] = $userData['DarkMode'];
        $_SESSION['user'] = $userData;

        unset($userId);
        View::show('home', 'layout');
        return;
    }

    static public function logout() {
        session_destroy();
        session_start();
        $_SESSION['_token'] = bin2hex(random_bytes(16));
        View::show('login', 'loginLayout', []);
        return;
    }

    static private function validateEmail (string $email): bool {
        return true;
    }

}