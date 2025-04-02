<?php

use App\Controllers\AuthController;
use App\Controllers\OfficeController;
use CodeIgniter\Router\RouteCollection;
use App\Controllers\DirectorateController;

/**
 * @var RouteCollection $routes
 */

$routes->get('register', [AuthController::class,'register']);
$routes->get('login', [AuthController::class,'login']);

$routes->get('dashboard', 'Home::index');
$routes->get('users/create', 'Home::create');

$routes->get('offices', [OfficeController::class,'index']);
$routes->get('offices/create', [OfficeController::class,'create']);
$routes->post('offices/store', [OfficeController::class,'store']);

$routes->get('directorates', [DirectorateController::class, 'index']);
$routes->get('directorates/create', [DirectorateController::class, 'create']);
$routes->post('directorates/store', [DirectorateController::class,'store']);
$routes->get('directorates/edit/(:num)', [DirectorateController::class, 'edit']);
