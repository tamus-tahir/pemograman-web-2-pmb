<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Informasi extends BaseController
{
    protected $informasiModel;
    protected $tahunModel;
    protected $periodeModel;

    public function __construct()
    {
        $this->informasiModel =  new \App\Models\InformasiModel;
        $this->tahunModel =  new \App\Models\TahunModel;
        $this->periodeModel =  new \App\Models\PeriodeModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Informasi',
            'informasi' => $this->informasiModel->getId(1),
            'tahun' => $this->tahunModel->get(),
            'periode' => $this->periodeModel->get(),
            'validation' => \Config\Services::validation(),
        ];

        return view('informasi/index', $data);
    }

    public function update()
    {
        $rules = [
            'id_tahun' => ['label' => 'id tahun', 'rules' => 'required'],
            'id_periode' => ['label' => 'id periode', 'rules' => 'required'],
            'informasi' => ['label' => 'informasi', 'rules' => 'required'],
            'alamat' => ['label' => 'alamat', 'rules' => 'required'],
            'email' => ['label' => 'email', 'rules' => 'required'],
            'telpon' => ['label' => 'telpon', 'rules' => 'required'],
            'maps' => ['label' => 'maps', 'rules' => 'required'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal diubah');
            return redirect()->back()->withInput();
        }

        $data = [
            'id_tahun' => $this->request->getVar('id_tahun'),
            'id_periode' => $this->request->getVar('id_periode'),
            'informasi' => $this->request->getVar('informasi'),
            'alamat' => $this->request->getVar('alamat'),
            'email' => $this->request->getVar('email'),
            'telpon' => $this->request->getVar('telpon'),
            'maps' => $this->request->getVar('maps'),
            'id_informasi' => 1
        ];

        $this->informasiModel->save($data);
        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/informasi');
    }
}
