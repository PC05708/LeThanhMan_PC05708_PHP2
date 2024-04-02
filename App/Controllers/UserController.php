<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use  App\Models\User;

class UserController extends BaseController
{

    private $_renderBase;
    private $_model;

    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new BaseRender();
        $this->_model = new User();
    }


    function index()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model     
        $data = $this->_model->getAllUser();
        $this->_renderBase->renderHeader();
        $this->load->render('layouts/user/index', $data);
        $this->_renderBase->renderFooter();
    }

    function detail($id)
    {
        // dữ liệu ở đây lấy từ repositories hoặc model

    }
    function create()
    {
        $data = [];
        if (isset($_POST['add'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $data = [
                "name" => $name,
                "email" => $email,
                "pass" => $pass
            ];
            $this->_model->createUser($data);
            header("Location: ?url=UserController/index");
            exit();
        }
        $this->_renderBase->renderHeader();
        // $this->load->render('layouts/client/slider');
        $this->load->render('layouts/user/create', $data);
        $this->_renderBase->renderFooter();
    }
    function delete()
    {
        if (isset($_GET['id'])) {
            $this->_model->deleteUser($_GET['id']);
            header("Location: ?url=UserController/index");
            exit();
        }
    }
    function update()
    {
        $data = [];
        if (isset($_GET['id'])) {
            $data = $this->_model->getOne($_GET['id']);
        }
        if (isset($_POST['update']) && isset($_GET['id'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $data = [
                "name" => $name,
                "email" => $email,
                "pass" => $pass
            ];
            $this->_model->updateUser($_GET['id'], $data);
            header("Location: ?url=UserController/index");
            exit();
        }
        $this->_renderBase->renderHeader();
        // $this->load->render('layouts/client/slider');
        $this->load->render('layouts/user/update', $data);
        $this->_renderBase->renderFooter();
    }
}
