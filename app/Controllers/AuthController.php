<?php

namespace App\Controllers;

use App\Models\Core\Auth;
use App\Models\Core\Controller;
use App\Models\Core\Redirect;
use App\Models\Core\Request;
use App\Models\Core\SessionSys;
use App\Models\User;


class Authcontroller extends Controller
{
    protected $location = "frontend/";

    /**
     * Login
     * @return view
     */
    public function login()
    {
        return $this->view('login.php');
    }


    /**
     * Forget password
     * @return view
     */
    public function forget()
    {
        return $this->view('forget.php');
    }


    /**
     * DO Login
     * @param Request
     */
    public function doLogin(Request $req)
    {
        $email = $req->inputs['email'];
        $password = $req->inputs['password'];
        if (Auth::make($email, $password)) {
            Redirect::to('index');
        } else {
            SessionSys::setNew(['err' => 'email or password wrong']);
            Redirect::to('auth','login');
        }
    }

    /**
     * Do Forget
     * @param Request
     */
    public function doForget(Request $req)
    {
        $email = $req->inputs['email'];
        $password = $req->inputs['password'];
        $repassword = $req->inputs['re-password'];


        $user = (new User)->where("email='$email'")[0];
        $pass = $password === $repassword ? true : false;

        var_dump($pass);
        if ($user && $pass) {
            (new User)->update($user['id'], [
                "password" => $password
            ]);
            Redirect::to("auth");
        } else {
            
            SessionSys::setNew(['err'=>"Email maybe not exits or Password not match"]);
            Redirect::to('auth','forget');
        }
    }

    public function logout()
    {
        unset($_SESSION['AUTH']);
        Redirect::to('index');
    }
}
