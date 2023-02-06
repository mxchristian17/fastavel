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
        if($data['_token'] !== $_SESSION['_token']) View::show('404', 'errorLayout');
    }

}