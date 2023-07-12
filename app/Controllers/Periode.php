<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Periode extends BaseController
{
    protected $periodeModel;
    protected $tahunModel;

    public function __construct()
    {
        $this->periodeModel =  new \App\Models\PeriodeModel;
        $this->tahunModel =  new \App\Models\TahunModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Program Studi',
            'periode' => $this->periodeModel->get(),
        ];

        return view('periode/index', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Tambah Program Studi',
            'tahun' => $this->tahunModel->get(),
            'validation' => \Config\Services::validation(),
        ];

        return view('periode/new', $data);
    }

    public function create()
    {
        $rules = [
            'id_tahun' => ['label' => 'tahun', 'rules' => 'required'],
            'periode' => ['label' => 'periode', 'rules' => 'required'],
            'tanggal_mulai_pendaftaran' => ['label' => 'tanggal mulai pendaftaran', 'rules' => 'required'],
            'tanggal_selesai_pendaftaran' => ['label' => 'tanggal selesai pendaftaran', 'rules' => 'required'],
            'tanggal_ujian' => ['label' => 'tanggal ujian', 'rules' => 'required'],
            'jam_ujian' => ['label' => 'jam ujian', 'rules' => 'required'],
            'tanggal_wawancara' => ['label' => 'tanggal wawancara', 'rules' => 'required'],
            'jam_wawancara' => ['label' => 'jam wawancara', 'rules' => 'required'],
            'urutan' => ['label' => 'urutan', 'rules' => 'required'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal ditambahkan');
            return redirect()->back()->withInput();
        }

        $data = [
            'id_tahun' => $this->request->getVar('id_tahun'),
            'periode' => $this->request->getVar('periode'),
            'tanggal_mulai_pendaftaran' => $this->request->getVar('tanggal_mulai_pendaftaran'),
            'tanggal_selesai_pendaftaran' => $this->request->getVar('tanggal_selesai_pendaftaran'),
            'tanggal_ujian' => $this->request->getVar('tanggal_ujian'),
            'jam_ujian' => $this->request->getVar('jam_ujian'),
            'tanggal_wawancara' => $this->request->getVar('tanggal_wawancara'),
            'jam_wawancara' => $this->request->getVar('jam_wawancara'),
            'keterangan' => $this->request->getVar('keterangan'),
            'urutan' => $this->request->getVar('urutan'),
        ];

        $this->periodeModel->save($data);
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/periode');
    }

    public function edit($id_periode)
    {
        $data = [
            'title' => 'Ubah Periode',
            'periode' => $this->periodeModel->getId($id_periode),
            'tahun' => $this->tahunModel->get(),
            'validation' => \Config\Services::validation(),
        ];

        return view('periode/edit', $data);
    }

    public function update($id_periode)
    {
        $rules = [
            'id_tahun' => ['label' => 'tahun', 'rules' => 'required'],
            'periode' => ['label' => 'periode', 'rules' => 'required'],
            'tanggal_mulai_pendaftaran' => ['label' => 'tanggal mulai pendaftaran', 'rules' => 'required'],
            'tanggal_selesai_pendaftaran' => ['label' => 'tanggal selesai pendaftaran', 'rules' => 'required'],
            'tanggal_ujian' => ['label' => 'tanggal ujian', 'rules' => 'required'],
            'jam_ujian' => ['label' => 'jam ujian', 'rules' => 'required'],
            'tanggal_wawancara' => ['label' => 'tanggal wawancara', 'rules' => 'required'],
            'jam_wawancara' => ['label' => 'jam wawancara', 'rules' => 'required'],
            'urutan' => ['label' => 'urutan', 'rules' => 'required'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal diubah');
            return redirect()->back()->withInput();
        }

        $data = [
            'id_tahun' => $this->request->getVar('id_tahun'),
            'periode' => $this->request->getVar('periode'),
            'tanggal_mulai_pendaftaran' => $this->request->getVar('tanggal_mulai_pendaftaran'),
            'tanggal_selesai_pendaftaran' => $this->request->getVar('tanggal_selesai_pendaftaran'),
            'tanggal_ujian' => $this->request->getVar('tanggal_ujian'),
            'jam_ujian' => $this->request->getVar('jam_ujian'),
            'tanggal_wawancara' => $this->request->getVar('tanggal_wawancara'),
            'jam_wawancara' => $this->request->getVar('jam_wawancara'),
            'keterangan' => $this->request->getVar('keterangan'),
            'urutan' => $this->request->getVar('urutan'),
            'id_periode' => $id_periode
        ];

        $this->periodeModel->save($data);
        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/periode');
    }

    public function delete($id_periode)
    {
        $this->periodeModel->delete($id_periode);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/periode');
    }
}
