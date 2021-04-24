<?php
// --------- Web Routes ---------
use Core\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;



Route::get('/', [HomeController::class, 'index']);

Route::match(['get', 'post'], '/login', [UserController::class, 'login']);
Route::match(['get', 'post'], '/register', [UserController::class, 'register']);