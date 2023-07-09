<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Beranda extends BaseController
{
    protected $prodiModel;

    public function __construct()
    {
        $this->prodiModel =  new \App\Models\ProdiModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Beranda',
            'prodi' => $this->prodiModel->getUrutan(),
        ];

        return view('front/beranda/index', $data);
    }
}
