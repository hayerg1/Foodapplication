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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/upload','App\Http\Controllers\Upload\PostController');
Route::get('/recipe/beginner', 'App\Http\Controllers\RecipeController@beginner')->name('recipe.beginner');
Route::get('/recipe/intermediate', 'App\Http\Controllers\RecipeController@intermediate')->name('recipe.intermediate');
Route::get('/recipe/advanced', 'App\Http\Controllers\RecipeController@advanced')->name('recipe.advanced');
Route::get('/recipe/showdish/{recipe_id}', 'App\Http\Controllers\RecipeController@dishView')->name('recipe.dishView');

Route::resource('/recipe','App\Http\Controllers\RecipeController');


//Route::resource('/admin/users', 'App\Http\Controllers\Admin\UsersController', ['except'=>['show', 'create', 'store']]);

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function (){
    Route::resource('/users', '\App\Http\Controllers\Admin\UsersController', ['except'=>['show', 'create', 'store']]);
    Route::post('/requests/approve/{recipe_id}','\App\Http\Controllers\Admin\RequestController@approve')->name('requests.approve');

    Route::resource('/requests', '\App\Http\Controllers\Admin\RequestController');
});

