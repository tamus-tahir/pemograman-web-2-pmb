<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Config extends BaseController
{
    protected $configModel;

    public function __construct()
    {
        $this->configModel =  new \App\Models\ConfigModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Config',
            'config' => $this->configModel->getId(1),
            'validation' => \Config\Services::validation(),
        ];

        return view('config/index', $data);
    }

    public function update()
    {
        $rules = [
            'appname' => ['label' => 'appname', 'rules' => 'required'],
            'copyright' => ['label' => 'copyright', 'rules' => 'required'],
            'keywords' => ['label' => 'keywords', 'rules' => 'required'],
            'author' => ['label' => 'author', 'rules' => 'required'],
            'description' => ['label' => 'description', 'rules' => 'required'],
            'logo' => ['label' => 'logo', 'rules' => 'max_size[logo,500]|mime_in[logo,image/png,image/jpeg,image/jpg]|is_image[logo]'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal diubah');
            return redirect()->back()->withInput();
        }

        // get upload
        $file = $this->request->getFile('logo');
        $oldFile = $this->request->getVar('logo_old');

        $data = [
            'appname' => $this->request->getVar('appname'),
            'copyright' => $this->request->getVar('copyright'),
            'keywords' => $this->request->getVar('keywords'),
            'author' => $this->request->getVar('author'),
            'description' => $this->request->getVar('description'),
            'logo' => upload($file, $oldFile, 'assets/img'),
            'id_config' => 1
        ];

        $this->configModel->save($data);
        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/config');
    }
}
