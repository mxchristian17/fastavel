<?php

declare(strict_types=1);

namespace Routes\Routes;

class Route {

    public static function get(string $route, string $controller, string $function,? array $middlewares = []):? array
    {
        global $global;
        $uri = $_SERVER['REQUEST_URI'] != "/" ? $_SERVER['REQUEST_URI'] : "/home";
        $section = [];
        $var = [];
        $uriParts = explode('/', $uri);
        $routeParts = explode('/', $route);

        foreach($routeParts as $key => $part) {

            if(strlen($part) === 0) continue;
            
            $isVar = $part[0] === '{' AND $part[strlen($part)-1] === '}';
            
            if($isVar)
            {
                $var[substr($routeParts[$key], 1,-1)] = isset($uriParts[$key]) ? $uriParts[$key] : null;
            } else {
                if(!isset($uriParts[$key])) $uriParts[$key] = '';
                $coincidence[$key] = intval($routeParts[$key] == $uriParts[$key]); //if($routeParts[$key] !== $uriParts[$key]) $coincidence = false;
            }

        }
        if (!isset($coincidence)) $coincidence[0] = 1000000;
        $coincidence = array_sum($coincidence) === count ($coincidence);

        if($coincidence){
            if(!in_array($route, $global['unTrackable'])) array_push($_SESSION['history'], $uri);

            foreach($middlewares as $middleware)
            call_user_func_array('\Middlewares\\'.$middleware.'\\'.$middleware.'::execute', []);
            
            require_once('src/set.php');

            call_user_func_array('\Controllers\\'.$controller.'\\'.$controller.'::'.$function, [$var]);
            exit();
        }

        return null;
    }

    public static function goTo(string $uri)
    {
        header("Location: ".$uri);
        exit();
    }

    public static function goBack()
    {
        if(count($_SESSION['history']))
        {
            $last = end($_SESSION['history']);
            //var_dump($last);
            self::goTo($last);
        } else {
            self::get('/', 'HomeController', 'showHome', ['auth']);
        }
        exit();
    }

}