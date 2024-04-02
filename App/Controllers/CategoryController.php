<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use  App\Models\Category;

class CategoryController extends BaseController
{

    private $_renderBase;
    private $_model;

    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new BaseRender();
        $this->_model = new Category();
    }


    function index()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model     
        $data = $this->_model->getAll();
        $this->_renderBase->renderHeader();
        $this->load->render('layouts/categories/index', $data);
        $this->_renderBase->renderFooter();
    }
    function create()
    {
        $data = [];
        if (isset($_POST['add'])) {
            $name = $_POST['name'];
            $data = [
                "name" => $name
            ];
            $this->_model->create($data);
            header("Location: ?url=UserController/index");
            exit();
        }
        $this->_renderBase->renderHeader();
        $this->load->render('layouts/categories/create', $data);
        $this->_renderBase->renderFooter();
    }
    function update()
    {
        $data = [];
        $this->_renderBase->renderHeader();
        $this->load->render('layouts/categories/update', $data);
        $this->_renderBase->renderFooter();
    }
}
