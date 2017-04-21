<?php

namespace core\lib\driver\log;

class file
{
    public $path;

    public function __construct()
    {
        $this->path = config('log.option.path');
    }

    public function log($message, $file = 'log')
    {
        //log文件路径
        $path = $this->path . $file . '.log';
        p(date('Y-m-d H:i:s'));

        //log文件目录生成
        $dir = dirname($path);
        is_dir($dir) || mkdir($dir, 0777, true);

        file_put_contents(
            $path,
            date('Y-m-d H:i:s') . $message . PHP_EOL,
            FILE_APPEND
        );
    }

}