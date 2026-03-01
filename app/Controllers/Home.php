<?php

namespace App\Controllers;

<<<<<<< HEAD
<<<<<<< HEAD
// Wajib import ProductModel untuk akses database db_gears
=======
// Menggunakan ProductModel untuk akses ke database db_gears
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
=======
// Menggunakan ProductModel untuk akses ke database db_gears
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
use App\Models\ProductModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Home extends BaseController
{
    protected $productModel;

    public function __construct()
    {
<<<<<<< HEAD
<<<<<<< HEAD
        // Inisialisasi model agar bisa dipakai di semua fungsi
=======
        // Inisialisasi model satu kali untuk semua fungsi
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
=======
        // Inisialisasi model satu kali untuk semua fungsi
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
        $this->productModel = new ProductModel();
    }

    public function index(): string
    {
        try {
<<<<<<< HEAD
<<<<<<< HEAD
            // Mengambil semua produk untuk ditampilkan di halaman utama
            $data['products'] = $this->productModel->findAll();
        } catch (\Exception $e) {
            // Jika DB error, kirim array kosong biar view nggak "Whoops"
=======
=======
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
            // Mengambil data produk untuk halaman utama (contoh: 8 produk)
            $data['products'] = $this->productModel->limit(8)->findAll();
        } catch (\Exception $e) {
            // Jika database error, kirim array kosong agar view tidak Whoops!
<<<<<<< HEAD
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
=======
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
            $data['products'] = [];
        }
        
        return view('index_v', $data);
    }

    public function shop()
    {
        try {
<<<<<<< HEAD
<<<<<<< HEAD
            // Ambil data produk untuk halaman Shop
=======
            // Ambil semua data produk untuk halaman Shop
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
=======
            // Ambil semua data produk untuk halaman Shop
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
            $data['products'] = $this->productModel->findAll();
        } catch (\Exception $e) {
            $data['products'] = [];
        }
        
        return view('shop_v', $data);
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
    }

    public function contact() 
    { 
        return view('contact_v');
<<<<<<< HEAD
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
=======
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
    }

    public function bestseller()
    {
        try {
<<<<<<< HEAD
<<<<<<< HEAD
            // Ambil 4 produk dengan stok paling sedikit (asumsi paling laku)
=======
            // Ambil 4 produk dengan stok paling sedikit (asumsi terlaris)
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
=======
            // Ambil 4 produk dengan stok paling sedikit (asumsi terlaris)
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
            $data['products'] = $this->productModel->orderBy('stock', 'ASC')->limit(4)->findAll();
        } catch (\Exception $e) {
            $data['products'] = [];
        }
        
        return view('bestseller_v', $data);
<<<<<<< HEAD
<<<<<<< HEAD
    }

    public function single($id)
{
    $productModel = new \App\Models\ProductModel();
    $data['product'] = $productModel->find($id); // Mencari produk berdasarkan ID
    
    if (empty($data['product'])) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
    
    return view('single_v', $data);
}
    public function cart() 
    { 
        // Mengambil data keranjang dari session
        $session = session();
        $data['cart'] = $session->get('cart') ?? [];
        
        return view('cart_v', $data); 
    }

    public function checkout() 
    { 
        $session = session();
        $cart = $session->get('cart') ?? [];

        // Proteksi: Jika keranjang kosong, tendang balik ke shop
        if (empty($cart)) {
            return redirect()->to(base_url('shop'))->with('error', 'Keranjang lo masih kosong!');
        }

        $data['cart'] = $cart;
        return view('checkout_v', $data); 
=======
=======
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
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
<<<<<<< HEAD
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
=======
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
    }
}