<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\SubscriberController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\WebsiteController;
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

Route::get('/', [HomeController::class, 'home'])->name('home-page');
Route::get('/all-post', [HomeController::class, 'allPost'])->name('all-post');
Route::get('/all-post/post-details', [HomeController::class, 'PostDetails'])->name('single-post');

Route::post('/post/search', [HomeController::class, 'postSearch']);

Route::post("/subscribe", [SubscriberController::class, 'subscriber']);

Route::get('/dashboard', function () {
    return view('Frontend.Pages.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('admin')->middleware('auth:admin', 'custom_verify')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('Backend.index');
    })->name('dashboard');
});


Route::prefix('admin')->name('admin.')->group(function(){

    Route::resource('slider', SliderController::class);

    Route::get('/face-category', [CategoryController::class, 'faceCategory'])->name('face-category');
    Route::resource('/category', CategoryController::class);

    Route::resource('sub-category', SubCategoryController::class);
    Route::get('fatch-sub-category', [SubCategoryController::class, 'fatchSubCategory'])->name('fatch-sub-category');

    Route::resource('tag', TagController::class);
    Route::get('fatch-tag', [TagController::class, 'fatchTag'])->name('fatch-tag');

    Route::resource('/post', PostController::class);
    Route::get('/face-sub-category/{id}', [PostController::class, 'getSubCateogry'])->name('face-sub-category');
    Route::get('/check/name-exits-or-not/{name}', [PostController::class, 'checkNameExistOrNot']);
    Route::get('/post-status/{slug}', [PostController::class, 'postStatus'])->name('post-status');

    Route::resource('website', WebsiteController::class);

    Route::resource('about', AboutController::class);




});

require __DIR__.'/auth.php';
