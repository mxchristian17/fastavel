<?php
declare(strict_types=1);

require_once('src/routes.php');

use Routes\Routes\Route;

Route::get('/home/{id}', 'HomeController', 'showHome', ['auth']);
Route::get('/login', 'LoginController', 'showLogin');
Route::get('/loginForm', 'LoginController', 'login');
Route::get('/logout', 'LoginController', 'logout');

Route::get('/changeLightMode', 'UserController', 'changeLightMode', ['auth']);

Route::get('/about', 'AboutController', 'showAbout', ['auth']);
Route::get('/contact', 'contactController', 'showContact', ['auth']);
Route::get('/', 'HomeController', 'showHome', ['auth']);