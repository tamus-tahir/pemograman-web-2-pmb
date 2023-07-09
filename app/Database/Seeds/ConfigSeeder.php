<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ConfigSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'appname' => 'Admin Template',
            'copyright'    => 'Tamus Tahir || 2023',
            'logo'    => 'logo.png',
            'keywords'    => 'Ci4, BS5',
            'author'    => 'Tamus Tahir',
            'description'    => 'It is a long established fact that a reader',
            'config_created_at'    => Time::now('Asia/Makassar'),
            'config_updated_at'    => Time::now('Asia/Makassar'),
        ];

        $this->db->table('tabel_config')->insert($data);
    }
}
