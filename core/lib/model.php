<?php

namespace core\lib;

class model extends \PDO
{
    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=mastercloud-local';
        $userName = 'root';
        $password = '';
        try {
            parent::__construct($dsn, $userName, $password);
        } catch (\PDOException $e) {
            p($e->getMessage());
        }
    }
}