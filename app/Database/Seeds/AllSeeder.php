<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AllSeeder extends Seeder
{
    public function run()
    {
        $this->call('ConfigSeeder');
        $this->call('NavigasiSeeder');
        $this->call('ProfilSeeder');
        $this->call('AksesSeeder');
        $this->call('UserSeeder');
    }
}
