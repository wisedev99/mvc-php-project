<?php

class RouteFacade
{

    protected static $controller;
    protected $routes = [];

    public static function toAction($class)
    {
        [$name, $action] = $class;

        self::$controller = new $name();
        return self::$controller->$action();
    }

    // public function addRoute(string $method, string $url, object $controller, closure $target)
    // {
    //     $this->routes[$method][$url] = $controller->$target();
    // }
    // public function matchRoute()
    // {
    //     $method = $_SERVER['REQUEST_METHOD'];
    //     $url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    //     var_dump($this->routes);
    //     if (isset($this->routes[$method])) {
    //         foreach ($this->routes[$method] as $routeUrl => $target) {
    //             $pattern = preg_replace('/\/:([^\/]+)/', '/(?P<$1>[^/]+)', $routeUrl);
    //             if (preg_match('#^' . $pattern . '$#', $url, $matches)) {
    //                 $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
    //                 call_user_func_array($target, $params);
    //                 return;
    //             }
    //         }
    //     }
    //     throw new Exception('Route not found');
    // }
}
