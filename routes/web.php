<?php

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




Route::get('blog/{slug}', [
    'uses' => 'BlogController@getSingle',
    'as' => 'blog.single'
])->where('slug', '[\w\d\-\_]+');

Route::get('blog', [
    'uses' => 'BlogController@getIndex',
    'as' => 'blog.index'
]);

Route::get('/contact', [
    'uses' => 'PagesController@getContact',
    'as' => 'contact'
]);

Route::get('/about', [
    'uses' => 'PagesController@getAbout',
    'as' => 'about'
]);

Route::get('/', [
    'uses' => 'PagesController@getIndex'
]);

Route::resource('posts', 'PostController');
//php artisan route:list



Auth::routes();

Route::post('/', 'PagesController@getIndex');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Categories
Route::resource('categories', 'CategoryController', ['except' => ['create']]); //except/only






