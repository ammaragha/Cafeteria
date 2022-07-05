<?php

namespace App\Controllers;

use App\Models\Core\Controller;
use App\Models\Core\Redirect;
use App\Models\User;
use App\Models\Core\Request;
use App\Models\Core\SessionSys;
use App\Models\Core\FileSys;

class UserController extends Controller
{
    //define user view location
    protected $location = "backend/users/";
    //instance of users
    private $user;

    function __construct()
    {
        $this->user = new User;
    }


    /**
     * call index view
     * @return User $data
     */
    public function index()
    {
        $data = $this->user->get();
        SessionSys::setNew(["data" => $data]);
        return $this->view('index.php');
    }


    /**
     * return Create view
     */
    public function create()
    {
        return $this->view('create.php');
    }


    /**
     * Store new row into user
     * @param Request $req
     * @return void
     */
    public function store(Request $req)
    {
        $img = $req->files['image'];
        if (strlen($img['name']) > 0) {
            $img = new FileSys($req->files['image'], PUBLIC_ROOT . "images/users/");
            $img =  $img->upload();
        }

        $req->posts['image'] = $img;
        $this->user->insert($req->posts);
        Redirect::to("users");
    }


    /**
     * edit row into category
     * @param Request $req .. contains $id
     * @return Category $data
     */
    public function edit(Request $req)
    {
        //die($req->inputs['id']);
        $data = $this->user->find($req->inputs['id']);
        SessionSys::setNew(['data' => $data]);
        return $this->view('edit.php');
    }


    /**
     * do update
     * @param Request $req .. conatains $id
     */
    public function update(Request $req)
    {
        $password = $req->inputs['password'];
        $img = $req->files['image'];
        $id = $req->inputs['id'];
        $data = [
            'name' => $req->inputs['name'],
            'email' => $req->inputs['email']
        ];

        //yike--------
        if ($password != "") $data['password'] = $password;
        if (strlen($img['name']) > 0) {
            $userOldIamge = $this->user->find($id)['image'];
            unlink($userOldIamge);
            $file = new FileSys($img, PUBLIC_ROOT . "images/users/");
            $img = $file->upload();
            $data['image'] = $img;
        }
        //-----------------

        $this->user->update($id, $data);
        Redirect::to('users');
    }

    /**
     * delete row
     * @param Request $req .. contains $id
     */
    public function delete(Request $req)
    {
        $id = $req->inputs['id'];
        $userOldIamge = $this->user->find($id)['image'];
        unlink($userOldIamge);
        $this->user->delete($id);
        Redirect::back();
    }
}
