<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use App\Models\Product;

class ProductController extends BaseController
{

    private $_renderBase;
    private $_model;


    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new BaseRender();
        $this->_model = new Product();
    }


    function index()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model
        $data = $this->_model->getAllProductsWithCategoryName();
        $this->_renderBase->renderHeader();
        $this->load->render('layouts/product/index', $data);
        $this->_renderBase->renderFooter();
    }
    function create()
    {
        $data = [];
        $this->_renderBase->renderHeader();
        $this->load->render('layouts/product/create', $data);
        $this->_renderBase->renderFooter();
    }
    function detail()
    {
        $data = $this->_model->getOneProductsWithCategoryName($_GET['id']);
        $this->_renderBase->renderHeader();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->render('layouts/product/detail', $data);
        $this->_renderBase->renderFooter();
    }
    function delete()
    {
        if (isset($_GET['id'])) {
            $this->_model->deleteProduct($_GET['id']);
            header("Location: ?url=ProductController/index");
            exit();
        }
    }
}
