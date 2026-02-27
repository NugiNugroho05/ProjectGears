<?php

namespace App\Controllers;

class Checkout extends BaseController
{
    public function index()
    {
        $session = session();
        $cart = $session->get('cart') ?? [];

        // Proteksi: Kalau keranjang kosong, dilarang masuk ke checkout
        if (empty($cart)) {
            return redirect()->to(base_url('shop'))->with('error', 'Keranjang lo masih kosong!');
        }

        $data['cart'] = $cart;
        return view('checkout_v', $data);
    }

    public function placeOrder()
    {
        // 1. Ambil data dari form checkout
        $firstName = $this->request->getPost('first_name');
        $address = $this->request->getPost('address');
        
        // 2. VALIDASI (Biar tahan banting)
        if (empty($firstName) || empty($address)) {
            return redirect()->back()->with('error', 'Semua form bertanda * wajib diisi!');
        }

        // 3. PROSES SIMPAN KE DATABASE (Langkah ini wajib ada!)
        // LOGIKA SIMPAN KE TABEL 'orders' DAN 'order_items' DI SINI
        
        // 4. Kosongkan keranjang setelah order berhasil
        $session = session();
        $session->remove('cart'); 

        // 5. Arahkan ke halaman sukses
        return redirect()->to(base_url('/'))->with('success', 'Pesanan berhasil dibuat! Terima kasih.');
    }
}