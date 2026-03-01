<?php

namespace App\Controllers;

class Shop extends BaseController
{
    public function index()
    {
        // Menampilkan halaman katalog produk
        return view('shop_v'); 
    }

    public function detail($id = null)
    {
        // Jika ID kosong, balikkan ke halaman shop
        if (!$id) {
            return redirect()->to('/shop');
        }

        // Menampilkan halaman detail produk
        return view('shop_detail_v');
    }
}