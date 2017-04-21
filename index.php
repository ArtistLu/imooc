<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
*/

define('IMOOC', __DIR__);
define('CORE', IMOOC . '/core');
define('APP', IMOOC . '/app');
define('CONFIG', IMOOC . '/config');
define('MODULE', 'app');

define('DEBUG', false);

ini_set('display_error', DEBUG ? 'On' : 'Off');

include CORE . '/common/function.php';

include CORE . '/imooc.php';

date_default_timezone_set('PRC');

spl_autoload_register('\core\imooc::load');

//启动应用
\core\imooc::run();