<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SlideshowController;
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

Route::get('/view', function () {
    return view('view');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','isAdmin'])->name('dashboard');

Route::middleware(['auth','isAdmin'])->name('admin.')->prefix('admin')->group(function(){
    Route::resource('slideshows',SlideshowController::class);
    Route::post('/slideshows/delete',[\App\Http\Controllers\Admin\SlideshowController::class,'delete'])->name('slideshows.delete');

    Route::resource('categories',CategoryController::class);
    Route::post('/categories/delete',[\App\Http\Controllers\Admin\CategoryController::class,'delete'])->name('categories.delete');

    Route::resource('products',ProductController::class);
    Route::post('/products/delete',[\App\Http\Controllers\Admin\ProductController::class,'delete'])->name('products.delete');

});

require __DIR__.'/auth.php';
