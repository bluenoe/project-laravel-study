<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome');
});


// Trang chủ dùng PageController@getIndex (cũ)
// Trang chủ
Route::get('/trang-chu', [PageController::class, 'index'])->name('home');

// Loại sản phẩm
Route::get('/loai-san-pham', [PageController::class, 'showCategory'])->name('products.index');

// Chi tiết sản phẩm
Route::get('/san-pham/{id}', [PageController::class, 'show'])->name('product.show');

// Liên hệ
Route::get('/lien-he', [PageController::class, 'contact'])->name('contact');

// Giới thiệu
Route::get('/gioi-thieu', [PageController::class, 'about'])->name('about');

// Thêm giỏ hàng
Route::get('/gio-hang/them/{id}', [PageController::class, 'addToCart'])->name('cart.add');


