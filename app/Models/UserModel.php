<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['firstname', 'middlename', 'lastname', 'extension', 'email', 'office_id', 'username', 'password','status_id', 'verified', 'login_attempts'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getUsers()
    {
        return $this->findAll();
    }

    public function getUserById($id)
    {
        return $this->find($id);
    }

    public function addUser($data)
    {
        return $this->insert($data);
    }
}
