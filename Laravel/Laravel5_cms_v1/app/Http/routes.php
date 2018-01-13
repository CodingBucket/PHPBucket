<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/signup', [
    'uses' => 'UserController@postSignUp',
    'as' => 'signup'
]);

Route::post('/signin', [
    'uses' => 'UserController@postSignIn',
    'as' => 'signin'
]);

Route::get('/account', [
    'uses' => 'UserController@getAccount',
    'as' => 'account'
]);


Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function()
{
    // Controllers Within The "App\Http\Controllers\Admin" Namespace

    Route::get('dashboard', [
        'as' => 'dashboard', 'uses' => 'DashboardController@index'
    ]);

    Route::get('category/index', [
        'as' => 'category', 'uses' => 'CategoryController@index'
    ]);

    Route::get('login', [
        'as' => 'login', 'uses' => 'UserController@login'
    ]);

    Route::post('login', [
        'as' => 'login', 'uses' => 'UserController@login'
    ]);

    Route::get('logout', [
        'uses' => 'UserController@logout',
        'as' => 'logout'
    ]);

    Route::get('posts', [
        'as' => 'posts', 'uses' => 'PostController@index'
    ]);

    Route::get('post/edit/{id}', [
        'as' => 'post_edit', 'uses' => 'PostController@edit'
    ]);

    Route::get('post/destroy/{id}', [
        'as' => 'post.destroy', 'uses' => 'PostController@destroy'
    ]);

    Route::post('post/update/{id}', [
        'as' => 'post_update', 'uses' => 'PostController@update'
    ]);

    Route::get('post/add', [
        'as' => 'post_add', 'uses' => 'PostController@add'
    ]);

    Route::post('post/store', [
        'as' => 'post_store', 'uses' => 'PostController@store'
    ]);


});
