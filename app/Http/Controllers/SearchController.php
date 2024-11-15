<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('query');
        $foods = Food::where('name', 'LIKE', '%' . $keyword . '%')->get();

        return view('search_results', ['foods' => $foods]);
    }
}
