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


    public function getOne(int $id)
    {
        $this->_query = "SELECT * FROM $this->table WHERE id=$id";

        $stmt   = $this->_connection->PdO()->prepare($this->_query);


        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function create(array $data)
    {
        $this->_query = "INSERT INTO $this->table (";
        foreach ($data as $key => $value) {
            $this->_query .= "$key, ";
        }
        $this->_query = rtrim($this->_query, ", ");

        $this->_query .=   " ) VALUES (";
        foreach ($data as $key => $value) {
            $this->_query .= "'$value', ";
        }
        $this->_query = rtrim($this->_query, ", ");

        $this->_query .= ")";

        $stmt = $this->_connection->PdO()->prepare($this->_query);

        return $stmt->execute();
        // return $stmt;
    }
    public function update(int $id, array $data)
    {
        // $data=[
        //     'name'=> $name,
        //     'status'=> $status,
        //     'description'=> $description
        // ];

        // $this->_query = "UPDATE $this->table SET name='$name',status='$status' WHERE id=$id";


        // tạo câu truy vấn
        $this->_query = "UPDATE $this->table SET ";
        foreach ($data as $key => $value) {
            $this->_query .= "$key = '$value', ";
        }
        $this->_query = rtrim($this->_query, ", ");

        $this->_query .= " WHERE id=$id";

        //    $sql .= " WHERE ";
        //    foreach ($conditions as $key => $value) {
        //        $sql .= "$key = :$key AND ";
        //    }
        //    $sql = rtrim($sql, "AND ");

        // chuẩn bị câu truy vấn
        $stmt = $this->_connection->PdO()->prepare($this->_query);

        // bind các giá trị
        // foreach ($data as $key => $value) {
        //     $stmt->bindValue(":$key", $value);
        // }
        //    foreach ($conditions as $key => $value) {
        //        $stmt->bindValue(":$key", $value);
        //    }

        // return $stmt;
        // thực hiện câu truy vấn
        return $stmt->execute();
        // return $this->_query;
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
