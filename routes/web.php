<?php

use Illuminate\Support\Facades\Route;
//home
Route::get('/', [App\Http\Controllers\homecontroller::class, 'index'])->name('home');

//about
Route::get('/about', App\Http\Controllers\aboutcontroller::class)->name('about');

//shop
Route::get('/shop', [App\Http\Controllers\shopcontroller::class, 'index'])->name('shop');

//contact
Route::get('/contact', [App\Http\Controllers\contactcontroller::class, 'index'])->name('contact');
Route::post('/contact', [App\Http\Controllers\contactcontroller::class, 'store']);

//product
Route::get('/product/{slug}', [App\Http\Controllers\productcontroller::class, 'show'])->name('product.show');
Route::get('/product', [App\Http\Controllers\productcontroller::class, 'index'])->name('product');


//login
Route::get('/login', [App\Http\Controllers\logincontroller::class, 'index'])->name('login');

//cart
Route::get('/cart', [App\Http\Controllers\cartcontroller::class, 'index'])->name('cart');