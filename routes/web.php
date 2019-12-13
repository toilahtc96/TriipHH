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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/introduce', 'HomeController@introduce')->name('introduce');
Route::get('/bookcustom', 'HomeController@bookcustom')->name('bookcustom');

Route::post('/bookCustom/store', 'BookCustomClientController@store')->name('createBookCustom');
Route::resource('/bookCustom', 'BookCustomClientController')->names([
    'index' => 'bookCustom.view',
]);


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::post('/bookroomClients/store', 'BookRoomClientController@store')->name('createBookRoom');
Route::resource('/bookroomClients', 'BookRoomClientController')->names([
    'index' => 'bookroomClients.view',
    'create' => 'bookroomClients.build',
    'edit' => 'bookroomClients.edit',
    'update' => 'bookroomClients.update',
]);

Route::resource('/hotels', 'HotelClientController')->names([
    'index' => 'hotelclients.view',
    'create' => 'hotelclients.build',
    'edit' => 'hotelclients.edit',
    'update' => 'hotelclients.update'
]);
Route::get('/hotel/{hotel}-{slug}', 'HotelClientController@show')->name('hotels.show');

Route::post('/bookcomboClients/store', 'BookComboClientController@store')->name('createBookCombo');
Route::resource('/combotrips', 'ComboTripClientController')->names([
    'index' => 'combotripclients.view',
    'create' => 'combotripclients.build',
    'edit' => 'combotripclients.edit',
    'update' => 'combotripclients.update'
]);
Route::post('/getLocationByCarId', 'Controller@getListLocationByCarIdAjaxForCBB')->name('getLocationByCarid');
Route::get('/combotrip/{combo}-{slug}', 'ComboTripClientController@show')->name('combotrips.show');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::resource('/hotels', 'HotelController')->names([
        'index' => 'hotels.view',
        'create' => 'hotels.build',
        'edit' => 'hotels.edit',
        'update' => 'hotels.update'
    ]);

    Route::resource('/locations', 'LocationController')->names([
        'index' => 'locations.view',
        'create' => 'locations.build',
        'edit' => 'locations.edit',
        'update' => 'locations.update'
    ]);
    Route::resource('/combotypes', 'ComboTypeController')->names([
        'index' => 'combotypes.view',
        'create' => 'combotypes.build',
        'edit' => 'combotypes.edit',
        'update' => 'combotypes.update'
    ]);

    Route::resource('/cars', 'CarController')->names([
        'index' => 'cars.view',
        'create' => 'cars.build',
        'edit' => 'cars.edit',
        'update' => 'cars.update'
    ]);

    Route::resource('/roomhotels', 'RoomHotelController')->names([
        'index' => 'roomhotels.view',
        'create' => 'roomhotels.build',
        'edit' => 'roomhotels.edit',
        'update' => 'roomhotels.update'
    ]);

    Route::resource('/combotrips', 'ComboTripController')->names([
        'index' => 'combotrips.view',
        'create' => 'combotrips.build',
        'edit' => 'combotrips.edit',
        'update' => 'combotrips.update'
    ]);

    Route::resource('/bookcombos', 'BookComboController')->names([
        'index' => 'bookcombos.view',
        'edit' => 'bookcombos.edit',
        'update' => 'bookcombos.update'
    ]);
    Route::resource('/bookcustomtrips', 'BookCustomTripController')->names([
        'index' => 'bookcustomtrips.view',
        'edit' => 'bookcustomtrips.edit',
        'update' => 'bookcustomtrips.update'
    ]);

    Route::resource('/bookrooms', 'BookRoomController')->names([
        'index' => 'bookrooms.view',
        'edit' => 'bookrooms.edit',
        'update' => 'bookrooms.update'
    ]);

    Route::resource('/bookcars', 'BookCarController')->names([
        'index' => 'bookcars.view',
        'edit' => 'bookcars.edit',
        'update' => 'bookcars.update'
    ]);

    Route::any('/search', 'Controller@search');

    Route::post('/changeStatus', 'Controller@changeStatus')->name('changeStatus');
    Route::post('/changeBookStatus', 'Controller@changeBookStatusNew')->name('changeBookStatus');
    Route::post('/getRoomByHotelId', 'Controller@getListRoomByHotelIdAjaxForCBB')->name('getRoomByHotelId');
});
