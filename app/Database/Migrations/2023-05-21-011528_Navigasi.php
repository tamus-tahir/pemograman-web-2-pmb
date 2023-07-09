<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Navigasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_navigasi' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'menu' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'url' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'icon' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'dropdown' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'urutan' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'aktif' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'navigasi_created_at' => [
                'type'       => 'DATETIME',
            ],
            'navigasi_updated_at' => [
                'type'       => 'DATETIME',
            ],

        ]);
        $this->forge->addKey('id_navigasi', true);
        $this->forge->createTable('tabel_navigasi');
    }

    public function down()
    {
        $this->forge->dropTable('tabel_navigasi');
    }
}
