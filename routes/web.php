<?php

Auth::routes();

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/galleries', 'GalleryController@galleries')->name('admin.galleries');
    Route::get('/dive-spots', 'DivespotController@index')->name('admin.divespots');
    Route::get('/instagram', 'InstagramController@index')->name('admin.instagram');
});

Route::get('/{any}', function () {
    return view('home');
})->where('any', '.*');
