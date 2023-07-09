<?php

namespace App\Models;

use CodeIgniter\Model;

class TahunModel extends Model
{
    protected $table            = 'tabel_tahun';
    protected $primaryKey       = 'id_tahun';
    protected $allowedFields    = ['tahun'];
    protected $useTimestamps = true;
    protected $createdField  = 'tahun_created_at';
    protected $updatedField  = 'tahun_updated_at';

    public function get()
    {
        return $this->orderBy('id_tahun', 'DESC')->findAll();
    }

    public function getId($id_tahun)
    {
        return $this->where(['id_tahun' => $id_tahun])->first();
    }
}
