<?php

// Frontend
Route::get('/', 'FrontendController@index')->name('index');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    // Home
    Route::get('/home', 'HomeController@index')->name('viewHome');

    // Post
    Route::get('/post/create', 'PostsController@create')->name('viewCreatePost');
    Route::get('/posts', 'PostsController@index')->name('posts');
    Route::post('/post/store', 'PostsController@store')->name('postStore');
    Route::get('/post/delete/{id}', 'PostsController@destroy')->name('post.delete');
    Route::get('/posts/trashed', 'PostsController@trashed')->name('posts.trashed');
    Route::get('/post/kill/{id}', 'PostsController@kill')->name('post.kill');
    Route::get('/post/restore/{id}', 'PostsController@restore')->name('post.restore');
    Route::get('/post/edit/{id}', 'PostsController@edit')->name('post.edit');
    Route::post('/post/update/{id}', 'PostsController@update')->name('post.update');

    // Category
    Route::get('/category/create', 'CategoriesController@create')->name('category.create');
    Route::post('/category/store', 'CategoriesController@store')->name('category.store');
    Route::get('/categories', 'CategoriesController@index')->name('categories');
    Route::get('/category/edit/{id}', 'CategoriesController@edit')->name('category.edit');
    Route::get('/category/delete/{id}', 'CategoriesController@destroy')->name('category.delete');
    Route::post('/category/update/{id}', 'CategoriesController@update')->name('category.update');

    // Tag
    Route::get('/tags', 'TagsController@index')->name('tags');
    Route::post('/tag/store/', 'TagsController@store')->name('tag.store');
    Route::post('/tag/update/{id}', 'TagsController@update')->name('tag.update');
    Route::get('/tag/delete/{id}', 'TagsController@destroy')->name('tag.delete');

    // Users
    Route::get('/users', 'UsersController@index')->name('users');
    Route::get('/user/create', 'UsersController@create')->name('user.create');
    Route::post('/user/store', 'UsersController@store')->name('user.store');
    Route::get('/user/make-admin/{id}', 'UsersController@admin')->name('user.admin');
    Route::get('/user/delete/{id}', 'UsersController@destroy')->name('user.delete');
    Route::get('/user/make-not-admin/{id}', 'UsersController@not_admin')->name('user.not.admin');

    // Profile
    Route::get('/user/profile', 'ProfilesController@index')->name('user.profile');
    Route::post('/user/profile/update', 'ProfilesController@update')->name('user.profile.update');

    // Settings
    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::post('/settings/update', 'SettingsController@update')->name('settings.update');

});
