<?php

use App\Controllers\SinhvienController;
use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function () {
    if (!isset($_SESSION['auth']) || empty($_SESSION['auth'])) {
        header('location: ' . BASE_URL . 'login');
        die;
    }
});


// bắt đầu định nghĩa ra các đường dẫn
// routes.php hoặc web.php
$router->get('/', [SinhvienController::class, 'getStudent']);
$router->get('/add', [SinhvienController::class, 'addStudent']);
$router->post('/add', [SinhvienController::class, 'store']);
$router->get('/edit/{id}', [SinhvienController::class, 'edit']);
$router->post('/edit/{id}', [SinhvienController::class, 'update']);

$router->get('/delete/{id}', [SinhvienController::class, 'destroy']);

# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;
