<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dashboard extends BaseController
{

    protected $userModel;
    protected $profilModel;
    public function __construct()
    {
        $this->userModel =  new \App\Models\UserModel;
        $this->profilModel =  new \App\Models\ProfilModel;
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'profil' => $this->profilModel->countAll(),
            'user' => $this->userModel->countAll(),
        ];

        return view('dashboard/index', $data);
    }

    public function error()
    {
        $data = [
            'title' => 'Error',
        ];

        return view('dashboard/error', $data);
    }

    public function profil()
    {
        $data = [
            'title' => 'Profil',
            'user' => $this->userModel->getId(session('id_user')),
        ];

        return view('dashboard/profil', $data);
    }

    public function editprofil()
    {
        $data = [
            'title' => 'Edit Profil',
            'user' => $this->userModel->getId(session('id_user')),
            'validation' => \Config\Services::validation(),
        ];

        return view('dashboard/editprofil', $data);
    }

    public function updateprofil()
    {
        $id_user = session('id_user');
        $user = $this->userModel->getId($id_user);

        if ($user['username'] == $this->request->getVar('username')) {
            $ruleUsername = 'required';
        } else {
            $ruleUsername = 'required|is_unique[tabel_user.username]';
        }

        $rules = [
            'username' => ['label' => 'username', 'rules' => $ruleUsername],
            'nama' => ['label' => 'nama', 'rules' => 'required'],
            'foto' => ['label' => 'foto', 'rules' => 'max_size[foto,500]|mime_in[foto,image/png,image/jpeg,image/jpg]|is_image[foto]'],
        ];
        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal diubah');
            return redirect()->back()->withInput();
        }

        $data = [
            'username' => $this->request->getVar('username'),
            'nama' => $this->request->getVar('nama'),
            'telpon' => $this->request->getVar('telpon'),
            'foto' => upload($this->request->getFile('foto'), $this->request->getVar('foto_lama'), 'assets/img'),
            'id_user' => $id_user
        ];

        $this->userModel->save($data);
        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/dashboard');
    }

    public function editpassword()
    {
        $data = [
            'title' => 'Change Password',
            'validation' => \Config\Services::validation(),
        ];

        return view('dashboard/editpassword', $data);
    }

    public function updatepassword()
    {

        $id_user = session('id_user');

        $rules = [
            'passwordlama' => ['label' => 'passwordlama', 'rules' => 'required|min_length[8]'],
            'password' => ['label' => 'password', 'rules' => 'required|min_length[8]|matches[passwordkonfirmasi]'],
            'passwordkonfirmasi' => ['label' => 'passwordkonfirmasi', 'rules' => 'required|min_length[8]|matches[password]'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Password gagal diubah');
            return redirect()->back()->withInput();
        }

        $user = $this->userModel->getId(session('id_user'));
        if (password_verify($this->request->getVar('passwordlama'), $user['password'])) {
            $data = [
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'id_user' => $id_user,
            ];
            $this->userModel->save($data);
            session()->setFlashdata('success', 'Password berhasil diubah');
            return redirect()->to('/dashboard');
        } else {
            session()->setFlashdata('error', 'Password lama salah');
            return redirect()->to('/dashboard/editpassword');
        }
    }
}
