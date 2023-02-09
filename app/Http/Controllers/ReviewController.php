<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{

    public function create()
    {

    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'rating' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $reviewExists = Review::query()->where([
            'product_id' => $input['product-id'],
            'user_id' => Auth::id()
        ])->first();

        //that means we have already created review
        if ($reviewExists != null) {
            return redirect()->back()->with('flash_msg_fail', 'Your review already exists');
        }

        $review = new Review();

        $review->product_id = $input['product-id'];
        $review->review = $input['review-text'];
        $review->user_id = Auth::id();
        $review->rating = (int)$input['rating'];

        $review->save();
        return redirect()->back()->with('flash_msg_success', 'Your review has been submitted Successfully,');
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
