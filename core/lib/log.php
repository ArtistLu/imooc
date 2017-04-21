<?php
/**
 * Created by PhpStorm.
 * User: Mr.z
 * Date: 17/4/20
 * Time: 下午11:04
 */

namespace core\lib;


class log
{
    public static $class;

    public static function init()
    {
        //确认驱动
        $driver = config('log.driver');
        $class = '\core\lib\driver\log\\' . $driver;

        self::$class = new $class();
    }

    public static function write($message, $file)
    {
        self::$class->log($message, $file);
    }
}