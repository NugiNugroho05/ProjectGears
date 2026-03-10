<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // --- LOGIKA CEK LOGIN ---
        // Kalau sesi 'isLoggedIn' tidak ada atau false
        if (!session()->get('isLoggedIn')) {
            // Maka lempar balik ke halaman login admin
            return redirect()->to(base_url('admin/login'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu aksi apa-apa setelah request selesai
    }
}