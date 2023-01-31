<?php

use App\Models\Admin\Category;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('welcome');
Route::get('/collections', [App\Http\Controllers\Frontend\FrontendController::class, 'categories'])->name('collections.categories');
Route::get('/collections/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'products'])->name('collections.category');



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // Category routes
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('category', 'index')->name('category.index');
        Route::get('category/edit/{category}', 'edit')->name('category.edit');
        Route::get('category/show/{category}', 'show')->name('category.show');
        Route::post('category/store', 'store')->name('category.store');
        Route::put('category/update/{category}', 'update')->name('category.update');
        Route::get('category/active/{category}', 'active')->name('category.active');
        Route::get('category/inactive/{category}', 'inactive')->name('category.inactive');
        Route::get('category/delete/{category}', 'delete')->name('category.delete');
    });


    Route::get('subcategory', App\Http\Livewire\Admin\SubCategory\Index::class)->name('subcategory');


    // subCategory routes
    Route::controller(App\Http\Controllers\Admin\SubCategoryConroller::class)->group(function () {
        Route::get('subcategory/edit/{subcategory}', 'edit')->name('subcategory.edit');
        Route::get('subcategory/show/{subcategory}', 'show')->name('subcategory.show');
        Route::post('subcategory/store', 'store')->name('subcategory.store');
        Route::put('subcategory/update/{subcategory}', 'update')->name('subcategory.update');
        Route::get('subcategory/active/{subcategory}', 'active')->name('subcategory.active');
        Route::get('subcategory/inactive/{subcategory}', 'inactive')->name('subcategory.inactive');
        Route::get('subcategory/delete/{subcategory}', 'delete')->name('subcategory.delete');
    });
    // product routes
    Route::controller(App\Http\Controllers\Admin\ProductConroller::class)->group(function () {
        Route::get('product', 'index')->name('product.index');
        Route::get('product/create', 'create')->name('product.create');
        Route::post('product/store', 'store')->name('product.store');
        Route::get('product/edit/{product}', 'edit')->name('product.edit');
        Route::put('product/update/{product}', 'update')->name('product.update');
        Route::get('product/active/{product}', 'active')->name('product.active');
        Route::get('product/inactive/{product}', 'inactive')->name('product.inactive');
        Route::get('product/trending/{product}', 'trending')->name('product.trending');
        Route::get('product/notTrending/{product}', 'notTrending')->name('product.notTrending');
        Route::get('product/delete/{product}', 'delete')->name('product.delete');
        Route::get('product/show/{product}', 'show')->name('product.show');
    });
    // Color routes
    Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function () {
        Route::post('color/store', 'store')->name('color.store');
        Route::get('color/edit/{color}', 'edit')->name('color.edit');
        Route::put('color/update/{color}', 'update')->name('color.update');
        Route::get('color/active/{color}', 'active')->name('color.active');
        Route::get('color/inactive/{color}', 'inactive')->name('color.inactive');
        Route::get('color/delete/{color}', 'delete')->name('color.delete');
        Route::get('color/show/{color}', 'show')->name('color.show');
    });
    // Slider routes
    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('slider', 'index')->name('slider.index');
        Route::post('slider/store', 'store')->name('slider.store');
        // Route::get('product/create', 'create')->name('product.create');
        // Route::get('product/edit/{product}', 'edit')->name('product.edit');
        // Route::put('category/update/{category}', 'update')->name('product.update');
        Route::get('slider/active/{product}', 'active')->name('slider.active');
        Route::get('slider/inactive/{product}', 'inactive')->name('slider.inactive');
        Route::get('slider/delete/{slider}', 'delete')->name('slider.delete');
    });
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
