<?php

use Router\Router;
use Exceptions\NotRouteFoundException;

require '../vendor/autoload.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR);
//define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);
define('DB_NAME', 'blogdb_jm');
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PWD', '');

//echo "<pre>" . print_r($_SERVER , true) . "</pre>";
//echo "<pre>" . print_r($_REQUEST , true) . "</pre>";
//var_dump([$_SERVER['REQUEST_METHOD']]);

$router = new Router($_SERVER["REQUEST_URI"]);

$router->get('/', 'Controllers\BlogController@welcome');
$router->get('/posts', 'Controllers\BlogController@index');
$router->get('/posts/:id', 'Controllers\BlogController@show');
$router->get('/tags/:id', 'Controllers\BlogController@tag');

$router->get('/login', 'Controllers\UserController@login');
$router->post('/login', 'Controllers\UserController@loginPost');
$router->get('/logout', 'Controllers\UserController@logout');

$router->get('/admin/posts', 'Controllers\Admin\PostController@index');
$router->get('/admin/posts/create', 'Controllers\Admin\PostController@create');
$router->post('/admin/posts/create', 'Controllers\Admin\PostController@createPost');
$router->post('/admin/posts/delete/:id', 'Controllers\Admin\PostController@destroy');
$router->get('/admin/posts/edit/:id', 'Controllers\Admin\PostController@edit');
$router->post('/admin/posts/edit/:id', 'Controllers\Admin\PostController@update');

try {
    $router->run();
} catch (NotRouteFoundException $e) {
    return $e->error404();
}