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
    {//var_dump($req);die();
        $errors=[];
        $name=$req->inputs["name"];
        $email=$req->inputs["email"];
        $password=$req->inputs["password"];
        $room_num=$req->inputs["room_num"];
         if(empty($name)){
             $errors['name'] = "Required Field";
          }elseif(strlen($name) < 6){
             $errors['name'] = "Invalid String"; 
          }if(empty($email)){
              $errors['email'] = "Required Field";
          }elseif(!FILTER_VALIDATE_EMAIL){
              $errors['email'] = "Invalid email"; 
          }if(empty($password)){
              $errors['password'] = "Required Field";
          }elseif(strlen($password) < 6){
            $errors['password'] = "Invalid lenght"; 
         } if(empty($room_num)){
            $errors['room_num'] = "Required Field";
         }
        $img = $req->files['image'];
        if (strlen($img['name']) > 0) {
            $img = new FileSys($req->files['image'], PUBLIC_ROOT . "images/users/");
            $img =  $img->upload();
        }else{
            $errors['image'] = "Required Field";
        }

        $req->posts['image'] = $img;

        if(count($errors) > 0){
            SessionSys::setNew(["err"=>$errors]);
            Redirect::to("users","create");
         }
         else{
          
          $this->user->insert($req->posts);
          Redirect::to("users");
        }      
       
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
