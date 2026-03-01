<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --- HALAMAN USER SIDE (Frontend) ---
$routes->get('/', 'Home::index');
$routes->get('shop', 'Home::shop');
$routes->get('bestseller', 'Home::bestseller');
$routes->get('single/(:num)', 'Home::single/$1');

// --- KERANJANG & CHECKOUT (User) ---
$routes->get('cart', 'Home::cart');
$routes->get('cart/add/(:num)', 'Cart::add/$1');
$routes->get('cart/remove/(:num)', 'Cart::remove/$1');
$routes->get('checkout', 'Home::checkout');
$routes->post('checkout/placeOrder', 'Checkout::placeOrder');

// --- ADMIN AREA (Backend) ---
// Semua fungsi admin harus diawali dengan 'admin/' di URL
$routes->group('admin', function($routes) {
    // Dashboard
    $routes->get('dashboard', 'Product::dashboard');
    
    // CRUD Produk
    $routes->get('product', 'Product::index'); // Daftar Produk
    $routes->get('product/add', 'Product::add'); // Form Tambah
    $routes->post('product/save', 'Product::save'); // Proses Simpan
    $routes->get('product/edit/(:num)', 'Product::edit/$1'); // Form Edit
    $routes->post('product/update/(:num)', 'Product::update/$1'); // Proses Update
    $routes->get('product/delete/(:num)', 'Product::delete/$1'); // Proses Hapus
    
    // Filter Kategori (Link di Sidebar)
    $routes->get('stock/laptop', 'Product::stock_laptop');
    $routes->get('stock/electronics', 'Product::stock_electronics');
    
    // Halaman Order
    $routes->get('orders', 'Product::orders');
    $routes->post('orders/update/(:num)', 'Product::updateStatus/$1'); // Proses Update Status
    
    // --- TAMBAHAN RUTE HAPUS ORDER ---
    $routes->get('orders/delete/(:num)', 'Product::deleteOrder/$1'); // Hapus Order
});

// Redirect agar link lama tidak mati
$routes->addRedirect('product', 'admin/product');