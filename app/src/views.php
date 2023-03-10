<?php

declare(strict_types=1);

namespace Views;

use Models\DbQuery\{DbQuery};

class View
{
    static public function show(string $address,string  $layout,?array $data = [])
    {
        global $global;
        if($data !== [])
        foreach($data[0] as $key => $element) ${$key} = $element;
        
        $routeContent = "views/$address.php";
        
        require_once("layouts/$layout.php");
        
        exit();
    }

}