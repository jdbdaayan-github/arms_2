<?php

use App\Controllers\AuthController;
use App\Controllers\UserController;
use App\Controllers\OfficeController;
use CodeIgniter\Router\RouteCollection;
use App\Controllers\DirectorateController;
use App\Controllers\PermissionController;
use App\Controllers\RoleController;

/**
 * @var RouteCollection $routes
 */

// Auth Routes
$routes->get('register', [AuthController::class, 'register']);
$routes->post('register', [AuthController::class, 'register']);
$routes->get('login', [AuthController::class, 'login']);
$routes->post('login/authenticate', [AuthController::class, 'authenticate']); // Changed to make it simple
$routes->get('logout', [AuthController::class, 'logout']);

// Directorate Routes
$routes->get('directorates/getOffices/(:num)', [DirectorateController::class, 'getOffices/$1']);
$routes->get('directorates', [DirectorateController::class, 'index'], ['filter' => 'auth']);  // Protected by auth filter
$routes->get('directorates/getDirectoratesData', [DirectorateController::class, 'getDirectoratesData'], ['filter' => 'auth']);  // Protected by auth filter
$routes->get('directorates/create', [DirectorateController::class, 'create'], ['filter' => 'auth']);  // Protected by auth filter
$routes->post('directorates/store', [DirectorateController::class, 'store'], ['filter' => 'auth']);  // Protected by auth filter
$routes->get('directorates/edit/(:num)', [DirectorateController::class, 'edit'], ['filter' => 'auth']);  // Protected by auth filter

// Role Routes
$routes->get('roles', [RoleController::class, 'index'], ['filter' => 'auth']);  // Protected by auth filter
$routes->get('roles/getRolesData', [RoleController::class, 'getRolesData'], ['filter' => 'auth']);  // Protected by auth filter

// Permission Routes
$routes->get('permissions', [PermissionController::class,'index'], ['filter'=> 'auth']);
$routes->get('permissions/getPermissionsData', [PermissionController::class,'getPermissionsData'], ['filter' => 'auth']); 

// User Routes
$routes->get('users', [UserController::class, 'index'], ['filter' => 'auth']);  // Protected by auth filter
$routes->get('users/getUsersData', [UserController::class, 'getUsersData'], ['filter' => 'auth']);  // Protected by auth filter
$routes->get('users/create', 'Home::create', ['filter' => 'auth']);  // Protected by auth filter

// Dashboard Route
$routes->get('dashboard', 'Home::index', ['filter' => 'auth']);  // Protected by auth filter
