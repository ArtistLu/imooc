<?php

namespace core;

use core\lib\route;

class imooc
{
    public static $classMap = [];

    public $assign;

    public static function run()
    {
        $route = new route();

        $className = sprintf("%sController", $route->controller);
        $controllerFiel = APP . "/Controllers/" . $className . '.php';
        $class = '\\' . MODULE . '\\Controllers\\' . $className;

        if (is_file($controllerFiel)) {
            include $controllerFiel;
            $controller = new  $class();
            $function = $route->function;
            $controller->$function();
        } else {
            throw new \Exception("cant not find Controller:{$controllerFiel}");
        }




    }

    public static function load($class)
    {
       $class = str_replace('\\', '/', $class);

        //自动加载类库
        if (! isset(self::$classMap[$class])) {
            $file = IMOOC ."/{$class}.php";
            if (file_exists($file)) {
                include $file;
                self::$classMap[$class] = $file;
            } else {
                return false;
            }
        }

        return true;
    }

    public function assign($key, $value)
    {
        $this->assign[$key] = $value;
    }

    public function display($file)
    {
        $filePath = APP . '/Views/' . $file;
        if (is_file($filePath)) {
            extract($this->assign);
            include $filePath;
        } else {
            throw new \Exception("cant not find view:{$filePath}");
        }
    }
}
