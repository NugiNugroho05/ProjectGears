<?php

namespace App\Controllers;

use App\Models\ProductModel; // Import Model

class Shop extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        
        $data = [
            'products' => $productModel->findAll(), // Ambil semua data produk
        ];

        // Menampilkan halaman katalog produk dengan data
        return view('shop_v', $data); 
    }

    public function detail($id = null)
    {
        // Jika ID kosong, balikkan ke halaman shop
        if (!$id) {
            return redirect()->to('/shop');
        }

        $productModel = new ProductModel();
        
        $data = [
            'product' => $productModel->find($id), // Cari produk berdasarkan ID
        ];

        // Jika produk tidak ditemukan
        if (!$data['product']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Menampilkan halaman detail produk
        return view('single_v', $data);
    }
}