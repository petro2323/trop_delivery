<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUsers extends Migration
{
    public function up()
    {
        if(!$this->db->tableExists('users')) {
            $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'auto_increment' => true
                ],
                'first_name' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255
                ],
                'last_name' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255
                ],
                'email' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255
                ],
                'username' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255
                ],
                'password' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255
                ],
                'user_type_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ]
            ]);
            
            $this->forge->addPrimaryKey('id');
            $this->forge->addForeignKey('user_type_id', 'user_type', 'id');
            $this->forge->createTable('users');
        }
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
