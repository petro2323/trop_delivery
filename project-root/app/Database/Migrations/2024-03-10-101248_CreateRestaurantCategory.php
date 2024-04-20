<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRestaurantCategory extends Migration
{
    public function up()
    {
        if (!$this->db->tableExists('restaurant_category')) {
            $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'auto_increment' => true,
                ],
                'name' => [
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                ]
            ]);
            $this->forge->addPrimaryKey('id');
            $this->forge->createTable('restaurant_category');
        }
    }

    public function down()
    {
        $this->forge->dropTable('restaurant_category');
    }
}
