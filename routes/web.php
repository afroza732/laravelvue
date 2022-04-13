<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Brand\BrandController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Size\SizeController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum'])->group(function () {
    //Category
    Route::resource('categories', CategoryController::class);
     Route::get('/api/get-categories',[CategoryController::class,'getAllCategoryResponse']);
    //Brand
    Route::resource('brands', BrandController::class);
    Route::get('/api/get-brands',[BrandController::class,'getAllBrandsResponse']);
    //Size
    Route::resource('sizes', SizeController::class);
    Route::get('/api/get-sizes',[SizeController::class,'getAllSizesResponse']);
    //Size
    Route::resource('products', ProductController::class);
});


