<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Cart extends BaseController
{
<<<<<<< HEAD
    public function add($id)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($id);
=======
    public function index()
    {
        // Mengambil data keranjang dari session untuk ditampilkan
        $session = session();
        $data['cart'] = $session->get('cart') ?? [];
        
        return view('cart_v', $data);
    }

    public function add($id)
    {
        $model = new ProductModel();
        $product = $model->find($id);
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952

        if (!$product) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan!');
        }

        $session = session();
        $cart = $session->get('cart') ?? [];

<<<<<<< HEAD
        // Logika tambah produk ke keranjang
        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
=======
        // Jika produk sudah ada di cart, tambah quantity, jika belum, tambah baru
        if (isset($cart[$id])) {
            $cart[$id]['qty'] += 1;
        } else {
            $cart[$id] = [
                'id'    => $product['id'],
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
                'name'  => $product['name'],
                'price' => $product['price'],
                'image' => $product['image'],
                'qty'   => 1
            ];
        }

        $session->set('cart', $cart);
<<<<<<< HEAD
        return redirect()->to(base_url('cart'))->with('success', $product['name'] . ' berhasil ditambahkan!');
=======
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
    }

    public function remove($id)
    {
        $session = session();
        $cart = $session->get('cart') ?? [];

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        $session->set('cart', $cart);
<<<<<<< HEAD
        return redirect()->to(base_url('cart'))->with('success', 'Produk berhasil dihapus!');
=======
        return redirect()->to(base_url('cart'))->with('success', 'Produk dihapus!');
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
    }
}