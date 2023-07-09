<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tahun extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tahun' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tahun' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'tahun_created_at' => [
                'type'       => 'DATETIME',
            ],
            'tahun_updated_at' => [
                'type'       => 'DATETIME',
            ],

        ]);
        $this->forge->addKey('id_tahun', true);
        $this->forge->createTable('tabel_tahun');
    }

    public function down()
    {
        $this->forge->dropTable('tabel_tahun');
    }
}
