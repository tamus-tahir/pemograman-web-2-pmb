<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Profil extends BaseController
{
    protected $profilModel;
    protected $aksesModel;
    protected $navigasiModel;
    protected $userModel;

    public function __construct()
    {
        $this->profilModel =  new \App\Models\ProfilModel;
        $this->aksesModel =  new \App\Models\AksesModel;
        $this->navigasiModel =  new \App\Models\NavigasiModel;
        $this->userModel =  new \App\Models\UserModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Profil',
            'profil' => $this->profilModel->get(),
        ];

        return view('profil/index', $data);
    }

    public function create()
    {
        $rules = [
            'profil' => ['label' => 'profil', 'rules' => 'required'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal ditambahkan');
            return redirect()->back()->withInput();
        }

        $data = [
            'profil' => $this->request->getVar('profil')
        ];

        $this->profilModel->save($data);
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/profil');
    }

    public function update($id_profil)
    {
        $rules = [
            'profil' => ['label' => 'profil', 'rules' => 'required'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal diubah');
            return redirect()->back()->withInput();
        }

        $data = [
            'profil' => $this->request->getVar('profil'),
            'id_profil' => $id_profil
        ];

        $this->profilModel->save($data);
        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/profil');
    }

    public function delete($id_profil)
    {
        $cek = $this->userModel->getProfil($id_profil);
        if ($cek) {
            session()->setFlashdata('error', 'Data gagal dihapus, data sedang digunakan pada tabel user');
            return redirect()->to('/profil');
        }

        $this->profilModel->delete($id_profil);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/profil');
    }

    public function akses($id_profil)
    {
        $data = [
            'title' => 'Hak Akses Profil',
            'navigasi' => $this->navigasiModel->getMenuUtama(),
            'profil' => $this->profilModel->getId($id_profil),
            'validation' => \Config\Services::validation(),
        ];

        return view('profil/akses', $data);
    }

    public function proses()
    {
        $id_navigasi = $this->request->getVar('id_navigasi');
        $id_profil = $this->request->getVar('id_profil');

        $akses = $this->aksesModel->cekAkses($id_navigasi, $id_profil);
        if (!$akses) {
            $data = [
                'id_navigasi' => $id_navigasi,
                'id_profil' => $id_profil,
            ];
            $this->aksesModel->save($data);
        } else {
            $this->aksesModel->deleteAkses($id_navigasi, $id_profil);
        }
    }
}
