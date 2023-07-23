<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Formulir extends BaseController
{
    protected $formulirModel;
    protected $prodiModel;
    protected $informasiModel;
    protected $pendaftaranModel;

    public function __construct()
    {
        $this->formulirModel =  new \App\Models\FormulirModel;
        $this->prodiModel =  new \App\Models\ProdiModel;
        $this->informasiModel =  new \App\Models\InformasiModel;
        $this->pendaftaranModel =  new \App\Models\PendaftaranModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Formulir',
            'formulir' => $this->formulirModel->getFormulir(session('id_user')),
        ];

        return view('formulir/index', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Tambah Formulir',
            'prodi' => $this->prodiModel->get(),
            'validation' => \Config\Services::validation(),
        ];

        return view('formulir/new', $data);
    }

    public function create()
    {
        $rules = [
            'pilihan_pertama' => ['label' => 'pilihan_pertama', 'rules' => 'required'],
            'pilihan_kedua' => ['label' => 'pilihan_kedua', 'rules' => 'required'],
            'nama_pendaftar' => ['label' => 'nama_pendaftar', 'rules' => 'required'],
            'telpon_pendaftar' => ['label' => 'telpon_pendaftar', 'rules' => 'required'],
            'foto' => ['label' => 'foto', 'rules' => 'uploaded[foto]|max_size[foto,500]|mime_in[foto,image/png,image/jpeg,image/jpg]|is_image[foto]'],
            'ijazah' => ['label' => 'ijazah', 'rules' => 'uploaded[ijazah]|max_size[ijazah,500]|mime_in[ijazah,image/png,image/jpeg,image/jpg]|is_image[ijazah]'],
            'pembayaran_pendaftaran' => ['label' => 'pembayaran_pendaftaran', 'rules' => 'uploaded[pembayaran_pendaftaran]|max_size[pembayaran_pendaftaran,500]|mime_in[pembayaran_pendaftaran,image/png,image/jpeg,image/jpg]|is_image[pembayaran_pendaftaran]'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal ditambahkan');
            return redirect()->back()->withInput();
        }

        $informasi = $this->informasiModel->getId(1);
        $pendaftaran = $this->pendaftaranModel->getTahun($informasi['id_tahun']);

        $data = [
            'id_user' => session('id_user'),
            'id_periode' => $informasi['id_periode'],
            'id_pendaftaran' => $pendaftaran['id_pendaftaran'],
            'pilihan_pertama' => $this->request->getVar('pilihan_pertama'),
            'pilihan_kedua' => $this->request->getVar('pilihan_kedua'),
            'nama_pendaftar' => $this->request->getVar('nama_pendaftar'),
            'telpon_pendaftar' => $this->request->getVar('telpon_pendaftar'),
            'foto' => upload($this->request->getFile('foto'), null, 'assets/img'),
            'ijazah' => upload($this->request->getFile('ijazah'), null, 'assets/img'),
            'pembayaran_pendaftaran' => upload($this->request->getFile('pembayaran_pendaftaran'), null, 'assets/img'),
            'nomor' => nomorFormulir()
        ];

        $this->formulirModel->save($data);
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/formulir');
    }

    public function edit($id_formulir)
    {
        $data = [
            'title' => 'Ubah formulir',
            'prodi' => $this->prodiModel->get(),
            'formulir' => $this->formulirModel->getId($id_formulir),
            'validation' => \Config\Services::validation(),
        ];

        return view('formulir/edit', $data);
    }

    public function update($id_formulir)
    {
        $rules = [
            'pilihan_pertama' => ['label' => 'pilihan_pertama', 'rules' => 'required'],
            'pilihan_kedua' => ['label' => 'pilihan_kedua', 'rules' => 'required'],
            'nama_pendaftar' => ['label' => 'nama_pendaftar', 'rules' => 'required'],
            'telpon_pendaftar' => ['label' => 'telpon_pendaftar', 'rules' => 'required'],
            'foto' => ['label' => 'foto', 'rules' => 'max_size[foto,500]|mime_in[foto,image/png,image/jpeg,image/jpg]|is_image[foto]'],
            'ijazah' => ['label' => 'ijazah', 'rules' => 'max_size[ijazah,500]|mime_in[ijazah,image/png,image/jpeg,image/jpg]|is_image[ijazah]'],
            'pembayaran_pendaftaran' => ['label' => 'pembayaran_pendaftaran', 'rules' => 'max_size[pembayaran_pendaftaran,500]|mime_in[pembayaran_pendaftaran,image/png,image/jpeg,image/jpg]|is_image[pembayaran_pendaftaran]'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal diubah');
            return redirect()->back()->withInput();
        }

        $data = [
            'pilihan_pertama' => $this->request->getVar('pilihan_pertama'),
            'pilihan_kedua' => $this->request->getVar('pilihan_kedua'),
            'nama_pendaftar' => $this->request->getVar('nama_pendaftar'),
            'telpon_pendaftar' => $this->request->getVar('telpon_pendaftar'),
            'foto' => upload($this->request->getFile('foto'), $this->request->getVar('foto_lama'), 'assets/img'),
            'ijazah' => upload($this->request->getFile('ijazah'), $this->request->getVar('ijazah_lama'), 'assets/img'),
            'pembayaran_pendaftaran' => upload($this->request->getFile('pembayaran_pendaftaran'), $this->request->getVar('pembayaran_pendaftaran_lama'), 'assets/img'),
            'id_formulir' => $id_formulir
        ];

        $this->formulirModel->save($data);
        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/formulir');
    }

    public function delete($id_formulir)
    {
        $formulir = $this->formulirModel->getId($id_formulir);

        if ($formulir['foto']) {
            unlink('assets/img/' . $formulir['foto']);
        }
        if ($formulir['ijazah']) {
            unlink('assets/img/' . $formulir['ijazah']);
        }
        if ($formulir['pembayaran_pendaftaran']) {
            unlink('assets/img/' . $formulir['pembayaran_pendaftaran']);
        }
        if ($formulir['pembayaran_spp_bpp']) {
            unlink('assets/img/' . $formulir['pembayaran_spp_bpp']);
        }

        $this->formulirModel->delete($id_formulir);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/formulir');
    }
}
