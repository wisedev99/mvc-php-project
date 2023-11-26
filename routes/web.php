<?php
// Web-based routes
$url = $_SERVER['REQUEST_URI'];

// Remove any query parameters from the URL
$urlParts = explode('?', $url);
$url = $urlParts[0];

$routes = [
    '/' => 'ProductController@index',
    '/products' => 'ProductController@allProducts',
    '/category' => 'ProductController@getProductByCat',
];

foreach ($routes as $route => $controllerAction) {
    [$controllerName, $actionName] = explode('@', $controllerAction);

    if ($url === $route) {
        $controllerClassName = $controllerName;

        $controller = new $controllerClassName();
        // $routeParams = [];

        // dont need to it because we already get request name in controller line: #35
        // if ($route === '/category') {
        //     $categoryName = trim($urlParts[1], '/');
        //     $routeParams[] = $categoryName;
        // }

        $controller->$actionName();

        break;
    }
}
