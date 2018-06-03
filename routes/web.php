<?php

Auth::routes();

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.index');
});

Route::get('/{any}', function () {
    return view('home');
})->where('any', '.*');
