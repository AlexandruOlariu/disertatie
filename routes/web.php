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

Route::get('/',[App\Http\Controllers\Controller::class,'index']);

Auth::routes();
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => 'api'], function () {
    Route::Resource('post', \App\Http\Controllers\PostController::class);
    Route::Resource('messages',\App\Http\Controllers\MessageController::class);
});
Route::get('register',function (){
    return view('/Login');
});

Route::any('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('sitemap',[App\Http\Controllers\Controller::class,'sitemap'])->name('sitemap');
