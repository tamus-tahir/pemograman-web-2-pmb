<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pendaftaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pendaftaran' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_tahun' => [
                'type'       => 'INT',
            ],
            'pendaftaran' => [
                'type'       => 'INT',
            ],
            'pendaftaran_created_at' => [
                'type'       => 'DATETIME',
            ],
            'pendaftaran_updated_at' => [
                'type'       => 'DATETIME',
            ],

        ]);
        $this->forge->addKey('id_pendaftaran', true);
        $this->forge->createTable('tabel_pendaftaran');
    }

    public function down()
    {
        $this->forge->dropTable('tabel_pendaftaran');
    }
}
