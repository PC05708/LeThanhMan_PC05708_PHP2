<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends BaseController
{

    private $_renderBase;
    private $_model;
    private $_product;
    private $_idCategoryDefault = 7;

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
            header("Location: ?url=CategoryController/index");
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
    function delete()
    {
        if (isset($_GET['id']) && $_GET['id'] == $this->_idCategoryDefault) {
            $data['err'] = "KHÔNG THỂ XÓA DANH MỤC MẶC ĐỊNH!";
            $this->_renderBase->renderHeader();
            $this->load->render('layouts/categories/delete', $data);
            $this->_renderBase->renderFooter();
        } else {
            if (isset($_GET['id'])) {

                // dddang sua casjkfashjaksch owr day
                $this->_model->deleteCategory($_GET['id']);
                header("Location: ?url=CategoryController/index");
                exit();
            }
        }
    }
}
