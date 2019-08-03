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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::resource('index', 'IndexController');



Route::get('/', [
    'as' => 'site.index',
    'uses' => 'SiteController@index'
]);

Route::get('/authors/{id}', [
    'as' => 'authors.show',
    'uses' => 'AuthorController@show'
]);


Route::get('/articles/{id}', [
    'as' => 'articles.show',
    'uses' => 'ArticleController@show'
]);

Route::post('/articles/{id}', [
    'as' => 'articles.store',
    'uses' => 'ArticleController@store'
]);

