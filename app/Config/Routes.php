<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('login', 'Auth::loginForm');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout', ['filter'=>'auth']);

$routes->get('/', 'Dashboard::index', ['filter'=>'auth']);
$routes->get('dashboard', 'Dashboard::index', ['filter'=>'auth']);

$routes->group('', ['filter'=>'auth'], function($routes){

    // Jenis Uji
    $routes->get('jenis-uji', 'JenisUji::index');
    $routes->get('jenis-uji/create', 'JenisUji::create');
    $routes->post('jenis-uji/store', 'JenisUji::store');
    $routes->get('jenis-uji/edit/(:num)', 'JenisUji::edit/$1');
    $routes->post('jenis-uji/update/(:num)', 'JenisUji::update/$1');
    $routes->get('jenis-uji/delete/(:num)', 'JenisUji::delete/$1');

    // Nota
    $routes->get('nota', 'Nota::index');
    $routes->get('nota/create/mahasiswa', 'Nota::createMahasiswa');
    $routes->get('nota/create/umum', 'Nota::createUmum');
    $routes->get('nota/edit/(:num)', 'Nota::edit/$1');
    $routes->post('nota/update/(:num)', 'Nota::update/$1');
    $routes->post('nota/add-item/(:num)', 'Nota::addItem/$1');
    $routes->get('nota/delete-item/(:num)/(:num)', 'Nota::deleteItem/$1/$2');

    // API harga (buat “mirip contoh”: harga otomatis)
    $routes->get('api/jenis-uji/(:num)/(:any)', 'Nota::apiJenisUji/$1/$2');
    $routes->get('kepala-lab', 'KepalaLab::index');
$routes->get('kepala-lab/create', 'KepalaLab::create');
$routes->post('kepala-lab/store', 'KepalaLab::store');
$routes->get('kepala-lab/edit/(:num)', 'KepalaLab::edit/$1');
$routes->post('kepala-lab/update/(:num)', 'KepalaLab::update/$1');
$routes->get('kepala-lab/delete/(:num)', 'KepalaLab::delete/$1');

$routes->get('user', 'User::index');
$routes->get('user/create', 'User::create');
$routes->post('user/store', 'User::store');
$routes->get('user/edit/(:num)', 'User::edit/$1');
$routes->post('user/update/(:num)', 'User::update/$1');
$routes->get('user/delete/(:num)', 'User::delete/$1');
$routes->post('user/reset-password/(:num)', 'User::resetPassword/$1');

$routes->get('laporan/pengujian', 'Laporan::pengujian');
$routes->get('laporan/pengujian/print', 'Laporan::pengujianPrint');
$routes->get('laporan/pengujian/csv', 'Laporan::pengujianCsv');

$routes->get('profil', 'Profil::index');
$routes->get('profil/edit', 'Profil::edit');
$routes->post('profil/update', 'Profil::update');
$routes->get('profil/password', 'Profil::password');
$routes->post('profil/password', 'Profil::passwordSave');

});
