<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableFood extends Migration
{
    public function up()
    {
        if (!$this->db->tableExists('food')) {
            $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'auto_increment' => true,
                ],
                'food_title' => [
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                ],
                'food_category_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ]
            ]);
            $this->forge->addPrimaryKey('id');
            $this->forge->addForeignKey('food_category_id', 'food_category', 'id', 'CASCADE', 'CASCADE');
            $this->forge->createTable('food');
        }
    }

    public function down()
    {
        $this->forge->dropTable('food');
    }
}
