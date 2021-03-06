<?php
// --------- Web Routes ---------
use Core\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PortfolioController;


Route::get('/', [HomeController::class, 'index']);

Route::match(['get', 'post'], '/login', [UserController::class, 'login']);
Route::match(['get', 'post'], '/register', [UserController::class, 'register']);

Route::get('/news', [NewsController::class, 'index']);

Route::get('/admin', [AdminController::class, 'index']);

// Новости
Route::get('/admin/news', [NewsController::class, 'indexAdmin']);
Route::match(['get', 'post'], '/admin/news/create', [NewsController::class, 'create']);
Route::match(['get', 'post'], '/admin/news/{id}/edit', [NewsController::class, 'edit']);
Route::get('/admin/news/{id}/delete', [NewsController::class, 'destroy']);

// Портфолио
Route::get('/admin/portfolios', [PortfolioController::class, 'indexAdmin']);
Route::match(['get', 'post'], '/admin/portfolios/create', [PortfolioController::class, 'create']);
Route::match(['get', 'post'], '/admin/portfolios/{id}/edit', [PortfolioController::class, 'edit']);
Route::get('/admin/portfolios/{id}/delete', [PortfolioController::class, 'destroy']);
