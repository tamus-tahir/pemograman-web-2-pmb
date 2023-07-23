<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Laporan extends BaseController
{
    protected $formulirModel;

    public function __construct()
    {
        $this->formulirModel =  new \App\Models\FormulirModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Laporan',
            'formulir' => $this->formulirModel->findAll(),
        ];

        return view('laporan/index', $data);
    }

    public function filter()
    {

        $status = $this->request->getVar('status');

        if ($status == "All") {
            $formulir =  $this->formulirModel->findAll();
        } else {
            $formulir =  $this->formulirModel->getStatus($status);
        }

        $data = [
            'title' => 'Laporan',
            'formulir' => $formulir,
        ];

        return view('laporan/filter', $data);
    }
}
