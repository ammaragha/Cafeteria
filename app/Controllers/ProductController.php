<?php

namespace App\Controllers;

use App\Models\Core\Controller;
use App\Models\Core\SessionSys;
use App\Models\Core\Redirect;
use App\Models\Product;
use App\Models\Core\FileSys;
use App\Models\Core\Request;
use App\Models\Category;

class ProductController extends Controller
{
    protected $location = "backend/products/";

    function __construct()
    {
        $this->product = new Product;
    }


    /**
     * call index view
     * @return Product $data
     */
    public function index()
    {
        $data = $this->product->get();
        SessionSys::setNew(["data" => $data]);
        return $this->view('index.php');
    }


    /**
     * return Create view
     */
    public function create()
    {
        $categories = (new Category)->get();
        SessionSys::setNew(['categories' => $categories]);
        return $this->view('create.php');
    }


    /**
     * Store new row into product
     * @param Request $req
     * @return void
     */
    public function store(Request $req)
    {
       // var_dump($req);die();
      $errors=[];
      $name=$req->inputs["name"];
      $price=$req->inputs["price"];
      $cat_id=$req->inputs["cat_id"];
       if(empty($name)){
           $errors['name'] = "Required Field";
        }elseif(strlen($name) < 6){
           $errors['name'] = "Invalid String"; 
        }if(empty($cat_id)){
            $errors['cat_id'] = "Required Field";
        }elseif(!FILTER_VALIDATE_INT){
            $errors['cat_id'] = "Invalid id"; 
        }if(empty($price)){
            $errors['price'] = "Required Field";
        }elseif(FILTER_VALIDATE_INT){
            $errors['price'] = "Invalid int";
        }
        $img=$req->files['image'];
        if(strlen($img['name'])>0){
        $img = new FileSys($req->files['image'], PUBLIC_ROOT . "images/products/");
        $img =  $img->upload();
        
        }else{
        $errors['image'] = "Required Field";
        }
        $req->posts['image'] = $img;
        //----------------------------------------
        //check avilablity
        $req->posts['avilable'] = $req->posts['avilable'] == "1" ? 1 : 0;
        //----------------------------------------
         if(count($errors) > 0){
            SessionSys::setNew(["err"=>$errors]);
            Redirect::to("products","create");
         }
         else{
         
        $this->product->insert($req->posts);
        Redirect::to("products");
        }      
    }


    /**
     * edit row into category
     * @param Request $req .. contains $id
     * @return Category $data
     */
    public function edit(Request $req)
    {
        $data = $this->product->find($req->inputs['id']);
        SessionSys::setNew(['data' => $data]);
        return $this->view('edit.php');
    }


    /**
     * do update
     * @param Request $req .. conatains $id
     */
    public function update(Request $req)
    {
        $img = $req->files['image'];
        $id = $req->inputs['id'];
        $data = [
            'name' => $req->inputs['name'],
            'price' => $req->inputs['price'],
            'cat_id' => $req->inputs['cat_id'],
            'avilable' => $req->posts['avilable'] == "1" ? 1 : 0
        ];

        //to delete old image and add new one
        if (strlen($img['name']) > 0) {
            $productOldIamge = $this->product->find($id)['image'];
            unlink($productOldIamge);
            $file = new FileSys($img, PUBLIC_ROOT . "images/products/");
            $img = $file->upload();
            $data['image'] = $img;
        }
        //-----------------

        $this->product->update($id, $data);
        Redirect::to('products');
    }

    /**
     * delete row
     * @param Request $req .. contains $id
     */
    public function delete(Request $req)
    {
        $id = $req->inputs['id'];
        $productOldIamge = $this->product->find($id)['image'];
        unlink($productOldIamge);
        $this->product->delete($id);
        Redirect::back();
    }
}
