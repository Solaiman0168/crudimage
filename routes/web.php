<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('main');
});

Route::get('products', [App\Http\Controllers\productController::class, 'index'])->name('product.index');
Route::get('create', [App\Http\Controllers\productController::class, 'create'])->name('product.create');
Route::get('edit/product/{id}', [App\Http\Controllers\productController::class, 'edit']);
Route::get('delete/product/{id}', [App\Http\Controllers\productController::class, 'delete']);
Route::get('show/product/{id}', [App\Http\Controllers\productController::class, 'show']);

Route::post('store', [App\Http\Controllers\productController::class, 'store'])->name('product.store');
Route::post('update/product/{id}', [App\Http\Controllers\productController::class, 'update']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
