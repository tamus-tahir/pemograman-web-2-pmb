<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Informasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_informasi' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_tahun' => [
                'type'       => 'INT',
            ],
            'id_periode' => [
                'type'       => 'INT',
            ],
            'informasi' => [
                'type'       => 'TEXT',
            ],
            'alamat' => [
                'type'       => 'VARCHAR',
                'constraint'     => 255,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint'     => 128,
            ],
            'telpon' => [
                'type'       => 'VARCHAR',
                'constraint'     => 50,
            ],
            'maps' => [
                'type'       => 'TEXT',
            ],
            'informasi_created_at' => [
                'type'       => 'DATETIME',
            ],
            'informasi_updated_at' => [
                'type'       => 'DATETIME',
            ],

        ]);
        $this->forge->addKey('id_informasi', true);
        $this->forge->createTable('tabel_informasi');
    }

    public function down()
    {
        $this->forge->dropTable('tabel_informasi');
    }
}
