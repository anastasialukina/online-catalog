<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function showSearchForm()
    {
        return view('search.search');
    }

    public function searchByWord(Request $request)
    {
        $word = $request->word;

        //that goes exactly to Category's scopeSearch function using local scopes
        $categoriesWithWord = Category::search($word)->get();

        //that goes exactly to Product's scopeSearch function using local scopes
        $productsWithWord = Product::search($word)->get();

        if ($productsWithWord == null && $categoriesWithWord == null) {
            return redirect()->back()->with('flash_msg_fail', 'Not found');
        }

        return view('search.search_result',
            ['categories' => $categoriesWithWord, 'products' => $productsWithWord]);
    }
}
