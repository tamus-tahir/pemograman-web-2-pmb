<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Registrasi extends BaseController
{

    protected $userModel;

    public function __construct()
    {
        $this->userModel =  new \App\Models\UserModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Registrasi Mahasiswa Baru',
            'validation' => \Config\Services::validation(),
        ];

        return view('front/registrasi/index', $data);
    }

    public function create()
    {
        $rules = [
            'username' => ['label' => 'username', 'rules' => 'required|is_unique[tabel_user.username]'],
            'password' => ['label' => 'password', 'rules' => 'required|min_length[8]|matches[passwordkonfirmasi]'],
            'passwordkonfirmasi' => ['label' => 'passwordkonfirmasi', 'rules' => 'required|min_length[8]|matches[password]'],
            'nama' => ['label' => 'nama', 'rules' => 'required'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal ditambahkan');
            return redirect()->back()->withInput();
        }

        $data = [
            'id_profil' => 7,
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'nama' => $this->request->getVar('nama'),
            'telpon' => $this->request->getVar('telpon'),
            'aktif' => 1,
        ];

        $this->userModel->save($data);
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/auth');
    }
}
