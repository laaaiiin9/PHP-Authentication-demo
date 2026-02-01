<?php

require_once BASE_PATH . '/controller/Controller.php';
require_once BASE_PATH . '/controller/HomeController.php';
require_once BASE_PATH . '/controller/LoginController.php';

$router->get('/', [HomeController::class, 'index']);
$router->get('/article/{id}', [HomeController::class, 'article']);
$router->get('/login', [LoginController::class, 'index']);
$router->get('/logout', [LoginController::class, 'logout']);
$router->post('/authenticate', [LoginController::class, 'authenticate']);