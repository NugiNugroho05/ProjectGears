<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// 1. Halaman Utama (Home)
$routes->get('/', 'Home::index');
$routes->get('/contact', 'Home::contact');
$routes->get('/cart', 'Home::cart');

// 2. Halaman Belanja (Shop) - Untuk Pengunjung
$routes->get('/shop', 'Shop::index');
$routes->get('/shop/detail/(:any)', 'Shop::detail/$1');

// 3. Halaman Manajemen Produk (Product) - Untuk Admin
$routes->get('/product', 'Product::index');
$routes->get('/product/add', 'Product::add');
$routes->post('/product/save', 'Product::save');
$routes->get('/product/edit/(:num)', 'Product::edit/$1');
$routes->post('/product/update/(:num)', 'Product::update/$1');
$routes->get('/product/delete/(:num)', 'Product::delete/$1');

// 4. Halaman Dashboard - Untuk Admin
$routes->get('/dashboard', 'DashboardController::index');