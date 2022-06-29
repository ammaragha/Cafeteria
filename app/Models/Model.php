<?php
namespace App\Models;
class Model extends DBConnect
{
    protected $table;
    private $con;
    public function __construct()
    {
        $this->con = $this->connect();
    }


    //get all 
    public function get()
    {
        $stmt = $this->con->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        $res = $stmt->fetchAll();
        return count($res) > 0 ? $res : false;
    }

    //find with id
    public function find(int $id)
    {
        $stmt = $this->con->prepare("SELECT * FROM $this->table WHERE id = $id");
        $stmt->execute();
        $res = $stmt->fetch();
        return count($res) > 0 ? $res : false;
    }

    //insert
    public function insert(array $data)
    {
        $data = $this->prepareDataInsert($data);
        //die("INSERT INTO " . $this->table . "($keys) VALUES ($values)");
        $stmt = $this->con->prepare("INSERT INTO " . $this->table . "($data[0]) VALUES ($data[1])");
        return $stmt->execute() ? true : false;
    }

    //update
    public function update(int $id, array $data): void
    {
        $keys = array_reduce(array_keys($data), function ($pre, $i) {
            $pre .= "$i=? ,";
            return $pre;
        });
        $setting = rtrim($keys, ',');

        $stmt =  $this->con->prepare("UPDATE $this->table SET $setting WHERE id=$id");
        $res = $stmt->execute(array_values($data));
        if (!$res) die('bad');
    }


    //delete
    public function delete(int $id): bool
    {
        $stmt = $this->con->prepare("DELETE FROM $this->table WHERE id=$id");
        $res = $stmt->execute();
        return $res ? true : false;
    }


    //where
    public function where($vars)
    {
        $stmt = $this->con->prepare("SELECT * FROM $this->table WHERE $vars");
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function prepareDataInsert($data)
    {
        $keys = array_reduce(array_keys($data), function ($pre, $i) {
            $pre .= $i . ',';
            return $pre;
        });

        $values = array_reduce(array_values($data), function ($pre, $i) {
            $pre .= "'$i',";
            return $pre;
        });

        $keys = rtrim($keys, ',');
        $values = rtrim($values, ',');

        return [$keys, $values];
    }


    public function __destruct()
    {
        $this->con = null;
    }
}
