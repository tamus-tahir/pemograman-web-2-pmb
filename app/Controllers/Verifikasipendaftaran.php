<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Verifikasipendaftaran extends BaseController
{
    protected $formulirModel;

    public function __construct()
    {
        $this->formulirModel =  new \App\Models\FormulirModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Data Formulir',
            'formulir' => $this->formulirModel->get(),
        ];

        return view('verifikasi-pendaftaran/index', $data);
    }

    public function detail($id_formulir)
    {
        $data = [
            'title' => 'Verfifikasi Biaya Pendaftaran',
            'formulir' => $this->formulirModel->getId($id_formulir),
        ];

        return view('verifikasi-pendaftaran/detail', $data);
    }

    public function update($id_formulir)
    {
        $rules = [
            'status' => ['label' => 'status', 'rules' => 'required'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal diubah');
            return redirect()->back()->withInput();
        }

        $data = [
            'status' => $this->request->getVar('status'),
            'keterangan' => $this->request->getVar('keterangan'),
            'id_formulir' => $id_formulir
        ];

        $this->formulirModel->save($data);
        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/verifikasipendaftaran');
    }
}
