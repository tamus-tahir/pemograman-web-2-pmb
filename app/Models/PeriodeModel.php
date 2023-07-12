<?php

namespace App\Models;

use CodeIgniter\Model;

class PeriodeModel extends Model
{
    protected $table            = 'tabel_periode';
    protected $primaryKey       = 'id_periode';
    protected $allowedFields    = ['id_tahun', 'periode', 'tanggal_mulai_pendaftaran', 'tanggal_selesai_pendaftaran', 'tanggal_ujian', 'jam_ujian', 'tanggal_wawancara', 'jam_wawancara',  'keterangan', 'urutan'];
    protected $useTimestamps = true;
    protected $createdField  = 'periode_created_at';
    protected $updatedField  = 'periode_updated_at';

    public function get()
    {
        return $this->orderBy('id_periode', 'DESC')
            ->join('tabel_tahun', 'tabel_tahun.id_tahun = tabel_periode.id_tahun')
            ->findAll();
    }

    public function getId($id_periode)
    {
        return $this->where(['id_periode' => $id_periode])
            ->join('tabel_tahun', 'tabel_tahun.id_tahun = tabel_periode.id_tahun')
            ->first();
    }

    public function getUrutan()
    {
        return $this->orderBy('urutan', 'ASC')
            ->join('tabel_tahun', 'tabel_tahun.id_tahun = tabel_periode.id_tahun')
            ->findAll();
    }
}
