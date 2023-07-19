<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Beranda extends BaseController
{
    protected $prodiModel;
    protected $periodeModel;
    protected $informasiModel;
    protected $tahunModel;
    protected $pendaftaranModel;

    public function __construct()
    {
        $this->prodiModel =  new \App\Models\ProdiModel;
        $this->periodeModel =  new \App\Models\PeriodeModel;
        $this->informasiModel =  new \App\Models\InformasiModel;
        $this->tahunModel =  new \App\Models\TahunModel;
        $this->pendaftaranModel =  new \App\Models\PendaftaranModel;
    }

    public function index()
    {
        $informasi = $this->informasiModel->getId(1);
        $data = [
            'title' => 'Beranda',
            'prodi' => $this->prodiModel->getUrutan(),
            'periode' => $this->periodeModel->getUrutan($informasi['id_tahun']),
            'pendaftaran' => $this->pendaftaranModel->getTahun($informasi['id_tahun']),
            'tahun' => $this->tahunModel->getId($informasi['id_tahun']),
        ];

        return view('front/beranda/index', $data);
    }
}
