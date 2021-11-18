<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers as Controller;

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
    return view('welcome');
});

Route::get('home', [Controller\HomeController::class, 'index'])->name('home');

Route::get('barang', [Controller\BarangController::class, 'index'])->name('barang');
Route::get('barang/create', [Controller\BarangController::class, 'create'])->name('barang.create');
Route::post('barang/store', [Controller\BarangController::class, 'store'])->name('barang.store');

Route::get('stok', [Controller\StokController::class, 'index'])->name('stok');
Route::get('stok/create', [Controller\StokController::class, 'create'])->name('stok.create');
Route::post('stok/store', [Controller\StokController::class, 'store'])->name('stok.store');
Route::post('stok/barang', [Controller\BarangController::class, 'getBarang'])->name('barang');

Route::get('report', [Controller\BarangController::class, 'index'])->name('report');

Route::get('penjualan', [Controller\PenjualanController::class, 'index'])->name('penjualan');


Route::get('test', [Controller\TransaksiStokController::class, 'index'])->name('test');