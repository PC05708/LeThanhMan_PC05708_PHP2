<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use App\Models\User;
use App\Core\Mail;
use DateTime;

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
        $data['err']['name'] = "";
        if (isset($_POST['register'])) {
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
                header("Location: ?url=AuthController/login");
                exit();
            }
        }
        $this->_renderBase->renderHeader();
        $this->load->render('layouts/Auth/register', $data);
        $this->_renderBase->renderFooter();
    }
    function forgetPass()
    {
        $data = [];
        if (isset($_POST['resetPass'])) {
            $email = $_POST['email'];
            $data['content'] = $this->_model->getUserByEmail($email);
            $data['err'] = [];
            if (empty($data['content'])) {
                $data['err'] = "Email không tồn tại! hoặc mật khẩu chưa đúng!";
            } else {
                $_SESSION['OTP']['mail'] = $email;
                header('Location: /?url=AuthController/confirmOTP');
                exit();
            }
        }
        $this->_renderBase->renderHeader();
        $this->load->render('layouts/Auth/forgetPass', $data);
        $this->_renderBase->renderFooter();
    }

    function confirmOTP()
    {
        session_start();
        $data = [];
        $data['content'];
        if (isset($_POST['confirmOTP']) && !empty($_SESSION['OTP']['mail'])) {
            // Xử lý xác nhận OTP ở đây
            $data['content'] = $this->_model->getUserByEmail($_SESSION['OTP']['mail']);
            $OTP = $_POST['OTP'];
            $newPass = $_POST['pass'];
            if ($OTP == $_SESSION['OTP']['value']) {
                $data['content']['pass'] = password_hash($newPass, PASSWORD_DEFAULT);
                $this->_model->updateUser($data['content']['id'], $data['content']);
                unset($_SESSION['OTP']);
                header("Location:?url=AuthController/login");
                exit();
            } else {
                $data['err'] = "OTP không đúng! hoặc đã quá hạn!";
            }
        } elseif (!isset($_SESSION['OTP']['mail'])) {
            header('Location: /?url=AuthController/forgetPass');
            exit();
        }

        // Gửi email sau khi đã xử lý xác nhận OTP
        if (isset($_POST['sendOTP'])) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            if (!isset($_SESSION['lastButtonClick']) || (time() - $_SESSION['lastButtonClick'] >= 30)) {
                $_SESSION['lastButtonClick'] = time();
                $_SESSION['OTP']['value'] = rand(100000, 999999);
                $senderName = "PC05708 - PHP 2";
                $senderEmail = "manltpc05708@fpt.edu.vn";
                $senderEmailPassword = "gxtm vuxn jeri fwxd";
                $recieverEmail = $_SESSION['OTP']['mail'];
                $subject = "Mã thay đổi mật khẩu!";
                $body = "Mã thay đổi mật khẩu của bạn là: <strong>" . $_SESSION['OTP']['value'] . "</strong>";

                $mailer = new Mail($senderName, $senderEmail, $senderEmailPassword);
                $mailer->sendMail($recieverEmail, $subject, $body);
            } else {
                $countDown = 30 - (time() - $_SESSION['lastButtonClick']);
                $data['time'] = "Còn " . $countDown . "s nữa mới có thể gửi lại"; // Không cho phép nhấn nút
            }
        }
        $this->_renderBase->renderHeader();
        $this->load->render('layouts/Auth/confirmOTP', $data);
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
