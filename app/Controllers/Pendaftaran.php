<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pendaftaran extends BaseController
{
    protected $pendaftaranModel;
    protected $tahunModel;

    public function __construct()
    {
        $this->pendaftaranModel =  new \App\Models\PendaftaranModel;
        $this->tahunModel =  new \App\Models\TahunModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Biaya Pendaftaran',
            'tahun' => $this->tahunModel->get(),
            'pendaftaran' => $this->pendaftaranModel->get(),
        ];

        return view('pendaftaran/index', $data);
    }

    public function create()
    {
        $rules = [
            'id_tahun' => ['label' => 'tahun', 'rules' => 'required'],
            'pendaftaran' => ['label' => 'pendaftaran', 'rules' => 'required'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal ditambahkan');
            return redirect()->back()->withInput();
        }

        $data = [
            'id_tahun' => $this->request->getVar('id_tahun'),
            'pendaftaran' => $this->request->getVar('pendaftaran'),
        ];

        $this->pendaftaranModel->save($data);
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/pendaftaran');
    }

    public function update($id_pendaftaran)
    {
        $rules = [
            'id_tahun' => ['label' => 'tahun', 'rules' => 'required'],
            'pendaftaran' => ['label' => 'pendaftaran', 'rules' => 'required'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal diubah');
            return redirect()->back()->withInput();
        }

        $data = [
            'id_tahun' => $this->request->getVar('id_tahun'),
            'pendaftaran' => $this->request->getVar('pendaftaran'),
            'id_pendaftaran' => $id_pendaftaran
        ];

        $this->pendaftaranModel->save($data);
        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/pendaftaran');
    }

    public function delete($id_pendaftaran)
    {
        $this->pendaftaranModel->delete($id_pendaftaran);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/pendaftaran');
    }
}
