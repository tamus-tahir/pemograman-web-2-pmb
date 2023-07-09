<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    protected $configModel;
    protected $userModel;
    public function __construct()
    {
        $this->configModel =  new \App\Models\ConfigModel;
        $this->userModel =  new \App\Models\UserModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Auth',
            'config' => $this->configModel->getId(1),
            'validation' => \Config\Services::validation(),
        ];

        return view('auth/index', $data);
    }

    public function proses()
    {
        $rules = [
            'username' => ['label' => 'username', 'rules' => 'required'],
            'password' => ['label' => 'password', 'rules' => 'required'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Login gagal');
            return redirect()->back()->withInput();
        }

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $this->userModel->getUsername($username);

        // periksa apakah usernya tidak ada
        if (!$user) {
            session()->setFlashdata('error', 'Username / Password Salah');
            return redirect()->to('/auth');
        }

        // periksa apakah usernya tidak aktif
        if ($user['aktif'] == 0) {
            session()->setFlashdata('error', 'Akun anda tidak aktif');
            return redirect()->to('/auth');
        }

        // perika password
        if (password_verify($password, $user['password']) == false) {
            session()->setFlashdata('error', 'Username / Password Salah');
            return redirect()->to('/auth');
        }

        $data = [
            'id_profil' => $user['id_profil'],
            'id_user' => $user['id_user'],
        ];
        session()->set($data);
        session()->setFlashdata('success', 'Selamat Datang ' . $user['nama']);
        return redirect()->to('/dashboard');
    }

    public function logout()
    {
        $data = ['id_profil', 'id_user'];
        session()->remove($data);
        session()->set('');
        session()->setFlashdata('success', 'Logout Berhasil');
        return redirect()->to('/auth');
    }
}
