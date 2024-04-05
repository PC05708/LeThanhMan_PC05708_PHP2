<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use  App\Models\User;

class AuthController extends BaseController
{
    private $_renderBase;
    private $_model;
    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new BaseRender();
        $this->_model = new User();
    }


    function login()
    {
        session_start();
        $data = [];
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $data['content'] = $this->_model->getUserByEmail($email);
            if (empty($data['content'])) {
                $data['err'] = "Email không tồn tại! hoặc mật khẩu chưa đúng!";
            } else {
                if (password_verify($password, $data['content']['pass'])) {
                    $_SESSION['user'] = $data['content']['name'];
                    header("Location:?url=HomeController/homePage");
                    exit();
                } else {
                    $data['err'] = "Email không tồn tại! hoặc mật khẩu chưa đúng!";
                }
            }
        }
        $this->_renderBase->renderHeader();
        $this->load->render('layouts/Auth/login', $data);
        $this->_renderBase->renderFooter();
    }
    function register()
    {
        $data = [];
        $this->_renderBase->renderHeader();
        $this->load->render('layouts/Auth/register', $data);
        $this->_renderBase->renderFooter();
    }
    function forgetPass($id)
    {
        $data = [];
        $this->_renderBase->renderHeader();
        $this->load->render('layouts/Auth/forgetPass', $data);
        $this->_renderBase->renderFooter();
    }
    function logout()
    {
        session_start();
        unset($_SESSION['user']);
        header('Location: /?url=AuthController/login');
        exit();
    }
}
