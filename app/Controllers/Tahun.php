<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Tahun extends BaseController
{
    protected $tahunModel;

    public function __construct()
    {
        $this->tahunModel =  new \App\Models\TahunModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Tahun Ajaran',
            'tahun' => $this->tahunModel->get(),
        ];

        return view('tahun/index', $data);
    }

    public function create()
    {
        $rules = [
            'tahun' => ['label' => 'tahun', 'rules' => 'required'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal ditambahkan');
            return redirect()->back()->withInput();
        }

        $data = [
            'tahun' => $this->request->getVar('tahun')
        ];

        $this->tahunModel->save($data);
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/tahun');
    }

    public function update($id_tahun)
    {
        $rules = [
            'tahun' => ['label' => 'tahun', 'rules' => 'required'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal diubah');
            return redirect()->back()->withInput();
        }

        $data = [
            'tahun' => $this->request->getVar('tahun'),
            'id_tahun' => $id_tahun
        ];

        $this->tahunModel->save($data);
        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/tahun');
    }

    public function delete($id_tahun)
    {
        $this->tahunModel->delete($id_tahun);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/tahun');
    }
}
