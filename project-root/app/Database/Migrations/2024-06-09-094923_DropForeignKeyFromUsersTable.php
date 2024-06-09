<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DropForeignKeyFromUsersTable extends Migration
{
    public function up()
    {
        $this->db->query('ALTER TABLE `users` DROP FOREIGN KEY `fk_users_phone_number_id`;');
    }

    public function down()
    {
        $this->db->query('ALTER TABLE `users` ADD CONSTRAINT `fk_users_phone_number_id` FOREIGN KEY (`phone_number_id`) REFERENCES `phone_number`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;');
    }
}
