<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false); // Disarankan false untuk keamanan

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// --- HALAMAN USER SIDE (Frontend) ---
$routes->get('/', 'Home::index');
$routes->get('shop', 'Shop::index');
$routes->get('bestseller', 'Home::bestseller');
$routes->get('single/(:num)', 'Shop::detail/$1');

// --- KERANJANG & CHECKOUT (User) ---
$routes->get('cart', 'Cart::index');
$routes->get('cart/add/(:num)', 'Cart::add/$1');
$routes->get('cart/remove/(:num)', 'Cart::remove/$1');
$routes->get('checkout', 'Checkout::index');
$routes->post('checkout/placeOrder', 'Checkout::placeOrder');

// --- ADMIN AREA (Backend) ---

// 1. Rute untuk Login & Auth (TIDAK butuh filter auth karena belum login)
$routes->get('admin/login', 'Admin::login');
$routes->post('admin/auth', 'Admin::auth');
$routes->get('admin/logout', 'Admin::logout');

// 2. Rute untuk Dashboard & Manajemen (WAJIB butuh filter auth)
// Rute di dalam group ini tidak bisa diakses sebelum login
$routes->group('admin', ['filter' => 'adminAuth'], function($routes) {
    $routes->get('dashboard', 'Admin::dashboard');
    $routes->get('orders', 'Product::orders'); // Rute untuk ngecek orderan masuk
    
    // CRUD Produk
    $routes->get('product', 'Product::index');
    $routes->get('product/add', 'Product::add');
    $routes->post('product/save', 'Product::create');
    $routes->get('product/edit/(:num)', 'Product::edit/$1');
    $routes->post('product/update/(:num)', 'Product::update/$1');
    
    // --- PERBAIKAN RUTE DELETE PRODUK DI SINI ---
    $routes->get('product/delete/(:num)', 'Product::delete/$1');

    // --- TAMBAHKAN RUTE PESANAN DI SINI ---
    $routes->get('orders/view/(:num)', 'Product::view/$1'); // Detail Pesanan
    $routes->post('orders/updateStatus/(:num)', 'Product::updateStatus/$1'); // Update Status
    $routes->get('orders/delete/(:num)', 'Product::deleteOrder/$1'); // Hapus Pesanan

    // Rute Stock
    $routes->get('stock/laptop', 'Product::laptop');
    $routes->get('stock/electronics', 'Product::electronics');
});