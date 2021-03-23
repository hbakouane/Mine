<?php

if (!function_exists('error')) {
    function error($key) {
        if (isset($_COOKIE[$key . '_error'])) {
            return $_COOKIE[$key . '_error'];
        }
    }
}

if (!function_exists('getClass')) {
    function getClass($key, $success, $danger) {
        if ($_SERVER['HTTP_REFERER'] ?? '' === $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']) {
            if (isset($_COOKIE[$key . '_error'])) {
                return $danger;
            } else {
                return $success;
            }
        }
    }
}

if (!function_exists('getBack')) {
    function getBack() {
        return \App\Core\Application::$app->redirect->getBack();
    }
}

if (!function_exists('keep')) {
    function keep($key) {
        return $_COOKIE[$key] ?? '';
    }
}
