<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

<<<<<<< HEAD
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
=======
// 1. Halaman Utama (Home)
$routes->get('/', 'Home::index');
$routes->get('/contact', 'Home::contact');
$routes->get('/cart', 'Home::cart');
$routes->get('/bestseller', 'Home::bestseller'); // Pindahkan ke Home agar konsisten

// 2. Halaman Belanja (Shop) - Untuk Pengunjung
// PERBAIKAN: Arahkan ke Controller Home, karena di situ data produk di-load
$routes->get('/shop', 'Home::shop');
// PERBAIKAN FATAL: Arahkan ke fungsi 'single' di Controller Home
$routes->get('/single/(:num)', 'Home::single/$1'); 

// 3. Halaman Manajemen Produk (Product) - Untuk Admin
$routes->get('/product', 'Product::index');
$routes->get('/product/add', 'Product::add');
$routes->post('/product/save', 'Product::save');
$routes->get('/product/edit/(:num)', 'Product::edit/$1');
$routes->post('/product/update/(:num)', 'Product::update/$1');
$routes->get('/product/delete/(:num)', 'Product::delete/$1');

<<<<<<< HEAD
// 4. Halaman Dashboard - Untuk Admin
$routes->get('/dashboard', 'DashboardController::index');
=======
// 4. Halaman Checkout (Checkout)
// PERBAIKAN: Arahkan ke Controller Home karena fungsi 'checkout' ada di sana
$routes->get('/checkout', 'Home::checkout'); 
// TAMBAHAN: Untuk memproses order, lo butuh route POST
$routes->post('/checkout/placeOrder', 'Home::placeOrder');

// 5. Keranjang (Cart) - Logika
$routes->get('/cart/add/(:num)', 'Cart::add/$1');
$routes->get('/cart/remove/(:num)', 'Cart::remove/$1');
>>>>>>> 7d096bd10c9107d8202a33c86b8c9966ce68c5f5
>>>>>>> 61a671798292155ef4da05d42f6ecef70f830952
