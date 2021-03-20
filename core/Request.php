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
        return $_SERVER["PATH_INFO"] ?? '/';
    }

    public function getBody($onlys = null)
    {
        $data = [];
        if ($onlys) {
            foreach ($onlys as $key) {
                $data[$key] = $_POST[$key];
            }
            return $data;
        }
        if ($this->getMethod() === "get") {
            foreach ($_GET as $key => $value) {
                $data[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->getMethod() === "post") {
            foreach ($_POST as $key => $value) {
                $data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $data;
    }

    public function except($exceptions)
    {
        $data = $this->getBody();
        if (is_array($exceptions)) {
            foreach ($exceptions as $exception) {
                unset($data[$exception]);
            }
        } else {
            unset($data[$exceptions]);
        }
        return $data;
    }
}