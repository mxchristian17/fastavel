<?php

declare(strict_types=1);

namespace Routes\Routes;

class Route {

    public static function get(string $route, string $controller, string $function,? array $middlewares = []):? array
    {
        global $global;

        $uri = $_SERVER['REQUEST_URI'];
        $section = [];
        $var = [];
        $uriParts = explode('/', $uri);
        $routeParts = explode('/', $route);
        $coincidence = true;
        foreach($routeParts as $key => $part) {

            if(strlen($part) === 0) continue;
            
            $isVar = $part[0] === '{' AND $part[strlen($part)-1] === '}';
            
            if($isVar)
            {
                $var[$routeParts[$key]] = isset($uriParts[$key]) ? $uriParts[$key] : null;
            } else {
                if(!isset($uriParts[$key])) continue;
                if($routeParts[$key] !== $uriParts[$key]) $coincidence = false;
            }

        }

        if($coincidence){
            if(!in_array($route, $global['unTrackable'])) array_push($_SESSION['history'], [$route, $controller, $function, $middlewares]);

            foreach($middlewares as $middleware)
            call_user_func_array('\Middlewares\\'.$middleware.'\\'.$middleware.'::execute', []);

            require_once('src/set.php');

            call_user_func_array('\Controllers\\'.$controller.'\\'.$controller.'::'.$function, [$controller, $function, $var]);
            call_user_func_array('\Controllers\\'.$controller.'\\'.$controller.'::'.$function, [$controller, $function, $var]);
        }

        return null;
    }

    public static function goBack()
    {
        var_dump(end($_SESSION['history']));
        if(count($_SESSION['history']))// var_dump(end($_SESSION['history']));
        {
            $last = end($_SESSION['history']);
            self::get($last[0], $last[1], $last[2], $last[3]);
        } else {
            self::get('/', 'HomeController', 'showHome', ['auth']);
        }
        exit;
    }

}