<?php

namespace App\Middlewares;

use App\Models\Core\Auth;
use App\Models\Core\Redirect;


if (!Auth::check()::$user['role'] == '1') {
    Redirect::to('index');
}
