<?php

namespace App\Controllers;

use App\Models\ProductModel;
<<<<<<< HEAD
use App\Models\OrderModel; 
=======
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952

class Product extends BaseController
{
    protected $productModel;
<<<<<<< HEAD
    protected $orderModel;

    public function __construct() {
        $this->productModel = new ProductModel();
        $this->orderModel = new OrderModel(); 
    }

    public function dashboard() {
        $data = [
            'total_products' => $this->productModel->countAll(),
            'low_stock'      => $this->productModel->where('stock <', 5)->countAllResults(),
            'latest'         => $this->productModel->orderBy('id', 'DESC')->limit(5)->findAll(),
            'new_orders'     => $this->orderModel->where('status', 'Pending')->countAllResults()
        ];
        return view('admin/dashboard_v', $data);
    }

    public function index() {
        $data['products'] = $this->productModel->findAll();
        $data['title'] = "Semua Stock";
        return view('admin/product_index_v', $data);
    }

    public function stock_laptop() {
        $data['products'] = $this->productModel->where('category', 'Laptop')->findAll();
        $data['title'] = "Stock Laptop";
        return view('admin/product_index_v', $data);
    }

    public function stock_electronics() {
        $data['products'] = $this->productModel->where('category', 'Electronics')->findAll();
        $data['title'] = "Stock Electronics";
        return view('admin/product_index_v', $data);
    }

    public function add() {
        return view('admin/product_add_v');
    }

    public function save() {
        $file = $this->request->getFile('image');
        $newName = 'default.jpg';

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('assets/img', $newName);
        }

=======

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $data['products'] = $this->productModel->findAll();
        return view('admin/product_index_v', $data);
    }

    public function add()
    {
        return view('admin/product_add_v');
    }

    public function save()
    {
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
        $this->productModel->save([
            'name'        => $this->request->getPost('name'),
            'category'    => $this->request->getPost('category'),
            'price'       => $this->request->getPost('price'),
<<<<<<< HEAD
            'stock'       => $this->request->getPost('stock'),
            'description' => $this->request->getPost('description'),
            'image'       => $newName
        ]);
        
        return redirect()->to(base_url('admin/product'))->with('success', 'Barang Berhasil Ditambah!');
    }

    public function edit($id) {
        $data['product'] = $this->productModel->find($id);
        
        if (empty($data['product'])) {
            return redirect()->to(base_url('admin/product'))->with('error', 'Produk tidak ditemukan');
        }
        
        return view('admin/product_edit_v', $data);
    }

    public function delete($id) {
        $this->productModel->delete($id);
        return redirect()->to(base_url('admin/product'))->with('success', 'Barang Telah Dihapus!');
    }

    public function update($id) {
        $file = $this->request->getFile('image');
        $product = $this->productModel->find($id);
        $newName = $product['image']; // Default pakai gambar lama

        // Cek apakah ada file baru yang diupload
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Hapus gambar lama biar gak penuh-penuhin folder
            if (file_exists('assets/img/' . $product['image'])) {
                unlink('assets/img/' . $product['image']);
            }
            $newName = $file->getRandomName();
            $file->move('assets/img', $newName);
        }

        // UPDATE SEMUA FIELD
        $this->productModel->update($id, [
            'name'        => $this->request->getPost('name'),
            'category'    => $this->request->getPost('category'),
            'price'       => $this->request->getPost('price'),
            'stock'       => $this->request->getPost('stock'),
            'description' => $this->request->getPost('description'),
            'image'       => $newName // Nama gambar baru atau lama
        ]);
        
        return redirect()->to(base_url('admin/product'))->with('success', 'Barang Berhasil Diupdate Semua!');
    }
    
    // --- MANAJEMEN PESANAN ---
    
    public function orders() {
        $data['orders'] = $this->orderModel->orderBy('created_at', 'DESC')->findAll();
        return view('admin/orders_v', $data);
    }

    public function updateStatus($id) {
        $newStatus = $this->request->getPost('status');
        
        // Update ke database
        $this->orderModel->update($id, ['status' => $newStatus]);
        
        return redirect()->to(base_url('admin/orders'))->with('success', 'Status Order #ORD-'.$id.' berhasil diupdate ke: ' . $newStatus);
    }

    // --- FUNGSI HAPUS PESANAN (BARU) ---
    public function deleteOrder($id) {
        $this->orderModel->delete($id);
        
        return redirect()->to(base_url('admin/orders'))->with('success', 'Pesanan #ORD-'.$id.' berhasil dihapus!');
=======
            'description' => $this->request->getPost('description'),
            'image'       => $this->request->getPost('image'),
            'stock'       => $this->request->getPost('stock'),
        ]);

        return redirect()->to(base_url('product'))->with('success', 'Produk berhasil ditambahkan!');
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
    }
}