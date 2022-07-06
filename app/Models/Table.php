<?php

namespace App\Models;

use App\Models\Core\DBConnect;

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


    public function alter($attr, $type = "ADD", $IF_EXISTS = FALSE)
    {
        $type .= " IF NOT EXISTS";
        if ($IF_EXISTS) $type .= " IF EXISTS";
        $query = "ALTER TABLE $this->name $type $attr";
        $this->query($query)->execute();
    }


    public function addFK($FK_IDName, $table, $PK_IDName)
    {
        $this->alter("$FK_IDName int");
        $constName = $FK_IDName . "_" . $PK_IDName;
        $query = "ALTER TABLE $this->name ADD CONSTRAINT $constName FOREIGN KEY ($FK_IDName) REFERENCES $table($PK_IDName) ON DELETE CASCADE";
        $this->query($query)->execute();
    }
}
