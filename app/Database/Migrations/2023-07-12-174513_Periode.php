<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Periode extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_periode' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_tahun' => [
                'type'       => 'INT',
            ],
            'periode' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'tanggal_mulai_pendaftaran' => [
                'type'       => 'DATE',
            ],
            'tanggal_selesai_pendaftaran' => [
                'type'       => 'DATE',
            ],
            'tanggal_ujian' => [
                'type'       => 'DATE',
            ],
            'jam_ujian' => [
                'type'       => 'TIME',
            ],
            'tanggal_wawancara' => [
                'type'       => 'DATE',
            ],
            'jam_wawancara' => [
                'type'       => 'TIME',
            ],
            'keterangan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'urutan' => [
                'type'       => 'INT',
            ],
            'periode_created_at' => [
                'type'       => 'DATETIME',
            ],
            'periode_updated_at' => [
                'type'       => 'DATETIME',
            ],

        ]);
        $this->forge->addKey('id_periode', true);
        $this->forge->createTable('tabel_periode');
    }

    public function down()
    {
        $this->forge->dropTable('tabel_periode');
    }
}
