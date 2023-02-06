<?php

declare(strict_types=1);

namespace Middlewares\Auth;

use Models\DbQuery\{DbQuery};
use Views\{View};

class Auth {
    static public function execute() {
        if(!isset($_SESSION['userId'])) View::show('login', 'loginLayout');
        
        return;
    }


}