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
    public function getOneProductsWithCategoryName($id)
    {
        $query = "SELECT products.*, categories.name AS category_name
        FROM $this->table
        JOIN categories ON products.id_category = categories.id WHERE products.id = $id";
        $stmt = $this->_connection->PdO()->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
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

    public function createProduct($data)
    {
        return $this->create($data);
    }
}
