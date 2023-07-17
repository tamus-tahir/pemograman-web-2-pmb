<?php

namespace App\Models;

use CodeIgniter\Model;

class InformasiModel extends Model
{
    protected $table            = 'tabel_informasi';
    protected $primaryKey       = 'id_informasi';
    protected $allowedFields    = ['id_tahun', 'id_periode', 'informasi', 'alamat', 'email', 'telpon', 'maps'];
    protected $useTimestamps = true;
    protected $createdField  = 'informasi_created_at';
    protected $updatedField  = 'informasi_updated_at';

    public function getId($id_informasi)
    {
        return $this->where(['id_informasi' => $id_informasi])->first();
    }
}
