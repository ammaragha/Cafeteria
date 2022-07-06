<?php

namespace App\Controllers;

use App\Models\Core\Controller;
use App\Models\Core\Redirect;
use App\Models\Core\Request;
use App\Models\Category;
use App\Models\Core\SessionSys;

class CategoryController extends Controller
{
    //define view location !important
    protected $location = "backend/category/";
    //instance of Category Model
    private $category;

    function __construct()
    {
        $this->category = new Category;
    }

    /**
     * call index view
     * @return Category $data
     */
    public function index()
    {
        $data = $this->category->get();
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
     * Store new row into category
     * @param Request $req
     * @return void
     */


    public function store(Request $req)
    {  //var_dump($req->inputs["name"]);die();
      $errors=[];
      $name=$req->inputs["name"];
       if(empty($name)){
           $errors['Name'] = "Required Field";
        }elseif(strlen($name) < 6){
           $errors['Name'] = "Invalid String"; 
        }
         if(count($errors) > 0){
            SessionSys::setNew(["err"=>$errors]);
            Redirect::to("categories","create");
         }
         else{
          $this->category->insert($req->posts);
          Redirect::to("categories");
        }    
    }


    /**
     * edit row into category
     * @param Request $req .. contains $id
     * @return Category $data
     */
    public function edit(Request $req)
    {
        $data = $this->category->find($req->inputs['id']);
        SessionSys::setNew(['data'=>$data]);
        return $this->view('edit.php');
    }


    /**
     * do update
     * @param Request $req .. conatains $id
     */
    public function update(Request $req)
    {
        $id = $req->inputs['id'];
        $data = [
            'name'=>$req->inputs['name'],
        ];
        $this->category->update($id,$data);
        Redirect::to('categories');
    }

    /**
     * delete row
     * @param Request $req .. contains $id
     */
    public function delete(Request $req)
    {
        $this->category->delete($req->inputs['id']);
        Redirect::back();
    }
}