<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/product/like/{product}', [FavouriteController::class, 'favouriteAdd'])->name('product.like');
    Route::delete('/product/unlike/{product}', [FavouriteController::class, 'favouriteRemove'])->name('product.unlike');
    Route::get('/favourites', [FavouriteController::class, 'index'])->name('favourites.index');

    Route::resource('reviews', ReviewController::class)
        ->except([
            'edit', 'update', 'index'
        ]);

});

Route::resources([
    'products' => ProductController::class,
    'categories' => CategoryController::class,
]);

Route::get('/categories/{category}/popular', [CategoryController::class, 'sortByReviews'])
    ->name('products.popular');

Route::get('/categories/{category}/by-date', [CategoryController::class, 'sortByDate'])
    ->name('products.by-date');

Route::get('/categories/{category}/by-date-reverse', [CategoryController::class, 'sortByDateReverse'])
    ->name('products.by-date-reverse');

require __DIR__ . '/auth.php';
