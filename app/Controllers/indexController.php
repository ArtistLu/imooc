<?php

namespace app\Controllers;

use core\imooc;
use core\lib\model;

class indexController extends imooc
{
    public function index()
    {
//        $model = new model();
//
//        $sql = 'select * from m_user limit 5';

        $this->assign('title', 'Hello World!');
        $this->display('index.html');
    }
}