<?php

namespace App\Controllers;

<<<<<<< HEAD
<<<<<<< HEAD
use App\Models\OrderModel; // Import Model
use App\Models\OrderItemModel; // Import Model

=======
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
=======
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
class Checkout extends BaseController
{
    public function index()
    {
        $session = session();
        $cart = $session->get('cart') ?? [];

<<<<<<< HEAD
<<<<<<< HEAD
=======
        // Proteksi: Kalau keranjang kosong, dilarang masuk ke checkout
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
=======
        // Proteksi: Kalau keranjang kosong, dilarang masuk ke checkout
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
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
<<<<<<< HEAD
<<<<<<< HEAD
        $paymentMethod = $this->request->getPost('payment_method'); // Ambil dari form
        
        // 2. VALIDASI
        if (empty($firstName) || empty($address) || empty($paymentMethod)) {
            return redirect()->back()->with('error', 'Semua form wajib diisi!');
        }

        $session = session();
        $cart = $session->get('cart') ?? [];

        if (empty($cart)) {
            return redirect()->to(base_url('shop'))->with('error', 'Keranjang kosong!');
        }

        // 3. PROSES SIMPAN KE DATABASE
        $orderModel = new OrderModel();
        $orderItemModel = new OrderItemModel();
        
        // Hitung total harga
        $total = 0;
        foreach ($cart as $item) {
            $total += ($item['price'] * $item['qty']);
        }

        // A. Insert ke tabel 'orders'
        $orderData = [
            'first_name'     => $firstName,
            'address'        => $address,
            'payment_method' => $paymentMethod,
            'total_price'    => $total,
            'status'         => 'Pending', // Default status
            'created_at'     => date('Y-m-d H:i:s')
        ];
        
        $orderModel->insert($orderData);
        $orderId = $orderModel->getInsertID(); // Ambil ID order yang baru dibuat

        // B. Insert ke tabel 'order_items' (Per barang)
        foreach ($cart as $productId => $item) {
            $itemData = [
                'order_id'          => $orderId,
                'product_id'        => $productId,
                'qty'               => $item['qty'],
                'price_at_purchase' => $item['price']
            ];
            $orderItemModel->insert($itemData);
        }

        // 4. Kosongkan keranjang
        $session->remove('cart'); 

        // 5. Arahkan ke halaman sukses
        return redirect()->to(base_url('/'))->with('success', 'Pesanan berhasil dibuat! ID Pesanan: ' . $orderId);
=======
=======
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
        
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
<<<<<<< HEAD
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
=======
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
    }
}