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
        $user = getenv("USER");
        $pass = getenv("PASSWORD");
        $port = getenv("PORT");

        $conexao = "mysql:host={$host}; dbname=produtos-lumen; port={$port}";
        $this->pdo = new PDO($conexao, "root", "");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

}
