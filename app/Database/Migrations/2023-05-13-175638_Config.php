<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Config extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_config' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'appname' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'copyright' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'logo' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'keywords' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'author' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'description' => [
                'type'       => 'TEXT',
            ],
            'config_created_at' => [
                'type'       => 'DATETIME',
            ],
            'config_updated_at' => [
                'type'       => 'DATETIME',
            ],

        ]);
        $this->forge->addKey('id_config', true);
        $this->forge->createTable('tabel_config');
    }

    public function down()
    {
        $this->forge->dropTable('tabel_config');
    }
}
