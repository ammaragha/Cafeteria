<?php

namespace App\Controllers;

use App\Models\Core\Controller;
use App\Models\Order;
use App\Models\Core\SessionSys;
use App\Models\Core\Redirect;
use App\Models\Core\Request;

class OrderController extends Controller
{
    protected $location = 'backend/orders/';
    private $order;

    function __construct()
    {
        $this->order = new Order;
    }


    /**
     * call index view
     * @return Product $data
     */
    public function index()
    {
        $data = $this->order->get();
        SessionSys::setNew(["data" => $data]);
        return $this->view('index.php');
    }

    /**
     * call checks view
     */
    public function checks()
    {
        $data = $this->order->get();
        SessionSys::setNew(["data" => $data]);
        return $this->view('checks.php');
    }


    /**
     * return Create view
     */
    public function create()
    {
    }


    /**
     * Store new row into product
     * @param Request $req
     * @return void
     */
    public function store(Request $req)
    {
    }


    /**
     * edit row into category
     * @param Request $req .. contains $id
     * @return Category $data
     */
    public function edit(Request $req)
    {
    }


    /**
     * do update
     * @param Request $req .. conatains $id
     */
    public function update(Request $req)
    {
    }

    /**
     * delete row
     * @param Request $req .. contains $id
     */
    public function delete(Request $req)
    {
        //remove all products
        $this->order->delete($req->inputs['id']);
        Redirect::back();
    }

    public function viewOrder(Request $req)
    {
        $id = $req->inputs["id"];
        $view_order = $this->order->find($id);
        SessionSys::setNew(['data' => $view_order]);
        $this->view("view.php");
    }
}
