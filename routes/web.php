<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Models\Food;

Route::get('/', function () {
    $foods = Food::with('categories')->get();
    return view('welcome', compact('foods'));
});

Route::get('/home', [PageController::class, 'showHomePage']);
Route::get('/mainMenu', [PageController::class, 'showMainMenu']);
Route::get('/cart', [PageController::class, 'showCart']);
Route::get('/payment', [PageController::class, 'showPayment']);