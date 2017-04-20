<?php
/**
 * Created by PhpStorm.
 * User: Mr.z
 * Date: 17/4/20
 * Time: 上午11:16
 */

namespace core\lib;



class config
{
    public static $config = [];

    public static function _get($file, $name = null)
    {
        $filePath = IMOOC . '/config/' . $file . '.php';

        if (isset(self::$config[$file])) {
            if (null == $name) {
                return self::$config[$file];
            } else {
                if (isset(self::$config[$file][$name])) {
                    return self::$config[$file][$name];
                }
            }

            throw new \Exception("undefined index: {$name} in config file: {$filePath}");
        } else {

            if (is_file($filePath)) {
                $configArr = include $filePath;

                if (null == $name) {
                    self::$config[$file] = $configArr;
                    return $configArr;
                } else {
                    if (isset($configArr[$name])) {
                        self::$config[$file] = $configArr;
                        return $configArr[$name];
                    } else {
                        throw new \Exception("undefined index: {$name} in config file: {$filePath}");
                    }
                }

            } else {
                throw new \Exception("can not find config file: {$filePath}");
            }
        }

    }

    public static function get($file, $name = null)
    {
        $filePath = IMOOC . '/config/' . $file . '.php';
        if (! isset(self::$config[$file]) && is_file($filePath)) {
            self::$config[$file] = include $filePath;
        }

        if (isset(self::$config[$file])) {
            if (null == $name) {
                return self::$config[$file];
            }

            if (isset(self::$config[$file][$name])) {
                return self::$config[$file][$name];
            }

            throw new \Exception("undefined index: {$name} in config file: {$filePath}");
        }

        throw new \Exception("can not find config file: {$filePath}");
    }
}
