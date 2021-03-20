<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \App\Core\Application;

// Initialise the application
$app = new Application(dirname(__DIR__));
$router = $app->router;

// Register the routes
$router->get('/homepage', 'homepage');
$router->get('/contact', 'contact');

// Run the application
$app->run();