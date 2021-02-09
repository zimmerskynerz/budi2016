<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'controllerhalamanutama';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Halaman Utama Booking
$route['halman_utama']                  = 'ControllerHalamanUtama/index';
$route['login']                         = 'ControllerHalamanUtama/index';
$route['daftar']                        = 'ControllerHalamanUtama/daftar';
$route['cek_login']                     = 'ControllerHalamanUtama/cek_login';
$route['logout']                        = 'ControllerHalamanUtama/logout';
$route['pelanggan/daftar']              = 'ControllerHalamanUtama/cruddaftar';

// Halaman Administrasi Beranda
$route['admin']                         = 'admin/ControllerAdminRental/data_kendaraan';
$route['admin/beranda']                 = 'admin/ControllerAdminRental/data_kendaraan';
// Halaman Administrasi Rental
// Kelola Menu Sopir
$route['admin/rental/sopir']            = 'admin/ControllerAdminRental/sopir';
$route['admin/rental/crudsopir']        = 'admin/ControllerAdminRental/crudsopir';
// Kelola Menu Kendaraan
$route['admin/rental/kendaraan']        = 'admin/ControllerAdminRental/kendaraan';
$route['admin/rental/crudkendaraan']    = 'admin/ControllerAdminRental/crudkendaraan';
// Halaman Administrasi Travel
// Kelola Menu REntal
$route['admin/travel/rental']           = 'admin/ControllerAdminTravel/rental';
$route['admin/travel/crudrental']       = 'admin/ControllerAdminTravel/crudrental';
// Kelola Menu Paket
$route['admin/travel/paket']            = 'admin/ControllerAdminTravel/paket';
$route['admin/travel/crudpaket']        = 'admin/ControllerAdminTravel/crudpaket';
// Halaman Pesanan
// Halaman pesanan rental
$route['admin/pesanan/rental']          = 'admin/ControllerAdminPesanan/rental';
$route['admin/pesanan/crudrental']      = 'admin/ControllerAdminPesanan/crudrental';
// Halaman pesanan paket
$route['admin/pesanan/paket']           = 'admin/ControllerAdminPesanan/paket';
$route['admin/pesanan/crudpaket']       = 'admin/ControllerAdminPesanan/crudpaket`';
// Halaman Jadwal Keberangkatan
$route['admin/jadwal/list_jadwal']      = 'admin/ControllerAdminJadwal/list_jadwal';
$route['admin/jadwal/proses_jadwal']    = 'admin/ControllerAdminJadwal/proses_jadwal';
$route['admin/jadwal/selesai_jadwal']   = 'admin/ControllerAdminJadwal/selesai_jadwal';

// Halaman Pelanggan
// Halaman Pelanggan Beranda
$route['pelanggan']                     = 'pelanggan/ControllerPelangganBeranda/index';
$route['pelanggan/beranda']             = 'pelanggan/ControllerPelangganBeranda/index';
// Menu Travel Rental
$route['pelanggan/travel/rental']       = 'pelanggan/ControllerPelangganTravel/rental';
$route['pelanggan/travel/paket']        = 'pelanggan/ControllerPelangganTravel/paket';
$route['pelanggan/travel/crudtravel']   = 'pelanggan/ControllerPelangganTravel/crudtravel';
