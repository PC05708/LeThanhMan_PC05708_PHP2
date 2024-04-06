<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use App\Models\Product;

class HomeController extends BaseController
{

    private $_renderBase;
    private $_model;
    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new BaseRender();
        $this->_model = new Product();
    }

    function HomeController()
    {
        $this->homePage();
    }

    function homePage()
    {
        session_start();
        // dữ liệu ở đây lấy từ repositories hoặc model
        $data = $this->_model->getAllProductsWithCategoryName();
        $this->_renderBase->renderHeader();
        $this->load->render('layouts/home', $data);
        $this->_renderBase->renderFooter();
    }
    function error()
    {
        $this->load->render('layouts/error');
    }
    function detail($id)
    {
    }
}
