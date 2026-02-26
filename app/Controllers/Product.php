<?php

namespace App\Controllers;

class Product extends BaseController
{
    public function index()
    {
        // Halaman daftar produk (Admin)
        return view('admin/product_index_v');
    }

    public function add()
    {
        // Halaman form tambah produk
        return view('admin/product_add_v');
    }

    public function save()
    {
        // Fungsi untuk memproses penyimpanan data dari form ke database
        // Sementara redirect balik ke index karena DB belum siap
        return redirect()->to('/product');
    }

    public function edit($id = null)
    {
        // Halaman form edit produk berdasarkan ID
        return view('admin/product_edit_v');
    }

    public function update($id = null)
    {
        // Fungsi untuk memproses update data
        return redirect()->to('/product');
    }

    public function delete($id = null)
    {
        // Fungsi untuk menghapus data
        return redirect()->to('/product');
    }
}