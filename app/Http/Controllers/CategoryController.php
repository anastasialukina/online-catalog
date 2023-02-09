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

    public function sortByDate($category)
    {
        $productsOfCategoryByDate = Category::find($category)->products()->orderByDesc('created_at')->get();

        return view('products.by_category', ['products' => $productsOfCategoryByDate, 'categoryId' => $category]);
    }

    public function sortByDateReverse($category)
    {
        $productsOfCategoryByDate = Category::find($category)->products()->orderBy('created_at')->get();

        return view('products.by_category', ['products' => $productsOfCategoryByDate, 'categoryId' => $category]);
    }

    public function sortByReviews($category)
    {
        $productsOfCategoryByReviews = Category::find($category)
            ->products()
            ->withCount('usersThatReviewed')
            ->orderByDesc('users_that_reviewed_count')
            ->get();

        return view('products.by_category', ['products' => $productsOfCategoryByReviews, 'categoryId' => $category]);
    }


    public function show($category)
    {
        $productsOfCategory = Category::find($category)->products()->get();

        return view('products.by_category', ['products' => $productsOfCategory, 'categoryId' => $category]);
    }


    public function destroy(Category $category)
    {
        //
    }
}
