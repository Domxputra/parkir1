<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('kendaraan', 'kendaraan::index');

$routes->group('kendaraan', function ($routes) {
    $routes->get('/', 'Kendaraan::index');
    $routes->add('tambah', 'Kendaraan::tambah');
    $routes->add('ubah/(:any)', 'Kendaraan::ubah/$1');
    $routes->get('hapus/(:any)', 'Kendaraan::hapus/$1');
});

$routes->group('transaksi', function ($routes) {
    $routes->get('/', 'Transaksi::index');
    $routes->add('tambah/(:any)', 'Transaksi::tambah/$1');
    $routes->add('ubah/(:any)', 'Transaksi::ubah/$1');
    $routes->get('hapus/(:any)', 'Transaksi::hapus/$1');
});

$routes->group('authentication', function($routes){
    $routes->get('/', 'Auth::index');
    $routes->add('login', 'Auth::login');
    $routes->get('logout', 'Auth::logout');
});
