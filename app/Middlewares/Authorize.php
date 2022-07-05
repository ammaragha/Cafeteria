<?php
namespace App\Middlewares;

use App\Models\Core\Auth;
use App\Models\Core\Redirect;

if(!Auth::check()){
    Redirect::to('index');
}