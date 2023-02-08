<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()
            ->withCount('reviews')
            ->orderByDesc('reviews_count')
            ->limit(5)
            ->get();

        return view('categories.popular', ['categories' => $categories]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($category)
    {
        //todo: show with rating??
        $productsOfCategory = Category::find($category)->products()->get();

        return view('products.index', ['products' => $productsOfCategory]);
    }


    public function destroy(Category $category)
    {
        //
    }
}
