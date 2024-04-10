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
        $data = [];
        if (isset($_GET['search'])) {
            $data = $this->_model->searchByName($_GET['search']);
        } else {
            if (isset($_POST['orderBy'])) {
                $orderBy = $_POST['orderBy'];
                $data = $this->_model->orderBy($orderBy);
            } else {
                $data = $this->_model->getAllProductsWithCategoryName();
            }
        }
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
