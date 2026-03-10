<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\OrderModel; 

class Product extends BaseController
{
    protected $productModel;
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
        $data['products'] = $this->productModel->paginate(5); // Ganti findAll() jadi ini
        $data['pager'] = $this->productModel->pager;        // Tambah baris ini
        $data['title'] = "All Products";
        return view('admin/product_index_v', $data);
    }

    // Fungsi untuk menampilkan produk kategori laptop
    public function laptop() {
        $data['products'] = $this->productModel->where('category', 'Laptop')->paginate(5); // Ganti findAll()
        $data['pager'] = $this->productModel->pager;                                       // Tambah baris ini
        $data['title'] = "Stock Laptop";
        return view('admin/product_index_v', $data);
    }

    // Fungsi untuk menampilkan produk kategori electronics
    public function electronics() {
        $data['products'] = $this->productModel->where('category', 'Electronics')->paginate(5); // Ganti findAll()
        $data['pager'] = $this->productModel->pager;                                            // Tambah baris ini
        $data['title'] = "Stock Electronics";
        return view('admin/product_index_v', $data);
    }

    public function add() {
        return view('admin/product_add_v');
    }

    public function create() {
        $file = $this->request->getFile('image');
        $newName = $file->getRandomName();
        $file->move('assets/img', $newName);

        $this->productModel->save([
            'name'        => $this->request->getPost('name'),
            'category'    => $this->request->getPost('category'),
            'price'       => $this->request->getPost('price'),
            'stock'       => $this->request->getPost('stock'),
            'description' => $this->request->getPost('description'),
            'image'       => $newName
        ]);
        
        return redirect()->to(base_url('admin/product'))->with('success', 'Item Successfully Added!');
    }

    public function edit($id) {
        $data['product'] = $this->productModel->find($id);
        return view('admin/product_edit_v', $data);
    }

    public function update($id) {
        $file = $this->request->getFile('image');
        $oldImage = $this->request->getPost('old_image');

        if ($file->isValid() && !$file->hasMoved()) {
            if (file_exists('assets/img/' . $oldImage)) {
                unlink('assets/img/' . $oldImage);
            }
            $newName = $file->getRandomName();
            $file->move('assets/img', $newName);
        } else {
            $newName = $oldImage;
        }

        $this->productModel->update($id, [
            'name'        => $this->request->getPost('name'),
            'category'    => $this->request->getPost('category'),
            'price'       => $this->request->getPost('price'),
            'stock'       => $this->request->getPost('stock'),
            'description' => $this->request->getPost('description'),
            'image'       => $newName
        ]);
        
        return redirect()->to(base_url('admin/product'))->with('success', 'Item #'.$id.' updated successfully!');
    }
    
    // --- FUNGSI HAPUS PRODUK (Perbaikan Error Delete) ---
    public function delete($id) {
        $this->productModel->delete($id);
        return redirect()->to(base_url('admin/product'))->with('success', 'Product deleted!');
    }
    // -----------------------------------------------------

    public function orders() {
        $data['orders'] = $this->orderModel->orderBy('created_at', 'DESC')->paginate(5); // Ganti findAll()
        $data['pager'] = $this->orderModel->pager;                                       // Tambah baris ini
        return view('admin/orders_v', $data);
    }

    // --- FUNGSI LIHAT DETAIL PESANAN (Perbaikan Error Detail) ---
    public function view($id) {
        $data['order'] = $this->orderModel->find($id);
        if (empty($data['order'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('admin/orders_view_v', $data); // Pastikan view orders_view_v.php ada
    }
    // -------------------------------------------------------------

    public function updateStatus($id) {
        $newStatus = $this->request->getPost('status');
        $this->orderModel->update($id, ['status' => $newStatus]);
        return redirect()->to(base_url('admin/orders'))->with('success', 'Status Order #ORD-'.$id.' updated to: ' . $newStatus);
    }

    public function deleteOrder($id) {
        $this->orderModel->delete($id);
        return redirect()->to(base_url('admin/orders'))->with('success', 'Order #ORD-'.$id.' delete successfully!');
    }

    // Tambahkan ini di baris paling bawah sebelum tanda } penutup class
    public function logout() {
        session()->destroy();
        return redirect()->to(base_url('login'))->with('success', 'Berhasil keluar dari sistem.');
    }
}