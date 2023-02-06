<?php

declare(strict_types=1);

namespace Controllers\HomeController;

use Models\DbQuery\{DbQuery};
use Views\{View};

class HomeController {
    static public function showHome($id) {
        View::show('home', 'layout');
    }


}