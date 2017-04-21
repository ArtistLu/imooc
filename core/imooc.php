<?php

namespace core;

use core\lib\log;
use core\lib\route;

class imooc
{
    public static $classMap = [];

    public $assign;


    /**
     * 启动框架
     *
     * @throws \Exception
     */
    public static function run()
    {
        log::init();
        $route = new route();
        $className = sprintf("%sController", $route->controller);
        $controllerFiel = APP . "/Controllers/" . $className . '.php';
        $class = '\\' . MODULE . '\\Controllers\\' . $className;
        log::write(sprintf(' requested %s/%s[%s]', $route->controller, $route->function, '127.0.0.1'));
        if (is_file($controllerFiel)) {
            include $controllerFiel;
            $controller = new  $class();
            $function = $route->function;
            $controller->$function();
        } else {
            throw new \Exception("cant not find Controller:{$controllerFiel}");
        }
    }

    /**
     * 自动加载
     *
     * @param $class
     * @return bool
     */
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

    /**
     * 输出变量到view
     *
     * @param $key
     * @param $value
     */
    public function assign($key, $value)
    {
        $this->assign[$key] = $value;
    }

    /**
     * 显示模板
     *
     * @param $file
     * @throws \Exception
     */
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
