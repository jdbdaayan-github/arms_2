<?php

use App\Controllers\OfficeController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('dashboard', 'Home::index');
$routes->get('users/create', 'Home::create');

$routes->get('offices', [OfficeController::class,'index']);
