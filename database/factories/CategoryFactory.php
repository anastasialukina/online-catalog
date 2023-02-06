<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Psy\Util\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    private array $categories = ['Electronics', 'Phones', 'Laptops', 'Clothes',
        'Accessories', 'Groceries', 'Beauty', 'Storages', 'Tools', 'Health'];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->categories[fake()->unique()->numberBetween(0,count($this->categories)-1)];

        return [
            'name' => $name,
            'slug' => \Illuminate\Support\Str::slug($name),
        ];
    }
}
