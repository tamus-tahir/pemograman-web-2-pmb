<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Formulir extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_formulir' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type'       => 'INT',
            ],
            'id_periode' => [
                'type'       => 'INT',
            ],
            'id_pendaftaran' => [
                'type'       => 'INT',
            ],
            'pilihan_pertama' => [
                'type'       => 'INT',
            ],
            'pilihan_kedua' => [
                'type'       => 'INT',
            ],
            'nama_pendaftar' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'telpon_pendaftar' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'nomor' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'ijazah' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'pembayaran_pendaftaran' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'pembayaran_spp_bpp' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'status' => [
                'type'       => 'INT',
            ],
            'keterangan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'formulir_created_at' => [
                'type'       => 'DATETIME',
            ],
            'formulir_updated_at' => [
                'type'       => 'DATETIME',
            ],

        ]);
        $this->forge->addKey('id_formulir', true);
        $this->forge->createTable('tabel_formulir');
    }

    public function down()
    {
        $this->forge->dropTable('tabel_formulir');
    }
}
