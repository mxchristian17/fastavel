<?php
declare(strict_types=1);

require_once('src/routes.php');

use Routes\Routes\Route;

Route::get('/home/{id}', 'HomeController', 'showHome', ['auth']);
Route::get('/login', 'LoginController', 'showLogin');
Route::get('/loginForm', 'LoginController', 'login');
Route::get('/about', 'AboutController', 'showAbout');
Route::get('/contact', 'contactController', 'showContact');
Route::get('/', 'HomeController', 'showHome', ['auth']);