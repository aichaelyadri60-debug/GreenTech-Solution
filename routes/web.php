<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('Home');
});
// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [ProductController::class, 'index'])->name('products.index');
Route::get('/catalog', [ProductController::class, 'catalog'])->name('catalog');
    
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    