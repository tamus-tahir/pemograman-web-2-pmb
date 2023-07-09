<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Prodi extends BaseController
{
    protected $prodiModel;

    public function __construct()
    {
        $this->prodiModel =  new \App\Models\ProdiModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Program Studi',
            'prodi' => $this->prodiModel->get(),
        ];

        return view('prodi/index', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Tambah Program Studi',
            'validation' => \Config\Services::validation(),
        ];

        return view('prodi/new', $data);
    }

    public function create()
    {
        $rules = [
            'prodi' => ['label' => 'prodi', 'rules' => 'required'],
            'akreditasi' => ['label' => 'akreditasi', 'rules' => 'required'],
            'keterangan' => ['label' => 'keterangan', 'rules' => 'required'],
            'icon' => ['label' => 'icon', 'rules' => 'required'],
            'color' => ['label' => 'color', 'rules' => 'required'],
            'urutan' => ['label' => 'urutan', 'rules' => 'required'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal ditambahkan');
            return redirect()->back()->withInput();
        }

        $data = [
            'prodi' => $this->request->getVar('prodi'),
            'akreditasi' => $this->request->getVar('akreditasi'),
            'keterangan' => $this->request->getVar('keterangan'),
            'icon' => $this->request->getVar('icon'),
            'color' => $this->request->getVar('color'),
            'urutan' => $this->request->getVar('urutan'),
        ];

        $this->prodiModel->save($data);
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/prodi');
    }

    public function edit($id_prodi)
    {
        $data = [
            'title' => 'Ubah Prodi',
            'prodi' => $this->prodiModel->getId($id_prodi),
            'validation' => \Config\Services::validation(),
        ];

        return view('prodi/edit', $data);
    }

    public function update($id_prodi)
    {
        $rules = [
            'prodi' => ['label' => 'prodi', 'rules' => 'required'],
            'akreditasi' => ['label' => 'akreditasi', 'rules' => 'required'],
            'keterangan' => ['label' => 'keterangan', 'rules' => 'required'],
            'icon' => ['label' => 'icon', 'rules' => 'required'],
            'color' => ['label' => 'color', 'rules' => 'required'],
            'urutan' => ['label' => 'urutan', 'rules' => 'required'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal diubah');
            return redirect()->back()->withInput();
        }

        $data = [
            'prodi' => $this->request->getVar('prodi'),
            'akreditasi' => $this->request->getVar('akreditasi'),
            'keterangan' => $this->request->getVar('keterangan'),
            'icon' => $this->request->getVar('icon'),
            'color' => $this->request->getVar('color'),
            'urutan' => $this->request->getVar('urutan'),
            'id_prodi' => $id_prodi
        ];

        $this->prodiModel->save($data);
        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/prodi');
    }

    public function delete($id_prodi)
    {
        $this->prodiModel->delete($id_prodi);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/prodi');
    }
}
