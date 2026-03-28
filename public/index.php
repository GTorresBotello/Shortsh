<?php
session_start();

// Autoloading or simple manual inclusion
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../controllers/HomeController.php';
require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/UrlController.php';
require_once __DIR__ . '/../controllers/RedirectController.php';

// Simple routing
$method = $_SERVER['REQUEST_METHOD'];

$uri = $_SERVER['REQUEST_URI'];
$route = parse_url($uri, PHP_URL_PATH);
$route = '/' . trim($route, '/');
// var_dump($route);




switch ($route) {
    case '/':
    case '/index.php':
    case '':
        $controller = new HomeController();
        $controller->index();
        break;
    case '/login':
        $controller = new AuthController();
        $controller->login($method);
        break;
    case '/register':
        $controller = new AuthController();
        $controller->register($method);
        break;
    case '/url':
        $controller = new UrlController();
        $controller->add($method);
        break;
    case '/logout':     
        $_SESSION['username'] = null;
        $_SESSION['user_id'] = null;
        header('location: /');
        break;
    default:
        $controller = new RedirectController();
        $controller->redirection($route);
        break;
}
