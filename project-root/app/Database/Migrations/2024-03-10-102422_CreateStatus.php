<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStatus extends Migration
{
    public function up()
    {
        if (!$this->db->tableExists('status')) {
            $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'auto_increment' => true,
                ],
                'text' => [
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                ]
            ]);
            $this->forge->addPrimaryKey('id');
            $this->forge->createTable('status');
        }
    }

    public function down()
    {
        $this->forge->dropTable('status');
    }
}
