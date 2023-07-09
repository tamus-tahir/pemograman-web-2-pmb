<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id_profil' => 1,
            'username'    => 'superadmin',
            'password'    => password_hash('superadmin', PASSWORD_DEFAULT),
            'nama'    => 'Tamus Tahir',
            'telpon'    => '',
            'foto'    => 'superadmin.jpg',
            'aktif'    => 1,
            'user_created_at'    => Time::now('Asia/Makassar'),
            'user_updated_at'    => Time::now('Asia/Makassar'),
        ];

        $this->db->table('tabel_user')->insert($data);
    }
}
