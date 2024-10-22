<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;


Route::get('/', [WebsiteController::class, 'allProducts'])->name('all-products');
Route::get('/product-category/{id}', [WebsiteController::class, 'category'])->name('product-category');
Route::get('/product-sub-category/{id}', [WebsiteController::class, 'subCategory'])->name('product-sub-category');
Route::get('/product-detail/{id}', [WebsiteController::class, 'detail'])->name('product-detail');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resource('subcategories', SubcategoryController::class)->except(['show']);
    Route::resource('products', ProductController::class)->except(['show']);
    Route::get('/products/get-subCategory-by-category', [ProductController::class, 'getSubCategoryByCategory'])->name('product.get-subCategory-by-category');
});

require __DIR__.'/auth.php';
