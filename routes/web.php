<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Models\Food;

Route::get('/', [PageController::class, 'showStartPage']);
Route::get('/start', [PageController::class, 'showStartPage']);
Route::get('/home', [PageController::class, 'showHomePage']);
Route::get('/mainmenu', [PageController::class, 'showBasedCategory'])->name('mainmenu');
Route::post('/filter-foods', [PageController::class, 'filterFoods'])->name('filter.foods');
Route::get('/cart', [PageController::class, 'showCart'])->name('cart');
Route::get('/payment', [PageController::class, 'showPayment']);
Route::get('/search', [PageController::class, 'search'])->name('search');

Route::get('/paySuccess', [PageController::class, 'showPaySuccess']);