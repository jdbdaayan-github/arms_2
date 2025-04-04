<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DirectoratesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'code'        => 'CO',
                'name'        => 'Central Office',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'code'        => 'NCR',
                'name'        => 'National Capital Region',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'code'        => 'CAR',
                'name'        => 'Cordillera Administrative Region',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'code'        => 'I',
                'name'        => 'Ilocos Region',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'code'        => 'II',
                'name'        => 'Cagayan Valley',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'code'        => 'III',
                'name'        => 'Central Luzon',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'code'        => 'IV-A',
                'name'        => 'CALABARZON',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'code'        => 'IV-B',
                'name'        => 'MIMAROPA',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'code'        => 'V',
                'name'        => 'Bicol Region',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'code'        => 'VI',
                'name'        => 'Western Visayas',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'code'        => 'VII',
                'name'        => 'Central Visayas',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'code'        => 'VIII',
                'name'        => 'Eastern Visayas',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'code'        => 'IX',
                'name'        => 'Zamboanga Peninsula',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'code'        => 'X',
                'name'        => 'Northern Mindanao',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'code'        => 'XI',
                'name'        => 'Davao Region',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'code'        => 'XII',
                'name'        => 'SOCCSKSARGEN',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'code'        => 'Caraga',
                'name'        => 'Caraga',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
        ];

        // Insert data into the directorates table
        $this->db->table('directorates')->insertBatch($data);
    }
}
