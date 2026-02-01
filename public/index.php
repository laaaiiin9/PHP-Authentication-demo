<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('BASE_PATH', dirname(__DIR__));

require_once BASE_PATH . '/core/Router.php';

$uri = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') ?: '/';
$requestMethod = $_SERVER['REQUEST_METHOD'];

$router = new Router();

require_once BASE_PATH . '/routes/web.php';

$router->dispatch($requestMethod, $uri);