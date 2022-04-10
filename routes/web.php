<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Brand\BrandController;
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

//Category
Route::resource('categories', CategoryController::class)->middleware('auth');
//Brand
Route::resource('brands', BrandController::class)->middleware('auth');

//Size
Route::resource('sizes', SizeController::class)->middleware('auth');

