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
        $this->_product = new Product();
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
            if (!empty($_POST['name'])) {
                $name = $_POST['name'];
                $data = [
                    "name" => $name
                ];
                $this->_model->create($data);
                header("Location: ?url=CategoryController/index");
                exit();
            } else {
                $data['err']['name'] = "Không được bỏ trống!";
            }
        }
        $this->_renderBase->renderHeader();
        $this->load->render('layouts/categories/create', $data);
        $this->_renderBase->renderFooter();
    }
    function update()
    {
        $data = [];
        if (!empty($_GET['id'])) {
            $data['update'] = $this->_model->getOne($_GET['id']);
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {

                $dataUpdate['name'] = isset($_POST['name']) ? $_POST['name'] : '';

                if (empty($dataUpdate['name'])) {
                    $data['err']['name'] = "Vui lòng nhập tên danh mục";
                } else {
                    $this->_model->updateCategory($_GET['id'], $dataUpdate);
                    header("Location: ?url=CategoryController/index");
                    exit();
                }
            }
        } else {
            $data['err']['404'] = "Không xác định được danh mục cần sửa!";
        }
        // Render header và footer
        $this->_renderBase->renderHeader();
        $this->load->render('layouts/categories/update', $data);
        $this->_renderBase->renderFooter();
    }

    function delete()
    {
        if (isset($_GET['id']) && $_GET['id'] == $this->_idCategoryDefault) {
            $data = $this->_model->getOne($_GET['id']);
            $this->_renderBase->renderHeader();
            $this->load->render('layouts/categories/delete', $data);
            $this->_renderBase->renderFooter();
        } else {
            if (isset($_GET['id'])) {
                // chuyển các sản phẩm trong danh mục hiện tại sang mặc định
                $this->_product->updateProductWhere('id_category', $this->_idCategoryDefault, $_GET['id']);
                // xóa danh mục đã chọn
                $this->_model->deleteCategory($_GET['id']);
                header("Location: ?url=CategoryController/index");
                exit();
            }
        }
    }
}
