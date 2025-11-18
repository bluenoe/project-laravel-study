<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome');
});


// Trang chủ dùng PageController@getIndex
Route::get('/trangchu', [PageController::class, 'getIndex'])->name('trangchu');

// Các route khác giữ nguyên
Route::get('/loai-san-pham', [PageController::class, 'getLoaiSp'])->name('loaisanpham');
Route::get('/chi-tiet-san-pham', [PageController::class, 'getChiTietSp']);
Route::get('/lien-he', [PageController::class, 'getLienHe'])->name('lienhe');
Route::get('/gioi-thieu', [PageController::class, 'getGioiThieu'])->name('gioithieu');







