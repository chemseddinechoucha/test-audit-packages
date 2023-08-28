<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');
Route::group(['prefix'=>'admin', 'middleware'=> 'auth'], function(){
    Route::get('users', [DashboardController::class, 'users']);
    Route::get('articles', [DashboardController::class, 'articles']);
    Route::get('audit', [DashboardController::class, 'audit']);

    Route::resource('users', UsersController::class)->only([
        'edit', 'update', 'destroy'
    ]);
    Route::resource('articles', ArticlesController::class)->only([
        'edit', 'update', 'destroy'
    ]);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
