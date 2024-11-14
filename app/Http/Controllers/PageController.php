<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showStartPage(){
        return view('startPage');
    }

    public function showHomePage(){
        return view('homePage');
    }

    public function showMainMenu(){
        $foods = Food::all();
        return view('mainMenu')->with('foods', $foods);
    }

    public function showCart(){
        
        return view('cart');
    }

    public function showPayment(){

        return view('payment');
    }
}
