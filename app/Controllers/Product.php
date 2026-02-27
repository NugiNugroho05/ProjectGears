<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Product extends BaseController
{
    protected $productModel;

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
        $this->productModel->save([
            'name'        => $this->request->getPost('name'),
            'category'    => $this->request->getPost('category'),
            'price'       => $this->request->getPost('price'),
            'description' => $this->request->getPost('description'),
            'image'       => $this->request->getPost('image'),
            'stock'       => $this->request->getPost('stock'),
        ]);

        return redirect()->to(base_url('product'))->with('success', 'Produk berhasil ditambahkan!');
    }
}