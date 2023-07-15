<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Bpp extends BaseController
{
    protected $bppModel;
    protected $tahunModel;
    protected $prodiModel;

    public function __construct()
    {
        $this->bppModel =  new \App\Models\BppModel;
        $this->tahunModel =  new \App\Models\TahunModel;
        $this->prodiModel =  new \App\Models\ProdiModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Biaya BPP',
            'tahun' => $this->tahunModel->get(),
            'prodi' => $this->prodiModel->get(),
            'bpp' => $this->bppModel->get(),
        ];

        return view('bpp/index', $data);
    }

    public function create()
    {
        $rules = [
            'id_tahun' => ['label' => 'tahun', 'rules' => 'required'],
            'id_prodi' => ['label' => 'prodi', 'rules' => 'required'],
            'bpp' => ['label' => 'bpp', 'rules' => 'required'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal ditambahkan');
            return redirect()->back()->withInput();
        }

        $data = [
            'id_tahun' => $this->request->getVar('id_tahun'),
            'id_prodi' => $this->request->getVar('id_prodi'),
            'bpp' => $this->request->getVar('bpp'),
        ];

        $this->bppModel->save($data);
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/bpp');
    }

    public function update($id_bpp)
    {
        $rules = [
            'id_tahun' => ['label' => 'tahun', 'rules' => 'required'],
            'id_prodi' => ['label' => 'prodi', 'rules' => 'required'],
            'bpp' => ['label' => 'bpp', 'rules' => 'required'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal diubah');
            return redirect()->back()->withInput();
        }

        $data = [
            'id_tahun' => $this->request->getVar('id_tahun'),
            'id_prodi' => $this->request->getVar('id_prodi'),
            'bpp' => $this->request->getVar('bpp'),
            'id_bpp' => $id_bpp
        ];

        $this->bppModel->save($data);
        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/bpp');
    }

    public function delete($id_bpp)
    {
        $this->bppModel->delete($id_bpp);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/bpp');
    }
}
