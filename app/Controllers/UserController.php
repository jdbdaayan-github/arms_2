<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function index()
    {
        return view("pages/users/userlist");
    }

    public function getUsersData()
    {
        // Create an instance of the UserModel
        $userModel = new UserModel();

        // Fetch the user data (you can add joins, filters, etc., as per your requirements)
        $users = $userModel->getUsers();

        // Prepare the data to be returned in JSON format
        $data = [];

        foreach ($users as $user) {
            $roleBadges = '';
            if (!empty($user['role_names'])) {
                $roles = explode(',', $user['role_names']);  // Assuming roles are separated by a comma
                foreach ($roles as $role) {
                    $roleBadges .= '<span class="badge badge-primary mr-1">' . esc($role) . '</span>';
                }
            } else {
                $roleBadges = '<span class="badge badge-secondary">N/A</span>';
            }

            $data[] = [
                'full_name'  => esc($user['lastname']) . ', ' . esc($user['firstname']) . ' ' . esc($user['middlename']),
                'email'      => esc($user['email']),
                'username'   => esc($user['username']),
                'role'       => $roleBadges,
                'office'     => esc($user['office_code']),
                'status'     => esc($user['status_name']),
                'verified'   => $user['verified'] 
                ? '<span class="badge badge-success">Yes</span>' 
                : '<span class="badge badge-secondary">No</span>',
                'actions'    => '<div class="btn-group text-center">'
                           . '<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" title="Actions">'
                           . '<i class="fas fa-cogs"></i> Actions</button>'
                           . '<div class="dropdown-menu">'
                           . '<a href="' . base_url('users/view/' . $user['id']) . '" class="dropdown-item"><i class="fas fa-eye"></i> View</a>'
                           . '<a href="' . base_url('users/edit/' . $user['id']) . '" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>'
                           . '<a href="' . base_url('users/reset-password/' . $user['id']) . '" class="dropdown-item"><i class="fas fa-key"></i> Reset Password</a>'
                            . '<a href="' . base_url('users/reset-attempts/' . $user['id']) . '" class="dropdown-item"><i class="fas fa-redo"></i> Reset Attempts</a>'
                            . '<a href="#" class="dropdown-item text-danger delete-btn" data-toggle="tooltip" title="Delete user" data-user-id="' . $user['id'] . '" data-user-name="' . esc($user['lastname']) . ', ' . esc($user['firstname']) . ' ' . esc($user['middlename']) . '"><i class="fas fa-trash-alt"></i> Delete</a>'
                            . '</div></div>'
                ];
        }

        // Return the data in JSON format
        return $this->response->setJSON(['data' => $data]);
    }
}
