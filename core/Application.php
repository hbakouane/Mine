<?php

namespace App\Core;

class Application
{
    public Request $request;
    public Router $router;
    public static $root;

    /**
     * Application constructor.
     */
    public function __construct($root)
    {
        $this->request = new Request();
        $this->router = new Router($this->request);
        self::$root = $root;
    }

    public function run()
    {
        $this->router->resolve();
    }
}