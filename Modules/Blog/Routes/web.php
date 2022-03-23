<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\Http\Controllers\CategoriesController;
use Modules\Blog\Http\Controllers\ProductsController;
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

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoriesController::class, 'index'])->name('categories.index');
    Route::get('add-category', [CategoriesController::class, 'create'])->name('categories.create');
    Route::post('add-category', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('edit-category/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::put('update-category/{id}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::post('delete-category/{id}', [CategoriesController::class, 'destory'])->name('categories.index');
});

Route::prefix('products')->group(function () {

    Route::get('/', [ProductsController::class, 'index'])->name('products.index');
    Route::get('add-product', [ProductsController::class, 'create'])->name('products.create');
    Route::post('add-product', [ProductsController::class, 'store'])->name('products.store');
    Route::get('edit-product/{id}', [ProductsController::class, 'edit'])->name('products.edit');
    Route::put('update-product/{id}', [ProductsController::class, 'update'])->name('products.update');
    Route::post('delete-product/{id}', [ProductsController::class, 'destory'])->name('products.destory');
});

