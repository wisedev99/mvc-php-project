<?php
require_once '../Facades/RouteFacade.php';
require_once '../Traits/FuntionGroups.php';

class Route
{
    use FuntionGroups;

    protected static string $method;
    protected static string $url;

    public static function get($route, $controllerAction)
    {
        self::$method = $_SERVER["REQUEST_METHOD"];
        self::$url = $_SERVER["REQUEST_URI"];

        if (self::$method !== 'GET') {
            throw new Exception('Method not supported');
        }

        if ($route === self::$url) return RouteFacade::toAction(self::separation($controllerAction));

        // else {
        //     throw new Exception('Route not found');
        // }
    }

    public static function post($route, $controllerAction)
    {
        self::$method = $_SERVER["REQUEST_METHOD"];

        if (self::$method === 'GET') {
            throw new Exception('Method not supported');
        }
    }
}
