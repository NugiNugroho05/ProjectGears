<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\OrderItemModel;

class Checkout extends BaseController
{
    public function index()
    {
        $session = session();
        $cart = $session->get('cart') ?? [];

        if (empty($cart)) {
            return redirect()->to(base_url('shop'))->with('error', 'Keranjang lo masih kosong!');
        }

        $data['cart'] = $cart;
        return view('checkout_v', $data);
    }

    public function placeOrder()
    {
        $firstName     = $this->request->getPost('first_name');
        $address       = $this->request->getPost('address');
        $paymentMethod = $this->request->getPost('payment_method');
        
        if (empty($firstName) || empty($address) || empty($paymentMethod)) {
            return redirect()->back()->with('error', 'Semua form wajib diisi!');
        }

        $session = session();
        $cart = $session->get('cart') ?? [];

        if (empty($cart)) {
            return redirect()->to(base_url('shop'));
        }

        $orderModel = new OrderModel();
        $orderItemModel = new OrderItemModel();
        
        $total = 0;
        foreach ($cart as $item) {
            // Asumsi key harga di cart adalah 'price'
            $total += ($item['price'] * $item['qty']); 
        }

        // 1. Simpan ke tabel 'orders'
        $orderData = [
            'first_name'     => $firstName,
            'address'        => $address,
            'payment_method' => $paymentMethod,
            'total_price'    => $total,
            'status'         => 'Pending',
            'created_at'     => date('Y-m-d H:i:s')
        ];
        
        $orderModel->insert($orderData);
        $orderId = $orderModel->getInsertID();

        // 2. Simpan ke tabel 'order_items'
        foreach ($cart as $productId => $item) {
            $orderItemModel->insert([
                'order_id'   => $orderId,
                'product_id' => $productId,
                // PERBAIKAN: Gunakan 'quantity' sesuai kolom database
                'quantity'   => $item['qty'], 
                // PERBAIKAN: Gunakan 'price' sesuai kolom database (asumsi)
                'price'      => $item['price'] 
            ]);
        }
        
        // 3. Kosongkan Keranjang & Redirect
        $session->remove('cart');
        
        return redirect()->to(base_url('shop'))->with('success', 'Pesanan berhasil dibuat!');
    }
}