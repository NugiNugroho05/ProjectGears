<?php

namespace App\Controllers;

// Menggunakan ProductModel untuk akses ke database db_gears
use App\Models\ProductModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Home extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        // Inisialisasi model satu kali untuk semua fungsi
        $this->productModel = new ProductModel();
    }

    public function index(): string
    {
        try {
            // Mengambil data produk untuk halaman utama (contoh: 8 produk)
            $data['products'] = $this->productModel->limit(8)->findAll();
        } catch (\Exception $e) {
            // Jika database error, kirim array kosong agar view tidak Whoops!
            $data['products'] = [];
        }
        
        return view('index_v', $data);
    }

    public function shop()
    {
        try {
            // Ambil semua data produk untuk halaman Shop
            $data['products'] = $this->productModel->findAll();
        } catch (\Exception $e) {
            $data['products'] = [];
        }
        
        return view('shop_v', $data);
    }

    public function contact() 
    { 
        return view('contact_v');
    }

    public function bestseller()
    {
        try {
            // Ambil 4 produk dengan stok paling sedikit (asumsi terlaris)
            $data['products'] = $this->productModel->orderBy('stock', 'ASC')->limit(4)->findAll();
        } catch (\Exception $e) {
            $data['products'] = [];
        }
        
        return view('bestseller_v', $data);
    }

    public function single($id = null)
    {
        if ($id === null) {
            return redirect()->to(base_url('shop'));
        }

        $data['product'] = $this->productModel->find($id);

        if (!$data['product']) {
            throw PageNotFoundException::forPageNotFound("Produk dengan ID $id nggak ada di db_gears.");
        }

        return view('single_v', $data);
    }
}