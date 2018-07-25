<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/image-upload', 'GalleryController@upload');
Route::get('/images', 'GalleryController@getImages');

Route::prefix('dive-spots')->group(function() {
    Route::get('/', 'DivespotController@getSpots');
    Route::get('/delete/{id}', 'DivespotController@destroy');
    Route::get('/formdata', 'DivespotController@getFormData');
    Route::post('/new', 'DivespotController@saveSpot');
});

Route::post('/instagram-upload', 'InstagramController@upload');

Route::post('/send-booking', 'BookingController@sendBooking');
