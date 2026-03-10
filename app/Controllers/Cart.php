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

        // Cek apakah produk sudah ada di keranjang
        if (isset($cart[$id])) {
            // Jika ada, tambahkan quantity
            $cart[$id]['qty']++;
        } else {
            // Jika belum, tambahkan produk baru
            $cart[$id] = [
                'id'    => $product['id'],
                'name'  => $product['name'],
                'price' => $product['price'],
                'image' => $product['image'],
                'qty'   => 1
            ];
        }

        $session->set('cart', $cart);
        
        // Kembalikan ke halaman sebelumnya
        return redirect()->back()->with('success', $product['name'] . ' berhasil ditambahkan ke keranjang!');
    }

    public function remove($id)
    {
        $session = session();
        $cart = $session->get('cart') ?? [];

        // Hapus produk berdasarkan ID
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        $session->set('cart', $cart);
        
        return redirect()->to(base_url('cart'))->with('success', 'Produk berhasil dihapus!');
    }
}