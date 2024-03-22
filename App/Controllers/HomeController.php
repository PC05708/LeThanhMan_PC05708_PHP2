<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;

class HomeController extends BaseController
{

    private $_renderBase;

    /**
     * Thuốc trị đau lưng
     * Copy lại là hết đau lưng
     * 
     */
    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new BaseRender();
    }

    function HomeController()
    {
        $this->homePage();
    }

    function homePage()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model
        $data = [
            "products" => [
                [
                    "id" => 1,
                    "name" => "Sản phẩm"
                ]
            ]
        ];


        $this->_renderBase->renderHeader();
        // $this->load->render('layouts/client/slider');
        $this->load->render('layouts/product/index', $data);
        $this->_renderBase->renderFooter();
    }

    function detail($id)
    {
        // dữ liệu ở đây lấy từ repositories hoặc model

    }
}
