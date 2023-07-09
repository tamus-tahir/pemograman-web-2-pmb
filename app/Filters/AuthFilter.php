<?php


namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        // apakah user telah login
        if (!session('id_user')) {
            session()->setFlashdata('error', 'Harap Login Terlebih Dahulu');
            return redirect()->to('/');
        } else {
            // periksa hak akses
            $id_profil = session('id_profil');
            $url = service('uri')->getsegment(1);
            $akses = model('AksesModel')->getAkses($url, $id_profil);
            if (!$akses) {
                session()->setFlashdata('error', 'Anda tidak diberikan akses');
                return redirect()->to('/dashboard/error');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        if (session('id_user')) {
            return redirect()->to('/dashboard');
        }
    }
}
