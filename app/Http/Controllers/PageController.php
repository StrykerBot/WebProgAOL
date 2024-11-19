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
        // $firstCategoryName = $categories->first()->name;
        return view('mainMenu', compact('categories'));
    
    }
    public function showBasedCategory(Category $cat){
        Paginator::useBootstrapFive();
        $categories = Category::with('foods')->get();
        $foods = $cat->foods()->paginate(2);
        return view('mainMenu', compact('categories', 'cat', 'foods'));
    }
    public function filterFoods(Request $request)
    {
        $categoryName = $request->input('categoryName');
        $searchTerm = $request->input('searchTerm');
        $perPage = $request->input('perPage', 12);
        $page = $request->input('page', 1);

        // Start building the query on the Food model
        $query = Food::query();

        // Filter by category if provided
        if ($categoryName && $categoryName !== 'all') {
            $category = Category::where('name', $categoryName)->first();

            if ($category) {
                // Filter by category
                $query = $category->foods();
            } else {
                // If no category found, return empty result
                $query = collect([])->paginate($perPage, ['*'], 'page', $page);
            }
        }

        if($searchTerm){
            $query->where('name', 'LIKE', '%' . $searchTerm . '%');
        }
        // Apply pagination to the query
        $foods = $query->paginate($perPage, ['*'], 'page', $page);

        // Transform the results to include the full image path
        $foods->getCollection()->transform(function($food) {
            $food->img_path = asset('storage/img/' . $food->img_path); 
            return $food;
        });

        // Return the response with pagination data and food items
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
