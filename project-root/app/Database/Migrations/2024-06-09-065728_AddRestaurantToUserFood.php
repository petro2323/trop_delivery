<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRestaurantToUserFood extends Migration
{
    public function up()
    {
        $fields = [
            'restaurant_id' => [
                'type' => 'INT',
                'unsigned' => true
            ]
        ];

        $this->forge->addColumn('user_food', $fields);
        $this->db->query('ALTER TABLE `user_food` ADD CONSTRAINT `fk_user_food_restaurant_id` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;');
    }

    public function down()
    {
        $this->forge->dropForeignKey('user_food', 'fk_user_food_restaurant_id');
        $this->forge->dropColumn('user_food', 'restaurant_id');
    }
}
