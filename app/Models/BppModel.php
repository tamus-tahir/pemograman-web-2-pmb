<?php

namespace App\Models;

use CodeIgniter\Model;

class BppModel extends Model
{
    protected $table            = 'tabel_bpp';
    protected $primaryKey       = 'id_bpp';
    protected $allowedFields    = ['id_tahun', 'id_prodi', 'bpp'];
    protected $useTimestamps = true;
    protected $createdField  = 'bpp_created_at';
    protected $updatedField  = 'bpp_updated_at';

    public function get()
    {
        return $this->orderBy('id_bpp', 'DESC')
            ->join('tabel_tahun', 'tabel_tahun.id_tahun = tabel_bpp.id_tahun')
            ->join('tabel_prodi', 'tabel_prodi.id_prodi = tabel_bpp.id_prodi')
            ->findAll();
    }

    public function getId($id_bpp)
    {
        return $this->where(['id_bpp' => $id_bpp])
            ->join('tabel_tahun', 'tabel_tahun.id_tahun = tabel_bpp.id_tahun')
            ->join('tabel_prodi', 'tabel_prodi.id_prodi = tabel_bpp.id_prodi')
            ->first();
    }
}
