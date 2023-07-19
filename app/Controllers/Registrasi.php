<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Registrasi extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'Registrasi Mahasiswa Baru',
            'validation' => \Config\Services::validation(),
        ];

        return view('front/registrasi/index', $data);
    }
}
