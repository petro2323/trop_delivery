<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUserType extends Migration
{
    public function up()
    {
        if (!$this->db->tableExists('user_type')) {
            $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'auto_increment' => true,
                ],
                'type' => [
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                ]
            ]);
            $this->forge->addPrimaryKey('id');
            $this->forge->createTable('user_type');
        }
    }

    public function down()
    {
        $this->forge->dropTable('user_type');
    }
}
