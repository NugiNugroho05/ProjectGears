<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Cart extends BaseController
{
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

        if (!$product) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan!');
        }

        $session = session();
        $cart = $session->get('cart') ?? [];

        // Jika produk sudah ada di cart, tambah quantity, jika belum, tambah baru
        if (isset($cart[$id])) {
            $cart[$id]['qty'] += 1;
        } else {
            $cart[$id] = [
                'id'    => $product['id'],
                'name'  => $product['name'],
                'price' => $product['price'],
                'image' => $product['image'],
                'qty'   => 1
            ];
        }

        $session->set('cart', $cart);
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
    }

    public function remove($id)
    {
        $session = session();
        $cart = $session->get('cart') ?? [];

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        $session->set('cart', $cart);
        return redirect()->to(base_url('cart'))->with('success', 'Produk dihapus!');
    }
}