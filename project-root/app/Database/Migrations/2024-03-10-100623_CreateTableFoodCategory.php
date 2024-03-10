<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableFoodCategory extends Migration
{
    public function up()
    {
        if (!$this->db->tableExists('food_category')) {
            $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'auto_increment' => true,
                ],
                'category_name' => [
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                ]
            ]);
            $this->forge->addPrimaryKey('id');
            $this->forge->createTable('food_category');
        }
    }

    public function down()
    {
        $this->forge->dropTable('food_category');
    }
}
