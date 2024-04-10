<?php

namespace App\Models;

use App\Interfaces\CrudInterface;
use App\Models\Database;
use PDO;

abstract class BaseModel implements CrudInterface
{

    protected $table;
    private $_connection;

    private $_query;

    public function __construct()
    {
        $this->_connection = new Database();
    }

    public function getAll()
    {
        $this->_query = "SELECT * FROM $this->table ";

        // return $this;

        $stmt   = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function conditionalTake($column, $value)
    {
        $this->_query = "SELECT * FROM $this->table WHERE $column = :value";
        $stmt = $this->_connection->PDO()->prepare($this->_query);
        $stmt->execute(['value' => $value]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getOne(int $id)
    {
        $this->_query = "SELECT * FROM $this->table WHERE id=$id";
        $stmt   = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function create(array $data)
    {
        // Loại bỏ cột 'id' nếu nó là cột tự tăng
        if (isset($data['id'])) {
            unset($data['id']);
        }

        // Tạo các phần của câu truy vấn SQL
        $columns = implode(', ', array_map(function ($column) {
            return "`$column`";
        }, array_keys($data)));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));

        // Tạo câu truy vấn SQL hoàn chỉnh
        $query = "INSERT INTO $this->table ($columns) VALUES ($placeholders)";

        // Chuẩn bị và thực thi câu truy vấn SQL
        $stmt = $this->_connection->PdO()->prepare($query);

        // Thực hiện gán các giá trị vào các placeholder
        $index = 1;
        foreach ($data as $value) {
            $stmt->bindValue($index++, $value);
        }

        // Thực thi câu truy vấn và trả về kết quả
        return $stmt->execute();
    }


    public function update(int $id, array $data)
    {
        $this->_query = "UPDATE $this->table SET ";
        foreach ($data as $key => $value) {
            $this->_query .= "$key = '$value', ";
        }
        $this->_query = rtrim($this->_query, ", ");
        $this->_query .= " WHERE id=$id";
        $stmt = $this->_connection->PdO()->prepare($this->_query);
        return $stmt->execute();
    }
    public function delete(int $id): bool
    {
        $this->_query = "DELETE FROM $this->table WHERE id=$id";

        $stmt   = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();
        $affected_rows = $stmt->rowCount();
        return $affected_rows;
    }


    // public function orderBy(string $order = 'ASC')
    // {
    //     $this->_query = $this->_query . "order by " . $order;

    //     return $this;
    // }

    // public function get()
    // {
    //     $stmt   = $this->_connection->PdO()->prepare($this->_query);
    //     $stmt->execute();

    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }


    // public function limit(int $limit = 10)
    // {
    //     $stmt   = $this->_connection->PdO()->prepare($this->_query);
    //     $result = $stmt->execute();

    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }



}
