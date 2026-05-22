<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\Admin\OrderControllerl;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\StockController as AdminStockController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', function () {
    return view('about');
});
Route::get('/articles', function () {
    return view('articles');
})->name('articles');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/stocks', function () {
    return view('stocks');
})->name('stocks');

Route::get('/reviews', function () {
    return view('reviews');
})->name('reviews');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/FAQ', function () {
    return view('FAQ');
})->name('FAQ');

//каталог
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/reviews', [App\Http\Controllers\ReviewController::class, 'index'])->name('reviews.index');
Route::get('/reviews', [App\Http\Controllers\ReviewController::class, 'store'])->name('reviews.store');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/load-more-products', [HomeController::class, 'loadNew']);

use App\Http\Controllers\StockController;

Route::get('/stocks', [StockController::class, 'index']);

use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [UserController::class, 'register']);

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/cabinet', [UserController::class, 'cabinet'])
    ->middleware('auth')
    ->name('cabinet');

    Route::get('/admin', function () {
    return view('admin.index');
})->name('admin');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');

Route::put('/cart/{item}', [CartController::class, 'update'])->name('cart.update');

Route::delete('/cart/{item}', [CartController::class, 'remove'])->name('cart.remove');


Route::middleware('auth')->group(function () {

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

});

Route::get('/FAQ', [FaqController::class, 'index'])->name('FAQ');

use App\Http\Controllers\ArticleController;

Route::get('/articles', [ArticleController::class, 'index'])->name('articles');

Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');



Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('/products', AdminProductController::class);
    Route::resource('/stocks', AdminStockController::class);
    Route::get('/categories', [AdminController::class, 'categories'])->name('categories');
    Route::get('/orders', [AdminController::class, 'orders'])->name('orders');
});

use App\Http\Controllers\CategoryController;

Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/admin/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/admin/reviews', [App\Http\Controllers\Admin\ReviewController::class, 'index'])->name('admin.reviews.index');
Route::get('/admin/reviews/{id}', [App\Http\Controllers\Admin\ReviewController::class, 'show'])->name('admin.reviews.show');
Route::put('/admin/reviews/{id}/approve', [App\Http\Controllers\Admin\ReviewController::class, 'approve'])->name('admin.reviews.approve');
Route::get('/admin/reviews/{id}/approve', [App\Http\Controllers\Admin\ReviewController::class, 'showApproveForm'])->name('admin.reviews.showApproveForm');

Route::post('/reviews/{product}', [ReviewController::class, 'store'])->name('reviews.store');






