<?php

namespace App\DAO;

use PDO;
use PDOException;

abstract class DAO extends PDO
{
    public $conexao;
    public function __construct()
    {
        try {
            $dsn = "mysql:host=" . $_ENV['db']['host'] . ";dbname=" . $_ENV['db']['database'];

            $this->conexao = new PDO($dsn, $_ENV['db']['user'], $_ENV['db']['pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND =>  "SET NAMES utf8", PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $e) {
            echo 'erro: ' . $e->getMessage();
        }
    }
}
