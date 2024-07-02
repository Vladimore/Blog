<?php

namespace classes;

use PDO;
use PDOException;

class Database
{
    private $connect;

    public function __construct(array $db_config)
    {
        $dsn = "mysql:host={$db_config['host']};
        dbname={$db_config['dbname']};
        charset={$db_config['charset']}";

        try {
            $this->connect = new PDO($dsn, $db_config['user'], $db_config['password'], $db_config['option']);
        }
        catch (PDOException $e) {
            abort(500);
        }
    }

    public function query($query)
    {
        $statement = $this->connect->prepare($query);
        $statement->execute();
        return $statement;
    }
}