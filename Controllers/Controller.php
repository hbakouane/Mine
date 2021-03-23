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

    public function keep($data, $value = '')
    {
        if (is_string($data)) {
            return setcookie($data, $value, time() + 1);
        }
        foreach ($data as $key => $valuee) {
            setcookie($key, $valuee, time() + 1);
        }
	}
}