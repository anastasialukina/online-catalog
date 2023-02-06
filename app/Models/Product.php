<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'image', 'price', 'sku', 'details', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function usersThatLiked(): BelongsToMany
    {
        return $this->belongsToMany(User::class, Favourite::class);
    }

    public function usersThatReviewed(): BelongsToMany
    {
        return $this->belongsToMany(User::class, Review::class);
    }
}
