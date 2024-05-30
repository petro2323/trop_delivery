<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPhoneNumber extends Migration
{
    public function up()
    {
        $fields = [
            'phone_number_id' => [
                'type' => 'INT',
                'unsigned' => true
            ]
        ];

        $this->forge->addColumn('users', $fields);
        $this->db->query('ALTER TABLE `users` ADD CONSTRAINT `fk_users_phone_number_id` FOREIGN KEY (`phone_number_id`) REFERENCES `phone_number`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;');
    }

    public function down()
    {
        $this->forge->dropForeignKey('users', 'fk_users_phone_number_id');
        $this->forge->dropColumn('users', 'phone_number_id');
    }
}
