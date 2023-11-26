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
    '/product/{id}' => 'ProductController@getProductById',
];

// Find a matching route
foreach ($routes as $route => $controllerAction) {
    // Check if the route contains dynamic parameters
    if (strpos($route, '{') !== false) {
        // Convert the dynamic route to a regular expression
        $pattern = preg_replace('/{[^}]+}/', '([^/]+)', $route);
        $pattern = str_replace('/', '\/', $pattern);

        // Check if the URL matches the pattern
        if (preg_match('/^' . $pattern . '$/', $url, $matches)) {
            // Extract the captured parameter values
            $params = array_slice($matches, 1);

            // Extract the controller name and action name
            [$controllerName, $actionName] = explode('@', $controllerAction);

            // Create an instance of the controller
            $controller = new $controllerName();

            // Call the corresponding action on the controller
            $controller->$actionName(...$params);

            // Stop processing further routes
            break;
        }
    } else {
        // Handle static routes as before
        if ($url === $route) {
            // Extract the controller name and action name
            [$controllerName, $actionName] = explode('@', $controllerAction);

            // Create an instance of the controller
            $controller = new $controllerName();

            // Call the corresponding action on the controller
            $controller->$actionName();

            // Stop processing further routes
            break;
        }
    }
}
