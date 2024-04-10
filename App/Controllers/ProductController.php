<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use App\Models\Product;
use App\Models\Category;

class ProductController extends BaseController
{

    private $_renderBase;
    private $_model;
    private $_category;


    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new BaseRender();
        $this->_model = new Product();
        $this->_category = new Category();
    }


    function index()
    {
        $data = $this->_model->getAllProductsWithCategoryName();
        // dữ liệu ở đây lấy từ repositories hoặc model
        $this->_renderBase->renderHeader();
        $this->load->render('layouts/product/index', $data);
        $this->_renderBase->renderFooter();
    }
    function create()
    {
        $data['categories'] = $this->_category->getAll();
        $data['err'] = [];
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
            $check = true;
            // Kiểm tra và xử lý các trường dữ liệu được gửi từ form
            $name = $_POST['name'] ?? '';
            $price = $_POST['price'] ?? '';
            $category_id = $_POST['category_id'] ?? '';
            $date_create = $_POST['date_create'] ?? '';
            $quantity = $_POST['quantity'] ?? '';
            $note = $_POST['note'] ?? '';

            // Kiểm tra sự tồn tại của file và lỗi khi tải lên
            if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
                $targetDir = "public/uploads/img/" . date('Y') . '/';
                // Tạo thư mục nếu nó không tồn tại
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0777, true);
                }
                // Lấy thông tin về file
                $fileName = basename($_FILES["image"]["name"]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                // Kiểm tra phần mở rộng của file
                $allowedExtensions = array("jpg", "jpeg", "png", "gif");
                if (in_array($fileType, $allowedExtensions)) {
                    // Di chuyển file tải lên vào thư mục đích
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                        // Thực hiện các thao tác khác sau khi upload thành công
                        $data['err']['img'] = "Upload ảnh thành công!";
                    } else {
                        $data['err']['img'] = "Có lỗi khi tải lên ảnh!";
                    }
                } else {
                    $data['err']['img'] = "Chỉ chấp nhận file có định dạng JPG, JPEG, PNG hoặc GIF!";
                }
            } else {
                $data['err']['img'] = "Vui lòng chọn file ảnh!";
            }

            // Kiểm tra các trường bắt buộc
            if (empty($name)) {
                $data['err']['name'] = "Vui lòng nhập tên sản phẩm!";
                $check = false;
            }
            if (empty($price)) {
                $data['err']['price'] = "Vui lòng nhập giá sản phẩm!";
                $check = false;
            }
            if (empty($category_id)) {
                $data['err']['category_id'] = "Vui lòng chọn danh mục sản phẩm!";
                $check = false;
            }
            if (empty($date_create)) {
                $data['err']['date_create'] = "Vui lòng nhập ngày nhập hàng!";
                $check = false;
            }
            if (empty($quantity)) {
                $data['err']['quantity'] = "Vui lòng nhập số lượng hàng!";
                $check = false;
            }
            if (empty($note)) {
                $data['err']['note'] = "Vui lòng nhập mô tả sản phẩm!";
                $check = false;
            }

            if ($check) {
                // Nếu tất cả các trường hợp đều hợp lệ, thêm sản phẩm và chuyển hướng
                $data['content'] = [
                    "name" => trim($name),
                    "price" => trim($price),
                    "id_category" => trim($category_id),
                    "date_create" => trim($date_create),
                    "quantity" => trim($quantity),
                    "desc" => trim($note),
                    "img" => trim($targetFilePath)
                ];
                $this->_model->createProduct($data['content']);
                header("Location: ?url=ProductController/index");
                exit();
            }
        }
        // Hiển thị form và dữ liệu lỗi (nếu có)
        $this->_renderBase->renderHeader();
        $this->load->render('layouts/product/create', $data);
        $this->_renderBase->renderFooter();
    }


    function detail()
    {
        $data = $this->_model->getOneProductsWithCategoryName($_GET['id']);
        $this->_renderBase->renderHeader();
        $this->load->render('layouts/product/detail', $data);
        $this->_renderBase->renderFooter();
    }
    function update()
    {
        $data = $this->_model->getOne($_GET['id']);
        $this->_renderBase->renderHeader();
        $this->load->render('layouts/product/update', $data);
        $this->_renderBase->renderFooter();
    }
    function delete()
    {
        if (isset($_GET['id'])) {
            $this->_model->deleteProduct($_GET['id']);
            header("Location: ?url=ProductController/index");
            exit();
        }
    }
}
