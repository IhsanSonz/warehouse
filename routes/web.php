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

Route::prefix('barang')->name('barang')->group(function () {
    Route::get('/', [Controller\BarangController::class, 'index']);
    Route::get('create', [Controller\BarangController::class, 'create'])->name('.create');
    Route::post('store', [Controller\BarangController::class, 'store'])->name('.store');
    Route::get('{id}/edit', [Controller\BarangController::class, 'edit'])->name('.edit');
    Route::put('{id}/update', [Controller\BarangController::class, 'update'])->name('.update');
    Route::post('get-barang', [Controller\BarangController::class, 'getBarang'])->name('.get-barang');
    Route::get('/export_excel', [Controller\BarangController::class, 'export_excel'])->name('.export_excel');
});

Route::get('stok', [Controller\StokController::class, 'index'])->name('stok');
Route::get('stok/create', [Controller\StokController::class, 'create'])->name('stok.create');
Route::post('stok/store', [Controller\StokController::class, 'store'])->name('stok.store');

Route::get('report', [Controller\BarangController::class, 'index'])->name('report');

Route::get('penjualan', [Controller\PenjualanController::class, 'index'])->name('penjualan');
Route::get('penjualan/create', [Controller\PenjualanController::class, 'create'])->name('penjualan.create');
Route::post('penjualan/store', [Controller\PenjualanController::class, 'store'])->name('penjualan.store');


Route::get('test', [Controller\TransaksiStokController::class, 'index'])->name('test');