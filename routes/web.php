<?php
// --------- Web Routes ---------
use Core\Route;
use App\Http\HomeController;
use App\Http\UserController;



Route::get('/', [HomeController::class, 'index']);

Route::match(['get', 'post'], '/login', [UserController::class, 'login']);
Route::match(['get', 'post'], '/register', [UserController::class, 'register']);