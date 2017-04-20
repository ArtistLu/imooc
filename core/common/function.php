<?php

use core\lib\config;

if (! function_exists('p')) {
    /**
     * 打印输出函数
     *
     * @param $var
     */
    function p($var, $exit = false)
    {
        if (is_bool($var)) {
            var_dump($var);
        } elseif (is_null($var)) {
            var_dump(NULL);
        } else {
            echo "<pre>" . print_r($var, true) . "</pre>";
        }
        $exit && exit(1);
    }
}


if (! function_exists('config')) {
    /**
     * 获取配置信息
     * eg - config/route.php/def_controller => config('route.def_controller')
     * @param $key
     * @return mixed|null
     */
    function config($key)
    {
        $value = null;
        $keys = explode('.', $key);

        if (! empty($keys[1])) {
            $value = config::get($keys[0], $keys[1]);
            unset($keys[0], $keys[1]);
        } else {
            if (! empty($keys[0])) {
                $value = config::get($keys[0]);
                unset($keys[0]);
            }
        }

        foreach ($keys as $key) {
            if (isset($value[$key])) {
                $value = $value[$key];
            } else {
                $value = null;
                break;
            }
        }

        return $value;
    }
}
