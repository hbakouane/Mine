<?php

namespace App\Core;

class Validation
{

    /**
     * @param $data
     * @param $rules
     *
     * @return array @OR bool
     */
    public static function validate($data, $rules)
    {
        $errors = [];
        foreach ($rules as $key => $values) {
            if (is_string($values)) {
                $values = [$values];
            }
            foreach ($values as $value) {
                if ($value === "required") {
                    if (empty($data[$key])) {
                        array_push($errors, "$key is required.");
                    }
                }
                if ($value === "email") {
                    if (!filter_var($data[$key], FILTER_VALIDATE_EMAIL)) {
                        array_push($errors, "$key has to be an email.");
                    }
                }
                if (str_contains($value, 'min:')) {
                    $min = ltrim($value, 'min:');
                    if (strlen($data[$key]) < $min) {
                        array_push($errors, "$key requires at least $min chars.");
                    }
                }
                if (str_contains($value, 'max:')) {
                    $max = ltrim($value, 'max:');
                    if (strlen($data[$key]) > $max) {
                        array_push($errors, "The maximum chars for $key is $max.");
                    }
                }
                if (str_contains($value, 'like_')) {
                    $likeWhat = ltrim($value, 'like_');
                    if ($data[$key] != $data[$likeWhat]) {
                        array_push($errors, "$likeWhat and $key have to be matched.");
                    }
                }
            }
        }
        if ($errors) {
            Application::$app->router->renderErrors($errors);
            return Redirect::getBack();
        } else {
            return true;
        }
    }

}