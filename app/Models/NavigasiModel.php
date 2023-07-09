<?php

namespace App\Models;

use CodeIgniter\Model;

class NavigasiModel extends Model
{
    protected $table            = 'tabel_navigasi';
    protected $primaryKey       = 'id_navigasi';
    protected $allowedFields    = ['menu', 'url', 'icon', 'dropdown', 'urutan', 'aktif'];
    protected $useTimestamps = true;
    protected $createdField  = 'navigasi_created_at';
    protected $updatedField  = 'navigasi_updated_at';

    public function get()
    {
        return $this->orderBy('id_navigasi', 'DESC')->findAll();
    }

    public function getId($id_navigasi)
    {
        return $this->where(['id_navigasi' => $id_navigasi])->first();
    }

    public function getMenuUtama()
    {
        return $this->where(['dropdown' => 0])->findAll();
    }

    public function getSubmenu($id_navigasi)
    {
        return $this->where(['dropdown' => $id_navigasi])
            ->findAll();
    }
}
