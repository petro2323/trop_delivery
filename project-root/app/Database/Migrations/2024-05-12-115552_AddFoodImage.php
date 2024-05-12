<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFoodImage extends Migration
{
    public function up()
    {
        $fields = [
            'food_image' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ]
        ];

        $this->forge->addColumn('food_restaurant', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('food_restaurant', 'food_image');
    }
}
