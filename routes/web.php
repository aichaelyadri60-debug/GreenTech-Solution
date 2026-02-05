<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavorieController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('Home');
});
// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/dashboard', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    

});

Route::middleware(['auth' ,'client'])->group(function(){
    Route::post('/favorites/toggle/{product}', 
        [FavorieController::class, 'toggle']
    )->name('favorites.toggle');
    Route::get('/favorites', 
        [FavorieController::class, 'index']
    )->name('favorites');
});
Route::get('/catalog', [ProductController::class, 'catalog'])->name('catalog');
    
    
    

Route::get('/login' ,[AuthController::class,'ShowLogin'])->name('login');
Route::post('/login' ,[AuthController::class,'login']);
Route::get('/registerform' ,[AuthController::class,'ShowRegister'])->name('registerform');
Route::post('/Register' ,[AuthController::class,'Register'])->name('Register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');



Route::get('/categorie/{id?}', [CategoryController::class, 'browse'])
    ->name('categorie');



