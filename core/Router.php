<?php

namespace App\Core;

use function Composer\Autoload\includeFile;

class Router
{
    protected array $routes = [];
    public Request $request;
    public Response $response;

    /**
     * Router constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->response = new Response();
    }


    public function get(string $path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post(string $path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $verb = $this->request->getMethod();
        $path = $this->request->getPath() ?? '/';
        $callback = $this->routes[$verb][$path] ?? false;
        if (!$callback) {
            $this->response->setStatusCode(404);
            if (file_exists(Application::$root . "/Views/errors/404.php")) {
                includeFile(Application::$root . "/Views/errors/404.php");
            } else {
                echo "Not found";
            }
            exit;
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        if (is_array($callback)) {
            $callback[0] = new $callback[0]();
        }
        echo call_user_func($callback, $this->request);
    }

    public function layoutContent($layout = 'master')
    {
        ob_start();
        include_once Application::$root . "/Views/layouts/$layout.php";
        return ob_get_clean();
    }

    public function viewContent($view, $params = [])
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$root . "/Views/$view";
        return ob_get_clean();
    }

    public function makeView($view)
    {
        // Get the view content
        // '.' means that we have to go a folder further, so let's handle that
        if (strpos($view, '.')) {
            return str_replace('.', '/', $view) . '.php';
        }
        return $view;
    }

    public function renderView($view, $params = [])
    {
        // Get the layout content
        $layout = $this->layoutContent();
        echo str_replace('{{ content }}', $this->viewContent($this->makeView($view), $params), $layout);
    }

}