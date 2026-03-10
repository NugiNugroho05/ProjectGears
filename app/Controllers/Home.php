<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Home extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        // Inisialisasi model agar bisa dipakai di semua fungsi
        $this->productModel = new ProductModel();
    }

    /**
     * Halaman Katalog Utama / Shop
     * Ditambahkan Paging agar produk tidak menumpuk
     */
    public function index(): string
    {
        $data = [
            // paginate(6) artinya 6 produk per halaman
            'products' => $this->productModel->orderBy('id', 'DESC')->paginate(10),
            'pager'    => $this->productModel->pager,
        ];

        return view('index_v', $data);
    }

    /**
     * Halaman Produk Terlaris
     */
    public function bestseller()
    {
        $data = [
            'products' => $this->productModel->orderBy('id', 'ASC')->paginate(6),
            'pager'    => $this->productModel->pager,
        ];
        
        return view('bestseller_v', $data);
    }

    /**
     * Halaman Detail Produk Tunggal
     */
    public function single($id = null)
    {
        if ($id === null) {
            return redirect()->to(base_url('shop'));
        }

        $data['product'] = $this->productModel->find($id);
        
        if (empty($data['product'])) {
            throw PageNotFoundException::forPageNotFound();
        }
        
        return view('single_v', $data);
    }
    
    /**
     * Halaman Keranjang Belanja
     */
    public function cart() 
    { 
        $session = session();
        $data['cart'] = $session->get('cart') ?? [];
        
        return view('cart_v', $data); 
    }

    /**
     * Halaman Checkout
     */
    public function checkout() 
    { 
        $session = session();
        $cart = $session->get('cart') ?? [];

        // Jika keranjang kosong, jangan boleh ke checkout
        if (empty($cart)) {
            return redirect()->to(base_url('shop'))->with('error', 'Keranjang belanja kosong!');
        }

        $data['cart'] = $cart;
        return view('checkout_v', $data); 
    }
}