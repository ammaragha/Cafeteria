<?php

namespace App\Controllers;

use App\Models\Core\Controller;
use App\Models\Core\Redirect;
use App\Models\Core\Request;
use App\Models\Category;
use App\Models\Core\SessionSys;

class CategoryController extends Controller
{
    protected $location = "backend/category/";
    private $category;

    function __construct()
    {
        $this->category = new Category;
    }

    public function index()
    {
        $data = $this->category->get();
        SessionSys::setNew(["data" => $data]);
        return $this->view('index.php');
    }

    public function create()
    {
        return $this->view('create.php');
    }

    public function store(Request $req)
    {
        $this->category->insert($req->posts);
        Redirect::to("categories");
    }

    public function edit(Request $req)
    {
        $data = $this->category->find($req->inputs['id']);
        SessionSys::setNew(['data'=>$data]);
        return $this->view('edit.php');
    }

    public function update(Request $req)
    {
        $id = $req->inputs['id'];
        $data = [
            'name'=>$req->inputs['name'],
        ];
        $this->category->update($id,$data);
        Redirect::to('categories');
    }

    public function delete(Request $req)
    {
        $this->category->delete($req->inputs['id']);
        Redirect::back();
    }
}
