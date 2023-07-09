<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ProfilSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'profil' => 'Superadmin',
            'profil_created_at'    => Time::now('Asia/Makassar'),
            'profil_updated_at'    => Time::now('Asia/Makassar'),
        ];

        $this->db->table('tabel_profil')->insert($data);
    }
}
