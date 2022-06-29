<?php
namespace App\Models;
use App\Models\Core\Model;
class User extends Model
{

    protected $table = 'users';

    public function makeAuth($username, $password)
    {
        $stmt = $this->query("SELECT username,image FROM $this->table WHERE username=? AND password=? LIMIT 1");
        $stmt->execute([$username, $password]);
        $res = $stmt->fetch();
        return $res > 0 ? $res : false;
    }
}
