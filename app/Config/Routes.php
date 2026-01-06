<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::login');
$routes->get('/signin', 'Login::signin');
$routes->post('/login', 'Login::aksi_login');
$routes->get('/home', 'Home::index');
$routes->get('/tampildata', 'Home::tampildata');
$routes->get('/formdata', 'Home::formdatas');
$routes->post('/inputuser', 'User::input');
$routes->get('/edituser/(:num)', 'User::editview/$1');
$routes->post('/simpanuser', 'User::simpan');
$routes->get('/deleteuser/(:num)', 'User::hapus/$1');

$routes->post('/inputlevel', 'Level::input');
$routes->get('/editlevel/(:num)', 'Level::editview/$1');
$routes->post('/simpanlevel', 'Level::simpan');
$routes->get('/deletelevel/(:num)', 'Level::hapus/$1');

$routes->get('logout', 'Login::logout');
// $routes->get('home/selesai/(:num)', 'Home::selesai/$1');
// $routes->get('home/input/', 'Home::inputview');
// $routes->post('home/input/', 'Home::input');
// $routes->get('home/edit/(:num)', 'Home::editview/$1');
// $routes->post('home/simpan/', 'Home::simpan');
// $routes->get('home/delete/(:num)', 'Home::hapus/$1');