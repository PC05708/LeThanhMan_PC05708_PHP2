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
        $data['err']['name'] = "";
        if (isset($_POST['add'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $emailCheck = $this->_model->getUserByEmail($email);
            $pass = $_POST['pass'];
            $pasConfirm = $_POST['pass-confirm'];
            $check = true;
            if (!preg_match('/^[\p{L}0-9\s_-]{1,50}$/u', $name) || empty($name)) {
                // Tên không đúng theo mẫu hoặc rỗng
                $data['err']['name'] = "Tên phải có ít nhất 1 ký tự, không vượt quá 50 ký tự và không chứa ký tự đặc biệt!";
                $check = false; // Đánh dấu là có lỗi
            }
            if (!empty($emailCheck)) {
                $data['err']['email'] = "Email đã tồn tại!";
                $check = false;
            }
            if (empty($pass)) {
                $data['err']['pass'] = "Mật khẩu không được để trống!";
                $check = false;
            }
            if ($pass != $pasConfirm || empty($pasConfirm)) {
                $data['err']['passConfirm'] = "Mật khẩu nhập lại không chính xác!";
                $check = false;
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($email)) {
                $data['err']['email'] = "email không hợp lệ!";
                $check = false;
            }
            $data['content'] = [
                "name" => trim($name),
                "email" => trim($email),
                "pass" => trim($pass)
            ];
            if ($check) {
                $data['content']['pass'] = password_hash($data['content']['pass'], PASSWORD_DEFAULT);
                $this->_model->createUser($data['content']);
                header("Location: ?url=UserController/index");
                exit();
            }
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
