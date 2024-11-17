<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrapFive();
        $categories = Category::with('foods')->get();
        $foods = $cat->foods()->paginate(2);
        return view('mainMenu', compact('categories', 'cat', 'foods'));
    }
#end-main-menu
    public function showCart(){
        
        return view('cart');
    }

    public function showPayment(){

        return view('payment');
    }

    public function showPaySuccess(){
        return view('paySuccess');
    }
    
    public function search(Request $request)
    {
        $keyword = $request->input('query');
        $foods = Food::where('name', 'LIKE', '%' . $keyword . '%')->get();

        return view('search_results', ['foods' => $foods, 'keyword' => $keyword]);
    }
}
