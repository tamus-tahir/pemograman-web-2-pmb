<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Spp extends BaseController
{
    protected $sppModel;
    protected $periodeModel;
    protected $prodiModel;

    public function __construct()
    {
        $this->sppModel =  new \App\Models\SppModel;
        $this->periodeModel =  new \App\Models\PeriodeModel;
        $this->prodiModel =  new \App\Models\ProdiModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Biaya SPP',
            'periode' => $this->periodeModel->get(),
            'prodi' => $this->prodiModel->get(),
            'spp' => $this->sppModel->get(),
        ];

        return view('spp/index', $data);
    }

    public function create()
    {
        $rules = [
            'id_periode' => ['label' => 'periode', 'rules' => 'required'],
            'id_prodi' => ['label' => 'prodi', 'rules' => 'required'],
            'spp' => ['label' => 'spp', 'rules' => 'required'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal ditambahkan');
            return redirect()->back()->withInput();
        }

        $data = [
            'id_periode' => $this->request->getVar('id_periode'),
            'id_prodi' => $this->request->getVar('id_prodi'),
            'spp' => $this->request->getVar('spp'),
        ];

        $this->sppModel->save($data);
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/spp');
    }

    public function update($id_spp)
    {
        $rules = [
            'id_periode' => ['label' => 'periode', 'rules' => 'required'],
            'id_prodi' => ['label' => 'prodi', 'rules' => 'required'],
            'spp' => ['label' => 'spp', 'rules' => 'required'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal diubah');
            return redirect()->back()->withInput();
        }

        $data = [
            'id_periode' => $this->request->getVar('id_periode'),
            'id_prodi' => $this->request->getVar('id_prodi'),
            'spp' => $this->request->getVar('spp'),
            'id_spp' => $id_spp
        ];

        $this->sppModel->save($data);
        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/spp');
    }

    public function delete($id_spp)
    {
        $this->sppModel->delete($id_spp);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/spp');
    }
}
