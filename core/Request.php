<?php

namespace App\Core;

class Request
{
    public function getMethod()
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    public function getPath()
    {
        return $_SERVER["PATH_INFO"];
    }
}