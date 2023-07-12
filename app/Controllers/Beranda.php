<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Beranda extends BaseController
{
    protected $prodiModel;
    protected $periodeModel;

    public function __construct()
    {
        $this->prodiModel =  new \App\Models\ProdiModel;
        $this->periodeModel =  new \App\Models\PeriodeModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Beranda',
            'prodi' => $this->prodiModel->getUrutan(),
            'periode' => $this->periodeModel->getUrutan(),
        ];

        return view('front/beranda/index', $data);
    }
}
