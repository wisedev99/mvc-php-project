<?php

class RouteFacade
{

    protected static $controller;

    public static function toAction($class)
    {
        [$name, $action] = $class;

        self::$controller = new $name();
        return self::$controller->$action();
    }
}
