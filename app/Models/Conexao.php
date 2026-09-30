<?php

namespace App\Models;

use PDO;

class Conexao
{
    protected $pdo;
    public function __construct()
    {
        $host = getenv("HOST");
        $dbname = getenv("DBNAME");
        $user = getenv("DB_USERNAME");
        $pass = getenv("DB_PASSWORD");
        $port = getenv("PORT");

        $conexao = "mysql:host={$host}; dbname=produtos-lumen; port={$port}";
        $this->pdo = new PDO($conexao, $user, $pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

}
