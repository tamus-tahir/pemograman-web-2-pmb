<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Profil extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_profil' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'profil' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'profil_created_at' => [
                'type'       => 'DATETIME',
            ],
            'profil_updated_at' => [
                'type'       => 'DATETIME',
            ],

        ]);
        $this->forge->addKey('id_profil', true);
        $this->forge->createTable('tabel_profil');
    }

    public function down()
    {
        $this->forge->dropTable('tabel_profil');
    }
}
