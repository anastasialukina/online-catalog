<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\Product;
use Illuminate\Http\Request;
use stdClass;

class FavouriteController extends Controller
{

    public function index(Favourite $favourite)
    {
        //show user's favourite products
    }


    public function favouriteAdd($product)
    {
        $favouriteProduct = Product::find($product);
        $user = auth()->user();

        $user->favouriteProducts()->syncWithoutDetaching($favouriteProduct);


        return redirect()->back()->with('success', 'Product added successfully!');

    }


    public function favouriteRemove(int $product)
    {
        //
    }


}
