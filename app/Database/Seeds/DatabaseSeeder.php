<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(RolesSeeder::class);
        $this->call(StatusesSeeder::class);
        $this->call(DirectoratesSeeder::class);
        $this->call(OfficesSeeder::class);
        $this->call(PermissionsSeeder::class);
    }
}
