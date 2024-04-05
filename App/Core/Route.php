<?php

namespace App\Core;

class Route
{
    public $url;
    public $nameController = "HomeController";
    public $nameMethod = "homePage";
    public $path = 'App/Controllers/';
    public $controller;
    function __construct()
    {
        $this->request();
        $this->renderController();
        $this->renderMethod();
    }
    function request()
    {
        $this->url = isset($_GET['url']) ? $_GET['url'] : null;

        if ($this->url != null) {
            $this->url = rtrim($this->url, '/');
            $this->url = explode('/', filter_var($this->url, FILTER_SANITIZE_URL));
        } else {
            unset($this->url);
        }
    }

    function renderController()
    {
        session_start();
        if (empty($_SESSION['user']) && $this->url[0] != 'AuthController') {
            header('Location:' . ROOT_URL . '?url=AuthController');
            $this->renderDefault();
        } elseif (!empty($_SESSION['user']) && $this->url[0] == 'AuthController') {
            header('Location:' . ROOT_URL);
            $this->renderDefault();
        } else {
            $this->renderDefault();
        }
    }
    function renderDefault()
    {
        if (!isset($this->url[0])) {
            $className        = $this->path . $this->nameController;
            $className        = preg_replace("~\/~", "\\", $className);
            // Trong hàm renderController()
            if (class_exists($className)) {
                $this->controller = new $className;
                if (method_exists($this->controller, 'homePage')) {
                    $this->controller->homePage();
                } else {
                    // Xử lý khi phương thức homePage() không tồn tại
                    header('Location:' . ROOT_URL . '?url=HomeController/Error');
                }
            } else {
                // Xử lý khi class controller không tồn tại
                header('Location:' . ROOT_URL . '?url=HomeController/Error');
            }
        } else {
            $this->nameController = $this->url[0];
            $file                 = __DIR__ . '/../Controllers/' . $this->nameController . '.php';
            if (file_exists($file)) {
                require_once $file;
                $className        = $this->path . $this->nameController;
                $className        = preg_replace("~\/~", "\\", $className);
                if (class_exists($className)) {
                    $this->controller = new $className;
                } else {
                    header('Location:' . ROOT_URL . '?url=HomeController/Error');
                }
            } else {

                header('Location:' . ROOT_URL . '?url=HomeController/Error');
            }
        }
    }
    function renderMethod()
    {
        if (isset($this->url[2])) {
            $this->nameMethod = $this->url[1];
            // Kiểm tra xem có tồn tại method vừa gán
            if (method_exists($this->controller, $this->nameMethod)) {
                $this->controller->{$this->nameMethod}($this->url[2]);
            } else {
                header('Location:' . ROOT_URL . '?url=HomeController/Error');
            }
        } else {
            // kiểm tra hàm có tồn tại hàm không có tham số 
            if (isset($this->url[1])) {
                $this->nameMethod = $this->url[1];
                // Kiểm tra xem có tồn tại method vừa gán
                if (method_exists($this->controller, $this->nameMethod)) {
                    $this->controller->{$this->nameMethod}();
                } else {
                    header('Location:' . ROOT_URL . '?url=HomeController/Error');
                }
            }
        }
    }
}
