<?php
// --------- Web Routes ---------
use Core\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminController;


Route::get('/', [HomeController::class, 'index']);

Route::match(['get', 'post'], '/login', [UserController::class, 'login']);
Route::match(['get', 'post'], '/register', [UserController::class, 'register']);

Route::get('/news', [NewsController::class, 'index']);

Route::get('/admin', [AdminController::class, 'index']);


Route::get('/admin/news', [NewsController::class, 'indexAdmin']);
Route::match(['get', 'post'], '/admin/news/create', [NewsController::class, 'create']);