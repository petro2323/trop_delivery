<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DropPhoneNumberTable extends Migration
{
    public function up()
    {
        $this->forge->dropTable('phone_number', true);
    }

    public function down()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'user_number' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('phone_number');
    }
}
