<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    const MIN_PER_PRODUCT = 3;
    const MAX_PER_PRODUCT = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //for every product we create 3 to 10 reviews from random users
        foreach (Product::all() as $product) {
            $userIds = User::query()
                ->inRandomOrder()
                ->limit(rand(self::MIN_PER_PRODUCT, self::MAX_PER_PRODUCT))
                ->pluck('id');

            foreach ($userIds as $id) {
                Review::create([
                    'product_id' => $product->id,
                    'user_id' => $id,
                    'review' => fake()->realText,
                    'rating' => fake()->numberBetween(1, 5),
                ]);
            }
        }

    }
}
