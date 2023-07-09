<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class NavigasiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'menu' => 'Dashboard',
                'url'    => 'dashboard',
                'icon'    => 'bi bi-grid',
                'dropdown'    => '0',
                'urutan'    => '1',
                'aktif'    => '1',
                'navigasi_created_at'    => Time::now('Asia/Makassar'),
                'navigasi_updated_at'    => Time::now('Asia/Makassar'),
            ],
            [
                'menu' => 'Config',
                'url'    => 'config',
                'icon'    => 'bx bx-cog',
                'dropdown'    => '0',
                'urutan'    => '2',
                'aktif'    => '1',
                'navigasi_created_at'    => Time::now('Asia/Makassar'),
                'navigasi_updated_at'    => Time::now('Asia/Makassar'),
            ],
            [
                'menu' => 'User Management',
                'url'    => '#',
                'icon'    => 'bx bx-user',
                'dropdown'    => '0',
                'urutan'    => '3',
                'aktif'    => '1',
                'navigasi_created_at'    => Time::now('Asia/Makassar'),
                'navigasi_updated_at'    => Time::now('Asia/Makassar'),
            ],
            [
                'menu' => 'Navigasi',
                'url'    => 'navigasi',
                'icon'    => 'bi bi-circle',
                'dropdown'    => '3',
                'urutan'    => '1',
                'aktif'    => '1',
                'navigasi_created_at'    => Time::now('Asia/Makassar'),
                'navigasi_updated_at'    => Time::now('Asia/Makassar'),
            ],
            [
                'menu' => 'Profil',
                'url'    => 'profil',
                'icon'    => 'bi bi-circle',
                'dropdown'    => '3',
                'urutan'    => '2',
                'aktif'    => '1',
                'navigasi_created_at'    => Time::now('Asia/Makassar'),
                'navigasi_updated_at'    => Time::now('Asia/Makassar'),
            ],
            [
                'menu' => 'User',
                'url'    => 'user',
                'icon'    => 'bi bi-circle',
                'dropdown'    => '3',
                'urutan'    => '3',
                'aktif'    => '1',
                'navigasi_created_at'    => Time::now('Asia/Makassar'),
                'navigasi_updated_at'    => Time::now('Asia/Makassar'),
            ],
        ];

        $this->db->table('tabel_navigasi')->insertBatch($data);
    }
}
