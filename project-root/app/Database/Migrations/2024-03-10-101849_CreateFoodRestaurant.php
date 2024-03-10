<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFoodRestaurant extends Migration
{
    public function up()
    {
        if (!$this->db->tableExists('food_restaurant')) {
            $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'auto_increment' => true,
                ],
                'food_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'restaurant_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'price' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ]
            ]);
            $this->forge->addPrimaryKey('id');
            $this->forge->addForeignKey('food_id', 'food', 'id', 'CASCADE', 'CASCADE');
            $this->forge->addForeignKey('restaurant_id', 'restaurant', 'id', 'CASCADE', 'CASCADE');
            $this->forge->createTable('food_restaurant');
        }
    }

    public function down()
    {
        $this->forge->dropTable('food_restaurant');
    }
}
