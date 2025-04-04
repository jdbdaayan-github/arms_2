<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDirectoratesTable extends Migration
{
    public function up()
    {
        // Create the 'directorates' table with timestamps
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'code'          => ['type' => 'VARCHAR', 'constraint' => '100'],
            'name'          => ['type' => 'VARCHAR', 'constraint' => '100'],
            'description'   => ['type' => 'TEXT', 'null' => true],  // Optional description for the directorate
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
            'updated_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('directorates');
    }

    public function down()
    {
        // Drop the 'directorates' table
        $this->forge->dropTable('directorates');
    }
}
