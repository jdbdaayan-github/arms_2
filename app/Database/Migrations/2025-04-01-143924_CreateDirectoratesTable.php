<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDirectoratesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'   => ['type' => 'INT', 'auto_increment' => true, 'unsigned' => true],
            'code' => ['type' => 'VARCHAR', 'constraint' => '100'],
            'name' => ['type' => 'VARCHAR', 'constraint' => '100'],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('directorates');
    }

    public function down()
    {
        $this->forge->dropTable('directorates');
    }
}
