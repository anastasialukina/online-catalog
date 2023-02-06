<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavouriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productCount = Product::count();
        foreach (User::all() as $user) {
            $productIds = Product::inRandomOrder()
                ->select('id')
                ->take(rand(10, $productCount))
                ->pluck('id');

            $user->favouriteProducts()->sync($productIds);
        }
    }
}
