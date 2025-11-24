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

// Sản phẩm theo loại
Route::get('/loai-san-pham/{type}', [PageController::class, 'getProductByType'])->name('products.category');

Route::get('/admin', [PageController::class, 'getIndexAdmin'])->name('admin.index');


Route::get('/export', [PageController::class, 'export'])->name('export');

Route::get('/admin/add-product', [PageController::class, 'getAdminAddForm'])->name('add-product');

Route::get('/admin-edit-form/{id}', [PageController::class, 'getAdminEditForm'])
    ->name('admin-edit-form');


// Form xác nhận xoá (GET)
Route::get('/admin-delete-form/{id}', [PageController::class, 'getAdminDeleteForm'])
    ->name('admin-delete-form');

// Xử lý xoá (POST cho dễ)
Route::post('/admin-delete/{id}', [PageController::class, 'deleteProduct'])
    ->name('admin-delete');