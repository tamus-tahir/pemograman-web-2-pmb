<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranModel extends Model
{
    protected $table            = 'tabel_pendaftaran';
    protected $primaryKey       = 'id_pendaftaran';
    protected $allowedFields    = ['id_tahun', 'pendaftaran'];
    protected $useTimestamps = true;
    protected $createdField  = 'pendaftaran_created_at';
    protected $updatedField  = 'pendaftaran_updated_at';

    public function get()
    {
        return $this->orderBy('id_pendaftaran', 'DESC')
            ->join('tabel_tahun', 'tabel_tahun.id_tahun = tabel_pendaftaran.id_tahun')
            ->findAll();
    }

    public function getId($id_pendaftaran)
    {
        return $this->where(['id_pendaftaran' => $id_pendaftaran])
            ->join('tabel_tahun', 'tabel_tahun.id_tahun = tabel_pendaftaran.id_tahun')
            ->first();
    }

    public function getTahun($id_tahun)
    {
        return $this->where(['id_tahun' => $id_tahun])->first();
    }
}
