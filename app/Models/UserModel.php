<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'tabel_user';
    protected $primaryKey       = 'id_user';
    protected $allowedFields    = ['id_profil', 'username', 'password', 'nama', 'telpon', 'foto', 'aktif'];
    protected $useTimestamps = true;
    protected $createdField  = 'user_created_at';
    protected $updatedField  = 'user_updated_at';

    public function get()
    {
        return $this->orderBy('id_user', 'DESC')
            ->join('tabel_profil', 'tabel_profil.id_profil = tabel_user.id_profil')
            ->findAll();
    }

    public function getId($id_user)
    {
        return $this->where(['id_user' => $id_user])
            ->join('tabel_profil', 'tabel_profil.id_profil = tabel_user.id_profil')
            ->first();
    }

    public function getUsername($username)
    {
        return $this->where(['username' => $username])->first();
    }

    public function getProfil($id_profil)
    {
        return $this->where(['id_profil' => $id_profil])->first();
    }
}
