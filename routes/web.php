<?php


use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('pages.dashboard');
});

Route::get('/penjualan', function () {
    return view('pages.penjualan.index');
});

Route::get('/penjualan/create', function () {
    return view('pages.penjualan.create');
});

Route::get('/penjualan/invoice', function () {
    return view('penjualan.invoice');
});

Route::get('/produk', function () {
    return view('pages.produk.index');
});

Route::get('/produk/create', function () {
    return view('pages.produk.create');
});

Route::get('/produk/edit', function () {
    return view('pages.produk.edit');
});