<?php

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

Route::group(['middleware' => ['auth', 'CheckRole:admin,normal']], function () {
    // dashboard
    Route::get('/', DashboardController::class)->name('dashboard');
    // blog
    Route::resource('blog', BlogController::class);
    Route::get('all-blogs', AllBlogController::class)->name('all-blogs');
});
Route::group(['middleware' => ['auth', 'CheckRole:admin']], function () {
    // user
    Route::resource('user', UserController::class);
});
