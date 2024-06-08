<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFoodQuantity extends Migration
{
    public function up()
    {
        $fields = [
            'quantity' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'food_price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'unsigned' => true
            ],
            'pdv_price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'unsigned' => true
            ],
            'delivery_price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'unsigned' => true
            ],
            'final_price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'unsigned' => true
            ],
            'order_date' => [
                'type' => 'DATETIME'
            ]
        ];

        $this->forge->addColumn('user_food', $fields);
    }

    public function down()
    {
        $columns = ['quantity', 'food_price', 'pdv_price', 'delivery_price', 'final_price', 'order_date'];
        $this->forge->dropColumn('user_food', $columns);
    }
}
