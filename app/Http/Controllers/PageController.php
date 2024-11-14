<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showStartPage(){
        return view('startPage');
    }

    public function showHomePage(){
        return view('homePage');
    }
#main-menu
    public function showMainMenu(){
        $categories = Category::with('foods')->get();
        $firstCategoryName = $categories->first()->name;
        return redirect()->route('mainmenu.category', ['cat' => $firstCategoryName]);
    
    }
    public function showBasedCategory(Category $cat){
        $categories = Category::with('foods')->get();
        $cat ->load('foods');
        return view('mainMenu', compact('categories', 'cat'));
    }
#end-main-menu
    public function showCart(){
        
        return view('cart');
    }

    public function showPayment(){

        return view('payment');
    }
}
