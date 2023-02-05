<?php

namespace App\Support;

class Utils
{

    /**
     * Determines if variable is not empty
     *
     * @param  mixed  $var
     * @return bool
     */
    public static function notEmpty($var, $key = null)
    {
        if ($key !== null && is_string($key)) {
            return !empty(Utils::get($var, $key));
        }

        return !empty($var);
    }

    /**
     * Alias for data_get
     *
     * @param mixed target
     * @param string key
     * @param mixed default
     * @return mixed
     */
    public static function get($target, $key, $default = null)
    {
        return data_get($target, $key, $default);
    }
}
