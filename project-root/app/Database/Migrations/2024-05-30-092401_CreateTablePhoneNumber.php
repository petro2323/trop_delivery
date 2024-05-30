<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePhoneNumber extends Migration
{
    public function up()
    {
        if (!$this->db->tableExists('phone_number')) {
            $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'auto_increment' => true
                ],
                'user_number' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255
                ]
            ]);

            $this->forge->addPrimaryKey('id');
            $this->forge->createTable('phone_number');
        }
    }

    public function down()
    {
        $this->forge->dropTable('phone_number');
    }
}
