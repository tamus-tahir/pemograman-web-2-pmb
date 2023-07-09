<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Navigasi extends BaseController
{
    protected $navigasiModel;

    public function __construct()
    {
        $this->navigasiModel =  new \App\Models\NavigasiModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Navigasi',
            'navigasi' => $this->navigasiModel->get(),
        ];

        return view('navigasi/index', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Tambah Navigasi',
            'menu' => $this->navigasiModel->getMenuUtama(),
            'validation' => \Config\Services::validation(),
        ];

        return view('navigasi/new', $data);
    }

    public function create()
    {
        $rules = [
            'menu' => ['label' => 'menu', 'rules' => 'required'],
            'url' => ['label' => 'url', 'rules' => 'required'],
            'dropdown' => ['label' => 'dropdown', 'rules' => 'required'],
            'urutan' => ['label' => 'urutan', 'rules' => 'required'],
            'aktif' => ['label' => 'aktif', 'rules' => 'required'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal ditambahkan');
            return redirect()->back()->withInput();
        }

        $icon = $this->request->getVar('icon');

        $data = [
            'menu' => $this->request->getVar('menu'),
            'url' => $this->request->getVar('url'),
            'icon' => $icon ? $icon : 'bi bi-circle',
            'dropdown' => $this->request->getVar('dropdown'),
            'urutan' => $this->request->getVar('urutan'),
            'aktif' => $this->request->getVar('aktif'),
        ];

        $this->navigasiModel->save($data);
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/navigasi');
    }

    public function edit($id_navigasi)
    {
        $data = [
            'title' => 'Ubah Navigasi',
            'menu' => $this->navigasiModel->getMenuUtama(),
            'navigasi' => $this->navigasiModel->getId($id_navigasi),
            'validation' => \Config\Services::validation(),
        ];

        return view('navigasi/edit', $data);
    }

    public function update($id_navigasi)
    {
        $rules = [
            'menu' => ['label' => 'menu', 'rules' => 'required'],
            'url' => ['label' => 'url', 'rules' => 'required'],
            'dropdown' => ['label' => 'dropdown', 'rules' => 'required'],
            'urutan' => ['label' => 'urutan', 'rules' => 'required'],
            'aktif' => ['label' => 'aktif', 'rules' => 'required'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal diubah');
            return redirect()->back()->withInput();
        }

        $icon = $this->request->getVar('icon');

        $data = [
            'menu' => $this->request->getVar('menu'),
            'url' => $this->request->getVar('url'),
            'icon' => $icon ? $icon : 'bi bi-circle',
            'dropdown' => $this->request->getVar('dropdown'),
            'urutan' => $this->request->getVar('urutan'),
            'aktif' => $this->request->getVar('aktif'),
            'id_navigasi' => $id_navigasi
        ];

        $this->navigasiModel->save($data);
        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/navigasi');
    }

    public function delete($id_navigasi)
    {
        $cek = $this->navigasiModel->getSubmenu($id_navigasi);
        if ($cek) {
            session()->setFlashdata('error', 'Data gagal dihapus, data sedang digunakan pada menu dropdown');
            return redirect()->to('/navigasi');
        }

        $this->navigasiModel->delete($id_navigasi);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/navigasi');
    }
}
