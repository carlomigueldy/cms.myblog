<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');

    // Users Table
    Route::get('users/restore/{id}', 'UsersController@restore')->name('users.restore');
    Route::get('users/delete/{id}', 'UsersController@delete')->name('users.delete');
    Route::get('user/profile', 'ProfilesController@edit')->name('profile.edit');
    Route::put('user/profile/update', 'ProfilesController@update')->name('profile.update');
    Route::resource('users', 'UsersController');


    // Posts Table
    Route::get('posts/trashed', 'PostsController@trashed')->name('posts.trashed');
    Route::get('post/restore/{id}', 'PostsController@restore')->name('posts.restore');
    Route::get('post/delete/{id}', 'PostsController@delete')->name('posts.delete');
    Route::resource('posts', 'PostsController');

    // Categories Table
    Route::get('category/posts/{id}', 'CategoriesController@posts')->name('categories.posts');
    Route::get('category/restore/{id}', 'CategoriesController@restore')->name('categories.restore');
    Route::get('category/delete/{id}', 'CategoriesController@delete')->name('categories.delete');
    Route::resource('categories', 'CategoriesController');

    // Tags Table
    Route::get('tags/trashed', 'TagsController@trashed')->name('tags.trashed');
    Route::get('tag/restore/{id}', 'TagsController@restore')->name('tags.restore');
    Route::get('tag/delete/{id}', 'TagsController@delete')->name('tags.delete');
    Route::resource('tags', 'TagsController');
});