<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoaiHangController;
use App\Http\Controllers\MatHangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ThongKeController;

Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('/loaihang', [LoaiHangController::class, 'index'])->name('nloaihang.index');
Route::get('/loaihang/create', [LoaiHangController::class, 'create'])->name('nloaihang.create');
Route::post('/loaihang/store', [LoaiHangController::class, 'store'])->name('nloaihang.store');
Route::get('/loaihang/{id}/edit', [LoaiHangController::class, 'edit'])->name('nloaihang.edit');
Route::put('/loaihang/{id}', [LoaiHangController::class, 'update'])->name('nloaihang.update');
Route::delete('/loaihang/{id}', [LoaiHangController::class, 'destroy'])->name('nloaihang.destroy');


Route::get('/mathang', [MatHangController::class, 'index'])->name('nmathang.index');
Route::get('/mathang/create', [MathangController::class, 'create'])->name('nmathang.create');
Route::post('/mathang/store', [MathangController::class, 'store'])->name('nmathang.store');
Route::get('/mathang/{id}/edit', [MathangController::class, 'edit'])->name('nmathang.edit');
Route::put('/mathang/{id}', [MathangController::class, 'update'])->name('nmathang.update');
Route::delete('/mathang/{id}', [MathangController::class, 'destroy'])->name('nmathang.destroy');

Route::get('/thongke', [ThongKeController::class, 'index'])->name('thongke.index');
Route::get('/thongke/tieudungkh', [ThongKeController::class, 'tieudungkh'])->name('thongke.khachhangtieudung');
Route::get('/thongke/doanhthumh', [ThongKeController::class, 'doanhthumh'])->name('thongke.doanhthumathang');
