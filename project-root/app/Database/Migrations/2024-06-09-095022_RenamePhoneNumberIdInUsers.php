<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RenamePhoneNumberIdInUsers extends Migration
{
    public function up()
    {
        $fields = [
            'phone_number_id' => [
                'name' => 'phone_number',
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
        ];
        $this->forge->modifyColumn('users', $fields);
    }

    public function down()
    {
        $fields = [
            'phone_number' => [
                'name' => 'phone_number_id',
                'type' => 'INT',
                'null' => true,
            ],
        ];
        $this->forge->modifyColumn('users', $fields);
    }
}
