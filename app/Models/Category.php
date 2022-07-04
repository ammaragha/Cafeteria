<?php

namespace App\Models;

use App\Models\Core\Model;

class Category extends Model
{
    protected $table = "categories";


    static function getName($id)
    {
        return (new Category)->find($id)['name'];
    }
}
