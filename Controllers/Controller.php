<?php


namespace App\Controllers;


use App\Core\Application;

class Controller
{
    public function render($view, $params = [])
    {
        Application::$app->router->renderView($view, $params);
    }
}