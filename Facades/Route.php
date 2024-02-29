<?php
require_once '../Facades/RouteFacade.php';
require_once '../Traits/FuntionGroups.php';

// Documentation: https://www.geeksforgeeks.org/php-parse_url-function/
// var_dump(parse_url($url));
// var_dump(parse_url($url, PHP_URL_SCHEME));
// var_dump(parse_url($url, PHP_URL_USER));
// var_dump(parse_url($url, PHP_URL_PASS));
// var_dump(parse_url($url, PHP_URL_HOST));
// var_dump(parse_url($url, PHP_URL_PORT));
// var_dump(parse_url($url, PHP_URL_PATH));
// var_dump(parse_url($url, PHP_URL_QUERY));
// var_dump(parse_url($url, PHP_URL_FRAGMENT));


class Route extends RouteFacade
{
    use FuntionGroups;

    protected static string $method;
    protected static string $url;

    public static function get($route, $controllerAction)
    {
        self::$method = $_SERVER["REQUEST_METHOD"];
        self::$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

        if (self::$method !== 'GET') {
            throw new Exception('Method not supported');
        }

        if ($route === self::$url) return self::toAction(self::separation($controllerAction));

        // else {
        //     throw new Exception('Route not found');
        // }
    }

    public static function post($route, $controllerAction)
    {
        self::$method = $_SERVER["REQUEST_METHOD"];
        self::$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

        if (self::$method !== 'POST') {
            throw new Exception('Method not supported');
        }

        if ($route === self::$url) return RouteFacade::toAction(self::separation($controllerAction));
    }
}
