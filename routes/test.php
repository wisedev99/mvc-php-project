<?php
require_once '../Facades/Route.php';

Route::get('/', 'ProductController@index');
Route::get('/test', 'ProductController@test');
Route::get('/products', 'ProductController@allProducts');
Route::get('/category', 'ProductController@getProductByCat');
Route::get('/all-product-with-children', 'ProductController@getItemsWithChildren');


// $route = new Route();
// $route->matchRoute();
