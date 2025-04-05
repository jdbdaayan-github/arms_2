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

        return $this->select('users.*, offices.code as office_code, statuses.name as status_name, GROUP_CONCAT(roles.role_name) as role_names')
                    ->join('offices', 'offices.id = users.office_id')
                    ->join('statuses', 'statuses.id = users.status_id')
                    ->join('user_roles', 'user_roles.user_id = users.id')  // Join user_roles to link users to their roles
                    ->join('roles', 'roles.id = user_roles.role_id')  // Join roles to fetch the role names
                    ->groupBy('users.id')  // Group by user to ensure roles are combined for each user
                    ->orderBy('lastname', 'asc')
                    ->findAll();
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
