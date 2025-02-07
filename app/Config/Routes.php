<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->match(['get', 'post'], '/', 'Home::index');

$routes->match(['get', 'post'], '/games/voucher/(:num)/', 'Games::voucher/$1');
$routes->match(['get', 'post'], '/games/order/(:any)/(:any)', 'Games::order/$1/$2');
$routes->match(['get', 'post'], '/games/(:any)', 'Games::index/$1');
$routes->match(['get', 'post'], '/syarat-ketentuan', 'Pages::sk');
$routes->match(['get', 'post'], '/post/(:any)', 'Post::index/$1');
$routes->match(['get', 'post'], '/postingan', 'Pages::postingan');

$routes->match(['get', 'post'], '/price', 'Pages::price');
$routes->match(['get', 'post'], '/tabelharga', 'Pages::tabelharga');
$routes->match(['get', 'post'], '/method', 'Pages::method');
$routes->match(['get', 'post'], '/kalkulatorwr', 'Pages::kalkulatorwr');
$routes->match(['get', 'post'], '/hpmagicwheel', 'Pages::hpmagicwheel');
$routes->match(['get', 'post'], '/login', 'Pages::login');
$routes->match(['get', 'post'], '/logout', 'Pages::logout');
$routes->match(['get', 'post'], '/register', 'Pages::register');
$routes->match(['get', 'post'], '/register/(:any)', 'Pages::register/$1');


$routes->match(['get', 'post'], '/payment', 'Payment::index');
$routes->match(['get', 'post'], '/payment/(:any)', 'Payment::index/$1');

$routes->match(['get', 'post'], '/SuperPag3', 'Admin\Home::index');
$routes->match(['get', 'post'], '/admin/password', 'Admin\Home::password');
$routes->match(['get', 'post'], '/admin-topupindo', 'Admin\Home::login');

$routes->match(['get', 'post'], '/admin/konfigurasi/banner/delete/(:num)', 'Admin\Konfigurasi::banner/delete/$1');
$routes->match(['get', 'post'], '/admin/konfigurasi', 'Admin\Konfigurasi::index');

$routes->match(['get', 'post'], '/admin/games', 'Admin\Games::index');
$routes->match(['get', 'post'], '/admin/games/add', 'Admin\Games::add');
$routes->match(['get', 'post'], '/admin/games/edit/(:num)', 'Admin\Games::edit/$1');
$routes->match(['get', 'post'], '/admin/games/delete/(:num)', 'Admin\Games::delete/$1');

$routes->match(['get', 'post'], '/admin/kategori', 'Admin\Kategori::index');
$routes->match(['get', 'post'], '/admin/kategori/add', 'Admin\Kategori::add');
$routes->match(['get', 'post'], '/admin/kategori/edit/(:num)', 'Admin\Kategori::edit/$1');
$routes->match(['get', 'post'], '/admin/kategori/delete/(:num)', 'Admin\Kategori::delete/$1');

$routes->match(['get', 'post'], '/admin/produk', 'Admin\Produk::index');
$routes->match(['get', 'post'], '/admin/produk/add', 'Admin\Produk::add');
$routes->match(['get', 'post'], '/admin/produk/edit/(:num)', 'Admin\Produk::edit/$1');
$routes->match(['get', 'post'], '/admin/produk/delete/(:num)', 'Admin\Produk::delete/$1');

$routes->match(['get', 'post'], '/admin/pesanan', 'Admin\Pesanan::index');
$routes->match(['get', 'post'], '/admin/pesanan/add', 'Admin\Pesanan::add');
$routes->match(['get', 'post'], '/admin/pesanan/detail/(:num)', 'Admin\Pesanan::detail/$1');
$routes->match(['get', 'post'], '/admin/pesanan/edit/(:num)', 'Admin\Pesanan::edit/$1');
$routes->match(['get', 'post'], '/admin/pesanan/delete/(:num)', 'Admin\Pesanan::delete/$1');

$routes->match(['get', 'post'], '/admin/metode', 'Admin\Metode::index');
$routes->match(['get', 'post'], '/admin/metode/add', 'Admin\Metode::add');
$routes->match(['get', 'post'], '/admin/metode/edit/(:num)', 'Admin\Metode::edit/$1');
$routes->match(['get', 'post'], '/admin/metode/delete/(:num)', 'Admin\Metode::delete/$1');
$routes->match(['get', 'post'], '/admin/metode/price/(:num)', 'Admin\Metode::price/$1');

$routes->match(['get', 'post'], '/admin/pengguna', 'Admin\Pengguna::index');
$routes->match(['get', 'post'], '/admin/pengguna/add', 'Admin\Pengguna::add');
$routes->match(['get', 'post'], '/admin/pengguna/edit/(:num)', 'Admin\Pengguna::edit/$1');
$routes->match(['get', 'post'], '/admin/pengguna/delete/(:num)', 'Admin\Pengguna::delete/$1');
$routes->match(['get', 'post'], '/admin/pengguna/reset/(:num)', 'Admin\Pengguna::reset/$1');

$routes->match(['get', 'post'], '/admin/topup', 'Admin\Topup::index');
$routes->match(['get', 'post'], '/admin/topup/edit/(:num)', 'Admin\Topup::edit/$1');
$routes->match(['get', 'post'], '/admin/topup/detail/(:num)', 'Admin\Topup::detail/$1');
$routes->match(['get', 'post'], '/admin/topup/delete/(:num)', 'Admin\Topup::delete/$1');
$routes->match(['get', 'post'], '/admin/topup/accept/(:num)', 'Admin\Topup::accept/$1');

$routes->match(['get', 'post'], '/admin/admin', 'Admin\Admin::index');
$routes->match(['get', 'post'], '/admin/admin/add', 'Admin\Admin::add');
$routes->match(['get', 'post'], '/admin/logout', 'Admin\Admin::logout');
$routes->match(['get', 'post'], '/admin/admin/edit/(:num)', 'Admin\Admin::edit/$1');
$routes->match(['get', 'post'], '/admin/admin/delete/(:num)', 'Admin\Admin::delete/$1');
$routes->match(['get', 'post'], '/admin/admin/reset/(:num)', 'Admin\Admin::reset/$1');

$routes->match(['get', 'post'], '/user', 'User::index');
$routes->match(['get', 'post'], '/user/topup', 'User::topup');
$routes->match(['get', 'post'], '/user/topup/(:any)', 'User::topup/$1');
$routes->match(['get', 'post'], '/user/riwayat', 'User::riwayat');

$routes->match(['get', 'post'], '/sistem/callback/(:any)', 'Sistem::callback/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
