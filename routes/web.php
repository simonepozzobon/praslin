<?php

Auth::routes();

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/galleries', 'GalleryController@galleries')->name('admin.galleries');
    Route::get('/dive-spots', 'DivespotController@index')->name('admin.divespots');
    Route::get('/instagram', 'InstagramController@index')->name('admin.instagram');
});

// Route::get('/storage-link', function() { $exitCode = Artisan::call('storage:link'); return '<h1>The [public/storage] directory has been linked.</h1>'; });

Route::get('/{any}', function () {
    return view('home');
})->where('any', '.*');
