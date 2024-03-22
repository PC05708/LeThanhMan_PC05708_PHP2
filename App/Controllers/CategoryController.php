<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use  App\Models\Category;

class CategoryController extends BaseController
{

    private $_renderBase;
    private $_model;

    /**
     * Thuốc trị đau lưng
     * Copy lại là hết đau lưng
     * 
     */
    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new BaseRender();
        $this->_model = new Category();
    }


    function index()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model     
        $data = [];

        $this->_renderBase->renderHeader();
        // $this->load->render('layouts/client/slider');
        $this->load->render('layouts/categories/index', $data);
        $this->_renderBase->renderFooter();
    }

    function detail($id)
    {
        $data = [];
        // dữ liệu ở đây lấy từ repositories hoặc model
        $this->_renderBase->renderHeader();
        // $this->load->render('layouts/client/slider');
        $this->load->render('layouts/categories/detail', $data);
        $this->_renderBase->renderFooter();
    }
    function create()
    {

        if (isset($_POST['add'])) {
            $name = $_POST['name'];
            var_dump($name);
            $data = [
                "name" => $name
            ];
            $this->_model->create($data);
        }
        $this->_renderBase->renderHeader();
        // $this->load->render('layouts/client/slider');
        $this->load->render('layouts/categories/create', $data);
        $this->_renderBase->renderFooter();
    }
}
