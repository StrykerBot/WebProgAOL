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

    public function showBasedCategory(Category $cat){
        $categories = Category::with('foods')->get();
        return view('mainMenu', compact('categories', 'cat'));
    }
    public function filterFoods(Request $request)
    {
        $categoryName = $request->input('categoryName');
        $searchTerm = $request->input('searchTerm');
        $perPage = $request->input('perPage', 12);
        $page = $request->input('page', 1);

        $query = Food::query();

        if ($categoryName && $categoryName !== 'all') {
            $category = Category::where('name', $categoryName)->first();

            if ($category) {
                $query = $category->foods();
            } else {
                $query = collect([])->paginate($perPage, ['*'], 'page', $page);
            }
        }

        if($searchTerm){
            $query->where('name', 'LIKE', '%' . $searchTerm . '%');
        }
        $foods = $query->paginate($perPage, ['*'], 'page', $page);

        $foods->getCollection()->transform(function($food) {
            $food->img_path = asset('storage/img/' . $food->img_path); 
            return $food;
        });

        return response()->json([
            'current_page' => $foods->currentPage(),
            'data' => $foods->items(),
            'first_page_url' => $foods->url(1) . '&categoryName=' . $categoryName . '&searchTerm=' . $searchTerm,
            'from' => $foods->firstItem(),
            'last_page' => $foods->lastPage(),
            'last_page_url' => $foods->url($foods->lastPage()) . '&categoryName=' . $categoryName . '&searchTerm=' . $searchTerm,
            'next_page_url' => $foods->nextPageUrl() . '&categoryName=' . $categoryName . '&searchTerm=' . $searchTerm,
            'path' => $foods->path(),
            'per_page' => $foods->perPage(),
            'prev_page_url' => $foods->previousPageUrl() . '&categoryName=' . $categoryName . '&searchTerm=' . $searchTerm,
            'to' => $foods->lastItem(),
            'total' => $foods->total(),
        ]);
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
