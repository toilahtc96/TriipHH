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

Route::get('/', function () {
    return view('welcome');
});


Route::get('newHotel', function () {
    return view('admin/hotel/newHotel');
})->name('newHotel');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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

    Route::post('/changeStatus', 'Controller@changeStatus')->name('changeStatus');
    Route::post('/changeBookStatus', 'Controller@changeBookStatusNew')->name('changeBookStatus');
    Route::post('/getRoomByHotelId', 'Controller@getListRoomByHotelIdAjaxForCBB')->name('getRoomByHotelId');
});
