<?php

namespace App\Core;

class Router
{
    protected array $routes = [];
    public Request $request;

    /**
     * Router constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function get(string $path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $verb = $this->request->getMethod();
        $path = $this->request->getPath() ?? '/';
        $callback = $this->routes[$verb][$path] ?? false;
        if (!$callback) {
            return "Not found";
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        return call_user_func($callback);
    }

    public function layoutContent($layout = 'master')
    {
        ob_start();
        include_once Application::$root . "/Views/layouts/$layout.php";
        return ob_get_clean();
    }

    public function viewContent($view)
    {
        ob_start();
        include_once Application::$root . "/Views/$view.php";
        return ob_get_clean();
    }

    public function renderView($view)
    {
        $layout = $this->layoutContent();
        $view = $this->viewContent($view);
        echo str_replace('{{ content }}', $view, $layout);
    }

}