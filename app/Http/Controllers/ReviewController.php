<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function showProductReviews(Product $product)
    {
        //show reviews to the exact product
    }

    public function showUserReviews(User $user)
    {
        //show reviews from the exact user
    }

    public function show(Review $review)
    {
        //show review
    }


    public function destroy(Review $review)
    {
        //
    }
}
