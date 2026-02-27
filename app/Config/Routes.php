<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

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
