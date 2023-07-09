<?php

namespace App\Models;

use CodeIgniter\Model;

class AksesModel extends Model
{
    protected $table            = 'tabel_akses';
    protected $primaryKey       = 'id_akses';
    protected $allowedFields    = ['id_profil', 'id_navigasi'];
    protected $useTimestamps = true;
    protected $createdField  = 'akses_created_at';
    protected $updatedField  = 'akses_updated_at';

    public function get()
    {
        return $this->orderBy('id_akses', 'DESC')->findAll();
    }

    public function getId($id_akses)
    {
        return $this->where(['id_akses' => $id_akses])->first();
    }

    public function cekAkses($id_navigasi, $id_profil)
    {
        return $this->where(['id_navigasi' => $id_navigasi, 'id_profil' => $id_profil])->first();
    }

    public function deleteAkses($id_navigasi, $id_profil)
    {
        return $this->where(['id_navigasi' => $id_navigasi, 'id_profil' => $id_profil])->delete();
    }

    public function getNavigasiProfil($id_profil)
    {
        return $this->where(['id_profil' => $id_profil, 'aktif' => 1])
            ->orderBy('urutan', 'ASC')
            ->join('tabel_navigasi', 'tabel_navigasi.id_navigasi = tabel_akses.id_navigasi')
            ->findAll();
    }

    public function getSubmenuProfil($id_navigasi, $id_profil)
    {
        return $this->where(['id_profil' => $id_profil, 'aktif' => 1, 'dropdown' => $id_navigasi])
            ->orderBy('urutan', 'ASC')
            ->join('tabel_navigasi', 'tabel_navigasi.id_navigasi = tabel_akses.id_navigasi')
            ->findAll();
    }


    public function getAkses($url, $id_profil)
    {
        return $this->where(['url' => $url, 'id_profil' => $id_profil])
            ->join('tabel_navigasi', 'tabel_navigasi.id_navigasi = tabel_akses.id_navigasi')
            ->first();
    }
}
