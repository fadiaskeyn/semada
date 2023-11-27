<?php

require_once __DIR__ . '/../vendor/autoload.php';
define('BASEURL', 'http://semada.bjir');

use dfdiag\Belajar\PHP\MVC\App\Router;
use dfdiag\Belajar\PHP\MVC\Config\Database;
use dfdiag\Belajar\PHP\MVC\Controller\HomeController;
use dfdiag\Belajar\PHP\MVC\Controller\UserController;
use dfdiag\Belajar\PHP\MVC\Controller\muridController;
use dfdiag\Belajar\PHP\MVC\Controller\pelanggaranController;
use dfdiag\Belajar\PHP\MVC\Controller\guruController;
use dfdiag\Belajar\PHP\MVC\Controller\muridnakalController;

//Database env prod or test
Database::getConnection('prod');
//Home Controller
Router::add('GET', '/', HomeController::class, 'index',[]);

//User Controller
Router::add('GET', '/users/register', UserController::class, 'register',[]);
Router::add('POST', '/users/register', UserController::class, 'postRegister',[]);
Router::add('GET', '/users/login', UserController::class, 'login',[]);
Router::add('POST', '/users/login', UserController::class, 'postLogin',[]);

//Murid Controller
Router::add('GET', '/admin/data_murid', muridController::class, 'getmurid',[]);
Router::add('GET', '/admin/data_murid/tambah', muridController::class, 'formtambahmurid',[]);
Router::add('POST', '/admin/tambahmurid', muridController::class, 'tambahmurid',[]);
Router::add('GET', '/admin/data_murid/edit/([0-9a-zA-Z]*)', muridController::class, 'formupdatemurid');
Router::add('POST', '/admin/data_murid/edit', muridController::class, 'updateMurid');
Router::add('GET', '/admin/data_murid/hapus/([0-9a-zA-Z]*)', muridController::class, 'hapusMurid');
Router::add('POST', '/admin/data_murid/melanggar', muridnakalController::class, 'tambahmuridnakal',[]);
Router::add('GET', '/admin/data_murid/melanggar/([0-9a-zA-Z]*)', muridnakalController::class, 'formmelanggar');

//Guru Controller
Router::add('GET', '/admin/data_guru', guruController::class, 'getguru',[]);
Router::add('GET', '/admin/data_guru/tambah', guruController::class, 'formtambahguru',[]);
Router::add('POST', '/admin/tambahguru', guruController::class, 'tambahguru',[]);
Router::add('GET', '/admin/data_guru/edit/([0-9a-zA-Z]*)', guruController::class, 'formupdateguru');
Router::add('POST', '/admin/data_guru/edit', guruController::class, 'updateGuru');
Router::add('GET', '/admin/data_guru m/hapus/([0-9a-zA-Z]*)', guruController::class, 'hapusGuru');

//PElanggaran Controller
Router::add('GET', '/admin/pelanggaran', pelanggaranController::class, 'getpelanggaran',[]);
Router::add('GET', '/admin/pelanggaran/tambah', pelanggaranController::class, 'formpelanggaran',[]);
Router::add('POST', '/admin/tambahpelanggaran', pelanggaranController::class, 'tambahpelanggaran',[]);
Router::add('GET', '/admin/pelanggaran/edit/([0-9a-zA-Z]*)', pelanggaranController::class, 'formupdatepelanggaran');
Router::add('POST', '/admin/pelanggaran/edit', pelanggaranController::class, 'updatePelanggaran');
Router::add('GET', '/admin/pelanggaran/hapus/([0-9a-zA-Z]*)', guruController::class, 'hapusPelanggaran');

//murid nakal Controller
Router::add('GET', '/admin/murid_nakal', muridnakalController::class, 'getmuridnakal',[]);
Router::add('GET', '/admin/murid_nakal/hapus/([0-9a-zA-Z]*)', muridnakalController::class, 'hapusmuridnakal');


Router::run();