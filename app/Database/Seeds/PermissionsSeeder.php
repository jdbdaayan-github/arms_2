<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['permission_name' => 'view_users',       'description' => 'Can view user list'],
            ['permission_name' => 'create_users',     'description' => 'Can create a user'],
            ['permission_name' => 'edit_users',       'description' => 'Can edit a user'],
            ['permission_name' => 'delete_users',     'description' => 'Can delete a user'],
            ['permission_name' => 'view_directorates','description' => 'Can view directorates'],
            ['permission_name' => 'create_directorates','description' => 'Can create a directorate'],
            ['permission_name' => 'edit_directorates','description' => 'Can edit a directorate'],
            ['permission_name' => 'delete_directorates','description' => 'Can delete a directorate'],
        ];

        $this->db->table('permissions')->insertBatch($data);

    }
}
