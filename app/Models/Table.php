<?php
namespace App\Models;

class Table extends DBConnect
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function create($attr)
    {
        $query = "CREATE TABLE IF NOT EXISTS $this->name ($attr)";
        $this->query($query)->execute();
    }
}
