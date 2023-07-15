<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bpp extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_bpp' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_tahun' => [
                'type'       => 'INT',
            ],
            'id_prodi' => [
                'type'       => 'INT',
            ],
            'bpp' => [
                'type'       => 'INT',
            ],
            'bpp_created_at' => [
                'type'       => 'DATETIME',
            ],
            'bpp_updated_at' => [
                'type'       => 'DATETIME',
            ],

        ]);
        $this->forge->addKey('id_bpp', true);
        $this->forge->createTable('tabel_bpp');
    }

    public function down()
    {
        $this->forge->dropTable('tabel_bpp');
    }
}
