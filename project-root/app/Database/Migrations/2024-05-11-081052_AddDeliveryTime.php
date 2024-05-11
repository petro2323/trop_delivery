<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDeliveryTime extends Migration
{
    public function up()
    {
        $fields = [
            'delivery_time' => [
                'type' => 'INT',
                'unsigned' => true
            ]
        ];

        $this->forge->addColumn('restaurant', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('restaurant', 'delivery_time');
    }
}
