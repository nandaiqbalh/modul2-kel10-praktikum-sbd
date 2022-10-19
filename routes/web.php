<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AdminController::class, 'index'])->name('admin.index');
Route::get('add', [AdminController::class, 'create'])->name('admin.create');
Route::post('store', [AdminController::class, 'store'])->name('admin.store');
Route::get('edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::post('update/{id}', [AdminController::class, 'update'])->name('admin.update');
Route::post('delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');

Route::get('/tugas/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/tugas/product/add', [ProductController::class, 'create'])->name('product.create');
Route::post('/tugas/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/tugas/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/tugas/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::post('/tugas/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
