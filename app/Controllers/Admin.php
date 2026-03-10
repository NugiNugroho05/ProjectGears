<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\UserModel;
use App\Models\ProductModel;

class Admin extends BaseController
{
    protected $orderModel;
    protected $productModel;

    public function __construct() {
        $this->orderModel = new OrderModel();
        $this->productModel = new ProductModel();
    }

    // Tampilkan Halaman Login
    public function login() {
        // Jika sesi sudah isLoggedIn, langsung ke dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to(base_url('admin/dashboard'));
        }
        return view('admin/login_v');
    }

    // --- PROSES AUTH LOGIN (PLAIN TEXT) ---
    public function auth() {
        $userModel = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // 1. Cari user
        $user = $userModel->where('username', $username)->first();

        // 2. Verifikasi plain text (langsung bandingin teks)
        if ($user && $password == $user['password']) {
            
            // 3. Regenerate session ID untuk keamanan
            session()->regenerate();
            
            // 4. Set Session baru
            session()->set([
                'isLoggedIn' => true,
                'username'   => $user['username'],
                'role'       => $user['role']
            ]);
            
            return redirect()->to(base_url('admin/dashboard'));
        }
        
        // Jika gagal, kembali ke login
        return redirect()->back()->with('error', 'Username atau Password salah!');
    }

    public function logout() {
        // Hapus semua data sesi
        session()->destroy();
        return redirect()->to(base_url('admin/login'));
    }

    public function dashboard() {
        $data = [
            'total_products' => $this->productModel->countAll(),
            'low_stock'      => $this->productModel->where('stock <', 5)->countAllResults(),
            'new_orders'     => $this->orderModel->where('status', 'Pending')->countAllResults()
        ];
        return view('admin/dashboard_v', $data);
    }

    public function orders() {
        // Menggunakan Paging untuk daftar order (10 per halaman)
        $data = [
            'orders' => $this->orderModel->orderBy('id', 'DESC')->paginate(10),
            'pager'  => $this->orderModel->pager
        ];
        return view('admin/orders_v', $data);
    }
}