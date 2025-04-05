<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RoleModel;
use CodeIgniter\HTTP\ResponseInterface;

class RoleController extends BaseController
{
    public function index()
    {
        return view("pages/roles/rolelist");
    }

    public function getRolesData()
    {
        $roles_model = new RoleModel();
        // Fetch roles data
        $roles = $roles_model->getRoles();

        // Prepare data for DataTables (AJAX)
        $data = [];
        foreach ($roles as $role) {
            $data[] = [
                'role_name' => $role['role_name'],
                'description' => $role['description'],  // Assuming you have a description column
                'actions' => '<button class="btn btn-sm btn-primary edit-btn" data-id="' . $role['id'] . '" data-toggle="tooltip" title="Edit Role">
                 <i class="fas fa-edit"></i>
               </button>
               <button class="btn btn-sm btn-danger delete-btn" data-id="' . $role['id'] . '" data-name="' . $role['role_name'] . '" data-toggle="tooltip" title="Delete Role">
                 <i class="fas fa-trash-alt"></i>
               </button>',
            ];
        }

        // Return the JSON response
        return $this->response->setJSON(['data' => $data]);
    }
}
