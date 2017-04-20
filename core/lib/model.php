<?php

namespace core\lib;

class model extends \PDO
{
    public function __construct()
    {
        try {
            parent::__construct(
                sprintf('%s:host=%s;dbname=%s', config('database.mysql.driver'), config('database.mysql.host'), config('database.mysql.database')),
                config('database.mysql.username'),
                config('database.mysql.password')
            );
        } catch (\PDOException $e) {
            p($e->getMessage());
        }
    }
}