<?php

namespace App\Models\Core;

use PDO;

class DBConnect
{
    protected $host = DB_HOST;
    protected $user = DB_USER;
    protected $pass = DB_PASS;
    protected $dbname = DB_NAME;




    protected function connect()
    {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->dbname";
            $pdo = new PDO($dsn, $this->user, $this->pass);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (\Exception $e) {
            die('cant connect to db: ' . $e->getMessage());
        }
    }


    protected function query($query)
    {
        $q = $this->connect()->prepare($query);
        return $q;
    }
}
