<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DirectoratesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'permission_name' => 'view_users',
                'description'     => 'Can view user list',
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ],
            [
                'permission_name' => 'create_users',
                'description'     => 'Can create a user',
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ],
            [
                'permission_name' => 'edit_users',
                'description'     => 'Can edit a user',
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ],
            [
                'permission_name' => 'delete_users',
                'description'     => 'Can delete a user',
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ],
            [
                'permission_name' => 'view_directorates',
                'description'     => 'Can view directorates',
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ],
            [
                'permission_name' => 'create_directorates',
                'description'     => 'Can create a directorate',
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ],
            [
                'permission_name' => 'edit_directorates',
                'description'     => 'Can edit a directorate',
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ],
            [
                'permission_name' => 'delete_directorates',
                'description'     => 'Can delete a directorate',
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ],
        ];

        // Insert data into the directorates table
        $this->db->table('directorates')->insertBatch($data);
    }
}
