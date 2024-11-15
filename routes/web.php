<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Models\Food;

Route::get('/', function () {
    $foods = Food::with('categories')->get();
    return view('welcome', compact('foods'));
});

Route::get('/start', [PageController::class, 'showStartPage']);
Route::get('/home', [PageController::class, 'showHomePage']);
Route::get('/mainmenu/{cat:name}',[PageController::class, 'showBasedCategory'])->name('mainmenu.category');
Route::get('/mainmenu', [PageController::class, 'showMainMenu']);
Route::get('/cart', [PageController::class, 'showCart']);
Route::get('/payment', [PageController::class, 'showPayment']);
Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/paySuccess', [PageController::class, 'showPaySuccess']);