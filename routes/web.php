<?php

use App\Action\File;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\SocailiteController;
use App\Http\Controllers\Frontend\SubscriberController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\WebsiteController;
use App\Models\Slider;
use Illuminate\Http\Request;
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
Route::get('/all-post/post-details/{post}', [HomeController::class, 'PostDetails'])->name('single-post');
Route::get('/all-post/category/post/{category}', [HomeController::class, 'categoryWisePost'])->name('category-wise-post');
Route::get('/all-post/tag/post/{tag}', [HomeController::class, 'tagWisePost'])->name('tag-wise-post');
Route::get('/all-post/sub-category/post/{subCategory}', [HomeController::class, 'subCategoryWisePost'])->name('subCategory-wise-post');
Route::get('/all-post/admin/post/{admin}', [HomeController::class, 'adminWisePost'])->name('admin-wise-post');

Route::post('/post/search', [HomeController::class, 'postSearch']);

Route::post("/subscribe", [SubscriberController::class, 'subscriber']);


// Socailite
Route::get('/auth/redirect/{provider}', [SocailiteController::class, 'login'])->name('socailite-login');
Route::get('/auth/{provider}/callback', [SocailiteController::class, 'loginCallback']);


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

    // Image Upload With Ajax
    Route::get('image/upload/ajax', function(){
        return view('Backend.Pages.ImageUpload.index');
    });

    Route::post('image/upload/ajax', function(Request $request){
        // if($request->hasFile('image')){
        //     $photo = $request->file('image');
        //     $fileName = 'biplob' . "." . $photo->getClientOriginalExtension();
        //     $request->file('image')->move(public_path('Sliders'), $fileName);
        //     Slider::create([
        //         'title' => 'New Slider',
        //         'image' => $fileName
        //     ]);
        // }

        if($request->hasFile('image')){

            Slider::create([
                'title' => 'New Slider',
                'image' => File::upload($request->file('image'), 'Sliders')
            ]);
        }
    });

// New Route..

});

require __DIR__.'/auth.php';
