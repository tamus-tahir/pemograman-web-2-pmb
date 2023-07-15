<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Spp extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_spp' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_periode' => [
                'type'       => 'INT',
            ],
            'id_prodi' => [
                'type'       => 'INT',
            ],
            'spp' => [
                'type'       => 'INT',
            ],
            'spp_created_at' => [
                'type'       => 'DATETIME',
            ],
            'spp_updated_at' => [
                'type'       => 'DATETIME',
            ],

        ]);
        $this->forge->addKey('id_spp', true);
        $this->forge->createTable('tabel_spp');
    }

    public function down()
    {
        $this->forge->dropTable('tabel_spp');
    }
}
