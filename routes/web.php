<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('posts/trashed', 'PostsController@trashed')->name('posts.trashed');
    Route::get('post/restore/{id}', 'PostsController@restore')->name('posts.restore');
    Route::get('post/delete/{id}', 'PostsController@delete')->name('posts.delete');
    Route::resource('posts', 'PostsController');
    Route::get('category/restore/{id}', 'CategoriesController@restore')->name('categories.restore');
    Route::get('category/delete/{id}', 'CategoriesController@delete')->name('categories.delete');
    Route::resource('categories', 'CategoriesController');
});