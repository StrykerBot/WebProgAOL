<?php

use Illuminate\Support\Facades\Route;
use App\Models\Food;

Route::get('/', function () {
    $foods = Food::with('categories')->get();
    return view('welcome', compact('foods'));
});
