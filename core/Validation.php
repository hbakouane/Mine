<?php

namespace App\Core;

class Validation
{

    /**
     * @param $data
     * @param $rules
     *
     * @return array
     */
    public static function validate($data, $rules)
    {
        if (is_string($rules)) {
            $rules = [$rules];
        }
        foreach ($rules as $rule) {

        }
    }

}