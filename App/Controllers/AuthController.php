<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;

class AuthController extends BaseController
{
    private $_renderBase;
    private $_model;
    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new BaseRender();
    }


    function login()
    {
        $data = [];
        $this->_renderBase->renderHeader();
        $this->load->render('layouts/login', $data);
        $this->_renderBase->renderFooter();
    }
    function register()
    {
        $data = [];
        $this->_renderBase->renderHeader();
        $this->load->render('layouts/register', $data);
        $this->_renderBase->renderFooter();
    }
    function forgetAccount($id)
    {
        // dữ liệu ở đây lấy từ repositories hoặc model
    }
}
