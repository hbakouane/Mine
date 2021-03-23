<?php

namespace App\Core;

class Application
{
    public Request $request;
    public Router $router;
    public Response $response;
    public Redirect $redirect;
    public static $root;
    public static Application $app;

    /**
     * Application constructor.
     */
    public function __construct($root)
    {
        $this->request = new Request();
        $this->router = new Router($this->request);
        $this->response = new Response();
        $this->redirect = new Redirect();
        self::$root = $root;
        self::$app = $this;
    }

    public function run()
    {
        session_start();
        $this->router->resolve();
    }
}