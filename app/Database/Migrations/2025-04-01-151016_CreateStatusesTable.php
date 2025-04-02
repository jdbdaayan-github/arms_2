<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStatusesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'   => ['type' => 'INT', 'auto_increment' => true, 'unsigned' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => '100'],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('statuses');
    }

    public function down()
    {
        $this->forge->dropTable('statuses');
    }
}
