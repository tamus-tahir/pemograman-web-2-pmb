<?php

namespace App\Models;

use CodeIgniter\Model;

class FormulirModel extends Model
{
    protected $table            = 'tabel_formulir';
    protected $primaryKey       = 'id_formulir';
    protected $allowedFields    = ['id_user', 'id_periode', 'id_pendaftaran', 'pilihan_pertama', 'pilihan_kedua', 'nama_pendaftar', 'telpon_pendaftar', 'nomor', 'foto', 'ijazah', 'pembayaran_pendaftaran', 'pembayaran_spp_bpp', 'status', 'keterangan'];
    protected $useTimestamps = true;
    protected $createdField  = 'formulir_created_at';
    protected $updatedField  = 'formulir_updated_at';

    public function getFormulir($id_user)
    {
        return $this->where(['id_user' => $id_user])->findAll();
    }

    public function getId($id_formulir)
    {
        return $this->where(['id_formulir' => $id_formulir])->first();
    }

    public function getMaxNomor()
    {
        return $this->selectMax('nomor')->first();
    }
}
