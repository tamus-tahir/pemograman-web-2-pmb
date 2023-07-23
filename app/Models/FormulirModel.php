<?php

namespace App\Models;

use CodeIgniter\Model;

class FormulirModel extends Model
{
    protected $table            = 'tabel_formulir';
    protected $primaryKey       = 'id_formulir';
    protected $allowedFields    = ['id_user', 'id_periode', 'id_pendaftaran', 'pilihan_pertama', 'pilihan_kedua', 'prodi_lulus', 'nama_pendaftar', 'telpon_pendaftar', 'nomor', 'foto', 'ijazah', 'pembayaran_pendaftaran', 'pembayaran_spp_bpp', 'status', 'keterangan'];
    protected $useTimestamps = true;
    protected $createdField  = 'formulir_created_at';
    protected $updatedField  = 'formulir_updated_at';

    public function getFormulir($id_user)
    {
        return $this->where(['id_user' => $id_user])->findAll();
    }

    public function get()
    {
        return $this->orderBy('id_formulir', 'DESC')->findAll();
    }

    public function getLolosVerifikasiBiayaPendaftaran()
    {
        return $this->orderBy('id_formulir', 'DESC')
            ->where(['status >=' => 2])
            ->findAll();
    }

    public function getLolosUjian()
    {
        return $this->orderBy('id_formulir', 'DESC')
            ->where(['status >=' => 4])
            ->findAll();
    }

    public function getId($id_formulir)
    {
        return $this->where(['id_formulir' => $id_formulir])->first();
    }

    public function getStatus($status)
    {
        return $this->where(['status' => $status])->findAll();
    }

    public function getMaxNomor()
    {
        return $this->selectMax('nomor')->first();
    }
}
