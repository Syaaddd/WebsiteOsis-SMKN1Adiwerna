<?php
session_start();
require_once dirname(__DIR__) . '/config/app.php';
require_once dirname(__DIR__) . '/config/database.php';
require_once dirname(__DIR__) . '/core/Database.php';
require_once dirname(__DIR__) . '/core/Controller.php';
require_once dirname(__DIR__) . '/core/Router.php';

$router = new Router();

// Public routes
$router->get('', 'BerandaController', 'index');
$router->get('beranda', 'BerandaController', 'index');
$router->get('berita', 'BeritaController', 'index');
$router->get('berita/{slug}', 'BeritaController', 'detail');
$router->get('kegiatan', 'KegiatanController', 'index');
$router->get('pengurus', 'PengurusController', 'index');
$router->get('galeri', 'GaleriController', 'index');
$router->get('tentang', 'TentangController', 'index');
$router->get('kontak', 'KontakController', 'index');
$router->post('kontak', 'KontakController', 'store');

// Admin routes
$router->get('admin/login', 'AdminController', 'loginForm');
$router->post('admin/login', 'AdminController', 'login');
$router->get('admin/logout', 'AdminController', 'logout');
$router->get('admin', 'AdminController', 'dashboard');
$router->get('admin/dashboard', 'AdminController', 'dashboard');

$router->get('admin/posts', 'AdminPostController', 'index');
$router->get('admin/posts/create', 'AdminPostController', 'create');
$router->post('admin/posts/create', 'AdminPostController', 'store');
$router->get('admin/posts/edit/{id}', 'AdminPostController', 'edit');
$router->post('admin/posts/edit/{id}', 'AdminPostController', 'update');
$router->get('admin/posts/delete/{id}', 'AdminPostController', 'delete');

$router->get('admin/pengurus', 'AdminPengurusController', 'index');
$router->get('admin/pengurus/create', 'AdminPengurusController', 'create');
$router->post('admin/pengurus/create', 'AdminPengurusController', 'store');
$router->get('admin/pengurus/edit/{id}', 'AdminPengurusController', 'edit');
$router->post('admin/pengurus/edit/{id}', 'AdminPengurusController', 'update');
$router->get('admin/pengurus/delete/{id}', 'AdminPengurusController', 'delete');

$router->get('admin/galeri', 'AdminGaleriController', 'index');
$router->post('admin/galeri/upload', 'AdminGaleriController', 'upload');
$router->get('admin/galeri/delete/{id}', 'AdminGaleriController', 'delete');

$router->get('admin/aspirasi', 'AdminAspirasiController', 'index');
$router->get('admin/aspirasi/delete/{id}', 'AdminAspirasiController', 'delete');

$router->get('admin/bidang', 'AdminBidangController', 'index');
$router->get('admin/bidang/create', 'AdminBidangController', 'create');
$router->post('admin/bidang/create', 'AdminBidangController', 'store');
$router->get('admin/bidang/edit/{id}', 'AdminBidangController', 'edit');
$router->post('admin/bidang/edit/{id}', 'AdminBidangController', 'update');
$router->get('admin/bidang/delete/{id}', 'AdminBidangController', 'delete');

$router->get('admin/pengaturan', 'AdminPengaturanController', 'index');
$router->post('admin/pengaturan/update', 'AdminPengaturanController', 'update');

$router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
