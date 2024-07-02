<?php

namespace classes;

use PDO;
use PDOException;

class Database
{
    private $connect;
    private $statement;

    private static $instance = null;

    public function __construct()
    {
    }
    public static function getInstance()
    {
        if(self::$instance === null){
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection(array $db_config)
    {
        $dsn = "mysql:host={$db_config['host']};
        dbname={$db_config['dbname']};
        charset={$db_config['charset']}";

        try {
            $this->connect = new PDO($dsn, $db_config['user'],
                $db_config['password'],
                $db_config['option']);
            return $this;
        }
        catch (PDOException $e) {
            abort(500);
        }
    }

    public function query($query, $params = [])
    {
        $this->statement = $this->connect->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function findAll()
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }
    public function findOrFail()
    {
        $res = $this->find();
        if (!$res){
            abort();
        }
        return $res;
    }
}