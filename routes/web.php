<?php

Auth::routes();

// Welcome page
Route::get('/', 'BookController@index');

Route::resource('/book', 'BookController');
Route::get('/book-active', 'BookController@active')->name('book.active');
Route::get('/book-inactive', 'BookController@inactive')->name('book.inactive');

Route::resource('/category', 'CategoryController');

// PhuongHoang
Route::view('/ph', 'welcome');
