<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserFood extends Migration
{
    public function up()
    {
        if (!$this->db->tableExists('user_food')) {
            $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'auto_increment' => true,
                ],
                'user_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'food_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ]
            ]);
            $this->forge->addPrimaryKey('id');
            $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
            $this->forge->addForeignKey('food_id', 'food', 'id', 'CASCADE', 'CASCADE');
            $this->forge->createTable('user_food');
        }
    }

    public function down()
    {
        $this->forge->dropTable('user_food');
    }
}
