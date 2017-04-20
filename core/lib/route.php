<?php

namespace core\lib;

class route
{
    public $controller;
    public $function;

    public function __construct()
    {
        //获取url中的controller和function 默认都是index
        $pathArr = explode('/', $_SERVER['REQUEST_URI']);
        $this->controller =  empty($pathArr[1]) ? config('route.default.controller') : $pathArr[1];
        $this->function =  empty($pathArr[2]) ? config('route.default.function') : $pathArr[2];

         //获取url中的参数
         //url controller/function/param1/value1/param2/value2
         //$_GET = [
         //     param1 => value1,
         //     param2 => value2
         // ]
        if (! empty($pathArr[4])) {
            $i = 3;
            do {
                $_GET[$pathArr[$i++]] = $pathArr[$i++];

            } while (isset($pathArr[$i + 1]));
        }
    }
}