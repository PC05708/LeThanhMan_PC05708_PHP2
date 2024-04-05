<?php

namespace App\Models;



class User extends BaseModel
{
    protected $table = 'users';

    public function getAllUser()
    {
        return $this->getAll();
    }
    public function getOneUser($id)
    {
        return $this->getOne($id);
    }
    public function getUserByEmail($email)
    {
        return $this->conditionalTake("email", $email);
    }

    public function updateUser($id, $data)
    {
        return $this->update($id, $data);
    }
    public function deleteUser($id)
    {
        return $this->delete($id);
    }
    public function createUser($data)
    {
        return $this->create($data);
    }
}
