<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Verifikasiujian extends BaseController
{
    protected $formulirModel;

    public function __construct()
    {
        $this->formulirModel =  new \App\Models\FormulirModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Data Hasil Ujian',
            'formulir' => $this->formulirModel->getLolosUjian(),
        ];

        return view('verifikasi-ujian/index', $data);
    }

    public function detail($id_ujian)
    {
        $data = [
            'title' => 'Verfifikasi Hasil Ujian',
            'formulir' => $this->formulirModel->getId($id_ujian),
        ];

        return view('verifikasi-ujian/detail', $data);
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
            'prodi_lulus' => $this->request->getVar('prodi_lulus'),
            'id_formulir' => $id_formulir
        ];

        $this->formulirModel->save($data);
        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/verifikasiujian');
    }
}
