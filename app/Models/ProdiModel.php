<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdiModel extends Model
{
    protected $table            = 'tabel_prodi';
    protected $primaryKey       = 'id_prodi';
    protected $allowedFields    = ['prodi', 'akreditasi',  'keterangan', 'icon', 'urutan', 'color'];
    protected $useTimestamps = true;
    protected $createdField  = 'prodi_created_at';
    protected $updatedField  = 'prodi_updated_at';

    public function get()
    {
        return $this->orderBy('id_prodi', 'DESC')->findAll();
    }

    public function getId($id_prodi)
    {
        return $this->where(['id_prodi' => $id_prodi])->first();
    }

    public function getUrutan()
    {
        return $this->orderBy('urutan', 'ASC')->findAll();
    }
}
