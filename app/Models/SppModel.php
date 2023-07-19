<?php

namespace App\Models;

use CodeIgniter\Model;

class SppModel extends Model
{
    protected $table            = 'tabel_spp';
    protected $primaryKey       = 'id_spp';
    protected $allowedFields    = ['id_periode', 'id_prodi', 'spp'];
    protected $useTimestamps = true;
    protected $createdField  = 'spp_created_at';
    protected $updatedField  = 'spp_updated_at';

    public function get()
    {
        return $this->orderBy('id_spp', 'DESC')
            ->join('tabel_periode', 'tabel_periode.id_periode = tabel_spp.id_periode')
            ->join('tabel_prodi', 'tabel_prodi.id_prodi = tabel_spp.id_prodi')
            ->join('tabel_tahun', 'tabel_tahun.id_tahun = tabel_periode.id_tahun')
            ->findAll();
    }

    public function getId($id_spp)
    {
        return $this->where(['id_spp' => $id_spp])
            ->join('tabel_periode', 'tabel_periode.id_periode = tabel_spp.id_periode')
            ->join('tabel_prodi', 'tabel_prodi.id_prodi = tabel_spp.id_prodi')
            ->join('tabel_tahun', 'tabel_tahun.id_tahun = tabel_periode.id_tahun')
            ->first();
    }

    public function getSpp($id_prodi, $id_periode)
    {
        return $this->where(['id_prodi' => $id_prodi, 'id_periode' => $id_periode])->first();
    }
}
