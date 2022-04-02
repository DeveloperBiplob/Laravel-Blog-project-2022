<?php

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
    return view('Frontend.index');
})->name('home-page');

Route::get('/dashboard', function () {
    return view('Frontend.Pages.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('admin')->middleware('auth:admin', 'custom_verify')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('Backend.index');
    })->name('dashboard');
});

require __DIR__.'/auth.php';
