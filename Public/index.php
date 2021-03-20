<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \App\Core\Application;
use \App\Controllers\ContactController;
use \App\Controllers\AuthController;

// Initialise the application
$app = new Application(dirname(__DIR__));
$router = $app->router;

// Register the routes

// Contact
$router->get('/', 'homepage');
$router->get('/contact', [ContactController::class, 'index']);
$router->post('/contact', [ContactController::class, 'handleContact']);

// Authentication
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'handleLogin']);
$router->get('/register', [AuthController::class, 'register']);
$router->post('/register', [AuthController::class, 'handleRegister']);

// Run the application
$app->run();