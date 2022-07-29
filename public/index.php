<?php

use Router\Router;
use Exceptions\NotRouteFoundException;

require '../vendor/autoload.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);
define('DB_NAME', 'blogdb_jm');
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PWD', '');

$router = new Router($_SERVER["REQUEST_URI"]);

$router->get('/', 'Controllers\BlogController@welcome');
$router->get('/posts', 'Controllers\BlogController@index');
$router->get('/posts/:id', 'Controllers\BlogController@show');
$router->get('/tags/:id', 'Controllers\BlogController@tag');

$router->get('/login', 'Controllers\UserController@login');
$router->post('/login', 'Controllers\UserController@loginPost');
$router->get('/logout', 'Controllers\UserController@logout');
$router->get('/registration', 'Controllers\UserController@registration');
$router->post('/registration', 'Controllers\UserController@registrationPost');

$router->get('/contact', 'Controllers\ContactController@contact');
$router->post('/contact', 'Controllers\ContactController@contactPost');

$router->get('/admin/posts', 'Controllers\Admin\PostController@index');
$router->get('/admin/posts/create', 'Controllers\Admin\PostController@create');
$router->post('/admin/posts/create', 'Controllers\Admin\PostController@createPost');
$router->post('/admin/posts/delete/:id', 'Controllers\Admin\PostController@delete');
$router->get('/admin/posts/edit/:id', 'Controllers\Admin\PostController@edit');
$router->post('/admin/posts/edit/:id', 'Controllers\Admin\PostController@update');

$router->get('/subscriber', 'Controllers\Subscriber\CommentController@index');
$router->get('/subscriber/comments/create', 'Controllers\Subscriber\CommentController@create');
$router->post('/subscriber/comments/create', 'Controllers\Subscriber\CommentController@createComment');
$router->post('/subscriber/comments/delete/:id', 'Controllers\Subscriber\CommentController@delete');
$router->get('/subscriber/comments/edit/:id', 'Controllers\Subscriber\CommentController@edit');
$router->post('/subscriber/comments/edit/:id', 'Controllers\Subscriber\CommentController@update');

try {
    $router->run();
} catch (NotRouteFoundException $e) {
    return $e->error404();
}