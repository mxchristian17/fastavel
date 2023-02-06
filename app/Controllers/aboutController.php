<?php

declare(strict_types=1);

namespace Controllers\AboutController;

use Models\DbQuery\{DbQuery};
use Views\{View};

class AboutController {
    static public function showAbout($id) {
        View::show('about', 'layout');
    }


}