<?php
// Web-based routes
$routes = [
    '/' => 'ProductController@index',
];

// Loop through the routes and determine which controller and action to invoke
foreach ($routes as $url => $controllerAction) {
    [$controllerName, $actionName] = explode('@', $controllerAction);

    if ($_SERVER['REQUEST_URI'] === $url) {
        $controllerClassName = $controllerName;

        $controller = new $controllerClassName();
        $controller->$actionName();
        break;
    }
}
