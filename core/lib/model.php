<?php

namespace core\lib;

class model extends \PDO
{
    public function __construct()
    {
        $mysql = config('database.mysql');

        try {
            parent::__construct(
                sprintf('%s:host=%s;dbname=%s', $mysql['driver'], $mysql['host'], $mysql['database']),
                config('database.mysql.username'),
                config('database.mysql.password')
            );
        } catch (\PDOException $e) {
            p($e->getMessage());
        }
    }
}