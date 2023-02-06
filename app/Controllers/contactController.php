<?php

declare(strict_types=1);

namespace Controllers\ContactController;

use Models\DbQuery\{DbQuery};
use Views\{View};

class ContactController {
    static public function showContact($id) {
        View::show('contact', 'layout');
    }


}