<?php
namespace App\Models;
use App\Models\Core\Model;
class User extends Model
{

    protected $table = 'users';

    static function getName($id)
    {
        return (new User)->find($id)['name'];
    }
}
