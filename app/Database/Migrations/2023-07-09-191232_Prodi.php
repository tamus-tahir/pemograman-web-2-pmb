<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Prodi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_prodi' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'prodi' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'akreditasi' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'keterangan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'icon' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'color' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'urutan' => [
                'type'       => 'INT',
            ],
            'prodi_created_at' => [
                'type'       => 'DATETIME',
            ],
            'prodi_updated_at' => [
                'type'       => 'DATETIME',
            ],

        ]);
        $this->forge->addKey('id_prodi', true);
        $this->forge->createTable('tabel_prodi');
    }

    public function down()
    {
        $this->forge->dropTable('tabel_prodi');
    }
}
