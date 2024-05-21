<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Restaurant extends Migration
{
    public function up()
    {
        if(!$this->db->tableExists('restaurant')) {
            $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'auto_increment' => true
                ],
                'restaurant_title' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255
                ],
                'location' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255
                ],
                'restaurant_category_id' => [
                    'type' => 'INT',
                    'unsigned' => true
                ]
            ]);
            
            $this->forge->addPrimaryKey('id');
            $this->forge->addForeignKey('restaurant_category_id', 'restaurant_category', 'id', 'CASCADE', 'CASCADE');
            $this->forge->createTable('restaurant');
        }
    }

    public function down()
    {
        $this->forge->dropTable('restaurant');
    }
}
