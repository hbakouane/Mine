<?php


namespace App\Controllers;


use App\Core\Application;

class Controller
{
    public function render($view, $params = [])
    {
        Application::$app->router->renderView($view, $params);
    }

    public function layout($layout)
	{
		Application::$app->router->layoutContent($layout);
	}
}