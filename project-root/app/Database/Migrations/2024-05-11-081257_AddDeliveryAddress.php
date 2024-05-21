<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDeliveryAddress extends Migration
{
    public function up()
    {
        $fields = [
            'delivery_address' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ]
        ];

        $this->forge->addColumn('user_food', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('user_food', 'delivery_address');
    }
}
