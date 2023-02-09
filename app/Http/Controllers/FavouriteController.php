<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class FavouriteController extends Controller
{

    public function index()
    {
        //show user's favourite products
        $currentUser = Auth::user();
        $favouriteProducts = $currentUser->favouriteProducts()->get();

        return view('favourites.index', ['products' => $favouriteProducts]);
    }


    public function favouriteAdd(int $product)
    {
        $favouriteProduct = Product::find($product);
        $user = auth()->user();

        $user->favouriteProducts()->syncWithoutDetaching($favouriteProduct);

        return redirect()->back()->with('success', 'Product ' . $favouriteProduct->name . ' added to your Favourites successfully!');
    }


    public function favouriteRemove(int $product)
    {
        $noMoreFavouriteProduct = Product::find($product);
        $user = auth()->user();

        $user->favouriteProducts()->detach($noMoreFavouriteProduct);

        return redirect()->back()->with('success', 'Product ' . $noMoreFavouriteProduct->name . ' is not your favourite anymore!');
    }


}
