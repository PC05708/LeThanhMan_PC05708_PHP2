<?php

namespace App\Models;

use App\Models\Database;
use App\Models\Category;

use PDO;

class Product extends BaseModel
{

    protected $table = 'products';
    private $_connection;

    public function __construct()
    {
        parent::__construct();
        $this->_connection = new Database();
    }
    public function getAllProductsWithCategoryName()
    {
        $query = "SELECT products.*, categories.name AS category_name
        FROM $this->table
        JOIN categories ON products.id_category = categories.id";
        $stmt = $this->_connection->PdO()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // nên sắp sếp theo hàm riêng, để khi tìm kiếm vẫn có thể sắp xếp được
    // ví dụ
    //     // Mảng các sản phẩm
    // $products = array(
    //     array("id" => 1, "name" => "Product A", "price" => 20),
    //     array("id" => 2, "name" => "Product B", "price" => 15),
    //     array("id" => 3, "name" => "Product C", "price" => 25)
    // );

    // // Hàm sắp xếp mảng sản phẩm theo giá tăng dần
    // function sortByPriceAscending($a, $b) {
    //     return $a['price'] - $b['price'];
    // }

    // // Sắp xếp mảng sản phẩm
    // usort($products, 'sortByPriceAscending');

    // // In ra kết quả
    // foreach ($products as $product) {
    //     echo "Product: " . $product['name'] . ", Price: $" . $product['price'] . "<br>";
    // }

    function searchByName($keyWord)
    {
        if (empty($keyWord)) {
            return [];
        }
        $query = "SELECT * FROM products WHERE name LIKE :search";
        $stmt = $this->_connection->PdO()->prepare($query);
        $searchTerm = '%' . $keyWord . '%';
        $stmt->execute(array(':search' => $searchTerm));

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    function orderBy($orderBy)
    {
        $validOrders = ['price_asc', 'price_desc', 'quantity_asc', 'quantity_desc']; // Các giá trị hợp lệ
        $orderByColumns = [
            'price_asc' => 'price ASC',
            'price_desc' => 'price DESC',
            'quantity_asc' => 'quantity ASC',
            'quantity_desc' => 'quantity DESC'
        ];
        $orderByClause = $orderByColumns[$orderBy];
        $query = "SELECT products.*, categories.name AS category_name
        FROM $this->table
        JOIN categories ON products.id_category = categories.id
        ORDER BY $orderByClause";
        $stmt = $this->_connection->PdO()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOneProductsWithCategoryName($id)
    {
        $query = "SELECT products.*, categories.name AS category_name
        FROM $this->table
        JOIN categories ON products.id_category = categories.id WHERE products.id = $id";
        $stmt = $this->_connection->PdO()->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function countProductsByCategory()
    {
        // Kết nối đến cơ sở dữ liệu và thực hiện truy vấn
        $query = "SELECT c.name AS category_name, COUNT(*) AS product_count 
        FROM products p 
        JOIN categories c ON p.id_category = c.id 
        GROUP BY p.id_category;
        ";
        $stmt = $this->_connection->PdO()->prepare($query);
        $stmt->execute();
        // Lấy kết quả từ truy vấn
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateProductWhere($column, $value, $whereValue)
    {
        // Chuẩn bị câu truy vấn
        $query = "UPDATE products SET $column = :value WHERE $column = :whereValue";

        // Chuẩn bị các giá trị để truyền vào câu truy vấn
        $params = array(':value' => $value, ':whereValue' => $whereValue);

        // Chuẩn bị và thực thi câu lệnh
        $stmt = $this->_connection->PdO()->prepare($query);
        return $stmt->execute($params);
    }

    public function getAllProduct()
    {
        return $this->getAll();
    }
    public function getOneProduct($id)
    {
        return $this->getOne($id);
    }

    public function updateProduct($id, $data)
    {
        return $this->update($id, $data);
    }
    public function deleteProduct($id)
    {
        return $this->delete($id);
    }
    public function getProductByIdCategory($id)
    {
        return $this->conditionalTakeAll("id_category", $id);
    }
    public function createProduct($data)
    {
        return $this->create($data);
    }
}
