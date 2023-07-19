<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Informasipendaftaran extends BaseController
{

    protected $informasiModel;

    public function __construct()
    {
        $this->informasiModel =  new \App\Models\InformasiModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Informasi Pendaftaran',
            'informasi' => $this->informasiModel->getId(1),
        ];

        return view('front/informasi/index', $data);
    }
}
